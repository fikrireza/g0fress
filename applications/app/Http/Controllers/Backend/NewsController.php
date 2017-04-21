<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\News;
use App\Models\Users;
use App\Models\LogAkses;

use DB;
use Auth;
use Validator;
use Image;

class NewsController extends Controller
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
      $getNews = News::get();

      return view('backend.news.index', compact('getNews'));
    }

    public function tambah()
    {
      return view('backend.news.tambah');
    }

    public function store(Request $request)
    {
        $message = [
          'judul_ID.required' => 'wajib di isi',
          'judul_ID.unique' => 'judul berita sudah ada',
          'judul_EN.required' => 'wajib di isi',
          'deskripsi_ID.required' => 'wajib di isi',
          'deskripsi_EN.required' => 'wajib di isi',
          'tanggal_post.required' => 'wajib di isi',
        ];

        $validator = Validator::make($request->all(), [
          'judul_ID' => 'required|unique:amd_news',
          'judul_EN'  => 'required',
          'deskripsi_ID'  => 'required',
          'deskripsi_EN'  => 'required',
          'tanggal_post'  => 'required',
        ], $message);

        if($validator->fails())
        {
          return redirect()->route('news.tambah')->withErrors($validator)->withInput();
        }

        $image = $request->file('img_url');

        if($request->flag_publish == 'on'){
          $flag_publish = 1;
        }else{
          $flag_publish = 0;
        }

        if($request->show_homepage == 'on'){
          $show_homepage = 1;
        }else{
          $show_homepage = 0;
        }

        if (!$image) {
          $save = New News;
          $save->judul_ID = $request->judul_ID;
          $save->judul_EN = $request->judul_EN;
          $save->deskripsi_ID = $request->deskripsi_ID;
          $save->deskripsi_EN = $request->deskripsi_EN;
          $save->img_url = '';
          $save->img_alt = '';
          $save->video_url  = $request->video_url;
          $save->show_homepage = $show_homepage;
          $save->tanggal_post = $request->tanggal_post;
          $save->flag_publish = $flag_publish;
          $save->slug = str_slug($request->judul_ID,'-');
          $save->actor = Auth::user()->id;
          $save->save();
        }else{
          $img_url = str_slug($request->img_alt,'-'). '.' . $image->getClientOriginalExtension();
          Image::make($image)->fit(472,270)->save('images/news/'. $img_url);

          $save = new News;
          $save->judul_ID = $request->judul_ID;
          $save->judul_EN = $request->judul_EN;
          $save->deskripsi_ID = $request->deskripsi_ID;
          $save->deskripsi_EN = $request->deskripsi_EN;
          $save->img_url  = 'images/news/'.$img_url;
          $save->img_alt  = $request->img_alt;
          $save->video_url  = $request->video_url;
          $save->show_homepage = $show_homepage;
          $save->tanggal_post = $request->tanggal_post;
          $save->flag_publish = $flag_publish;
          $save->slug = str_slug($request->judul_ID,'-');
          $save->actor = Auth::user()->id;
          $save->save();
        }

        $log = new LogAkses;
        $log->actor = Auth::user()->id;
        $log->aksi = 'Menambahkan News '.$request->judul_ID;
        $log->save();

        return redirect()->route('news.index')->with('berhasil', 'Berhasil Menambahkan News Baru');
    }

    public function lihat($id)
    {
        $getNews = News::find($id);

        if(!$getNews){
          return view('backend.errors.404');
        }

        return view('backend.news.lihat', compact('getNews'));
    }

    public function ubah($id)
    {
        $getNews = News::find($id);

        if(!$getNews){
          return view('backend.errors.404');
        }

        return view('backend.news.ubah', compact('getNews'));
    }

    public function edit(Request $request)
    {
      $message = [
        'judul_ID.required' => 'wajib di isi',
        'judul_ID.unique' => 'judul berita sudah ada',
        'judul_EN.required' => 'wajib di isi',
        'deskripsi_ID.required' => 'wajib di isi',
        'deskripsi_EN.required' => 'wajib di isi',
        'tanggal_post.required' => 'wajib di isi',
      ];

      $validator = Validator::make($request->all(), [
        'judul_ID' => 'required|unique:amd_news,judul_ID,'.$request->id,
        'judul_EN'  => 'required',
        'deskripsi_ID'  => 'required',
        'deskripsi_EN'  => 'required',
        'tanggal_post'  => 'required',
      ], $message);

      if($validator->fails())
      {
        return redirect()->route('news.ubah', array('id' => $request->id))->withErrors($validator)->withInput();
      }

      $image = $request->file('img_url');

      if($request->flag_publish == 'on'){
        $flag_publish = 1;
      }else{
        $flag_publish = 0;
      }

      if($request->show_homepage == 'on'){
        $show_homepage = 1;
      }else{
        $show_homepage = 0;
      }

      if (!$image) {
        $update = News::find($request->id);
        $update->judul_ID = $request->judul_ID;
        $update->judul_EN = $request->judul_EN;
        $update->deskripsi_ID = $request->deskripsi_ID;
        $update->deskripsi_EN = $request->deskripsi_EN;
        $update->img_alt = $request->img_alt;
        $update->video_url  = $request->video_url;
        $update->show_homepage = $show_homepage;
        $update->tanggal_post = $request->tanggal_post;
        $update->flag_publish = $flag_publish;
        $update->slug = str_slug($request->judul_ID,'-');
        $update->actor = Auth::user()->id;
        $update->update();
      }else{
        $img_url = str_slug($request->img_alt,'-'). '.' . $image->getClientOriginalExtension();
        Image::make($image)->fit(472,270)->save('images/news/'. $img_url);

        $update = News::find($request->id);
        $update->judul_ID = $request->judul_ID;
        $update->judul_EN = $request->judul_EN;
        $update->deskripsi_ID = $request->deskripsi_ID;
        $update->deskripsi_EN = $request->deskripsi_EN;
        $update->img_url  = 'images/news/'.$img_url;
        $update->img_alt  = $request->img_alt;
        $update->video_url  = $request->video_url;
        $update->show_homepage = $show_homepage;
        $update->tanggal_post = $request->tanggal_post;
        $update->flag_publish = $flag_publish;
        $update->slug = str_slug($request->judul_ID,'-');
        $update->actor = Auth::user()->id;
        $update->update();
      }

      $log = new LogAkses;
      $log->actor = Auth::user()->id;
      $log->aksi = 'Mengubah News '.$request->judul_ID;
      $log->save();

      return redirect()->route('news.index')->with('berhasil', 'Berhasil Mengubah News Baru');
    }
}
