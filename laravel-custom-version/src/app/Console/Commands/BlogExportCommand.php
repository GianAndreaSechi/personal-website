<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Symfony\Component\Yaml\Yaml;

class BlogExportCommand extends Command
{
    protected $signature = 'blog:export {--path=content/posts : The destination path for markdown files}';
    protected $description = 'Export all database blog posts to markdown (.md) files';

    public function handle()
    {
        $postsPath = base_path($this->option('path'));

        if (!File::exists($postsPath)) {
            File::makeDirectory($postsPath, 0755, true);
        }

        $posts = Post::with('category')->get();

        if ($posts->isEmpty()) {
            $this->warn("No posts found in database to export.");
            return 0;
        }

        $this->info("Exporting " . $posts->count() . " post(s) to {$postsPath}...");

        foreach ($posts as $post) {
            $frontmatter = [
                'title' => $post->title,
                'slug' => $post->slug,
                'category' => $post->category ? $post->category->name : null,
                'excerpt' => $post->excerpt,
                'cover_image' => $post->cover_image,
                'reading_time' => $post->reading_time,
                'is_featured' => (bool) $post->is_featured,
                'tags' => $post->tags ?? [],
                'published_at' => $post->published_at ? $post->published_at->format('Y-m-d H:i:s') : null,
                'draft' => $post->published_at === null,
            ];

            $yaml = Yaml::dump($frontmatter, 2, 2);
            $content = "---\n" . trim($yaml) . "\n---\n\n" . trim($post->content) . "\n";

            $filename = "{$post->slug}.md";
            $filepath = $postsPath . DIRECTORY_SEPARATOR . $filename;

            File::put($filepath, $content);
            $this->line(" <fg=green>✓</> Exported: <fg=white>{$filename}</>");
        }

        $this->newLine();
        $this->info("All posts exported to {$postsPath} successfully!");

        return 0;
    }
}
