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
          'judul_kategori_ID.max' => 'Terlalu Panjang',
          'judul_kategori_ID.unique' => 'Judul ini sudah ada',
          'judul_kategori_EN.required' => 'Wajib di isi',
          'img_url.image' => 'Format Gambar Tidak Sesuai',
          'img_url.max' => 'File Size Terlalu Besar',
          'img_url.dimensions' => 'Ukuran yg di terima 932px x 350px'
        ];

        $validator = Validator::make($request->all(), [
          'judul_kategori_ID' => 'required|unique:amd_program_events_kategori|max:30',
          'judul_kategori_EN' => 'required',
          'img_url' => 'image|mimes:jpeg,bmp,png|max:2000|dimensions:max_width=932,max_height=350'
        ], $message);

        if($validator->fails())
        {
          return redirect()->route('programEventsKategori.tambah')->withErrors($validator)->withInput();
        }

        DB::transaction(function() use($request){
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
            Image::make($image)->fit(932,350)->save('images/programEvent/'. $img_url);

            $save = new ProgramEventsKategori;
            $save->judul_kategori_ID = $request->judul_kategori_ID;
            $save->judul_kategori_EN = $request->judul_kategori_EN;
            $save->img_url  = $img_url;
            $save->img_alt  = $request->img_alt;
            $save->flag_publish = $flag_publish;
            $save->slug = str_slug($request->judul_kategori_ID,'-');
            $save->actor = Auth::user()->id;
            $save->save();
          }

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
          'judul_kategori_ID.unique' => 'Judul ini sudah ada',
          'judul_kategori_EN.required' => 'Wajib di isi',
          'img_url.image' => 'Format Gambar Tidak Sesuai',
          'img_url.dimensions' => 'Ukuran yg di terima 932px x 350px',
          'img_url.max' => 'File Size Terlalu Besar'
        ];

        $validator = Validator::make($request->all(), [
          'judul_kategori_ID' => 'required|unique:amd_program_events_kategori,judul_kategori_ID,'.$request->id,
          'judul_kategori_EN' => 'required',
          'img_url' => 'image|mimes:jpeg,bmp,png|max:2000|dimensions:max_width=932,max_height=350'
        ], $message);

        if($validator->fails())
        {
          return redirect()->route('programEventsKategori.ubah', array('id' => $request->id))->withErrors($validator)->withInput();
        }

        DB::transaction(function() use($request){
          $image = $request->file('img_url');

          if($request->flag_publish == null){
            $flag_publish = 0;
          }else{
            $flag_publish = 1;
          }

          $update = ProgramEventsKategori::find($request->id);
          $update->judul_kategori_ID = $request->judul_kategori_ID;
          $update->judul_kategori_EN = $request->judul_kategori_EN;
          $update->img_alt  = $request->img_alt;
          $update->flag_publish = $flag_publish;
          $update->slug = str_slug($request->judul_kategori_ID,'-');
          $update->actor = Auth::user()->id;

          if($request->remove_image == 'on'){
            $update->img_url = null;
            $update->update();
          }elseif (!$image) {
            $update->update();
          }else{
            $img_url = str_slug($request->img_alt,'-'). '.' . $image->getClientOriginalExtension();
            Image::make($image)->fit(932,350)->save('images/programEvent/'. $img_url);

            $update->img_url  = $img_url;
            $update->update();
          }

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
