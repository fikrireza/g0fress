<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\SliderHome;
use App\Models\User;
use App\Models\LogAkses;

use Auth;
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

        $getSlider = SliderHome::orderBy('posisi', 'asc')->orderBy('updated_at', 'asc')->get();

        return view('backend.slider.index', compact('getSlider'));

    }

    public function tambah()
    {
        return view('backend.slider.tambah');
    }

    public function store(Request $request)
    {
        $message = [
          'img_url.image' => 'Format tidak sesuai',
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

        // dd($request);
        $image = $request->file('img_url');

        if($request->flag_publish == null){
          $flag_publish = 0;
        }else{
          $flag_publish = 1;
        }

        if (!$image) {
          $save = new SliderHome;
          $save->img_alt  = $request->img_alt;
          $save->posisi = $request->posisi;
          $save->tanggal_post = $request->tanggal_post;
          $save->flag_publish = $flag_publish;
          $save->actor = Auth::user()->id;
          $save->save();
        }else{
          $img_url = str_slug($request->img_alt,'-'). '.' . $image->getClientOriginalExtension();
          Image::make($image)->fit(472,270)->save('images/slider/'. $img_url);

          $save = new SliderHome;
          $save->img_url  = 'images/slider/'.$img_url;
          $save->img_alt  = $request->img_alt;
          $save->posisi = $request->posisi;
          $save->tanggal_post = $request->tanggal_post;
          $save->flag_publish = $flag_publish;
          $save->actor = Auth::user()->id;
          $save->save();
        }

        $log = new LogAkses;
        $log->actor = Auth::user()->id;
        $log->aksi = 'Menambah Slider Home Baru';
        $log->save();

        return redirect()->route('slider.index')->with('berhasil', 'Berhasil Menambahkan Slider Baru');
    }

    public function ubah($id)
    {
        $getSlider = SliderHome::find($id);

        return view('backend.slider.ubah', compact('getSlider'));
    }

    public function edit(Request $request)
    {
      $message = [
        'img_url.image' => 'Wajib di isi',
        'img_alt.required' => 'Wajib di isi',
        'tanggal_post.required' => 'Wajib di isi',
      ];

      $validator = Validator::make($request->all(), [
        // 'img_url' => 'required|image|mimes:jpeg,bmp,png|size:2000|dimensions:max_width=1000,max_height=2000',
        'img_url' => 'image|mimes:jpeg,bmp,png',
        'img_alt' => 'required',
        'tanggal_post' => 'required'
      ], $message);

      if($validator->fails())
      {
        return redirect()->route('slider.ubah', ['id' => $request->id])->withErrors($validator)->withInput();
      }

      $image = $request->file('img_url');

      if($request->flag_publish == null){
        $flag_publish = 0;
      }else{
        $flag_publish = 1;
      }

      if (!$image) {
        $update = SliderHome::find($request->id);
        $update->img_alt  = $request->img_alt;
        $update->posisi = $request->posisi;
        $update->tanggal_post = $request->tanggal_post;
        $update->flag_publish = $flag_publish;
        $update->actor = Auth::user()->id;
        $update->update();
      }else{
        $img_url = str_slug($request->img_alt,'-'). '.' . $image->getClientOriginalExtension();
        Image::make($image)->fit(472,270)->save('images/slider/'. $img_url);

        $update = SliderHome::find($request->id);
        $update->img_url  = 'images/slider/'.$img_url;
        $update->img_alt  = $request->img_alt;
        $update->posisi = $request->posisi;
        $update->tanggal_post = $request->tanggal_post;
        $update->flag_publish = $flag_publish;
        $update->actor = Auth::user()->id;
        $update->update();
      }

      $log = new LogAkses;
      $log->actor = Auth::user()->id;
      $log->aksi = 'Mengubah Slider Home';
      $log->save();

      return redirect()->route('slider.index')->with('berhasil', 'Berhasil Mengubah Slider');
    }

}
