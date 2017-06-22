<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Kontak;
use App\Models\Inbox;

use Validator;

class ContactController extends Controller
{
    function index()
    {
      $getKontak = Kontak::get();

    	return view('frontend.contact.index', compact('getKontak'));
    }

    public function store(Request $request)
    {
        if(!str_contains($request->email, ['gmail', 'yahoo', 'ymail', 'hotmail'])){
          return redirect()->route('frontend.contact')->with('berhasil', 'Terima Kasih Telah Menghubungi Kami.');
        }
        if(str_contains($request->pesan, ['href', 'http', 'https', 'porn', 'pocker'])){
          return redirect()->route('frontend.contact')->with('berhasil', 'Terima Kasih Telah Menghubungi Kami.');
        }

        $message = [
          'nama.required' => 'Nama Wajib di isi',
          'nama.min' => 'Nama Terlalu Pendek',
          'subjek.required' => 'Subjek Wajib di isi',
          'subjek.min'  => 'Subjek Terlalu Pendek',
          'email.required'  => 'Email Wajib di isi',
          'email.email'  => 'Email Format email tidak sesuai',
          'pesan.required'  => 'Pesan Wajib di isi',
          'pesan.min' => 'Pesan Terlalu Pendek',
          'pesan.max' => 'Pesan Terlalu Panjang',
          'telp.numeric' => 'Telp Hanya Nomor'
        ];

        $validator = Validator::make($request->all(), [
          'nama' => 'required|min:3',
          'subjek' => 'required|min:5',
          'email' => 'required|email',
          'pesan' => 'required|min:10|max:200',
          'telp'  => 'numeric'
        ], $message);


        if($validator->fails())
        {
          return redirect()->route('frontend.contact')->withErrors($validator)->withInput();
        }

        $save = new Inbox;
        $save->nama = $request->nama;
        $save->telp = $request->telp;
        $save->email = $request->email;
        $save->subjek = $request->subjek;
        $save->pesan = $request->pesan;
        $save->save();

        return redirect()->route('frontend.contact')->with('berhasil', 'Terima Kasih Telah Menghubungi Kami.');

    }



}
