<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use DataTables;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.categories.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'category' => ['required','unique:'.Categories::class]
        ]);
        Categories::create([
            'category' => $request->category,
            'description' => $request->description,
            'tags' => $request->tags,
        ]);
        return redirect()->route('category.index')->with('message', 'Category created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        //
        if($request->ajax()){
            $data = Categories::get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('category', function($row){
                    return $row->category;
                })
                ->addColumn('description', function($row){
                    return $row->description;
                })
                ->addColumn('tags', function($row){
                    return $row->tags;
                })
                ->addColumn('action', function($row){
                    $update = route('category.edit');
                    $delete = route('category.remove');
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
        $category = Categories::where('id', $id)->get();
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        $category = Categories::where('id', $request->cat_id)->update([
            'category' => $request->category,
            'description' => $request->description,
            'tags' => $request->tags,
        ]);
        return redirect()->route('category.index')->with('message', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        //
        Categories::where('id', $id)->delete();
        return redirect()->route('category.index')->with('message', 'Category deleted successfully');
    }
}
