<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Services;
use App\Models\Blog;
use App\Models\Media;

class SiteController extends Controller
{
    //
    public function homepage()
    {
        $service = Services::select('services.*', 'media.path as path')
        ->join('media', 'services.media_id', '=','media.id')
        ->get();
        $testimonial = [];
        $blogs = Blog::select('blogs.*', 'media.path', 'blog_categories.name as category')
        ->join('blog_categories', 'blogs.category_id','blog_categories.id')
        ->join('media', 'blogs.image','media.id')
        ->limit(3)
        ->get();
        return view('site.home', compact('service', 'blogs', 'testimonial'));
    }
}
