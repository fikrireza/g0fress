<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\SocialMedia;
use App\Models\LogAkses;

use Auth;
use Image;
use DB;
use Validator;

class SocialMediaController extends Controller
{

    public function index()
    {
        $getSocial = SocialMedia::get();

        return view('backend.social.index', compact('getSocial'));
    }

    public function tambah()
    {
      return view('backend.social.tambah');
    }

    public function store(Request $request)
    {
      $message = [
        'nama.required' => 'Wajib di isi',
        'nama.unique' => 'Social Media Sudah Ada',
        'img_url.required' => 'Wajib di isi',
        'img_url.image' => 'Format Gambar Tidak Sesuai',
        'img_url.max' => 'File Size Terlalu Besar',
        'img_url.dimensions' => 'Ukuran Maksimal 40px x 40px',
        'url_account.required' => 'Wajib di isi',
        'url_account.url' => 'URL Tidak Valid'
      ];

      $validator = Validator::make($request->all(), [
        'nama' => 'required|unique:amd_social_media',
        // 'img_url' => 'required|image|mimes:jpeg,bmp,png|size:2000|dimensions:max_width=1000,max_height=2000',
        'img_url' => 'required|image|mimes:jpeg,bmp,png|max:1000|dimensions:max_width=40,max_height=40',
        'url_account' => 'required|url'
      ], $message);


      if($validator->fails())
      {
        return redirect()->route('social.tambah')->withErrors($validator)->withInput();
      }


      $image = $request->file('img_url');
      $img_url = str_slug($request->nama,'-'). '.' . $image->getClientOriginalExtension();
      Image::make($image)->fit(39,39)->save('images/sosmed/'. $img_url);

      if($request->flag_publish == 'on'){
        $flag_publish = 1;
      }else{
        $flag_publish = 0;
      }

      $save = new SocialMedia;
      $save->nama = $request->nama;
      $save->img_url = $img_url;
      $save->url_account = $request->url_account;
      $save->flag_publish = $flag_publish;
      $save->actor = Auth::user()->id;
      $save->save();

      $log = new LogAkses;
      $log->actor = Auth::user()->id;
      $log->aksi = 'Menambahkan Social Media '.$request->url_account;
      $log->save();

      return redirect()->route('social.index')->with('berhasil', 'Berhasil Menambahkan Social Media '.$request->url_account);

    }


    public function ubah($id)
    {
        $getSocial = SocialMedia::find($id);

        if(!$getSocial){
          return view('backend.errors.404');
        }

        return view('backend.social.ubah', compact('getSocial'));
    }


    public function edit(Request $request)
    {
      $message = [
        'nama.required' => 'Wajib di isi',
        'nama.unique' => 'Social Media ini sudah ada',
        'img_url.image' => 'Format Gambar Tidak Sesuai',
        'img_url.max' => 'File Size Terlalu Besar',
        'img_url.dimensions' => 'Ukuran Maksimal 40px x 40px',
        'url_account.required' => 'Wajib di isi',
      ];

      $validator = Validator::make($request->all(), [
        'nama' => 'required|unique:amd_social_media,nama,'.$request->id,
        'img_url' => 'image|mimes:jpeg,bmp,png|max:1000|dimensions:max_width=40,max_height=40',
        'url_account' => 'required',
      ], $message);

      if($validator->fails())
      {
        return redirect()->route('social.ubah', array('id' => $request->id))->withErrors($validator)->withInput();
      }


      DB::transaction(function() use($request){
        $image = $request->file('img_url');

        if($request->flag_publish == null){
          $flag_publish = 0;
        }else{
          $flag_publish = 1;
        }

        $update = SocialMedia::find($request->id);
        $update->nama = $request->nama;
        $update->url_account  = $request->url_account;
        $update->flag_publish = $flag_publish;
        $update->actor = Auth::user()->id;

        if (!$image) {
          $update->update();
        }else{
          $img_url = str_slug($request->nama,'-'). '.' . $image->getClientOriginalExtension();
          Image::make($image)->fit(39,39)->save('images/sosmed/'. $img_url);

          $update->img_url  = $img_url;
          $update->update();
        }

        $log = new LogAkses;
        $log->actor = Auth::user()->id;
        $log->aksi = 'Mengubah Social Media '.$request->nama_produk;
        $log->save();

      });

      return redirect()->route('social.index')->with('berhasil', 'Berhasil Mengubah Social Media '.$request->nama);
    }

}
