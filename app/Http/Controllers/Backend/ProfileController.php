<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\LogAkses;

use Auth;
use Validator;
use Hash;
use Image;

class ProfileController extends Controller
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
        $getUser = User::where('id', Auth::user()->id)->first();

        return view('backend.profile.index', compact('getUser'));
    }

    public function changePassword(Request $request)
    {

        $getUser = User::where('id', $request->id)->first();

        $messages = [
          'oldpass.required' => "Isi password lama anda.",
          'newpass.required' => "Isi password baru anda.",
          'newpass.min' => "Terlalu Singkat.",
          'newpass_confirmation.required' => "Isi konfirmasi password baru anda.",
          'newpass_confirmation.confirmed' => "Password Tidak Cocok.",
        ];

        $validator = Validator::make($request->all(), [
          'oldpass' => 'required',
          'newpass' => 'required|min:8',
          'newpass_confirmation' => 'required|same:newpass'
        ], $messages);

        if ($validator->fails()) {
          return redirect()->route('profile.index')->withErrors($validator)->withInput();
        }

        if(Hash::check($request->oldpass, $getUser->password))
        {
          $getUser->password = Hash::make($request->newpass);
          $getUser->save();

          return redirect()->route('profile.index')->with('berhasil', "Berhasil mengganti password.");
        }
        else {
          return redirect()->route('profile.index')->with('erroroldpass', 'Mohon masukkan password lama anda dengan benar.');
        }
    }

    public function changeProfile(Request $request)
    {
        $message = [
          'name.required' => 'Wajib di isi',
          'email.unique' => 'Email ini sudah digunakan',
          'email.email' => 'Format harus Email',
          'avatar.image' => 'Format Gambar Tidak Sesuai',
          'avatar.max' => 'File Size Terlalu Besar',
        ];

        $validator = Validator::make($request->all(), [
          'name' => 'required',
          'email' => 'required|email|unique:amd_users,email,'.$request->id,
          'avatar' => 'image|mimes:jpeg,bmp,png|max:1000',
        ], $message);


        if($validator->fails())
        {
          return redirect()->route('profile.index')->withErrors($validator)->withInput();
        }


        $image = $request->file('avatar');

        if (!$image) {
          $update = User::find($request->id);
          $update->name = $request->name;
          $update->email = $request->email;
          $update->update();
        }else{
          $img_url = str_slug($request->name,'-'). '.' . $image->getClientOriginalExtension();
          Image::make($image)->fit(128,128)->save('images/users/'. $img_url);

          $update = User::find($request->id);
          $update->name = $request->name;
          $update->email = $request->email;
          $update->avatar  = $img_url;
          $update->update();
        }

        $log = new LogAkses;
        $log->actor = Auth::user()->id;
        $log->aksi = 'Mengubah Profile';
        $log->save();

        return redirect()->route('profile.index')->with('berhasil', 'Berhasil Mengubah Profile');
    }
}
