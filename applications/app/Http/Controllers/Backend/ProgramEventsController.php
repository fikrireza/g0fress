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
          'program_events_kategori_id.required' => 'Pilih Satu',
          'judul_promosi_ID.required' => 'Wajib di isi',
          'judul_promosi_ID.max' => 'Terlalu Panjang, Max 70 Karakter',
          'judul_promosi_ID.unique' => 'Judul ini sudah ada',
          'judul_promosi_EN.required' => 'Wajib di isi',
          'deskripsi_ID.required' => 'Wajib di isi',
          'deskripsi_ID.min' => 'Terlalu Singkat',
          'deskripsi_EN.required' => 'Wajib di isi',
          'deskripsi_EN.min' => 'Terlalu Singkat',
          'tanggal_post.required' => 'Wajib di isi',
          'img_url.image' => 'Format Gambar Tidak Sesuai',
          'img_url.dimensions' => 'Ukuran yg di terima 932px x 350px',
          'img_url.max' => 'File Size Terlalu Besar',
          'img_thumb.image' => 'Format Gambar Tidak Sesuai',
          'img_thumb.dimensions' => 'Ukuran yg di terima 325px x 413px',
          'img_thumb.max' => 'File Size Terlalu Besar'
        ];

        $validator = Validator::make($request->all(), [
          'program_events_kategori_id' => 'required',
          'judul_promosi_ID' => 'required|unique:amd_program_events|max:70',
          'judul_promosi_EN' => 'required',
          'deskripsi_ID' => 'required|min:20',
          'deskripsi_EN' => 'required|min:20',
          'img_url' => 'image|mimes:jpeg,bmp,png|max:2000|dimensions:max_width=932,max_height=350',
          'img_thumb' => 'image|mimes:jpeg,bmp,png|max:1000|dimensions:max_width=325,max_height=413',
          'tanggal_post' => 'required'
        ], $message);

        if($validator->fails())
        {
          return redirect()->route('programEvents.tambah')->withErrors($validator)->withInput();
        }

        if(!$request->img_url && !$request->img_thumb && !$request->video_url)
        {
          return redirect()->route('programEvents.tambah')->with('gagal', 'Isi Image Atau Video')->withInput();
        }


        DB::transaction(function() use($request){
          $image = $request->file('img_url');
          $image_thumb = $request->file('img_thumb');

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

          $salt = str_random(4);
          
          $save = new ProgramEvents;
          $save->program_events_kategori_id = $request->program_events_kategori_id;
          $save->judul_promosi_ID = $request->judul_promosi_ID;
          $save->judul_promosi_EN = $request->judul_promosi_EN;
          $save->deskripsi_EN = $request->deskripsi_EN;
          $save->deskripsi_ID = $request->deskripsi_ID;
          $save->img_alt  = $request->img_alt;
          $save->img_alt_thumb  = $request->img_alt_thumb;
          $save->video_url = $request->video_url;
          $save->show_homepage = $show_homepage;
          $save->tanggal_post = $request->tanggal_post;
          $save->flag_publish = $flag_publish;
          $save->slug = str_slug($request->judul_promosi_ID,'-');
          $save->actor = Auth::user()->id;

          if (!$image && !$image_thumb) {
            $save->save();
          }elseif($image && $image_thumb){
            $img_url = str_slug($request->img_alt,'-').'-'.$salt. '.' . $image->getClientOriginalExtension();
            Image::make($image)->fit(932,350)->save('images/programEvent/'. $img_url);

            $img_url_thumb = str_slug($request->img_alt_thumb,'-').'-'.$salt. '.' . $image_thumb->getClientOriginalExtension();
            Image::make($image_thumb)->fit(325,413)->save('images/programEvent/'. $img_url_thumb);

            $save->img_url = $img_url;
            $save->img_thumb = $img_url_thumb;
            $save->save();
          }

          $log = new LogAkses;
          $log->actor = Auth::user()->id;
          $log->aksi = 'Menambah Program & Events Baru '.$request->judul_promosi_ID;
          $log->save();
        });


        return redirect()->route('programEvents.index')->with('berhasil', 'Berhasil Menambahkan Program & Events '.$request->judul_promosi_ID);

    }

    public function lihat($id)
    {
        $getProgramEvents = ProgramEvents::join('amd_program_events_kategori', 'amd_program_events_kategori.id', '=', 'amd_program_events.program_events_kategori_id')
                                          ->select('amd_program_events.*', 'amd_program_events_kategori.judul_kategori_ID')
                                          ->where('amd_program_events.id', $id)
                                          ->first();

        if(!$getProgramEvents){
          return view('backend.errors.404');
        }

        return view('backend.programEvents.lihat', compact('getProgramEvents'));
    }


    public function ubah($id)
    {
        $getProgramEvents = ProgramEvents::join('amd_program_events_kategori', 'amd_program_events_kategori.id', '=', 'amd_program_events.program_events_kategori_id')
                                          ->select('amd_program_events.*', 'amd_program_events_kategori.judul_kategori_ID')
                                          ->where('amd_program_events.id', $id)
                                          ->first();

        if(!$getProgramEvents){
          return view('backend.errors.404');
        }

        $getProgramEventsKategori = ProgramEventsKategori::select('id', 'judul_kategori_ID')->get();

        return view('backend.programEvents.ubah', compact('getProgramEvents', 'getProgramEventsKategori'));
    }

    public function edit(Request $request)
    {
        $message = [
          'program_events_kategori_id.required' => 'Pilih Satu',
          'judul_promosi_ID.required' => 'Wajib di isi',
          'judul_promosi_ID.max' => 'Terlalu Panjang, Max 70 Karakter',
          'judul_promosi_ID.unique' => 'Judul ini sudah ada',
          'judul_promosi_EN.required' => 'Wajib di isi',
          'deskripsi_ID.required' => 'Wajib di isi',
          'deskripsi_ID.min' => 'Terlalu Singkat',
          'deskripsi_EN.required' => 'Wajib di isi',
          'deskripsi_EN.min' => 'Terlalu Singkat',
          'tanggal_post.required' => 'Wajib di isi',
          'img_url.image' => 'Format Gambar Tidak Sesuai',
          'img_url.max' => 'File Size Terlalu Besar',
          'img_url.dimensions' => 'Ukuran yg di terima 932px x 350px',
          'img_thumb.image' => 'Format Gambar Tidak Sesuai',
          'img_thumb.max' => 'File Size Terlalu Besar',
          'img_thumb.dimensions' => 'Ukuran yg di terima 325px x 413px'
        ];

        $validator = Validator::make($request->all(), [
          'program_events_kategori_id' => 'required',
          'judul_promosi_ID' => 'required|max:70|unique:amd_program_events,judul_promosi_ID,'.$request->id,
          'judul_promosi_EN' => 'required',
          'deskripsi_ID' => 'required|min:20',
          'deskripsi_EN' => 'required|min:20',
          'img_url' => 'image|mimes:jpeg,bmp,png|max:2000|dimensions:max_width=932,max_height=350',
          'img_thumb' => 'image|mimes:jpeg,bmp,png|max:1000|dimensions:max_width=325,max_height=413',
          'tanggal_post' => 'required'
        ], $message);

        if($validator->fails())
        {
          return redirect()->route('programEvents.ubah', array('id' => $request->id))->withErrors($validator)->withInput();
        }


        DB::transaction(function() use($request){
          $image = $request->file('img_url');
          $image_thumb = $request->file('img_thumb');

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

          $salt = str_random(4);

          $update = ProgramEvents::find($request->id);
          $update->program_events_kategori_id = $request->program_events_kategori_id;
          $update->judul_promosi_ID = $request->judul_promosi_ID;
          $update->judul_promosi_EN = $request->judul_promosi_EN;
          $update->deskripsi_EN = $request->deskripsi_EN;
          $update->deskripsi_ID = $request->deskripsi_ID;
          $update->img_alt  = $request->img_alt;
          $update->img_alt_thumb = $request->img_alt_thumb;
          $update->video_url  = $request->video_url;
          $update->show_homepage = $show_homepage;
          $update->tanggal_post = $request->tanggal_post;
          $update->flag_publish = $flag_publish;
          $update->slug = str_slug($request->judul_promosi_ID,'-');
          $update->actor = Auth::user()->id;

          if($request->remove_image == "on")
          {
            $update->img_url = null;
          }
          elseif($image)
          {
            $img_url = str_slug($request->img_alt,'-').'-'.$salt. '.' . $image->getClientOriginalExtension();
            Image::make($image)->fit(932,350)->save('images/programEvent/'. $img_url);

            $update->img_url  = $img_url;
          }
          elseif($image_thumb)
          {
            $img_thumb = str_slug($request->img_alt_thumb,'-').'-'.$salt. '.' . $image_thumb->getClientOriginalExtension();
            Image::make($image_thumb)->fit(325,413)->save('images/programEvent/'. $img_thumb);

            $update->img_thumb  = $img_thumb;
          }
          elseif($image && $image_thumb)
          {
            $img_url = str_slug($request->img_alt,'-').'-'.$salt. '.' . $image->getClientOriginalExtension();
            Image::make($image)->fit(932,350)->save('images/programEvent/'. $img_url);

            $img_thumb = str_slug($request->img_alt_thumb,'-').'-'.$salt. '.' . $image_thumb->getClientOriginalExtension();
            Image::make($image_thumb)->fit(325,413)->save('images/programEvent/'. $img_thumb);

            $update->img_thumb  = $img_thumb;
            $update->img_url  = $img_url;
          }

          $update->update();

          $log = new LogAkses;
          $log->actor = Auth::user()->id;
          $log->aksi = 'Mengubah Program & Events '.$request->judul_promosi_ID;
          $log->save();
        });


        return redirect()->route('programEvents.index')->with('berhasil', 'Berhasil Mengubah Program & Events '.$request->judul_promosi_ID);

    }

    public function publish($id)
    {
        $getProgramEvents = ProgramEvents::find($id);

        if(!$getProgramEvents){
          return view('backend.errors.404');
        }

        if ($getProgramEvents->flag_publish == 1) {
          $getProgramEvents->flag_publish = 0;
          $getProgramEvents->update();

          return redirect()->route('programEvents.index')->with('berhasil', 'Berhasil Unpublish '.$getProgramEvents->judul_promosi_ID);
        }else{
          $getProgramEvents->flag_publish = 1;
          $getProgramEvents->update();

          return redirect()->route('programEvents.index')->with('berhasil', 'Berhasil Publish '.$getProgramEvents->judul_promosi_ID);
        }
    }

    public function homepage($id)
    {
        $getProgramEvents = ProgramEvents::find($id);

        if(!$getProgramEvents){
          return view('backend.errors.404');
        }

        if ($getProgramEvents->show_homepage == 1) {
          $getProgramEvents->show_homepage = 0;
          $getProgramEvents->update();

          return redirect()->route('programEvents.index')->with('berhasil', 'Berhasil Unshow '.$getProgramEvents->judul_promosi_ID);
        }else{
          $getProgramEvents->show_homepage = 1;
          $getProgramEvents->update();

          return redirect()->route('programEvents.index')->with('berhasil', 'Berhasil Show '.$getProgramEvents->judul_promosi_ID);
        }
    }
}
