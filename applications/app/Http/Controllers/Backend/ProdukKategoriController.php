<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Produk;
use App\Models\ProdukKategori;
use App\Models\User;
use App\Models\LogAkses;

use DB;
use Auth;
use Validator;
use Image;

class ProdukKategoriController extends Controller
{

    public function index()
    {
      $getProdukKategori = ProdukKategori::get();

      return view('backend.produkKategori.index', compact('getProdukKategori'));
    }

    public function tambah()
    {

      return view('backend.produkKategori.tambah');
    }

    public function store(Request $request)
    {
      $message = [
        'nama_kategori.required' => 'Wajib di isi',
        'nama_kategori.unique' => 'Ketogori ini sudah ada',
        'deskripsi_EN.required' => 'Wajib di isi',
        'deskripsi_ID.required' => 'Wajib di isi',
        'img_url.required' => 'Wajib di isi',
        'img_alt.required' => 'Wajib di isi',
        'tanggal_post.required' => 'Wajib di isi',
      ];

      $validator = Validator::make($request->all(), [
        'nama_kategori' => 'required|unique:amd_produk_kategori',
        'deskripsi_EN' => 'required',
        'deskripsi_ID' => 'required',
        // 'img_url' => 'required|image|mimes:jpeg,bmp,png|size:2000|dimensions:max_width=1000,max_height=2000',
        'img_url' => 'image|mimes:jpeg,bmp,png',
        'img_alt' => 'required',
        'tanggal_post' => 'required'
      ], $message);

      if($validator->fails())
      {
        return redirect()->route('produkKategori.tambah')->withErrors($validator)->withInput();
      }


      $image = $request->file('img_url');
      $img_url = str_slug($request->img_alt,'-'). '.' . $image->getClientOriginalExtension();
      Image::make($image)->fit(472,270)->save('images/produk/'. $img_url);

      if($request->flag_publish == 'on'){
        $flag_publish = 1;
      }else{
        $flag_publish = 0;
      }

      $save = new ProdukKategori;
      $save->nama_kategori = $request->nama_kategori;
      $save->deskripsi_EN = $request->deskripsi_EN;
      $save->deskripsi_ID = $request->deskripsi_ID;
      $save->img_url  = $img_url;
      $save->img_alt  = $request->img_alt;
      $save->tanggal_post = $request->tanggal_post;
      $save->flag_publish = $flag_publish;
      $save->slug = str_slug($request->nama_kategori,'-');
      // $save->actor = Auth::user()->id;
      $save->actor = 1;
      $save->save();

      $log = new LogAkses;
      $log->actor = 1;
      // $log->actor = Auth::user()->id;
      $log->aksi = 'Menambahkan Produk Kategori Baru '.$request->nama_kategori;
      $log->save();

      return redirect()->route('produkKategori.index')->with('berhasil', 'Berhasil Menambahkan Produk Kategori Baru');
    }

    public function lihat($id)
    {
      $getProdukKategori = ProdukKategori::find($id);

      if(!$getProdukKategori){
        return view('backend.errors.404');
      }

      return view('backend.produkKategori.lihat', compact('getProdukKategori'));
    }

    public function ubah($id)
    {
      $getProdukKategori = ProdukKategori::find($id);

      if(!$getProdukKategori){
        return view('backend.errors.404');
      }

      return view('backend.produkKategori.ubah', compact('getProdukKategori'));
    }

    public function edit(Request $request)
    {
      $message = [
        'nama_kategori.required' => 'Wajib di isi',
        'nama_kategori.unique' => 'Kategori ini sudah ada',
        'deskripsi_ID.required' => 'Wajib di isi',
        'deskripsi_EN.required' => 'Wajib di isi',
        'img_url.required' => 'Wajib di isi',
        'img_alt.required' => 'Wajib di isi',
        'tanggal_post.required' => 'Wajib di isi',
      ];

      $validator = Validator::make($request->all(), [
        'nama_kategori' => 'required|unique:amd_produk_kategori,nama_kategori,'.$request->id,
        'deskripsi_ID' => 'required',
        'deskripsi_EN' => 'required',
        'img_url' => 'image|mimes:jpeg,bmp,png',
        'img_alt' => 'required',
        'tanggal_post' => 'required'
      ], $message);

      if($validator->fails())
      {
        return redirect()->route('produkKategori.ubah', array('id' => $request->id))->withErrors($validator)->withInput();
      }


      $image = $request->file('img_url');

      if($request->flag_publish == null){
        $flag_publish = 0;
      }else{
        $flag_publish = 1;
      }

      if (!$image) {
        $update = ProdukKategori::find($request->id);
        $update->nama_kategori = $request->nama_kategori;
        $update->deskripsi_EN = $request->deskripsi_EN;
        $update->deskripsi_ID = $request->deskripsi_ID;
        $update->img_alt  = $request->img_alt;
        $update->tanggal_post = $request->tanggal_post;
        $update->flag_publish = $flag_publish;
        $update->slug = str_slug($request->nama_kategori,'-');
        // $update->actor = Auth::user()->id;
        $update->actor = 1;
        $update->update();
      }else{
        $img_url = str_slug($request->img_alt,'-'). '.' . $image->getClientOriginalExtension();
        Image::make($image)->fit(472,270)->save('images/produk/'. $img_url);

        $update = ProdukKategori::find($request->id);
        $update->nama_kategori = $request->nama_kategori;
        $update->deskripsi_EN = $request->deskripsi_EN;
        $update->deskripsi_ID = $request->deskripsi_ID;
        $update->img_url  = $img_url;
        $update->img_alt  = $request->img_alt;
        $update->tanggal_post = $request->tanggal_post;
        $update->flag_publish = $flag_publish;
        $update->slug = str_slug($request->nama_kategori,'-');
        // $update->actor = Auth::user()->id;
        $update->actor = 1;
        $update->update();
      }

      $log = new LogAkses;
      $log->actor = 1;
      // $log->actor = Auth::user()->id;
      $log->aksi = 'Mengubah Produk Kategori '.$request->nama_kategori;
      $log->save();

      return redirect()->route('produkKategori.index')->with('berhasil', 'Berhasil Menambahkan Produk Kategori Baru');
    }
}
