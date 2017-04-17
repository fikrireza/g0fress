<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Produk;
use App\Models\ProdukKategori;
use App\Models\User;

use DB;
use Auth;
use Validator;
use Image;

class ProdukController extends Controller
{
    public function index()
    {
      $getProduk = Produk::join('amd_produk_kategori', 'amd_produk_kategori.id', '=', 'amd_produk.kategori_id')
                              ->select('amd_produk.*', 'amd_produk_kategori.nama_kategori as nama_kategori')
                              ->get();

      return view('backend.produk.index', compact('getProduk'));
    }

    public function tambah()
    {
      $getProdukKategori = ProdukKategori::where('flag_publish', 1)->get();

      return view('backend.produk.tambah', compact('getProdukKategori'));
    }

    public function store(Request $request)
    {
      $message = [
        'kategori_id.required' => 'Wajib di isi',
        'nama_produk.required' => 'Wajib di isi',
        'deskripsi_en.required' => 'Wajib di isi',
        'deskripsi_id.required' => 'Wajib di isi',
        'img_url.required' => 'Wajib di isi',
        'img_alt.required' => 'Wajib di isi',
        'tanggal_post.required' => 'Wajib di isi',
      ];

      $validator = Validator::make($request->all(), [
        'kategori_id' => 'required',
        'nama_produk' => 'required',
        'deskripsi_en' => 'required',
        'deskripsi_id' => 'required',
        // 'img_url' => 'required|image|mimes:jpeg,bmp,png|size:2000|dimensions:max_width=1000,max_height=2000',
        'img_url' => 'image|mimes:jpeg,bmp,png',
        'img_alt' => 'required',
        'tanggal_post' => 'required'
      ], $message);

      if($validator->fails())
      {
        return redirect()->route('produk.tambah')->withErrors($validator)->withInput();
      }


      $image = $request->file('img_url');
      $img_url = str_slug($request->img_alt,'-'). '.' . $image->getClientOriginalExtension();
      Image::make($image)->fit(472,270)->save('images/produk/'. $img_url);

      if($request->flag_publish == 'on'){
        $flag_publish = 1;
      }else{
        $flag_publish = 0;
      }

      $save = new Produk;
      $save->kategori_id = $request->kategori_id;
      $save->nama_produk = $request->nama_produk;
      $save->deskripsi_en = $request->deskripsi_en;
      $save->deskripsi_id = $request->deskripsi_id;
      $save->img_url  = $img_url;
      $save->img_alt  = $request->img_alt;
      $save->tanggal_post = $request->tanggal_post;
      $save->flag_publish = $flag_publish;
      $save->slug = str_slug($request->nama_produk,'-');
      // $save->actor = Auth::user()->id;
      $save->actor = 1;
      $save->save();

      return redirect()->route('produk.index')->with('berhasil', 'Berhasil Menambahkan Produk Baru');
    }

    public function lihat($id)
    {
      $getProduk = Produk::find($id);

      if(!$getProduk){
        return view('backend.errors.404');
      }

      $getProdukKategori = ProdukKategori::select('nama_kategori')->where('id', $getProduk->kategori_id)->first();

      return view('backend.produk.lihat', compact('getProduk', 'getProdukKategori'));
    }

    public function ubah($id)
    {
      $getProduk = Produk::find($id);

      if(!$getProduk){
        return view('backend.errors.404');
      }

      $getProdukKategori = ProdukKategori::get();

      return view('backend.produk.ubah', compact('getProduk', 'getProdukKategori'));
    }

    public function edit(Request $request)
    {
      // dd($request);
      $message = [
        'kategori_id.required' => 'Wajib di isi',
        'nama_produk.required' => 'Wajib di isi',
        'deskripsi_en.required' => 'Wajib di isi',
        'deskripsi_id.required' => 'Wajib di isi',
        'img_url.required' => 'Wajib di isi',
        'img_alt.required' => 'Wajib di isi',
        'tanggal_post.required' => 'Wajib di isi',
      ];

      $validator = Validator::make($request->all(), [
        'kategori_id' => 'required',
        'nama_produk' => 'required',
        'deskripsi_en' => 'required',
        'deskripsi_id' => 'required',
        'img_url' => 'image|mimes:jpeg,bmp,png',
        'img_alt' => 'required',
        'tanggal_post' => 'required'
      ], $message);

      if($validator->fails())
      {
        return redirect()->route('produk.tambah')->withErrors($validator)->withInput();
      }


      $image = $request->file('img_url');

      if($request->flag_publish == null){
        $flag_publish = 0;
      }else{
        $flag_publish = 1;
      }

      if (!$image) {
        $update = Produk::find($request->id);
        $update->kategori_id = $request->kategori_id;
        $update->nama_produk = $request->nama_produk;
        $update->deskripsi_en = $request->deskripsi_en;
        $update->deskripsi_id = $request->deskripsi_id;
        $update->img_alt  = $request->img_alt;
        $update->tanggal_post = $request->tanggal_post;
        $update->flag_publish = $flag_publish;
        $update->slug = str_slug($request->nama_produk,'-');
        // $update->actor = Auth::user()->id;
        $update->actor = 1;
        $update->update();
      }else{
        $img_url = str_slug($request->img_alt,'-'). '.' . $image->getClientOriginalExtension();
        Image::make($image)->fit(472,270)->save('images/produk/'. $img_url);

        $update = Produk::find($request->id);
        $update->kategori_id = $request->kategori_id;
        $update->nama_produk = $request->nama_produk;
        $update->deskripsi_en = $request->deskripsi_en;
        $update->deskripsi_id = $request->deskripsi_id;
        $update->img_url  = $img_url;
        $update->img_alt  = $request->img_alt;
        $update->tanggal_post = $request->tanggal_post;
        $update->flag_publish = $flag_publish;
        $update->slug = str_slug($request->nama_produk,'-');
        // $update->actor = Auth::user()->id;
        $update->actor = 1;
        $update->update();

      }

      return redirect()->route('produk.index')->with('berhasil', 'Berhasil Menambahkan Produk Baru');
    }
}