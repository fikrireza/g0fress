<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Services\SocialAccountService;

use Socialite;

class SocialAuthController extends Controller
{

    public function redirectFB(){
      return Socialite::driver('facebook')->redirect();
    }

    public function callBackFB(SocialAccountService $service)
    {
      $user = $service->createOrGetUser(Socialite::driver('facebook')->user());

      $token = $user->getUserByToken;
      $tokenSecret = $user->tokenSecret;

      dd($token);

      auth()->login($user);

      return redirect()->to('/home');
    }
}
