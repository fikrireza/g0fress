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
use File;

class ProdukController extends Controller
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
      $getProduk = Produk::join('amd_produk_kategori', 'amd_produk_kategori.id', '=', 'amd_produk.kategori_id')
                              ->select('amd_produk.*', 'amd_produk_kategori.nama_kategori as nama_kategori')
                              ->orderBy('amd_produk.flag_publish', 'desc')
                              ->get();

      return view('backend.produk.index', compact('getProduk'));
    }

    public function tambah()
    {
      $getProdukKategori = ProdukKategori::select('id', 'nama_kategori')->where('flag_publish', 1)->get();

      return view('backend.produk.tambah', compact('getProdukKategori'));
    }

    public function store(Request $request)
    {
      $message = [
        'kategori_id.required' => 'Wajib di isi',
        'nama_produk.required' => 'Wajib di isi',
        'nama_produk.max' => 'Terlalu Panjang, Maks 25 Karakter',
        'nama_produk.unique' => 'Produk ini sudah ada',
        'deskripsi_EN.required' => 'Wajib di isi',
        'deskripsi_EN.min' => 'Terlalu Singkat',
        'deskripsi_ID.required' => 'Wajib di isi',
        'deskripsi_ID.min' => 'Terlalu Singkat',
        'img_url.required' => 'Wajib di isi',
        'img_url.dimensions' => 'Ukuran yg di terima 443px x 418px',
        'img_url.image' => 'Format Gambar Tidak Sesuai',
        'img_url.max' => 'File Size Terlalu Besar',
        'img_alt.required' => 'Wajib di isi',
        'img_url_kanan.required' => 'Wajib di isi',
        'img_url_kanan.image' => 'Format Gambar Tidak Sesuai',
        'img_url_kanan.max' => 'File Size Terlalu Besar',
        'img_url_kanan.dimensions' => 'Ukuran yg di terima 291px x 308px',
        'img_url_kiri.required' => 'Wajib di isi',
        'img_url_kiri.image' => 'Format Gambar Tidak Sesuai',
        'img_url_kiri.max' => 'File Size Terlalu Besar',
        'img_alt_kiri.dimensions' => 'Ukuran yg di terima 247px x 178px',
        'tanggal_post.required' => 'Wajib di isi',
      ];

      $validator = Validator::make($request->all(), [
        'kategori_id' => 'required',
        'nama_produk' => 'required|unique:amd_produk|max:25',
        'deskripsi_EN' => 'required|min:20',
        'deskripsi_ID' => 'required|min:20',
        'img_url' => 'required|image|mimes:jpeg,bmp,png|max:2000|dimensions:max_width=443,max_height=418',
        'img_url_kanan' => 'required|image|mimes:jpeg,bmp,png|max:2000|dimensions:max_width=291,max_height=308',
        'img_url_kiri' => 'required|image|mimes:jpeg,bmp,png|max:2000|dimensions:max_width=247,max_height=178',
        'img_alt' => 'required',
        'img_alt_kanan' => 'required',
        'img_alt_kiri' => 'required',
        'tanggal_post' => 'required'
      ], $message);


      if($validator->fails())
      {
        return redirect()->route('produk.tambah')->withErrors($validator)->withInput();
      }


      DB::transaction(function () use($request) {
        $salt = str_random(4);
        
        $image = $request->file('img_url');
        $img_url = str_slug($request->img_alt,'-').'-'.$salt. '.' . $image->getClientOriginalExtension();
        Image::make($image)->fit(443,418)->save('images/produk/'. $img_url);

        $image_kanan = $request->file('img_url_kanan');
        $img_url_kanan = str_slug($request->img_alt_kanan,'-').'-'.$salt. '.' . $image_kanan->getClientOriginalExtension();
        Image::make($image_kanan)->fit(291,308)->save('images/produk/'. $img_url_kanan);

        $image_kiri = $request->file('img_url_kiri');
        $img_url_kiri = str_slug($request->img_alt_kiri,'-').'-'.$salt. '.' . $image_kiri->getClientOriginalExtension();
        Image::make($image_kiri)->fit(247,178)->save('images/produk/'. $img_url_kiri);

        if($request->flag_publish == 'on'){
          $flag_publish = 1;
        }else{
          $flag_publish = 0;
        }


        $save = new Produk;
        $save->kategori_id = $request->kategori_id;
        $save->nama_produk = $request->nama_produk;
        $save->deskripsi_EN = $request->deskripsi_EN;
        $save->deskripsi_ID = $request->deskripsi_ID;
        $save->ingredient = $request->ingredient;
        $save->nutrition_fact = $request->nutrition_fact;
        $save->img_url  = $img_url;
        $save->img_alt  = $request->img_alt;
        $save->img_url_kanan  = $img_url_kanan;
        $save->img_alt_kanan  = $request->img_alt_kanan;
        $save->img_url_kiri  = $img_url_kiri;
        $save->img_alt_kiri  = $request->img_alt_kiri;
        $save->tanggal_post = $request->tanggal_post;
        $save->flag_publish = $flag_publish;
        $save->slug = str_slug($request->nama_produk,'-');
        $save->actor = Auth::user()->id;
        $save->save();

        $log = new LogAkses;
        $log->actor = Auth::user()->id;
        $log->aksi = 'Menambahkan Produk Baru '.$request->nama_produk;
        $log->save();
      });


      return redirect()->route('produk.index')->with('berhasil', 'Berhasil Menambahkan Produk '.$request->nama_produk);
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
      $message = [
        'kategori_id.required' => 'Wajib di isi',
        'nama_produk.required' => 'Wajib di isi',
        'nama_produk.max' => 'Terlalu Panjang, Maks 25 Karakter',
        'nama_produk.unique' => 'Produk ini sudah ada',
        'deskripsi_EN.required' => 'Wajib di isi',
        'deskripsi_ID.required' => 'Wajib di isi',
        'img_url.image' => 'Format Gambar Tidak Sesuai',
        'img_url.max' => 'File Size Terlalu Besar',
        'img_url.dimensions' => 'Ukuran yg di terima 443px x 418px',
        'img_url_kanan.image' => 'Format Gambar Tidak Sesuai',
        'img_url_kanan.max' => 'File Size Terlalu Besar',
        'img_url_kanan.dimensions' => 'Ukuran yg di terima 291px x 308px',
        'img_url_kiri.image' => 'Format Gambar Tidak Sesuai',
        'img_url_kiri.max' => 'File Size Terlalu Besar',
        'img_alt_kiri.dimensions' => 'Ukuran yg di terima 247px x 178px',
        'img_alt.required' => 'Wajib di isi',
        'img_alt_kanan.required' => 'Wajib di isi',
        'img_alt_kiri.required' => 'Wajib di isi',
        'tanggal_post.required' => 'Wajib di isi',
      ];

      $validator = Validator::make($request->all(), [
        'kategori_id' => 'required',
        'nama_produk' => 'required|max:25|unique:amd_produk,nama_produk,'.$request->id,
        'deskripsi_EN' => 'required',
        'deskripsi_ID' => 'required',
        'img_url' => 'image|mimes:jpeg,bmp,png|max:2000|dimensions:max_width=443,max_height=418',
        'img_url_kanan' => 'image|mimes:jpeg,bmp,png|max:2000|dimensions:max_width=291,max_height=308',
        'img_url_kiri' => 'image|mimes:jpeg,bmp,png|max:2000|dimensions:max_width=247,max_height=178',
        'img_alt' => 'required',
        'img_alt_kanan' => 'required',
        'img_alt_kiri' => 'required',
        'tanggal_post' => 'required'
      ], $message);

      if($validator->fails())
      {
        return redirect()->route('produk.ubah', array('id' => $request->id))->withErrors($validator)->withInput();
      }


      DB::transaction(function() use($request){
        $image = $request->file('img_url');
        $image_kanan = $request->file('img_url_kanan');
        $image_kiri = $request->file('img_url_kiri');

        if($request->flag_publish == null){
          $flag_publish = 0;
        }else{
          $flag_publish = 1;
        }

        $salt = str_random(4);

        $update = Produk::find($request->id);
        $update->kategori_id = $request->kategori_id;
        $update->nama_produk = $request->nama_produk;
        $update->deskripsi_EN = $request->deskripsi_EN;
        $update->deskripsi_ID = $request->deskripsi_ID;
        $update->ingredient = $request->ingredient;
        $update->nutrition_fact = $request->nutrition_fact;
        $update->img_alt  = $request->img_alt;
        $update->img_alt_kanan  = $request->img_alt_kanan;
        $update->img_alt_kiri  = $request->img_alt_kiri;
        $update->tanggal_post = $request->tanggal_post;
        $update->flag_publish = $flag_publish;
        $update->slug = str_slug($request->nama_produk,'-');
        $update->actor = Auth::user()->id;

        if (!$image && !$image_kanan && !$image_kiri) {
          $update->update();
        }elseif($image && $image_kanan && $image_kiri){
          $img_url = str_slug($request->img_alt,'-').'-'.$salt. '.' . $image->getClientOriginalExtension();
          Image::make($image)->fit(443,418)->save('images/produk/'. $img_url);

          $img_url_kanan = str_slug($request->img_alt_kanan,'-').'-'.$salt. '.' . $image_kanan->getClientOriginalExtension();
          Image::make($image_kanan)->fit(291,308)->save('images/produk/'. $img_url_kanan);

          $img_url_kiri = str_slug($request->img_alt_kiri,'-').'-'.$salt. '.' . $image_kiri->getClientOriginalExtension();
          Image::make($image_kiri)->fit(247,178)->save('images/produk/'. $img_url_kiri);

          $update->img_url  = $img_url;
          $update->img_url_kanan  = $img_url_kanan;
          $update->img_url_kiri  = $img_url_kiri;
          $update->update();
        }elseif($image_kanan && $image_kiri){
          $img_url_kanan = str_slug($request->img_alt_kanan,'-').'-'.$salt. '.' . $image_kanan->getClientOriginalExtension();
          Image::make($image_kanan)->fit(291,308)->save('images/produk/'. $img_url_kanan);

          $img_url_kiri = str_slug($request->img_alt_kiri,'-').'-'.$salt. '.' . $image_kiri->getClientOriginalExtension();
          Image::make($image_kiri)->fit(247,178)->save('images/produk/'. $img_url_kiri);

          $update->img_url_kanan  = $img_url_kanan;
          $update->img_url_kiri  = $img_url_kiri;
          $update->update();
        }elseif($image){
          $img_url = str_slug($request->img_alt,'-').'-'.$salt. '.' . $image->getClientOriginalExtension();
          Image::make($image)->fit(443,418)->save('images/produk/'. $img_url);

          $update->img_url  = $img_url;
          $update->update();
        }elseif($image_kanan){
          $img_url_kanan = str_slug($request->img_alt_kanan,'-').'-'.$salt. '.' . $image_kanan->getClientOriginalExtension();
          Image::make($image_kanan)->fit(291,308)->save('images/produk/'. $img_url_kanan);

          $update->img_url_kanan  = $img_url_kanan;
          $update->update();
        }elseif($image_kiri){
          $img_url_kiri = str_slug($request->img_alt_kiri,'-').'-'.$salt. '.' . $image_kiri->getClientOriginalExtension();
          Image::make($image_kiri)->fit(247,178)->save('images/produk/'. $img_url_kiri);

          $update->img_url_kiri  = $img_url_kiri;
          $update->update();
        }else{
          $update->update();
        }

        $log = new LogAkses;
        $log->actor = Auth::user()->id;
        $log->aksi = 'Mengubah Produk '.$request->nama_produk;
        $log->save();

      });

      return redirect()->route('produk.index')->with('berhasil', 'Berhasil Mengubah Produk '.$request->nama_produk);
    }

    public function publish($id)
    {
        $getProduk = Produk::find($id);

        if(!$getProduk){
          return view('backend.errors.404');
        }

        if ($getProduk->flag_publish == 1) {
          $getProduk->flag_publish = 0;
          $getProduk->update();

          $log = new LogAkses;
          $log->actor = Auth::user()->id;
          $log->aksi = 'Unpublish Produk '.$getProduk->nama_produk;
          $log->save();

          return redirect()->route('produk.index')->with('berhasil', 'Berhasil Unpublish '.$getProduk->nama_produk);
        }else{
          $getProduk->flag_publish = 1;
          $getProduk->update();

          $log = new LogAkses;
          $log->actor = Auth::user()->id;
          $log->aksi = 'Publish Produk '.$getProduk->nama_produk;
          $log->save();

          return redirect()->route('produk.index')->with('berhasil', 'Berhasil Publish '.$getProduk->nama_produk);
        }
    }

    public function delete($id)
    {
      $getProduk = Produk::find($id);

      if(!$getProduk){
        return view('backend.errors.404');
      }

      DB::transaction(function() use($getProduk){
        File::delete('images/produk/' .$getProduk->img_url);
        File::delete('images/produk/' .$getProduk->img_url_kanan);
        File::delete('images/produk/' .$getProduk->img_url_kiri);
        $getProduk->delete();

        $log = new LogAkses;
        $log->actor = Auth::user()->id;
        $log->aksi = 'Menghapus Produk '.$getProduk->nama_produk;
        $log->save();
      });

      return redirect()->route('produk.index')->with('berhasil', 'Berhasil menghapus Produk '.$getProduk->nama_produk);

    }
}
