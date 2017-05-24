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
        'nama_kategori.max' => 'Terlalu Panjang, Maks 25 Katakter',
        'deskripsi_EN.required' => 'Wajib di isi',
        'deskripsi_EN.min' => 'Terlalu Singkat',
        'deskripsi_ID.required' => 'Wajib di isi',
        'deskripsi_ID.min' => 'Terlalu Singkat',
        'img_url.required' => 'Wajib di isi',
        'img_url.image' => 'Format Gambar Tidak Sesuai',
        'img_url.max' => 'File Size Terlalu Besar',
        'img_url.dimensions' => 'Ukuran yg di terima 443px x 418px',
        'img_alt.required' => 'Wajib di isi',
        'tanggal_post.required' => 'Wajib di isi',
      ];

      $validator = Validator::make($request->all(), [
        'nama_kategori' => 'required|unique:amd_produk_kategori|max:25',
        'deskripsi_EN' => 'required|min:20',
        'deskripsi_ID' => 'required|min:20',
        'img_url' => 'required|image|mimes:jpeg,bmp,png|max:2000|dimensions:max_width=443,max_height=418',
        'img_alt' => 'required',
        'tanggal_post' => 'required'
      ], $message);

      if($validator->fails())
      {
        return redirect()->route('produkKategori.tambah')->withErrors($validator)->withInput();
      }


      $image = $request->file('img_url');
      $img_url = str_slug($request->img_alt,'-'). '.' . $image->getClientOriginalExtension();
      Image::make($image)->fit(443,418)->save('images/produk/'. $img_url);

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
      $save->actor = Auth::user()->id;
      $save->save();

      $log = new LogAkses;
      $log->actor = Auth::user()->id;
      $log->aksi = 'Menambahkan Produk Kategori Baru '.$request->nama_kategori;
      $log->save();

      return redirect()->route('produkKategori.index')->with('berhasil', 'Berhasil Menambahkan Produk Kategori '.$request->nama_kategori);
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
        'nama_kategori.max' => 'Terlalu Panjang, Maks 25 Karakter',
        'nama_kategori.unique' => 'Kategori ini sudah ada',
        'deskripsi_ID.required' => 'Wajib di isi',
        'deskripsi_ID.min' => 'Terlalu Singkat',
        'deskripsi_EN.required' => 'Wajib di isi',
        'deskripsi_EN.min' => 'Terlalu Singkat',
        'img_url.image' => 'Format Gambar Tidak Sesuai',
        'img_url.max' => 'File Size Terlalu Besar',
        'img_url.dimensions' => 'Ukuran yg di terima 443px x 418px',
        'img_alt.required' => 'Wajib di isi',
        'tanggal_post.required' => 'Wajib di isi',
      ];

      $validator = Validator::make($request->all(), [
        'nama_kategori' => 'required|max:25|unique:amd_produk_kategori,nama_kategori,'.$request->id,
        'deskripsi_ID' => 'required|min:20',
        'deskripsi_EN' => 'required|min:20',
        'img_url' => 'image|mimes:jpeg,bmp,png|max:2000|dimensions:max_width=443,max_height=418',
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
        $update->actor = Auth::user()->id;
        $update->update();
      }else{
        $img_url = str_slug($request->img_alt,'-'). '.' . $image->getClientOriginalExtension();
        Image::make($image)->fit(443,418)->save('images/produk/'. $img_url);

        $update = ProdukKategori::find($request->id);
        $update->nama_kategori = $request->nama_kategori;
        $update->deskripsi_EN = $request->deskripsi_EN;
        $update->deskripsi_ID = $request->deskripsi_ID;
        $update->img_url  = $img_url;
        $update->img_alt  = $request->img_alt;
        $update->tanggal_post = $request->tanggal_post;
        $update->flag_publish = $flag_publish;
        $update->slug = str_slug($request->nama_kategori,'-');
        $update->actor = Auth::user()->id;
        $update->update();
      }

      $log = new LogAkses;
      $log->actor = Auth::user()->id;
      $log->aksi = 'Mengubah Produk Kategori '.$request->nama_kategori;
      $log->save();

      return redirect()->route('produkKategori.index')->with('berhasil', 'Berhasil Mengubah Produk Kategori '.$request->nama_kategori);
    }

    public function publish($id)
    {
        $getProdukKategori = ProdukKategori::find($id);

        if(!$getProdukKategori){
          return view('backend.errors.404');
        }

        if ($getProdukKategori->flag_publish == 1) {
          $getProdukKategori->flag_publish = 0;
          $getProdukKategori->update();

          return redirect()->route('produkKategori.index')->with('berhasil', 'Berhasil Unpublish '.$getProdukKategori->nama_kategori);
        }else{
          $getProdukKategori->flag_publish = 1;
          $getProdukKategori->update();

          return redirect()->route('produkKategori.index')->with('berhasil', 'Berhasil Publish '.$getProdukKategori->nama_kategori);
        }
    }

}
