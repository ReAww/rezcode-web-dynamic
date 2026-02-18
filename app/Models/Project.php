<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title', 'description', 'image', 'url', 'github_url',
        'tech_stack', 'category', 'is_featured', 'is_active', 'sort_order',
    ];

    protected $casts = [
        'tech_stack'  => 'array',
        'is_featured' => 'boolean',
        'is_active'   => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('sort_order');
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true)->where('is_active', true)->orderBy('sort_order');
    }
}
