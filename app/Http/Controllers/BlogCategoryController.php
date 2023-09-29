<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use DataTables;


class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $blogCategories = BlogCategory::all();
        return view('admin.blogs.categories.index', compact('blogCategories'));
    }

    public function list(Request $request): JsonResponse
    {
        //
        $category = BlogCategory::select('id','name')->orderBy('id', 'DESC')->get();
        return response()->json([$category]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.blogs.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => ['required','unique:'.BlogCategory::class]
        ]);
        BlogCategory::create([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);
        return redirect()->route('blogs.category.index')->with('message', 'Category created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        //
        if($request->ajax()){
            $data = BlogCategory::get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('name', function($row){
                    return $row->name;
                })
                ->addColumn('slug', function($row){
                    return $row->slug;
                })
                ->addColumn('action', function($row){
                    $update = route('blogs.category.edit');
                    $delete = route('blogs.category.remove');
                    $actionBtn = '<a href="'.$update.'/'.$row->id.'" class="btn btn-primary mr-1 btn-sm py-0 px-1"><i class="fa-light fa-edit"></i></a><a href="'.$delete.'/'.$row->id.'" class="btn btn-danger btn-sm py-0 px-1"><i class="fa-light fa-trash"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
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
        $category = BlogCategory::where('id', $id)->get();
        return view('admin.blogs.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        $category = BlogCategory::where('id', $request->cat_id)->update([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);
        return redirect()->route('blogs.category.index')->with('message', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        //
        BlogCategory::where('id', $id)->delete();
        return redirect()->route('blogs.category.index')->with('message', 'Category deleted successfully');
    }
}
