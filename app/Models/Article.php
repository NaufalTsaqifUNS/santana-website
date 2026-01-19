<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    protected $fillable = [
        "title",
        "slug",
        "thumbnail",
        "type",
        "content",
        "author",
        "read_time",
        "published_at",
        "is_published",
    ];

    protected $casts = [
        "is_published" => "boolean",
        "published_at" => "datetime",
    ];

    protected $appends = ["image_url"];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($article) {
            $slug = Str::slug($article->title);
            $count = static::where("slug", "LIKE", "{$slug}%")->count();
            $article->slug = $count ? "{$slug}-{$count}" : $slug;
        });
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    // Accessor for image_url (returns full storage URL from thumbnail)
    public function getImageUrlAttribute()
    {
        if ($this->thumbnail) {
            return asset("storage/" . $this->thumbnail);
        }
        return null;
    }
}
