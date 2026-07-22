<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Visit extends Model
{
    use HasFactory;

    protected $fillable = ['ip_address', 'user_agent', 'url', 'method', 'visited_at'];

    public $timestamps = false;
}
