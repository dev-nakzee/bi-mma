<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Model\Services;

class SiteController extends Controller
{
    //
    public function homepage()
    {
        return view('site.home', compact(''));
    }
}
