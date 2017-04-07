<?php
namespace App\Services;

use Laravel\Socialite\Contracts\User as ProviderUser;
use App\Models\SocialAccount;
use App\Models\User;

class SocialAccountService {

  public function createOrGetUser(ProviderUser $providerUser)
  {
    $account = SocialAccount::whereProvider('facebook')->whereProviderUserId($providerUser->getId())->first();
    // dd($account);
    if($account){
      $set = User::find($account->user_id);
      $set->seen = $set->seen + 1;
      $set->save();

      return $account->user;
    }
    else
    {
      $account = new SocialAccount([
        'provider_user_id' => $providerUser->getId(),
        'provider'  => 'facebook'
      ]);

      $user = User::whereEmail($providerUser->getEmail())->first();

      $email = (!empty($providerUser->getEmail())) ? $providerUser->getEmail() : str_slug($providerUser->getName()) . str_random(3) . '@gofress.co.id';

      if(!$user){
        $user = User::create([
          'email' => $email,
          'name'  => $providerUser->getName(),
          'avatar'  => $providerUser->getAvatar(),
          // 3 adalah user
          'role_id' => 3,
          'seen' => 1,
        ]);
      }

      $account->user()->associate($user);
      $account->save();

      return $user;
    }
  }
}
