<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

use App\Models\User;
use Validator;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logoutProcess']);
    }

    public function showLoginForm()
    {
      return view('backend.auth.login');
    }

    public function loginProcess(Request $request)
    {
        $message = [
          'email.required' => 'wajib di isi',
          'email.email' => 'wajib email',
          'password.required' => 'wajib di isi',
        ];

        $validator = Validator::make($request->all(), [
          'email' => 'required|email',
          'password' => 'required',
        ], $message);

        if($validator->fails())
        {
          return redirect()->route('login.pages')->withErrors($validator)->withInput();
        }

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'confirmed'=>1]))
        {
            $user = Auth::User();
            $set = User::find(Auth::user()->id);
            $getCounter = $set->login_count;
            $set->login_count = $getCounter+1;
            $set->save();

            if($getCounter = 0){
              return redirect()->with('firstLogin', 'Selamat Datang. Ubah Password Anda');
            }else{
              return redirect()->route('admin.dashboard');
            }
        }
        else
        {
            return redirect()->route('login.pages')->with('filedLogin', 'Periksa Kembali Email atau Password Anda.')->withInput();
        }
    }


    public function logoutProcess()
    {
      session()->flush();
      Auth::logout();
      return redirect()->route('login.pages');
    }

}
