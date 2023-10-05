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
        $services = Services::all();
        $testimonial = [];
        $blogs = Blog::select('blogs.*', 'media.path as path')->join('media', 'blogs.image', 'media.id')->limit(5)->get();
        return view('site.home', compact('services', 'blogs', 'testimonial'));
    }
}
