<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Banner;

class AboutController extends Controller
{
    function index(){

    	return view('frontend.about.index', compact('forBanner'));
    }
}
