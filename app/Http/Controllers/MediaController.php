<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use DataTables;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.media.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function list(Request $request): JsonResponse
    {
        //
        $media = Media::select('id','media','path')->orderBy('id', 'DESC')->get();
        return response()->json([$media]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        //
        $image = $request->file('file');
        $fullName = $image->getClientOriginalName();
        $extension = $image->getClientOriginalExtension();
        $onlyName = explode('.'.$extension,$fullName);
        $imageName = str_replace(" ","-",$onlyName[0]).'-'.time().'.'.$image->getClientOriginalExtension();
        Media::create([
            'name' => $image->getClientOriginalName(),
            'media' => $imageName,
            'path' => '/media/'.$imageName,
            'type' => $image->getMimeType(),
            'size' => $image->getSize(),
        ]);
        $image->move(public_path('media'),$imageName);
        return response()->json(['success'=>$imageName]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        //
        if($request->ajax()){
            $data = Media::get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('media', function($row){
                    $image = '<img style="height: 50px;" src="'.url("/media").'/'.$row->media.'" alt="" />';
                    return $image;
                })
                ->addColumn('type', function($row){
                    return $row->type;
                })
                ->addColumn('size', function($row){
                    $size = round(intval($row->size) * 0.000001, 3);
                    return $size;
                })
                ->addColumn('action', function($row){
                    $actionBtn = '<button onclick="delMedia('.$row->id.')" class="btn btn-danger btn-sm py-0 px-1"><i class="fa-light fa-trash"></i></button>';
                    return $actionBtn;
                })
                ->rawColumns(['action','media','size'])
                ->escapeColumns([])
                ->make(true);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Media $media)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Media $media)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        //
        $media = Media::select('media')->where('id', $request->id)->get();
        $path = app_path('/media/'.$media[0]->media);
        unlink($path);
        $data = Media::where('id', $request->id)->delete();
        return response()->json($data);
    }
}
