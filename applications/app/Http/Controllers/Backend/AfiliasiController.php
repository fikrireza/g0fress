<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Afiliasi;
use App\Models\LogAkses;

use Auth;
use DB;
use Image;
use Validator;
use File;

class AfiliasiController extends Controller
{

    public function index()
    {
        $getAfiliasi = Afiliasi::get();

        return view('backend.afiliasi.index', compact('getAfiliasi'));
    }

    public function tambah()
    {
        return view('backend.afiliasi.tambah');
    }

    public function store(Request $request)
    {
      $message = [
        'nama_afiliasi.required' => 'Wajib di isi',
        'nama_afiliasi.unique' => 'Social Media Sudah Ada',
        'img_url.required' => 'Wajib di isi',
        'img_url.image' => 'Format Gambar Tidak Sesuai',
        'img_url.max' => 'File Size Terlalu Besar',
        'img_url.dimensions' => 'Ukuran Maksimal 40px x 40px',
        'img_alt.required' => 'Wajib di isi',
        'link_url.required' => 'Wajib di isi',
        'link_url.url' => 'URL Tidak Valid'
      ];

      $validator = Validator::make($request->all(), [
        'nama_afiliasi' => 'required|unique:amd_afiliasi',
        'img_url' => 'required|image|mimes:jpeg,bmp,png|max:1000|dimensions:max_width=40,max_height=40',
        'img_alt' => 'required',
        'link_url' => 'required|url'
      ], $message);


      if($validator->fails())
      {
        return redirect()->route('afiliasi.tambah')->withErrors($validator)->withInput();
      }


      $image = $request->file('img_url');
      $img_url = str_slug($request->nama_afiliasi,'-'). '.' . $image->getClientOriginalExtension();
      Image::make($image)->fit(39,39)->save('images/afiliasi/'. $img_url);

      if($request->flag_publish == 'on'){
        $flag_publish = 1;
      }else{
        $flag_publish = 0;
      }

      $save = new Afiliasi;
      $save->nama_afiliasi = $request->nama_afiliasi;
      $save->img_url = $img_url;
      $save->img_alt = $request->img_alt;
      $save->link_url = $request->link_url;
      $save->flag_publish = $flag_publish;
      $save->actor = Auth::user()->id;
      $save->save();

      $log = new LogAkses;
      $log->actor = Auth::user()->id;
      $log->aksi = 'Menambahkan Afiliasi '.$request->nama_afiliasi;
      $log->save();

      return redirect()->route('afiliasi.index')->with('berhasil', 'Berhasil Menambahkan Afiliasi '.$request->nama_afiliasi);

    }

    public function ubah($id)
    {
        $getAfiliasi = Afiliasi::find($id);

        if(!$getAfiliasi){
          return view('backend.errors.404');
        }

        return view('backend.afiliasi.ubah', compact('getAfiliasi'));
    }

    public function edit(Request $request)
    {
        $message = [
          'nama_afiliasi.required' => 'Wajib di isi',
          'nama_afiliasi.unique' => 'Social Media ini sudah ada',
          'img_url.image' => 'Format Gambar Tidak Sesuai',
          'img_url.max' => 'File Size Terlalu Besar',
          'img_url.dimensions' => 'Ukuran Maksimal 40px x 40px',
          'img_alt.required' => 'Wajib di isi',
          'link_url.required' => 'Wajib di isi',
        ];

        $validator = Validator::make($request->all(), [
          'nama_afiliasi' => 'required|unique:amd_afiliasi,nama_afiliasi,'.$request->id,
          'img_url' => 'image|mimes:jpeg,bmp,png|max:1000|dimensions:max_width=40,max_height=40',
          'img_alt' => 'required',
          'link_url' => 'required',
        ], $message);

        if($validator->fails())
        {
          return redirect()->route('afiliasi.ubah', array('id' => $request->id))->withErrors($validator)->withInput();
        }


        DB::transaction(function() use($request){
          $image = $request->file('img_url');

          if($request->flag_publish == null){
            $flag_publish = 0;
          }else{
            $flag_publish = 1;
          }

          $update = Afiliasi::find($request->id);
          $update->nama_afiliasi = $request->nama_afiliasi;
          $update->img_alt  = $request->img_alt;
          $update->link_url  = $request->link_url;
          $update->flag_publish = $flag_publish;
          $update->actor = Auth::user()->id;

          if (!$image) {
            $update->update();
          }else{
            $img_url = str_slug($request->nama_afiliasi,'-'). '.' . $image->getClientOriginalExtension();
            Image::make($image)->fit(39,39)->save('images/sosmed/'. $img_url);

            $update->img_url  = $img_url;
            $update->update();
          }

          $log = new LogAkses;
          $log->actor = Auth::user()->id;
          $log->aksi = 'Mengubah Afiliasi '.$request->nama_afiliasi;
          $log->save();

        });

        return redirect()->route('afiliasi.index')->with('berhasil', 'Berhasil Mengubah Afiliasi '.$request->nama_afiliasi);

    }

    public function publish($id)
    {
        $getAfiliasi = Afiliasi::find($id);

        if(!$getAfiliasi){
          return view('backend.errors.404');
        }

        if ($getAfiliasi->flag_publish == 1) {
          $getAfiliasi->flag_publish = 0;
          $getAfiliasi->update();

          return redirect()->route('afiliasi.index')->with('berhasil', 'Berhasil Unpublish Afiliasi '.$getAfiliasi->nama_afiliasi);
        }else{
          $getAfiliasi->flag_publish = 1;
          $getAfiliasi->update();

          return redirect()->route('afiliasi.index')->with('berhasil', 'Berhasil Publish Afiliasi '.$getAfiliasi->nama_afiliasi);
        }
    }

    public function delete($id)
    {
        $getAfiliasi = Afiliasi::find($id);

        if(!$getAfiliasi){
          return view('backend.errors.404');
        }

        DB::transaction(function() use($getAfiliasi){
          File::delete('images/afiliasi/' .$getAfiliasi->img_url);
          $getAfiliasi->delete();

          $log = new LogAkses;
          $log->actor = Auth::user()->id;
          $log->aksi = 'Menghapus Afiliasi '.$getAfiliasi->img_url;
          $log->save();
        });

        return redirect()->route('afiliasi.index')->with('berhasil', 'Berhasil menghapus Afiliasi');
    }
}
