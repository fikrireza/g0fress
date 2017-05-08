<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\SliderHome;
use App\Models\User;
use App\Models\LogAkses;

use Auth;
use DB;
use Validator;
use Image;
use File;

class SliderHomeController extends Controller
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

        $getSlider = SliderHome::orderBy('posisi', 'asc')->get();

        return view('backend.slider.index', compact('getSlider'));

    }

    public function tambah()
    {
        return view('backend.slider.tambah');
    }

    public function store(Request $request)
    {
        $message = [
          'img_url.required' => 'Wajib di isi',
          'img_url.image' => 'Format Gambar Tidak Sesuai',
          'img_url.max' => 'File Size Terlalu Besar',
          'img_alt.required' => 'Wajib di isi',
          'tanggal_post.required' => 'Wajib di isi',
          'posisi.required' => 'Wajib di isi',
        ];

        $validator = Validator::make($request->all(), [
          // 'img_url' => 'required|image|mimes:jpeg,bmp,png|size:2000|dimensions:max_width=1000,max_height=2000',
          'img_url' => 'required|image|mimes:jpeg,bmp,png|max:2000',
          'img_alt' => 'required',
          'tanggal_post' => 'required',
          'posisi'  => 'required'
        ], $message);

        if($validator->fails())
        {
          return redirect()->route('slider.tambah')->withErrors($validator)->withInput();
        }


        DB::transaction(function()  use($request){
          $image = $request->file('img_url');

          if($request->flag_publish == null){
            $flag_publish = 0;
          }else{
            $flag_publish = 1;
          }

          $getPosisi = SliderHome::get();
          if($getPosisi->isEmpty()){
            $setPosisi = 0;
          }else{
            $aturPosisi = SliderHome::where('posisi', '>=', $request->posisi)->orderBy('posisi', 'asc')->get();
            foreach ($aturPosisi as $posisi) {
              $sisip = $posisi->posisi +1;
              $updateData = SliderHome::where('id', $posisi->id)->update(['posisi' => $sisip]);
            }
            $setPosisi = $request->posisi;
          }

          $img_url = str_slug($request->img_alt,'-'). '.' . $image->getClientOriginalExtension();
          Image::make($image)->fit(472,270)->save('images/slider/'. $img_url);

          $save = new SliderHome;
          $save->img_url  = $img_url;
          $save->img_alt  = $request->img_alt;
          $save->posisi = $setPosisi;
          $save->tanggal_post = $request->tanggal_post;
          $save->flag_publish = $flag_publish;
          $save->actor = Auth::user()->id;
          $save->save();

          $log = new LogAkses;
          $log->actor = Auth::user()->id;
          $log->aksi = 'Menambah Slider Home Baru';
          $log->save();
        });

        return redirect()->route('slider.index')->with('berhasil', 'Berhasil Menambahkan Slider Baru');
    }

    public function ubah($id)
    {
        $getSlider = SliderHome::find($id);

        return view('backend.slider.ubah', compact('getSlider'));
    }

    public function edit(Request $request)
    {
      $message = [
        'img_url.image' => 'Format Gambar Tidak Sesuai',
        'img_url.max' => 'File Size Terlalu Besar',
        'img_alt.required' => 'Wajib di isi',
        'tanggal_post.required' => 'Wajib di isi',
        'posisi.required' => 'Wajib di isi',
      ];

      $validator = Validator::make($request->all(), [
        // 'img_url' => 'required|image|mimes:jpeg,bmp,png|size:2000|dimensions:max_width=1000,max_height=2000',
        'img_url' => 'image|mimes:jpeg,bmp,png|max:2000',
        'img_alt' => 'required',
        'tanggal_post' => 'required',
        'posisi' => 'required'
      ], $message);

      if($validator->fails())
      {
        return redirect()->route('slider.ubah', ['id' => $request->id])->withErrors($validator)->withInput();
      }


      // DB::transaction(function() use($request){
        $image = $request->file('img_url');

        if($request->flag_publish == null){
          $flag_publish = 0;
        }else{
          $flag_publish = 1;
        }

        $getPosisi = SliderHome::get();
        if($getPosisi->isEmpty()){
          $setPosisi = 0;
        }else{
          $aturPosisi = SliderHome::where('posisi', '>=', $request->posisi)->orderBy('posisi', 'asc')->get();
          foreach ($aturPosisi as $posisi) {
            $sisip = $posisi->posisi +1;
            $updateData = SliderHome::where('id', $posisi->id)->update(['posisi' => $sisip]);
          }
          $setPosisi = $request->posisi;
        }

        $update = SliderHome::find($request->id);
        $update->img_alt  = $request->img_alt;
        $update->posisi = $setPosisi;
        $update->tanggal_post = $request->tanggal_post;
        $update->flag_publish = $flag_publish;
        $update->actor = Auth::user()->id;
        if (!$image) {
          $update->update();
        }else{
          $img_url = str_slug($request->img_alt,'-'). '.' . $image->getClientOriginalExtension();
          Image::make($image)->fit(472,270)->save('images/slider/'. $img_url);

          $update->img_url  = $img_url;
          $update->update();
        }

        $log = new LogAkses;
        $log->actor = Auth::user()->id;
        $log->aksi = 'Mengubah Slider Home';
        $log->save();
      // });

      return redirect()->route('slider.index')->with('berhasil', 'Berhasil Mengubah Slider');
    }

    public function publish($id)
    {
        $getSlider = SliderHome::find($id);

        if(!$getSlider){
          return view('backend.errors.404');
        }

        if ($getSlider->flag_publish == 1) {
          $getSlider->flag_publish = 0;
          $getSlider->update();

          return redirect()->route('slider.index')->with('berhasil', 'Berhasil Unpublish');
        }else{
          $getSlider->flag_publish = 1;
          $getSlider->update();

          return redirect()->route('slider.index')->with('berhasil', 'Berhasil Publish');
        }
    }

    public function delete($id)
    {
        $getSlider = SliderHome::find($id);

        if(!$getSlider){
          return view('backend.errors.404');
        }

        DB::transaction(function() use($getSlider){
          File::delete('images/slider/' .$getSlider->img_url);
          $getSlider->delete();

          $log = new LogAkses;
          $log->actor = Auth::user()->id;
          $log->aksi = 'Menghapus Slider '.$getSlider->img_url;
          $log->save();
        });

        return redirect()->route('slider.index')->with('berhasil', 'Berhasil menghapus banner slider');
    }

}
