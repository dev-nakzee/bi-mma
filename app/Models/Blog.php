<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'content', 'image', 'img_alt', 'meta_title', 'meta_description', 'meta_keywords', 'user_id', 'category_id', 'status'];
    protected $table = 'blogs';
    public $timestamps = true;
    protected $primaryKey = 'id';
}
