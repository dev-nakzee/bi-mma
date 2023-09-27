<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use DataTables;


class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.service.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.service.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        //
        $request->validate([
            'service' => ['required', 'unique:'.Services::class],
            'slug' => ['required', 'unique:'.Services::class],
            'image_alt' => ['required'],
        ]);
        $faq = array_combine($request->question, $request->answer);        
        $data = [
            'service' => $request->service,
            'slug' => $request->slug,
            'media_id' => $request->image,
            'img_alt' => $request->image_alt,
            'description' => trim($request->description),
            'about' => $request->about,
            'documents' => $request->documentation,
            'stdcosttime' => $request->stdCostTime,
            'process' => $request->process,
            'seotitle' => $request->seoTitle,
            'seodescription' => trim($request->seoDescription),
            'seokeywords' => trim($request->seoKeywords),
            'faq' => json_encode($faq),
            'status' => 1,
        ];
        Services::create($data);
        return response()->json(['status' =>'success','message'  => 'Service added successfully.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        //
        if($request->ajax()){
            $data = Services::select('id','service','description','status')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('service', function($row){
                    return $row->service;
                })
                ->addColumn('description', function($row){
                    return $row->description;
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
                    $actionBtn = '<a href="services/edit/'.$row->id.'" class="btn btn-primary btn-sm py-0 px-1 mr-1"><i class="fa-light fa-edit"></i></a><button onclick="delService('.$row->id.')" class="btn btn-danger btn-sm py-0 px-1"><i class="fa-light fa-trash"></i></button>';
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
        $service = Services::where('id',$id)->get();
        return view('admin.service.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request): JsonResponse
    {
        //
        
        $faq = array_combine($request->question, $request->answer);       
        $data = [
            'service' => $request->service,
            'slug' => $request->slug,
            'media_id' => $request->image,
            'img_alt' => $request->image_alt,
            'description' => $request->description,
            'about' => $request->about,
            'documents' => $request->documentation,
            'stdcosttime' => $request->stdCostTime,
            'process' => $request->process,
            'seotitle' => $request->seoTitle,
            'seodescription' => $request->seoDescription,
            'seokeywords' => $request->seoKeywords,
            'faq' => json_encode($faq, true),
            'status' => 1,
        ];
        Services::where('id', $request->serviceId)->update($data);
        return response()->json(['status' =>'success','message'  => 'Service updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request): JsonResponse
    {
        //
        $data = Services::where('id', $request->id)->delete();
        return response()->json(['status' =>'success','message'  => 'Service deleted successfully.']);
    }
}
