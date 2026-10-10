<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Project;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function __invoke(): Response
    {
        $baseUrl = rtrim(config('app.url'), '/');
        $entries = collect(['home', 'about', 'resume', 'projects', 'blog.index', 'contact.show'])
            ->map(fn ($name) => ['loc' => $baseUrl.route($name, [], false)]);

        foreach (Project::orderBy('id')->cursor() as $project) {
            $entries->push([
                'loc' => $baseUrl.route('projects.show', $project->slug, false),
                'lastmod' => $project->updated_at?->toAtomString(),
            ]);
        }

        foreach (Post::whereNotNull('published_at')->orderBy('id')->cursor() as $post) {
            $entries->push([
                'loc' => $baseUrl.route('blog.show', $post->slug, false),
                'lastmod' => ($post->updated_at ?? $post->published_at)->toAtomString(),
            ]);
        }

        return response()->view('sitemap', compact('entries'))
            ->header('Content-Type', 'application/xml; charset=UTF-8');
    }

    public function robots(): Response
    {
        $sitemapUrl = rtrim(config('app.url'), '/').route('sitemap', [], false);

        return response("User-agent: *\nDisallow:\n\nSitemap: {$sitemapUrl}\n")
            ->header('Content-Type', 'text/plain; charset=UTF-8');
    }
}
