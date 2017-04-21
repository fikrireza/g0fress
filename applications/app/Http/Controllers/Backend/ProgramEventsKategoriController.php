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
          'judul_kategori_ID.unique' => 'Judul ini sudah ada',
          'judul_kategori_EN.required' => 'Wajib di isi',
          'img_url.image' => '.jpeg, .bmp, .png',
          'img_alt.required' => 'Wajib di isi'
        ];

        $validator = Validator::make($request->all(), [
          'judul_kategori_ID' => 'required|unique:amd_program_events_kategori',
          'judul_kategori_EN' => 'required',
          'img_url' => 'image|mimes:jpeg,bmp,png',
          'img_alt' => 'required',
        ], $message);

        if($validator->fails())
        {
          return redirect()->route('programEventsKategori.tambah')->withErrors($validator)->withInput();
        }

        $image = $request->file('img_url');

        if($request->flag_publish == null){
          $flag_publish = 0;
        }else{
          $flag_publish = 1;
        }

        if (!$image) {
          $save = new ProgramEventsKategori;
          $save->judul_kategori_ID = $request->judul_kategori_ID;
          $save->judul_kategori_EN = $request->judul_kategori_EN;
          $save->img_alt  = $request->img_alt;
          $save->flag_publish = $flag_publish;
          $save->slug = str_slug($request->judul_kategori_ID,'-');
          $save->actor = Auth::user()->id;
          $save->save();
        }else{
          $img_url = str_slug($request->img_alt,'-'). '.' . $image->getClientOriginalExtension();
          Image::make($image)->fit(472,270)->save('images/programEvent/'. $img_url);

          $save = new ProgramEventsKategori;
          $save->judul_kategori_ID = $request->judul_kategori_ID;
          $save->judul_kategori_EN = $request->judul_kategori_EN;
          $save->img_url  = 'images/programEvent/'.$img_url;
          $save->img_alt  = $request->img_alt;
          $save->flag_publish = $flag_publish;
          $save->slug = str_slug($request->judul_kategori_ID,'-');
          $save->actor = Auth::user()->id;
          $save->save();
        }

        $log = new LogAkses;
        $log->actor = Auth::user()->id;
        $log->aksi = 'Menambah Program & Events Kategori Baru '.$request->nama_kategori;
        $log->save();

        return redirect()->route('programEventsKategori.index')->with('berhasil', 'Berhasil Menambahkan Program & Events Baru');
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
          'judul_kategori_ID.unique' => 'Judul ini sudah ada',
          'judul_kategori_EN.required' => 'Wajib di isi',
          'img_url.image' => '.jpeg, .bmp, .png',
          'img_alt.required'  => 'Wajib di isi',
        ];

        $validator = Validator::make($request->all(), [
          'judul_kategori_ID' => 'required|unique:amd_program_events_kategori,judul_kategori_ID,'.$request->id,
          'judul_kategori_EN' => 'required',
          'img_url' => 'image|mimes:jpeg,bmp,png',
          'img_alt' => 'required',
        ], $message);

        if($validator->fails())
        {
          return redirect()->route('programEventsKategori.ubah', array('id' => $request->id))->withErrors($validator)->withInput();
        }

        $image = $request->file('img_url');

        if($request->flag_publish == null){
          $flag_publish = 0;
        }else{
          $flag_publish = 1;
        }

        if (!$image) {
          $update = ProgramEventsKategori::find($request->id);
          $update->judul_kategori_ID = $request->judul_kategori_ID;
          $update->judul_kategori_EN = $request->judul_kategori_EN;
          $update->img_alt  = $request->img_alt;
          $update->flag_publish = $flag_publish;
          $update->slug = str_slug($request->judul_kategori_ID,'-');
          $update->actor = Auth::user()->id;
          $update->update();
        }else{
          $img_url = str_slug($request->img_alt,'-'). '.' . $image->getClientOriginalExtension();
          Image::make($image)->fit(472,270)->save('images/programEvent/'. $img_url);

          $update = ProgramEventsKategori::find($request->id);
          $update->judul_kategori_ID = $request->judul_kategori_ID;
          $update->judul_kategori_EN = $request->judul_kategori_EN;
          $update->img_url  = 'images/programEvent/'.$img_url;
          $update->img_alt  = $request->img_alt;
          $update->flag_publish = $flag_publish;
          $update->slug = str_slug($request->judul_kategori_ID,'-');
          $update->actor = Auth::user()->id;
          $update->update();
        }

        $log = new LogAkses;
        $log->actor = Auth::user()->id;
        $log->aksi = 'Mengubah Program & Events Kategori '.$request->judul_kategori_ID;
        $log->save();

        return redirect()->route('programEventsKategori.index')->with('berhasil', 'Berhasil Mengubah Program & Events Kategori');
    }
}
