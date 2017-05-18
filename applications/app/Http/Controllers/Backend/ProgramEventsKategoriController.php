<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\ProgramEvents;
use App\Models\ProgramEventsKategori;
use App\Models\User;
use App\Models\LogAkses;

use DB;
use Auth;
use Validator;
use Image;

class ProgramEventsKategoriController extends Controller
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
      $getProgramEventsKategori = ProgramEventsKategori::get();

      return view('backend.programEventsKategori.index', compact('getProgramEventsKategori'));
    }

    public function tambah()
    {
        return view('backend.programEventsKategori.tambah');
    }

    public function store(Request $request)
    {
        $message = [
          'judul_kategori_ID.required' => 'Wajib di isi',
          'judul_kategori_ID.max' => 'Terlalu Panjang, Max 70 Karakter',
          'judul_kategori_ID.unique' => 'Judul ini sudah ada',
          'judul_kategori_EN.required' => 'Wajib di isi',
        ];

        $validator = Validator::make($request->all(), [
          'judul_kategori_ID' => 'required|unique:amd_program_events_kategori|max:70',
          'judul_kategori_EN' => 'required'
        ], $message);

        if($validator->fails())
        {
          return redirect()->route('programEventsKategori.tambah')->withErrors($validator)->withInput();
        }

        DB::transaction(function() use($request){

          if($request->flag_publish == null){
            $flag_publish = 0;
          }else{
            $flag_publish = 1;
          }

          $save = new ProgramEventsKategori;
          $save->judul_kategori_ID = $request->judul_kategori_ID;
          $save->judul_kategori_EN = $request->judul_kategori_EN;
          $save->flag_publish = $flag_publish;
          $save->slug = str_slug($request->judul_kategori_ID,'-');
          $save->actor = Auth::user()->id;
          $save->save();


          $log = new LogAkses;
          $log->actor = Auth::user()->id;
          $log->aksi = 'Menambah Program & Events Kategori Baru '.$request->judul_kategori_ID;
          $log->save();
        });


        return redirect()->route('programEventsKategori.index')->with('berhasil', 'Berhasil Menambahkan Program & Events '.$request->judul_kategori_ID);
    }

    public function lihat($id)
    {
        $getProgramEventsKategori = programEventsKategori::find($id);

        if(!$getProgramEventsKategori){
          return view('backend.errors.404');
        }

        return view('backend.programEventsKategori.lihat', compact('getProgramEventsKategori'));
    }


    public function ubah($id)
    {
      $getProgramEventsKategori = programEventsKategori::find($id);

      if(!$getProgramEventsKategori){
        return view('backend.errors.404');
      }

        return view('backend.programEventsKategori.ubah', compact('getProgramEventsKategori'));
    }

    public function edit(Request $request)
    {
        $message = [
          'judul_kategori_ID.required' => 'Wajib di isi',
          'judul_kategori_ID.max' => 'Terlalu Panjang, Max 70 Karakter',
          'judul_kategori_ID.unique' => 'Judul ini sudah ada',
          'judul_kategori_EN.required' => 'Wajib di isi'
        ];

        $validator = Validator::make($request->all(), [
          'judul_kategori_ID' => 'required|max:70|unique:amd_program_events_kategori,judul_kategori_ID,'.$request->id,
          'judul_kategori_EN' => 'required'
        ], $message);

        if($validator->fails())
        {
          return redirect()->route('programEventsKategori.ubah', array('id' => $request->id))->withErrors($validator)->withInput();
        }

        DB::transaction(function() use($request){

          if($request->flag_publish == null){
            $flag_publish = 0;
          }else{
            $flag_publish = 1;
          }

          $update = ProgramEventsKategori::find($request->id);
          $update->judul_kategori_ID = $request->judul_kategori_ID;
          $update->judul_kategori_EN = $request->judul_kategori_EN;
          $update->flag_publish = $flag_publish;
          $update->slug = str_slug($request->judul_kategori_ID,'-');
          $update->actor = Auth::user()->id;
          $update->update();

          $log = new LogAkses;
          $log->actor = Auth::user()->id;
          $log->aksi = 'Mengubah Program & Events Kategori '.$request->judul_kategori_ID;
          $log->save();
        });

        return redirect()->route('programEventsKategori.index')->with('berhasil', 'Berhasil Mengubah Program & Events Kategori '.$request->judul_kategori_ID);
    }

    public function publish($id)
    {
        $getProgramEventsKategori = programEventsKategori::find($id);

        if(!$getProgramEventsKategori){
          return view('backend.errors.404');
        }

        if ($getProgramEventsKategori->flag_publish == 1) {
          $getProgramEventsKategori->flag_publish = 0;
          $getProgramEventsKategori->update();

          return redirect()->route('programEventsKategori.index')->with('berhasil', 'Berhasil Unpublish Banner Slider '.$getProgramEventsKategori->judul_kategori_ID);
        }else{
          $getProgramEventsKategori->flag_publish = 1;
          $getProgramEventsKategori->update();

          return redirect()->route('programEventsKategori.index')->with('berhasil', 'Berhasil Publish Banner Slider '.$getProgramEventsKategori->judul_kategori_ID);
        }
    }

}
