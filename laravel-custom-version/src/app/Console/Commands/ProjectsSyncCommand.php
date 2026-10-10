<?php

namespace App\Console\Commands;

use App\Models\Project;
use App\Support\ProjectContent;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ProjectsSyncCommand extends Command
{
    protected $signature = 'projects:sync {--dry-run : Show changes without writing them}';

    protected $description = 'Update project pages from the versioned content/projects Markdown files';

    public function handle(ProjectContent $content): int
    {
        $projects = $content->all();
        $changes = [];

        foreach ($projects as $attributes) {
            $project = Project::firstOrNew(['slug' => $attributes['slug']]);
            $project->fill($attributes);

            if (! $project->exists || $project->isDirty()) {
                $changes[] = $project;
                $this->line(($project->exists ? 'Update: ' : 'Create: ').$project->slug);
            }
        }

        if ($this->option('dry-run')) {
            $this->info(count($changes).' project(s) would change. Nothing written.');

            return self::SUCCESS;
        }

        $existing = array_values(array_map(
            fn (Project $project) => $project->getRawOriginal(),
            array_filter($changes, fn (Project $project) => $project->exists),
        ));
        if ($existing !== []) {
            $directory = storage_path('app/content-backups');
            File::ensureDirectoryExists($directory);
            $backup = $directory.'/projects-'.now()->format('Ymd-His-u').'.json';
            File::put($backup, json_encode($existing, JSON_PRETTY_PRINT | JSON_THROW_ON_ERROR));
            $this->line('Previous project content saved to '.$backup);
        }

        DB::transaction(function () use ($changes) {
            foreach ($changes as $project) {
                $project->save();
            }
        });

        $this->info(count($changes).' project(s) updated. Other projects and articles were preserved.');

        return self::SUCCESS;
    }
}
