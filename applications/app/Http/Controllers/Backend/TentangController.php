<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Tentang;
use App\Models\TentangGaleri;
use App\Models\LogAkses;

use DB;
use Auth;
use Validator;
use Image;
use File;


class TentangController extends Controller
{

    public function index()
    {
        $getTentang = Tentang::get();

        return view('backend.tentang.index', compact('getTentang'));
    }

    public function tambah()
    {
        return view('backend.tentang.tambah');
    }

    public function store(Request $request)
    {
        $message = [
          'deskripsi_EN.required' => 'Wajib di isi',
          'deskripsi_EN.min' => 'Terlalu Singkat',
          'deskripsi_ID.required' => 'Wajib di isi',
          'deskripsi_ID.min' => 'Terlalu Singkat',
          'visi_deskripsi_EN.required' => 'Wajib di isi',
          'visi_deskripsi_EN.min' => 'Terlalu Singkat',
          'visi_deskripsi_ID.required' => 'Wajib di isi',
          'visi_deskripsi_ID.min' => 'Terlalu Singkat',
          'misi_deskripsi_EN.required' => 'Wajib di isi',
          'misi_deskripsi_EN.min' => 'Terlalu Singkat',
          'misi_deskripsi_ID.required' => 'Wajib di isi',
          'misi_deskripsi_ID.min' => 'Terlalu Singkat',
          'img_url.required' => 'Wajib di isi',
          'img_url.image' => 'Format Gambar Tidak Sesuai',
          'img_url.max' => 'File Size Terlalu Besar',
          'img_url.dimensions' => 'Ukuran yg di terima 1920px x 781px',
          'img_alt.required' => 'Wajib di isi',
        ];

        $validator = Validator::make($request->all(), [
          'deskripsi_EN' => 'required|min:20',
          'deskripsi_ID' => 'required|min:20',
          'visi_deskripsi_EN' => 'required|min:20',
          'visi_deskripsi_ID' => 'required|min:20',
          'misi_deskripsi_EN' => 'required|min:20',
          'misi_deskripsi_ID' => 'required|min:20',
          'img_url' => 'required|image|mimes:jpeg,bmp,png|max:2000|dimensions:max_width=1920,max_height=781',
          'img_alt' => 'required',
        ], $message);


        if($validator->fails())
        {
            return redirect()->route('tentang.tambah')->withErrors($validator)->withInput();
        }

        DB::transaction(function() use($request){
          $image = $request->file('img_url');
          $img_url = str_slug($request->img_alt,'-'). '.' . $image->getClientOriginalExtension();
          Image::make($image)->fit(1920,781)->save('images/tentang/'. $img_url);

          $save = new Tentang;
          $save->deskripsi_EN = $request->deskripsi_EN;
          $save->deskripsi_ID = $request->deskripsi_ID;
          $save->visi_deskripsi_EN = $request->visi_deskripsi_EN;
          $save->visi_deskripsi_ID = $request->visi_deskripsi_ID;
          $save->misi_deskripsi_EN = $request->misi_deskripsi_EN;
          $save->misi_deskripsi_ID = $request->misi_deskripsi_ID;
          $save->img_url  = $img_url;
          $save->img_alt  = $request->img_alt;
          $save->slug = 'tentang';
          $save->actor = Auth::user()->id;
          $save->save();

          $log = new LogAkses;
          $log->actor = Auth::user()->id;
          $log->aksi = 'Menambahkan Tentang ';
          $log->save();
        });

        return redirect()->route('tentang.index')->with('berhasil', 'Berhasil Menambahkan tentang');

    }

    public function ubah($id)
    {
        $getTentang = Tentang::find($id);

        if(!$getTentang){
          abort('backend.errors.404');
        }

        return view('backend.tentang.ubah', compact('getTentang'));
    }


