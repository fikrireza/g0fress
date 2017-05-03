<?php

namespace App\Http\Controllers\Frontend;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\ProgramEvents;

use App;
use DB;
use DateTime;

class EventsController extends Controller
{
    function index(){

    	$date = new DateTime;
		$format_date = $date->format('Y-m-d');

    	$callProgramEvent = ProgramEvents::select('judul_promosi_ID as judul', 'img_url', 'img_alt', 'slug', 'deskripsi_ID as deskripsi')->where('flag_publish', '1')->whereDATE('tanggal_post', '<=', $format_date)->whereNull('video_url')->orderBy('id', 'desc')->limit(15)->get();

    	$callProgramEventVidio = ProgramEvents::select('judul_promosi_ID as judul', 'video_url', 'img_alt', 'slug', 'deskripsi_ID as deskripsi')->where('flag_publish', '1')->whereDATE('tanggal_post', '<=', $format_date)->whereNotNull('video_url')->orderBy('id', 'desc')->limit(8)->get();


    	return view('frontend.events.index',compact('callProgramEvent','callProgramEventVidio'));
    }
    
    function indexEvents(Request $request){

    	$date = new DateTime;
		$format_date = $date->format('Y-m-d');
		
		$callProgramEvent = ProgramEvents::select('judul_promosi_ID as judul', 'img_url', 'img_alt', 'slug', 'deskripsi_ID as deskripsi')->where('flag_publish', '1')->whereDATE('tanggal_post', '<=', $format_date)->whereNull('video_url')->orderBy('id', 'desc')->paginate(8);
		
    	if ($request->ajax()) {
    		$view = view('frontend.events.ajax-events-list',compact('callProgramEvent'))->render();
            return response()->json(['html'=>$view]);
        }

    	return view('frontend.events.index-events',compact('callProgramEvent'));
    }

    function eventsView($slug){

    	$callProgramEvent = ProgramEvents::select('judul_promosi_ID as judul', 'img_url', 'img_alt', 'deskripsi_ID as deskripsi','tanggal_post', 'video_url')->where('slug', $slug)->first();

    	if ($callProgramEvent->video_url == null) {
	    	return view('frontend.events.events-view',compact('callProgramEvent'));
    	}
    	if ($callProgramEvent->video_url != null) {
	    	return view('frontend.events.events-view-vidio',compact('callProgramEvent'));
    	}

    }

    function indexEventsVidio(Request $request){

    	$date = new DateTime;
		$format_date = $date->format('Y-m-d');
		
		$callProgramEventVidio = ProgramEvents::select('judul_promosi_ID as judul', 'video_url', 'img_alt', 'slug', 'deskripsi_ID as deskripsi')->where('flag_publish', '1')->whereDATE('tanggal_post', '<=', $format_date)->whereNotNull('video_url')->orderBy('id', 'desc')->paginate(8);
		
    	if ($request->ajax()) {
    		$view = view('frontend.events.ajax-events-vidio-list',compact('callProgramEventVidio'))->render();
            return response()->json(['html'=>$view]);
        }

    	return view('frontend.events.index-events-vidio',compact('callProgramEventVidio'));
    }


}
