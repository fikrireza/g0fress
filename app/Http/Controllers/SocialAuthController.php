<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Services\SocialAccountService;

use Socialite;

class SocialAuthController extends Controller
{

    protected $request;

    public function __construct(Request $request) {
      $this->request = $request;
    }

    public function redirectFB(){
      return Socialite::driver('facebook')->redirect();
    }

    public function callBackFB(SocialAccountService $service, Request $request)
    {

      if (! $request->input('code')) {
          return redirect('/hello#')->withErrors('Login failed:');
      }
      
      // Cek jika user cancel the app
      if(isset($this->request['error'])) {
        return redirect()->to('/hello#');
      } else {
      // dd($service);
      // $service = new SocialAccountService();
      $user = $service->createOrGetUser(Socialite::driver('facebook')->user());
      //$user = $service->createOrGetUser(Socialite::driver($provider));

      auth()->login($user);

      return redirect()->to('/hello/pertanyaan-dari-kami#');

      // $user = $service->createOrGetUser(Socialite::driver('facebook')->user());
      //
      // auth()->login($user);
      //
      // return redirect()->to('/hello/pertanyaan-dari-kami#');
      }
    }
}
