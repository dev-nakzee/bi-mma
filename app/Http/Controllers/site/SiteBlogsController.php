<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogCategory;

class SiteBlogsController extends Controller
{
    //
    public function index() {
        $blog = Blog::select('blogs.*', 'media.path', 'blog_categories.name as category')
        ->join('blog_categories', 'blogs.category_id','blog_categories.id')
        ->join('media', 'blogs.image','media.id')
        ->limit(3)
        ->get();
        $blogCategory = BlogCategory::get();
        return view('site.blogs', compact('blog', 'blogCategory'));
    }

    public function category($category)
    {
        $blog = Blog::select('blogs.*', 'media.path')->join('media', 'blogs.image','media.id')
        ->where('category_id', $category)
        ->get();
        $blogCategory = BlogCategory::get();
        return view('site.blogs', compact('blog', 'blogCategory', 'category'));
    }
}