    public function edit(Request $request)
    {
        $message = [
          'deskripsi_EN.required' => 'Wajib di isi',
          'deskripsi_EN.min' => 'Terlalu Singkat',
          'deskripsi_ID.required' => 'Wajib di isi',
          'deskripsi_ID.min' => 'Terlalu Singkat',
          'visi_deskripsi_EN.required' => 'Wajib di isi',
          'visi_deskripsi_EN.min' => 'Terlalu Singkat',
          'visi_deskripsi_ID.required' => 'Wajib di isi',
          'visi_deskripsi_ID.min' => 'Terlalu Singkat',
          'misi_deskripsi_EN.required' => 'Wajib di isi',
          'misi_deskripsi_EN.min' => 'Terlalu Singkat',
          'misi_deskripsi_ID.required' => 'Wajib di isi',
          'misi_deskripsi_ID.min' => 'Terlalu Singkat',
          'img_url.image' => 'Format Gambar Tidak Sesuai',
          'img_url.max' => 'File Size Terlalu Besar',
          'img_url.dimensions' => 'Ukuran yg di terima 1920px x 781px',
          'img_alt.required' => 'Wajib di isi',
        ];

        $validator = Validator::make($request->all(), [
          'deskripsi_EN' => 'required|min:20',
          'deskripsi_ID' => 'required|min:20',
          'visi_deskripsi_EN' => 'required|min:20',
          'visi_deskripsi_ID' => 'required|min:20',
          'misi_deskripsi_EN' => 'required|min:20',
          'misi_deskripsi_ID' => 'required|min:20',
          'img_url' => 'image|mimes:jpeg,bmp,png|max:2000|dimensions:max_width=1920,max_height=781',
          'img_alt' => 'required',
        ], $message);


        if($validator->fails())
        {
            return redirect()->route('tentang.ubah')->withErrors($validator)->withInput();
        }

        DB::transaction(function() use($request){
          $image = $request->file('img_url');

          $update = Tentang::find($request->id);
          $update->deskripsi_EN = $request->deskripsi_EN;
          $update->deskripsi_ID = $request->deskripsi_ID;
          $update->visi_deskripsi_EN = $request->visi_deskripsi_EN;
          $update->visi_deskripsi_ID = $request->visi_deskripsi_ID;
          $update->misi_deskripsi_EN = $request->misi_deskripsi_EN;
          $update->misi_deskripsi_ID = $request->misi_deskripsi_ID;
          $update->img_alt  = $request->img_alt;
          $update->slug = 'tentang';
          $update->actor = Auth::user()->id;

          if(!$image){
            $update->update();
          }else{
            $img_url = str_slug($request->img_alt,'-'). '.' . $image->getClientOriginalExtension();
            Image::make($image)->fit(1920,781)->save('images/tentang/'. $img_url);

            $update->img_url  = $img_url;
            $update->update();
          }

          $log = new LogAkses;
          $log->actor = Auth::user()->id;
          $log->aksi = 'Mengubah Tentang ';
          $log->save();
        });

        return redirect()->route('tentang.index')->with('berhasil', 'Berhasil Mengubah tentang');

    }


    public function indexGaleri()
    {
        $getTentangGaleri = TentangGaleri::get();

        return view('backend.tentangGaleri.index', compact('getTentangGaleri'));
    }

    public function tambahGaleri()
    {

        return view('backend.tentangGaleri.tambah');
    }

    public function uploadGaleri(Request $request)
    {
        $message = [
          'cer_ach.required' => 'Pilih Satu',
          'img_url.required' => 'Wajib di isi',
          'img_url.image' => 'Format Gambar Tidak Sesuai',
          'img_url.max' => 'File Size Terlalu Besar',
          'img_url.dimensions' => 'Ukuran yg di terima 1920px x 781px',
          'img_alt.required' => 'Wajib di isi',
        ];

        $validator = Validator::make($request->all(), [
          'cer_ach' => 'required',
          'img_url' => 'required|image|mimes:jpeg,bmp,png|max:2000|dimensions:max_width=350,max_height=300',
          'img_alt' => 'required',
        ], $message);


        if($validator->fails())
        {
            return redirect()->route('tentangGaleri.tambah')->withErrors($validator)->withInput();
        }


        DB::transaction(function() use($request){
          $image = $request->file('img_url');
          $img_url = str_slug($request->img_alt,'-'). '.' . $image->getClientOriginalExtension();
          Image::make($image)->fit(350,300)->save('images/tentang/'. $img_url);

          if($request->flag_publish == 'on'){
            $flag_publish = 1;
          }else{
            $flag_publish = 0;
          }

          $save = new tentangGaleri;
          $save->cer_ach  = $request->cer_ach;
          $save->img_url  = $img_url;
          $save->img_alt  = $request->img_alt;
          $save->flag_publish = $flag_publish;
          $save->actor = Auth::user()->id;
          $save->save();

          $log = new LogAkses;
          $log->actor = Auth::user()->id;
          $log->aksi = 'Menambahkan Tentang Certification '.$request->img_alt;
          $log->save();
        });

        return redirect()->route('tentangGaleri.index')->with('berhasil', 'Berhasil Menambahkan tentang '.$request->img_alt);
    }

    public function deleteGaleri($id)
    {
        DB::transaction(function() use($id){
          $del = TentangGaleri::find($id);
          File::delete('images/tentang/' .$del->img_url);
          $del->delete();

          $log = new LogAkses;
          $log->actor = Auth::user()->id;
          $log->aksi = 'Menghapus Certification & Achievements '.$del->img_url;
          $log->save();
        });

        return redirect()->route('tentangGaleri.index')->with('berhasil', 'Berhasil menghapus');
    }
}
