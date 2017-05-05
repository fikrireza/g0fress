<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Kontak;
use App\Models\LogAkses;

use Auth;
use Image;
use DB;
use Validator;

class KontakController extends Controller
{


    public function index()
    {
        $getKontak = Kontak::get();

        return view('backend.kontak.index', compact('getKontak'));
    }

    public function tambah()
    {
        return view('backend.kontak.tambah');
    }

    public function store(Request $request)
    {
        $message = [
          'kantor_kategori.required' => 'Wajib di isi',
          'email.email' => 'Format email tidak sesuai',
          'email.required' => 'Wajib di isi',
          'alamat.required' => 'Wajib di isi',
          'no_telp.required' => 'Wajib di isi',
        ];

        $validator = Validator::make($request->all(), [
          'kantor_kategori' => 'required',
          'email' => 'required|email',
          'alamat' => 'required',
          'no_telp' => 'required'
        ], $message);


        if($validator->fails())
        {
          return redirect()->route('kontak.tambah')->withErrors($validator)->withInput();
        }

        DB::transaction(function() use($request){
          $save = New Kontak;
          $save->kantor_kategori = $request->kantor_kategori;
          $save->alamat = $request->alamat;
          $save->email = $request->email;
          $save->maps = '-';
          $save->no_telp = $request->no_telp;
          $save->actor = Auth::user()->id;
          $save->save();


          $log = new LogAkses;
          $log->actor = Auth::user()->id;
          $log->aksi = 'Menambahkan Kontak '.$request->kantor_kategori;
          $log->save();
        });


        return redirect()->route('kontak.index')->with('berhasil', 'Berhasil Menambahkan Kontak '.$request->kantor_kategori);
    }

    public function ubah($id)
    {
        $getKontak = Kontak::find($id);

        if(!$getKontak){
          return view('backend.errors.404');
        }

        return view('backend.kontak.ubah', compact('getKontak'));
    }

    public function edit(Request $request)
    {
        $message = [
          'kantor_kategori.required' => 'Wajib di isi',
          'email.email' => 'Format email tidak sesuai',
          'email.required' => 'Wajib di isi',
          'alamat.required' => 'Wajib di isi',
          'no_telp.required' => 'Wajib di isi',
        ];

        $validator = Validator::make($request->all(), [
          'kantor_kategori' => 'required',
          'email' => 'required|email',
          'alamat' => 'required',
          'no_telp' => 'required'
        ], $message);


        if($validator->fails())
        {
          return redirect()->route('kontak.ubah')->withErrors($validator)->withInput();
        }

        DB::transaction(function() use($request){
          $update = Kontak::find($request->id);
          $update->kantor_kategori = $request->kantor_kategori;
          $update->alamat = $request->alamat;
          $update->email = $request->email;
          $update->maps = '-';
          $update->no_telp = $request->no_telp;
          $update->actor = Auth::user()->id;
          $update->update();


          $log = new LogAkses;
          $log->actor = Auth::user()->id;
          $log->aksi = 'Mengubah Kontak '.$request->kantor_kategori;
          $log->save();
        });

        return redirect()->route('kontak.index')->with('berhasil', 'Berhasil Mengubah Kontak '.$request->kantor_kategori);
    }
}
