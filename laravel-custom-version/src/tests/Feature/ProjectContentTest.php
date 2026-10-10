<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\Project;
use Database\Seeders\PortfolioSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProjectContentTest extends TestCase
{
    use RefreshDatabase;

    public function test_project_sync_previews_changes_then_preserves_existing_ids_and_other_content(): void
    {
        $project = Project::create([
            'title' => 'Old title', 'slug' => 'irides', 'description' => 'Old description',
        ]);
        $other = Project::create([
            'title' => 'My other project', 'slug' => 'custom-project', 'description' => 'Keep this',
        ]);
        $post = Post::create([
            'title' => 'My article', 'slug' => 'my-article', 'excerpt' => 'Keep this', 'content' => 'Original text',
        ]);

        $this->artisan('projects:sync', ['--dry-run' => true])->assertSuccessful();
        $this->assertSame('Old title', $project->fresh()->title);
        $this->assertSame(2, Project::count());

        $this->artisan('projects:sync')->assertSuccessful();
        $this->assertSame($project->id, Project::where('slug', 'irides')->value('id'));
        $this->assertSame('Active Alpha', $project->fresh()->status);
        $this->assertSame('Keep this', $other->fresh()->description);
        $this->assertSame('Original text', $post->fresh()->content);
        $this->assertSame(14, Project::count());

        $this->travel(1)->days();
        $updatedAt = $project->fresh()->updated_at;
        $this->artisan('projects:sync')->assertSuccessful();
        $this->assertTrue($project->fresh()->updated_at->equalTo($updatedAt));
    }

    public function test_targeted_blog_sync_preserves_publication_date_and_other_articles(): void
    {
        $post = Post::create([
            'title' => 'Welcome', 'slug' => 'welcome-to-my-new-website', 'excerpt' => 'Old',
            'content' => 'Old', 'published_at' => '2026-01-15 12:00:00',
        ]);
        $other = Post::create([
            'title' => 'Other', 'slug' => 'other', 'excerpt' => 'Keep', 'content' => 'Keep',
        ]);

        $this->artisan('blog:sync', [
            '--slug' => 'welcome-to-my-new-website', '--preserve-publication-date' => true,
        ])->assertSuccessful();

        $this->assertSame('2026-01-15 12:00:00', $post->fresh()->published_at->format('Y-m-d H:i:s'));
        $this->assertStringContainsString('projects from different parts of my life', $post->fresh()->excerpt);
        $this->assertSame('Keep', $other->fresh()->content);
        $this->assertNull($other->fresh()->published_at);
    }

    public function test_public_pages_render_from_the_shared_project_content(): void
    {
        $this->seed(PortfolioSeeder::class);
        $this->seed(PortfolioSeeder::class);
        $this->assertSame(13, Project::count());
        $this->assertSame(1, Post::count());

        foreach (['/', '/about-me', '/resume', '/projects', '/blog', '/contact'] as $path) {
            $this->get($path)->assertOk()->assertHeaderMissing('X-Robots-Tag');
        }
        foreach (Project::all() as $project) {
            $this->get('/projects/'.$project->slug)->assertOk()
                ->assertSee($project->title)->assertSee($project->status)
                ->assertSee('My contribution');
        }
        $this->get('/')->assertSee('Dynamical Systems')->assertDontSee('PYWDManager');
        $this->get('/projects/irides')->assertDontSee('zero hallucination')->assertSee('Current state');
        $this->get('/projects/openf1')->assertSee('Bruno Gonçalves');
        $this->get('/projects/pywd-manager')->assertSee('Fernet')->assertDontSee('PBKDF2');
        $this->get('/contact')->assertSee('mailto:me@gianandreasechi.com', false)->assertDontSee('<form', false);
        $this->get('/projects?category=missing')->assertOk()->assertSee('See all projects');
        $this->get('/blog')->assertDontSee('backend &amp; cloud architecture', false);
        $this->get('/blog/welcome-to-my-new-website')->assertOk()->assertSee('100 e lode');
        $this->get('/blog/rss.xml')->assertOk();
        $this->assertNotFalse(simplexml_load_string($this->get('/blog/rss.xml')->getContent()));
        $this->get('/resume')->assertSee('Request my CV')
            ->assertSee('mailto:me@gianandreasechi.com?subject=Request%20for%20your%20CV', false)
            ->assertDontSee('/resume/download', false);
        $this->get('/resume/download')->assertNotFound();
    }
}
