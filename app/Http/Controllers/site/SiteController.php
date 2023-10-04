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
        $blogs = Blog::all();
        $media = Media::all();
        return view('site.home', compact('services', 'blogs', 'media'));
    }
}
