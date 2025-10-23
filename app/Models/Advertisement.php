<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'excerpt', 'body', 'user_id', 'category_id', 'slug', 'published_at', 'image', 'price'];
    protected $with = ['category', 'author'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['category'] ?? false, fn ($query, $category) =>
        $query
            ->whereHas('category', fn ($query) =>
            $query->where('slug', $category)
            )
        );

        $query->when($filters['author'] ?? false, fn ($query, $author) =>
        $query
            ->whereHas('author', fn ($query) =>
            $query->where('username', $author)
            )
        );
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Categories::class);
    }

}
