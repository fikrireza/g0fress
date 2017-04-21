<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\SliderHome;
use App\Models\User;

use DB;
use Validator;
use Image;

class SliderHomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {

        $getSlider = SliderHome::get();

        return view('backend.slider.index', compact('getSlider'));

    }

    public function tambah()
    {
        return view('backend.slider.tambah');
    }

    public function store(Request $request)
    {
        $message = [
          'img_url.required' => 'Wajib di isi',
          'img_alt.required' => 'Wajib di isi',
          'tanggal_post.required' => 'Wajib di isi',
        ];

        $validator = Validator::make($request->all(), [
          // 'img_url' => 'required|image|mimes:jpeg,bmp,png|size:2000|dimensions:max_width=1000,max_height=2000',
          'img_url' => 'required|image|mimes:jpeg,bmp,png',
          'img_alt' => 'required',
          'tanggal_post' => 'required'
        ], $message);

        if($validator->fails())
        {
          return redirect()->route('slider.tambah')->withErrors($validator)->withInput();
        }
        
        dd($request);
    }

}
