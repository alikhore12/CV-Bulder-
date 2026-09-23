<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

#[Fillable([
    'user_id', 'category_id', 'title', 'slug', 'excerpt', 'content',
    'featured_image', 'author', 'meta_title', 'meta_description',
    'canonical_url', 'keywords', 'status', 'indexable', 'published_at',
])]
class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
            'indexable' => 'boolean',
        ];
    }

    protected static function booted(): void
    {
        static::creating(function (self $post) {
            if (empty($post->slug)) {
                $post->slug = Str::slug($post->title);
            }
        });
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published')->whereNotNull('published_at');
    }
}
