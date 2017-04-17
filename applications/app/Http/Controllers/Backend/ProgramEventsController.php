<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\ProgramEvents;
use App\Models\ProgramEventsKategori;
use App\Models\Users;
use App\Models\LogAkses;

use DB;
use Auth;
use Validator;
use Image;

class ProgramEventsController extends Controller
{

    public function index()
    {
        $getProgramEvents = ProgramEvents::join('amd_program_events_kategori', 'amd_program_events_kategori.id', '=', 'amd_program_events.program_events_kategori_id')
                                          ->select('amd_program_events.*', 'amd_program_events_kategori.judul_kategori_ID')
                                          ->get();

        return view('backend.programEvents.index', compact('getProgramEvents'));
    }

    public function tambah()
    {
        $getProgramEventsKategori = ProgramEventsKategori::select('id', 'judul_kategori_ID')->get();

        return view('backend.programEvents.tambah', compact('getProgramEventsKategori'));
    }

    public function store(Request $request)
    {
        $message = [
          'program_events_kategori_id' => 'Wajib di isi',
          'judul_promosi_ID.required' => 'Wajib di isi',
          'judul_promosi_ID.unique' => 'Judul ini sudah ada',
          'judul_promosi_EN.required' => 'Wajib di isi',
          'deskripsi_ID.required' => 'Wajib di isi',
          'deskripsi_EN.required' => 'Wajib di isi',
          'tanggal_post.required' => 'Wajib di isi',
          'img_url.image' => '.jpeg, .bmp, .png',
        ];

        $validator = Validator::make($request->all(), [
          'program_events_kategori_id' => 'required',
          'judul_promosi_ID' => 'required|unique:amd_program_events',
          'judul_promosi_EN' => 'required',
          'deskripsi_ID' => 'required',
          'deskripsi_EN' => 'required',
          'img_url' => 'image|mimes:jpeg,bmp,png',
          'tanggal_post' => 'required'
        ], $message);

        if($validator->fails())
        {
          return redirect()->route('programEvents.tambah')->withErrors($validator)->withInput();
        }

        $image = $request->file('img_url');

        if($request->flag_publish == null){
          $flag_publish = 0;
        }else{
          $flag_publish = 1;
        }

        if($request->show_homepage == 'on'){
          $show_homepage = 1;
        }else{
          $show_homepage = 0;
        }

        if (!$image) {
          $save = new ProgramEvents;
          $save->program_events_kategori_id = $request->program_events_kategori_id;
          $save->judul_promosi_ID = $request->judul_promosi_ID;
          $save->judul_promosi_EN = $request->judul_promosi_EN;
          $save->deskripsi_EN = $request->deskripsi_EN;
          $save->deskripsi_ID = $request->deskripsi_ID;
          $save->img_alt  = $request->img_alt;
          $save->show_homepage = $show_homepage;
          $save->tanggal_post = $request->tanggal_post;
          $save->flag_publish = $flag_publish;
          $save->slug = str_slug($request->judul_promosi_ID,'-');
          // $save->actor = Auth::user()->id;
          $save->actor = 1;
          $save->save();
        }else{
          $img_url = str_slug($request->img_alt,'-'). '.' . $image->getClientOriginalExtension();
          Image::make($image)->fit(472,270)->save('images/programEvent/'. $img_url);

          $save = new ProgramEvents;
          $save->program_events_kategori_id = $request->program_events_kategori_id;
          $save->judul_promosi_ID = $request->judul_promosi_ID;
          $save->judul_promosi_EN = $request->judul_promosi_EN;
          $save->deskripsi_EN = $request->deskripsi_EN;
          $save->deskripsi_ID = $request->deskripsi_ID;
          $save->img_url  = $img_url;
          $save->img_alt  = $request->img_alt;
          $save->show_homepage = $show_homepage;
          $save->tanggal_post = $request->tanggal_post;
          $save->flag_publish = $flag_publish;
          $save->slug = str_slug($request->judul_promosi_ID,'-');
          // $save->actor = Auth::user()->id;
          $save->actor = 1;
          $save->save();
        }

        $log = new LogAkses;
        $log->actor = 1;
        // $log->actor = Auth::user()->id;
        $log->aksi = 'Menambah Program & Events Baru '.$request->nama_kategori;
        $log->save();

        return redirect()->route('programEvent.index')->with('berhasil', 'Berhasil Menambahkan Program & Events Baru');

    }

    public function lihat($id)
    {
        $getProgramEvents = ProgramEvents::find($id);

        if(!$getProgramEvents){
          return view('backend.errors.404');
        }

        return view('backend.programEvents.lihat', compact('getProgramEvents'));
    }


    public function ubah($id)
    {
        $getProgramEvents = ProgramEvents::find($id);

        if(!$getProgramEvents){
          return view('backend.errors.404');
        }

        return view('backend.programEvents.ubah', compact('getProgramEvents'));
    }
}
