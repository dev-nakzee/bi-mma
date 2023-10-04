<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use DataTables;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $blogs = Blog::join('blog_categories', 'blogs.Category_id', 'blog_categories.id')->get();
        return view('admin.blogs.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        //
        $request->validate([
            'name' => ['required', 'unique:'.Blog::class],
            'slug' => ['required', 'unique:'.Blog::class],
            'image_alt' => ['required'],
        ]);
        $data = [
            'name' => $request->name,
            'slug' => $request->slug,
            'content' => $request->content,
            'image' => $request->image,
            'img_alt' => $request->image_alt,
            'meta_title' => $request->seoTitle,
            'meta_description' => trim($request->seoDescription),
            'meta_keywords' => trim($request->seoKeywords),
            'user_id' => auth()->user()->id,
            'category_id' => $request->category_id,
            'status' => 1,
        ];
        Blog::create($data);
        return response()->json(['status' =>'success','message'  => 'Blog added successfully.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        //
        if($request->ajax()){
            $data = Blog::selectRaw('blogs.id as id, blogs.name as blog, blog_categories.name as category , blogs.status as status')->join('blog_categories', 'blogs.category_id', 'blog_categories.id')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('blog', function($row){
                    return $row->blog;
                })
                ->addColumn('category', function($row){
                    return $row->category;
                })
                ->addColumn('status', function($row){
                    $status = "";
                    if($row->status === 1) {
                        $status = "Active";
                    } else {
                        $status = "Disabled";
                    }
                    return $status;
                })
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="edit/'.$row->id.'" class="btn btn-primary btn-sm py-0 px-1 mr-1"><i class="fa-light fa-edit"></i></a><button onclick="delService('.$row->id.')" class="btn btn-danger btn-sm py-0 px-1"><i class="fa-light fa-trash"></i></button>';
                    return $actionBtn;
                })
                ->rawColumns(['action', 'status'])
                ->escapeColumns([])
                ->make(true);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $blogs = Blog::where('blogs.id',$id)->get();
        return view('admin.blogs.edit', compact('blogs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request): JsonResponse
    {
        //
        $data = [
            'name' => $request->name,
            'slug' => $request->slug,
            'image' => $request->image,
            'img_alt' => $request->image_alt,
            'content' => $request->content,
            'meta_title' => $request->seoTitle,
            'meta_description' => trim($request->seoDescription),
            'meta_keywords' => trim($request->seoKeywords),
            'user_id' => auth()->user()->id,
            'category_id' => $request->category_id,
            'status' => 1,
        ];
        Blog::where('id', $request->blogId)->update($data);
        return response()->json(['status' =>'success','message'  => 'Blog updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request): JsonResponse
    {
        //
        $data = Blog::where('id', $request->id)->delete();
        return response()->json(['status' =>'success','message'  => 'Blog deleted successfully.']);
    }
}
