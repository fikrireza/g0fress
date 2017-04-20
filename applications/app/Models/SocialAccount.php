<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User as User;

class SocialAccount extends Model
{
    protected $table = 'amd_social_accounts';

    protected $fillable = ['user_id', 'provider_user_id', 'provider'];

    public function user(){
      return $this->belongsTo(User::class);
    }
}
