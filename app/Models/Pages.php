<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 
        'url', 
        'template_id', 
        'content', 
        'img_alt', 
        'pg_image', 
        'pg_short', 
        'title', 
        'description', 
        'meta', 
        'keywords', 
        'admin_id', 
        'status',
    ];
}
