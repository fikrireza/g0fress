<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FacebookApp extends Model
{
    protected $table = 'amd_facebook_app';

    protected $fillable = ['page_id','app_id','app_secret','default_access_token'];
}
