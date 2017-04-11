<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Produk;
use App\Models\KategoriProduk;
use App\Models\User;

use DB;
use Auth;
use Validator;

class ProdukController extends Controller
{
    public function index()
    {
      $getProduk = Produk::get();

      return view('backend.produk.index', compact('getProduk'));
    }

    public function tambah()
    {
      $getProdukKategori = KategoriProduk::where('flag_publish', 1)->get();

      return view('backend.produk.tambah', compact('getProdukKategori'));
    }

    public function store(Request $request)
    {
      $message = [
        'kategori_id.required' => 'Wajib di isi',
        'nama_produk_id.required' => 'Wajib di isi',
        'deskripsi_en.required' => 'Wajib di isi',
        'deskripsi_id.required' => 'Wajib di isi',
        'img_url.required' => 'Wajib di isi',
        'img_alt.required' => 'Wajib di isi',
        'tanggal_post.required' => 'Wajib di isi',
      ];

      $validator = Validator::make($request->all(), [
        'kategori_id' => 'required',
        'nama_produk_id' => 'required',
        'deskripsi_en' => 'required',
        'deskripsi_id' => 'required',
        'img_url' => 'required',
        'img_alt' => 'required',
        'tanggal_post' => 'required'
      ], $message);

      if($validator->fails())
      {
        return redirect()->route('produk.tambah')->withErrors($validator)->withInput();
      }
      dd($request);



    }
}
