<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Services;
use App\Models\Compliances;
use App\Models\Categories;
use App\Models\ProdServMap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use DataTables;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products = Products::all();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $category = Categories::select('id', 'category')->get();
        $service = Services::select('id', 'service')->get();
        return view('admin.products.create', compact('category','service'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        
        $request->validate([
            'product' => ['required', 'unique:'.Products::class],
            'slug' => ['required', 'unique:'.Products::class],
            'image_alt' => ['required'],
        ]);

        $data = [
            'product' => $request->product,
            'slug' => $request->slug,
            'category_id' => $request->category,
            'standards' => $request->standards,
            'description' => $request->description,
            'about' => $request->about,
            'choose_us' => $request->choose_us,
            'seo_title' => $request->seoTitle,
            'seo_description' => trim($request->seoDescription),
            'seo_keywords' => trim($request->seoKeywords),
            'img_id' => $request->image,
            'img_alt' => $request->image_alt,
        ];
        $id = Products::insertGetId($data);
        $lastId = $id;
        $relation = [];
        foreach ($request->services as $service) {
            $relation = [
                'product_id' => $lastId,
                'service_id' => $service,
                'status' => 1,
            ];
            ProdServMap::create($relation);
        }
        return response()->json(['status' =>'success','message'  => 'Product added successfully.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        //
        if($request->ajax()){
            $data = Products::select('products.id as id', 'products.product as product', 'products.standards as compliances','categories.category as category')
            ->join('categories','products.category_id','categories.id')
            ->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('product', function($row){
                    return $row->product;
                })
                ->addColumn('category', function($row){
                    return $row->category;
                })
                ->addColumn('services', function($row){
                    $prodId = $row->id;
                    $services = ProdServMap::join('services', 'services.id', 'prod_serv_maps.service_id')
                    ->select('service')
                    ->distinct('id')
                    ->where('product_id', $prodId)
                    ->get();
                    $data = '';
                    foreach($services as $service){
                        $data = $data.'<span class="badge badge-secondary mr-1">'.$service->service.'</span>';
                    }
                    return $data;
                })
                ->addColumn('compliance', function($row){
                    $row->compliances;
                })
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="edit/'.$row->id.'" class="btn btn-primary btn-sm py-0 px-1 mr-1"><i class="fa-light fa-edit"></i></a><button onclick="delProduct('.$row->id.')" class="btn btn-danger btn-sm py-0 px-1"><i class="fa-light fa-trash"></i></button>';
                    return $actionBtn;
                })
                ->rawColumns(['action','services'])
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
        $products = Products::where('id', $id)->first();
        $category = Categories::select('id', 'category')->get();
        $service = Services::select('id', 'service')->get();
        return view('admin.products.edit', compact('products', 'category','service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Products $products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Products $products)
    {
        //
    }
}
