<?php

namespace App\Support;

use Illuminate\Support\Facades\File;
use InvalidArgumentException;
use Symfony\Component\Yaml\Yaml;

class ProjectContent
{
    public function all(): array
    {
        $projects = [];

        foreach (File::files(base_path('content/projects')) as $file) {
            if ($file->getExtension() !== 'md') {
                continue;
            }

            if (! preg_match('/\A---\R(.*?)\R---\R(.*)\z/s', $file->getContents(), $matches)) {
                throw new InvalidArgumentException("Missing front matter in {$file->getFilename()}");
            }

            $data = Yaml::parse($matches[1]);
            if (! is_array($data)) {
                throw new InvalidArgumentException("Invalid front matter in {$file->getFilename()}");
            }
            foreach (['title', 'slug', 'description', 'category'] as $required) {
                if (! isset($data[$required]) || ! is_string($data[$required]) || trim($data[$required]) === '') {
                    throw new InvalidArgumentException("Missing {$required} in {$file->getFilename()}");
                }
            }

            if (isset($projects[$data['slug']])) {
                throw new InvalidArgumentException("Duplicate project slug: {$data['slug']}");
            }

            $projects[$data['slug']] = array_merge($data, ['content' => trim($matches[2])]);
        }

        return array_values($projects);
    }
}
