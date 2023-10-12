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
        $blog = Blog::select('blogs.*', 'media.path', 'blog_categories.slug as category')
        ->join('blog_categories', 'blogs.category_id','blog_categories.id')
        ->join('media', 'blogs.image','media.id')
        ->get();
        $blogCategory = BlogCategory::get();
        $category = null;
        return view('site.blogs', compact('blog', 'blogCategory', 'category'));
    }

    public function category($category)
    {
        $cat = BlogCategory::where('slug', $category)->first();
        $blog = Blog::select('blogs.*', 'media.path', 'blog_categories.slug as category')
        ->join('blog_categories', 'blogs.category_id','blog_categories.id')
        ->join('media', 'blogs.image','media.id')
        ->where('category_id', $cat->id)
        ->get();
        $blogCategory = BlogCategory::get();
        return view('site.blogs', compact('blog', 'blogCategory', 'category'));
    }

    public function single($category, $slug)
    {
        $blog = Blog::select('blogs.*', 'media.path', 'blog_categories.slug as category')
        ->join('blog_categories', 'blogs.category_id','blog_categories.id')
        ->join('media', 'blogs.image','media.id')
        ->where('blogs.slug', $slug)
        ->first();
        $blogCategory = BlogCategory::get();
        return view('site.blog-single', compact('blog', 'blogCategory', 'category', 'slug'));
    }
}
