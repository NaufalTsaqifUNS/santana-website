<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'thumbnail',
        'type',
        'content',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($article) {
            $slug = Str::slug($article->title);
            $count = static::where('slug', 'LIKE', "{$slug}%")->count();
            $article->slug = $count ? "{$slug}-{$count}" : $slug;
        });
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}


