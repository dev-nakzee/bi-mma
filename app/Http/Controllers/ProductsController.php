<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Services;
use App\Models\compliances;
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
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        //
        if($request->ajax()){
            $data = Products::selectRaw('product, category,
        group_concat(prod_serv_maps.service_id) as serv,
        group_concat(prod_compl_maps.compliance_id) as compl')
            ->join('categories','products.category_id','categories.id')
            ->rightJoin('prod_serv_maps','products.id','prod_serv_maps.product_id')
            ->rightJoin('prod_compl_maps','products.id','prod_compl_maps.product_id')
            ->groupBy('products.id')
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
                    $serv = explode(',', $row->serv);
                    $services = DB::table('services')
                    ->selectRaw('group_concat(service) as service')
                    ->whereIn('id',$serv)
                    ->groupBy('status')
                    ->get();
                    return print_r($services);
                })
                ->addColumn('compliances', function($row){
                    return $row->compl;
                })
                ->addColumn('tags', function($row){
                    return $row->tags;
                })
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="products/edit/'.$row->id.'" class="btn btn-primary btn-sm py-0 px-1 mr-1"><i class="fa-light fa-edit"></i></a><button onclick="delService('.$row->id.')" class="btn btn-danger btn-sm py-0 px-1"><i class="fa-light fa-trash"></i></button>';
                    return $actionBtn;
                })
                ->rawColumns(['action','services', 'compliances'])
                ->escapeColumns([])
                ->make(true);
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Products $products)
    {
        //
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
