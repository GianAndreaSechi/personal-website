<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Symfony\Component\Yaml\Yaml;

class BlogSyncCommand extends Command
{
    protected $signature = 'blog:sync {--path=content/posts : The path to the markdown posts directory}';
    protected $description = 'Sync markdown files from content/posts into the database';

    public function handle()
    {
        $postsPath = base_path($this->option('path'));

        if (!File::exists($postsPath)) {
            File::makeDirectory($postsPath, 0755, true);
            $this->info("Created directory: {$postsPath}");
        }

        $files = File::files($postsPath);

        if (empty($files)) {
            $this->warn("No markdown (.md) files found in {$postsPath}");
            return 0;
        }

        $this->info("Found " . count($files) . " markdown file(s). Syncing into database...");

        $syncedCount = 0;

        foreach ($files as $file) {
            if ($file->getExtension() !== 'md') {
                continue;
            }

            $rawContent = File::get($file->getRealPath());
            $filename = pathinfo($file->getFilename(), PATHINFO_FILENAME);

            $parsed = $this->parseMarkdownFile($rawContent);
            $frontmatter = $parsed['frontmatter'];
            $body = $parsed['body'];

            $title = $frontmatter['title'] ?? Str::title(str_replace('-', ' ', $filename));
            $slug = $frontmatter['slug'] ?? Str::slug($filename);

            // Handle Category
            $categoryId = null;
            if (!empty($frontmatter['category'])) {
                $categoryName = $frontmatter['category'];
                $categorySlug = Str::slug($categoryName);
                $category = Category::firstOrCreate(
                    ['slug' => $categorySlug],
                    [
                        'name' => $categoryName,
                        'color' => $frontmatter['category_color'] ?? '#6366f1',
                    ]
                );
                $categoryId = $category->id;
            }

            // Handle Tags
            $tags = [];
            if (!empty($frontmatter['tags'])) {
                $tags = is_array($frontmatter['tags']) ? $frontmatter['tags'] : array_map('trim', explode(',', $frontmatter['tags']));
            }

            // Reading time
            $readingTime = $frontmatter['reading_time'] ?? null;
            if (!$readingTime) {
                $wordCount = str_word_count(strip_tags($body));
                $readingTime = max(1, (int) ceil($wordCount / 200));
            }

            // Excerpt
            $excerpt = $frontmatter['excerpt'] ?? Str::limit(strip_tags($body), 160);

            // Published at
            $publishedAt = null;
            if (isset($frontmatter['published_at']) && $frontmatter['published_at']) {
                $publishedAt = Carbon::parse($frontmatter['published_at']);
            } elseif (isset($frontmatter['draft']) && $frontmatter['draft'] === true) {
                $publishedAt = null;
            } else {
                $publishedAt = now();
            }

            Post::updateOrCreate(
                ['slug' => $slug],
                [
                    'title' => $title,
                    'category_id' => $categoryId,
                    'excerpt' => $excerpt,
                    'content' => $body,
                    'cover_image' => $frontmatter['cover_image'] ?? null,
                    'reading_time' => $readingTime,
                    'is_featured' => (bool) ($frontmatter['is_featured'] ?? false),
                    'tags' => $tags,
                    'published_at' => $publishedAt,
                ]
            );

            $this->line(" <fg=green>✓</> Synced: <fg=white>{$title}</> (slug: {$slug})");
            $syncedCount++;
        }

        $this->newLine();
        $this->info("Successfully synced {$syncedCount} post(s) into the database!");

        return 0;
    }

    private function parseMarkdownFile(string $content): array
    {
        $pattern = '/^---\s*\n(.*?)\n---\s*\n(.*)$/s';

        if (preg_match($pattern, $content, $matches)) {
            $frontmatter = Yaml::parse($matches[1]) ?? [];
            $body = trim($matches[2]);
        } else {
            $frontmatter = [];
            $body = trim($content);
        }

        return [
            'frontmatter' => $frontmatter,
            'body' => $body,
        ];
    }
}
