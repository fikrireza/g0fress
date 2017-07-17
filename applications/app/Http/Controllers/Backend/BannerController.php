<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Banner;
use App\Models\LogAkses;

use DB;
use Auth;
use Image;
use Validator;

class BannerController extends Controller
{

    public function index()
    {
        $getBanner = Banner::get();

        return view('backend.banner.index', compact('getBanner'));
    }

    public function tambah()
    {


      return view('backend.banner.tambah');
    }

    public function store(Request $request)
    {
        $message = [
          'img_url.required' => 'Wajib di isi',
          'img_url.image' => 'Format Gambar Tidak Sesuai',
          'img_url.max' => 'File Size Terlalu Besar',
          'img_url.dimensions' => 'Ukuran Maksimal 1366px X 494px',
          'img_alt.required' => 'Wajib di isi',
          'halaman.required' => 'Wajib di isi',
          'halaman.unique'  => 'Sudah ada Banner Pada Halaman Ini'
        ];

        $validator = Validator::make($request->all(), [
          'img_url' => 'required|image|mimes:jpeg,bmp,png|max:1000|dimensions:max_width=1366,max_height=494',
          'img_alt' => 'required',
          'halaman' => 'required|unique:amd_banner_head'
        ], $message);


        if($validator->fails())
        {
          return redirect()->route('banner.tambah')->withErrors($validator)->withInput();
        }

        $salt = str_random(4);

        $image = $request->file('img_url');
        $img_url = str_slug($request->img_alt,'-').'-'.$salt. '.' . $image->getClientOriginalExtension();
        Image::make($image)->fit(1366,494)->save('images/banner/'. $img_url);

        $save = new Banner;
        $save->img_url = $img_url;
        $save->img_alt = $request->img_alt;
        $save->halaman = $request->halaman;
        $save->actor = Auth::user()->id;
        $save->save();

        $log = new LogAkses;
        $log->actor = Auth::user()->id;
        $log->aksi = 'Menambahkan Banner Halaman '.$request->halaman;
        $log->save();

        return redirect()->route('banner.index')->with('berhasil', 'Berhasil Menambahkan Banner Halaman '.$request->halaman);
    }

    public function ubah($id)
    {
        $getBanner = Banner::find($id);

        if(!$getBanner){
          return view('backend.errors.404');
        }

        return view('backend.banner.ubah', compact('getBanner'));
    }


    public function edit(Request $request)
    {
        $message = [
          'img_url.image' => 'Format Gambar Tidak Sesuai',
          'img_url.max' => 'File Size Terlalu Besar',
          'img_url.dimensions' => 'Ukuran Maksimal 1366px X 494px',
          'img_alt.required' => 'Wajib di isi',
          'halaman.required' => 'Wajib di isi',
          'halaman.unique' => 'Halaman ini sudah ada banner',
        ];

        $validator = Validator::make($request->all(), [
          'halaman' => 'required|unique:amd_banner_head,halaman,'.$request->id,
          'img_url' => 'image|mimes:jpeg,bmp,png|max:2000|dimensions:max_width=1366,max_height=494',
          'img_alt' => 'required',
        ], $message);

        if($validator->fails())
        {
          return redirect()->route('banner.ubah', array('id' => $request->id))->withErrors($validator)->withInput();
        }


        DB::transaction(function() use($request){
		  $salt = str_random(4);
		  
          $image = $request->file('img_url');
          $image_kanan = $request->file('img_url_kanan');
          $image_kiri = $request->file('img_url_kiri');

          if($request->flag_publish == null){
            $flag_publish = 0;
          }else{
            $flag_publish = 1;
          }

          $update = Banner::find($request->id);
          $update->img_alt  = $request->img_alt;
          $update->halaman  = $request->halaman;
          $update->actor = Auth::user()->id;

          if (!$image) {
            $update->update();
          }else{
            $img_url = str_slug($request->img_alt,'-').'-'.$salt. '.' . $image->getClientOriginalExtension();
            Image::make($image)->fit(1366,494)->save('images/banner/'. $img_url);

            $update->img_url  = $img_url;
            $update->update();
          }

          $log = new LogAkses;
          $log->actor = Auth::user()->id;
          $log->aksi = 'Mengubah Banner Halaman '.$request->halaman;
          $log->save();

        });

        return redirect()->route('banner.index')->with('berhasil', 'Berhasil Mengubah Banner Halaman '.$request->halaman);
    }



}
