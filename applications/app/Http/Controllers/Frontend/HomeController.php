<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    //
    function index(){

    	$items = [];
    	$client = new \GuzzleHttp\Client;
	    $response = $client->get('https://www.instagram.com/dessurya/media');
	    $items = json_decode((string) $response->getBody(), true)['items'];
	    // dd($items);
	    
    	return view('frontend.home.index',compact('items'));
    }
}
