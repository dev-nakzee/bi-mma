<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Services;
use App\Models\Compliances;
use App\Models\Categories;
use App\Models\ProdServMap;
use App\Models\Products;

class SiteServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($slug, $link = null)
    {
        //
        $services = Services::select('services.*', 'media.name', 'media.path')->join('media', 'services.media_id','media.id')->where('slug', $slug)->first();
        $sid = $services->id;
        $products = ProdServMap::select('products.id', 'products.product', 'products.slug', 'products.standards')
        ->join('products', 'prod_serv_maps.product_id', 'products.id')
        ->where('prod_serv_maps.service_id', $sid)
        ->get();
        $otherService = [];
        foreach($products as $product){
            $serv =  ProdServMap::join('services', 'prod_serv_maps.service_id','services.id')
            ->select('services.service', 'services.slug')
            ->where('product_id', $product->id)
            ->get();
            $str = '';
            foreach($serv as $s){
                $str = $str.'<span class="badge badge-secondary mr-1">'.$s->service. '</span>';
            }
            $otherService[$product->id] = $str;
        }
        return view('site.services', compact('services','products', 'otherService'));
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
