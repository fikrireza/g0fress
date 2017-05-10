<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\FacebookApp;
use App\Models\LogAkses;

use Auth;
use Validator;
use DB;

class FacebookController extends Controller
{

    public function index()
    {
        $getFacebook = FacebookApp::first();

        return view('backend.facebook.index', compact('getFacebook'));
    }

    public function ubah($id)
    {
      $getFacebook = FacebookApp::find($id);

      if(!$getFacebook){
        return view('backend.errors.404');
      }

      return view('backend.facebook.ubah', compact('getFacebook'));
    }

    public function edit(Request $request)
    {
      $message = [
        'page_id.required' => 'Wajib di isi',
        'app_id.required' => 'Wajib di isi',
        'app_secret.required' => 'Wajib di isi',
        'default_access_token.required' => 'Wajib di isi',
      ];

      $validator = Validator::make($request->all(), [
        'page_id' => 'required',
        'app_id' => 'required',
        'app_secret' => 'required',
        'default_access_token' => 'required',
      ], $message);

      if($validator->fails())
      {
        return redirect()->route('facebook.ubah', array('id' => $request->id))->withErrors($validator)->withInput();
      }

      DB::transaction(function() use($request){
        $update = FacebookApp::find($request->id);
        $update->page_id = $request->page_id;
        $update->app_id  = $request->app_id;
        $update->app_secret = $request->app_secret;
        $update->default_access_token = $request->default_access_token;
        $update->update();

        $log = new LogAkses;
        $log->actor = Auth::user()->id;
        $log->aksi = 'Mengubah Facebook App Analytics';
        $log->save();

      });

      return redirect()->route('facebook.index')->with('berhasil', 'Berhasil Mengubah Facebook App Analytics');

    }
}
