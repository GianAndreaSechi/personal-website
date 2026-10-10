<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'subtitle',
        'description',
        'content',
        'category',
        'tech_stack',
        'project_url',
        'github_url',
        'image_url',
        'is_featured',
        'sort_order',
        'period',
        'status',
        'contribution',
    ];

    protected $casts = [
        'tech_stack' => 'array',
        'is_featured' => 'boolean',
    ];
}
