<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Project;
use App\Support\ProjectContent;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Symfony\Component\Yaml\Yaml;

class PortfolioSeeder extends Seeder
{
    public function run(): void
    {
        foreach ([
            ['Backend & Cloud Architecture', 'backend-cloud-architecture', 'Notes on backend services, cloud infrastructure and maintaining software.', '#6366f1'],
            ['AI & Data Engineering', 'ai-data-engineering', 'Experiments with databases, metadata and tools for AI applications.', '#06b6d4'],
            ['Open Source & Impact', 'open-source-impact', 'Personal tools, open data and community projects.', '#10b981'],
            ['Engineering Thoughts', 'engineering-thoughts', 'Notes on projects, learning and the ideas behind the code.', '#f59e0b'],
        ] as [$name, $slug, $description, $color]) {
            Category::firstOrCreate(['slug' => $slug], compact('name', 'description', 'color'));
        }

        foreach (app(ProjectContent::class)->all() as $attributes) {
            Project::firstOrCreate(['slug' => $attributes['slug']], $attributes);
        }

        $raw = File::get(base_path('content/posts/welcome-to-my-new-website.md'));
        preg_match('/\A---\R(.*?)\R---\R(.*)\z/s', $raw, $matches);
        $attributes = Yaml::parse($matches[1]);
        unset($attributes['category'], $attributes['draft']);
        $attributes['category_id'] = Category::where('slug', 'engineering-thoughts')->value('id');
        $attributes['content'] = trim($matches[2]);
        Post::firstOrCreate(['slug' => $attributes['slug']], $attributes);
    }
}
