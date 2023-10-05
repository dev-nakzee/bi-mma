<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Services;
use App\Models\Compliances;
use App\Models\Categories;
use App\Models\ProdServMap;
use App\Models\Products;
use App\Models\Media;

class SiteProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($slug, $link = null)
    {
        //
        $products = Products::where('slug', $slug)
        ->first();
        $media = Media::where('id', $products->img_id)->first();
        $pid = $products->id;
        $services = ProdServMap::select('services.*')
        ->join('services', 'prod_serv_maps.service_id','services.id')
        ->where('product_id', $pid)
        ->get();
        return view('site.products', compact('services','products','media'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
