<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\Role;
use App\Models\LogAkses;

use Auth;
use Hash;
use DB;
use Mail;
use Validator;

class UserController extends Controller
{

    public function index()
    {
        $getUsers = User::where('role_id', '!=', 3)->where('role_id', '!=', 0)->get();

        return view('backend.user.index', compact('getUsers'));
    }

    public function reset($id)
    {
        $getUser = User::find($id);

        if(!$getUser){
          abort('backend.errors.404');
        }

        $getUser->password = Hash::make(12345678);
        $getUser->save();

        if($getUser->id == Auth::user()->id){
            auth()->logout();
        }

        $data = array([
            'name' => $getUser->name,
            'email' => $getUser->email,
            'password' => 12345678
          ]);

        Mail::send('backend.email.reset', ['data' => $data], function($message) use ($data) {
          $message->from('administrator@gofress.co.id', 'Administrator')
                  ->to($data[0]['email'], $data[0]['name'])
                  ->subject('Reset Password Akun CMS Gofress');
        });

        return redirect()->route('users.index')->with('berhasil', 'Berhasil Me Reset Password '.$getUser->name);
    }

    public function newUser(Request $request)
    {
        $message = [
          'name.required' => 'Wajib di isi',
          'email.required' => 'Wajib di isi',
          'email.email' => 'Format email',
          'email.unique' => 'Email sudah dipakai',
        ];

        $validator = Validator::make($request->all(), [
          'name' => 'required',
          'email' => 'required|email|unique:amd_users'
        ], $message);

        if($validator->fails())
        {
          return redirect()->route('users.index')->withErrors($validator)->withInput();
        }


        DB::transaction(function() use($request){
          $confirmation_code = str_random(30).time();
          $user = new User;
          $user->name = $request->name;
          $user->avatar = 'userdefault.png';
          $user->email = $request->email;
          $user->password = Hash::make(12345678);
          $user->confirmed = 0;
          $user->confirmation_code = $confirmation_code;
          $user->role_id = 2;
          $user->save();

          $data = array([
              'name' => $request->name,
              'email' => $request->email,
              'confirmation_code' => $confirmation_code
            ]);

          Mail::send('backend.email.confirm', ['data' => $data], function($message) use ($data) {
            $message->to($data[0]['email'], $data[0]['name'])->subject('Aktifasi Akun CMS Gofress');
          });

        });

        return redirect()->route('users.index')->with('berhasil', 'Akun baru sudah dibuat, cek '.$request->email.' untuk verifiakasi');

    }

    public function verify($confirmation_code)
    {
        $getUser = User::where('confirmation_code', $confirmation_code)->first();

        if(!$getUser){
          abort('errors.404');
        }

        return view('backend.user.verify', compact('getUser'));
    }

    public function store(Request $request)
    {
        $message = [
          'password.required' => 'Wajib di isi',
          'password.max' => 'Password Terlalu Panjang',
          'password.min' => 'Password Terlalu Pendek',
        ];

        $validator = Validator::make($request->all(), [
          'password' => 'required|min:8|max:20',
        ], $message);

        if($validator->fails())
        {
          return redirect()->route('verify.index', ['confirmation_code' => $request->confirmation_code])->withErrors($validator)->withInput();
        }

        $user = User::where('confirmation_code', $request->confirmation_code)->first();

        if(!$user){
          abort('errors.404');
        }

        $user->password = Hash::make($request->password);
        $user->confirmed = 1;
        $user->confirmation_code = null;
        $user->login_count = 1;
        $user->update();

        auth()->login($user);

        return redirect()->route('profile.index')->with('berhasil', 'Selamat Datang '.$user->name.' Segera ganti password anda');

    }

}
