<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'excerpt', 'content', 'featured_image', 'status', 'is_pinned', 'published_at', 'scheduled_at', 'user_id'];
    protected $casts = ['is_pinned' => 'boolean', 'published_at' => 'datetime', 'scheduled_at' => 'datetime'];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function views()
    {
        return $this->hasMany(ArticleView::class);
    }
}
