<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'content', 'icon', 'image', 'slug', 'is_active', 'order'];
    protected $casts = ['is_active' => 'boolean'];
}
