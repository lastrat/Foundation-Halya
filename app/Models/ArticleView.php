<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ArticleView extends Model
{
    use HasFactory;

    protected $fillable = ['news_id', 'ip_address', 'viewed_at'];
    public $timestamps = false;
}
