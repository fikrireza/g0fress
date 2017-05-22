<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Distribution;
use App\Models\Kota;
use App\Models\LogAkses;

use DB;
use Auth;
use Validator;


class DistributionController extends Controller
{

    public function index()
    {
        $getDistribution = Distribution::join('amd_kota', 'amd_kota.id', '=', 'amd_distribution.id_provinsi')
                                        ->select('amd_distribution.*', 'amd_kota.nama_kota as nama_provinsi')
                                        ->get();

        return view('backend.distribution.index', compact('getDistribution'));
    }

    public function tambah()
    {
        $getKota = Kota::get();

        return view('backend.distribution.tambah', compact('getKota'));
    }

    public function store(Request $request)
    {
      $message = [
        'id_provinsi.required' => 'Wajib di isi',
        'nama_kota.required' => 'Wajib di isi',

      ];

      $validator = Validator::make($request->all(), [
        'id_provinsi' => 'required',
        'nama_kota' => 'required'
      ], $message);


      if($validator->fails())
      {
        return redirect()->route('distribution.tambah')->withErrors($validator)->withInput();
      }


      DB::transaction(function() use($request){
        if($request->flag_publish == "on"){
          $flag_publish = 1;
        }else{
          $flag_publish = 0;
        }

        $Distribution = Distribution::create([
          'id_provinsi' => $request->id_provinsi,
          'nama_kota' => $request->nama_kota,
          'flag_publish'  => $flag_publish,
          'actor' => Auth::user()->id
        ]);

        $logAkses = LogAkses::create([
          'actor' => Auth::user()->id,
          'aksi'  => 'Menambahkan Distribution List'
        ]);

      });

      return redirect()->route('distribution.index')->with('berhasil', 'Berhasil Menambahkan Distribution List Baru');

    }

    public function ubah($id)
    {
        $getDistribution = Distribution::find($id);
        $getKota = Kota::get();

        if(!$getDistribution){
          abort(404);
        }

        return view('backend.distribution.ubah', compact('getDistribution', 'getKota'));
    }

    public function edit(Request $request)
    {
      $message = [
        'id_provinsi.required' => 'Wajib di isi',

      ];

      $validator = Validator::make($request->all(), [
        'id_provinsi' => 'required'
      ], $message);


      if($validator->fails())
      {
        return redirect()->route('distribution.ubah', array('id' => $request->id))->withErrors($validator)->withInput();
      }


      DB::transaction(function() use($request){
        if($request->flag_publish == "on"){
          $flag_publish = 1;
        }else{
          $flag_publish = 0;
        }

        $update = Distribution::find($request->id);
        $update->id_provinsi = $request->id_provinsi;
        $update->nama_kota  = $request->nama_kota;
        $update->flag_publish = $flag_publish;
        $update->update();

        $logAkses = LogAkses::create([
          'actor' => Auth::user()->id,
          'aksi'  => 'Menambahkan Distribution List'
        ]);

      });

      return redirect()->route('distribution.index')->with('berhasil', 'Berhasil Mengubah Distribution List');
    }

    public function publish($id)
    {
        $getDistribution = Distribution::find($id);

        if(!$getDistribution){
          return view('backend.errors.404');
        }

        if ($getDistribution->flag_publish == 1) {
          $getDistribution->flag_publish = 0;
          $getDistribution->update();

          return redirect()->route('distribution.index')->with('berhasil', 'Berhasil Unpublish Distribution '.$getDistribution->nama_kota);
        }else{
          $getDistribution->flag_publish = 1;
          $getDistribution->update();

          return redirect()->route('distribution.index')->with('berhasil', 'Berhasil Publish Distribution '.$getDistribution->nama_kota);
        }
    }

}
