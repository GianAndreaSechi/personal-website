<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SitemapTest extends TestCase
{
    use RefreshDatabase;

    public function test_sitemap_contains_public_pages_and_updates_with_published_content(): void
    {
        config(['app.url' => 'https://example.com']);

        $post = Post::create([
            'title' => 'Published', 'slug' => 'published', 'excerpt' => 'Excerpt',
            'content' => 'Content', 'published_at' => now()->subDay(),
        ]);
        $draft = Post::create([
            'title' => 'Draft', 'slug' => 'draft', 'excerpt' => 'Excerpt', 'content' => 'Content',
        ]);
        Project::create(['title' => 'Project', 'slug' => 'example', 'description' => 'Description']);

        $response = $this->get('/sitemap.xml')->assertOk()
            ->assertHeader('Content-Type', 'application/xml; charset=UTF-8');
        $xml = simplexml_load_string($response->getContent());
        $this->assertNotFalse($xml);
        $urls = [];
        foreach ($xml->url as $entry) {
            $urls[] = (string) $entry->loc;
        }
        $this->assertCount(8, $urls);
        foreach (['/', '/about-me', '/resume', '/projects', '/blog', '/contact', '/projects/example', '/blog/published'] as $path) {
            $this->assertContains('https://example.com'.$path, $urls);
        }
        $this->assertNotContains('https://example.com/blog/draft', $urls);
        $response->assertDontSee('/admin')->assertDontSee('/login');
        $this->assertSame($post->updated_at->toAtomString(), (string) $xml->url[7]->lastmod);

        $draft->update(['published_at' => now()]);
        $this->get('/sitemap.xml')->assertSee('https://example.com/blog/draft');
        $post->delete();
        $this->get('/sitemap.xml')->assertDontSee('https://example.com/blog/published');
    }

    public function test_robots_advertises_the_canonical_sitemap(): void
    {
        config(['app.url' => 'https://example.com']);
        $this->get('/robots.txt')->assertOk()
            ->assertHeader('Content-Type', 'text/plain; charset=UTF-8')
            ->assertSee('Sitemap: https://example.com/sitemap.xml', false)
            ->assertDontSee('Disallow: /admin', false);
        $this->assertFileDoesNotExist(public_path('robots.txt'));
    }

    public function test_admin_pages_redirects_and_errors_are_not_indexable(): void
    {
        foreach (['/admin/login', '/admin', '/admin/posts', '/admin/missing', '/login'] as $path) {
            $this->get($path)->assertHeader('X-Robots-Tag', 'noindex, nofollow');
        }
        $this->get('/about-me')->assertHeaderMissing('X-Robots-Tag');
    }
}
