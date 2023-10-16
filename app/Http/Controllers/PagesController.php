<?php

namespace App\Http\Controllers;

use App\Models\Pages;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use DataTables;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Pages $pages)
    {
        $pages = Pages::where('status', 1)->get();
        return view('admin.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        //
        $request->validate([
            'name' =>'required',
            'slug' =>'required',
            'img_id' => 'required',
            'image_alt' => 'required',
        ]);
        $pages = Pages::create([
            'name' => $request->name,
            'url' => $request->slug,
            'pg_image' => $request->img_id,
            'img_alt' => $request->image_alt,
            'content' => $request->content,
            'title' => $request->seoTitle,
            'description' => $request->seoDescription,
            'keywords' => $request->seoKeywords,
            'meta' => $request->seoMeta,
            'admin_id' => 1,
            'status' => 1,
        ]);
        if($pages) {
            return response()->json(200, [$pages]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        //
        if($request->ajax()){
            $data = Pages::get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('name', function($row){
                    return $row->name;
                })
                ->addColumn('description', function($row){
                    return $row->description;
                })
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="edit/'.$row->id.'" class="btn btn-primary btn-sm py-0 px-1 mr-1"><i class="fa-light fa-edit"></i></a><button onclick="delProduct('.$row->id.')" class="btn btn-danger btn-sm py-0 px-1"><i class="fa-light fa-trash"></i></button>';
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
    public function edit(Pages $pages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pages $pages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pages $pages)
    {
        //
    }
}
