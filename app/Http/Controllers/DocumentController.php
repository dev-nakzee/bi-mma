<?php

namespace App\Http\Controllers;

use App\Models\Documents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use DataTables;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.docs.index');
    }

    public function list(Request $request): JsonResponse
    {
        //
        $document = Documents::select('id','document','path')->orderBy('id', 'DESC')->get();
        return response()->json([$document]);
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
        $document = $request->file('file');
        $fullName = $document->getClientOriginalName();
        $extension = $document->getClientOriginalExtension();
        $onlyName = explode('.'.$extension,$fullName);
        $documentName = str_replace(" ","-",$onlyName[0]).'-'.time().'.'.$document->getClientOriginalExtension();
        Documents::create([
            'document' => $document->getClientOriginalName(),
            'path' => '/documents/'.$documentName,
            'document_type' => $document->getMimeType(),
        ]);
        $document->move(public_path('documents'),$documentName);
        return response()->json(['success'=>$documentName]);
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
