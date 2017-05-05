<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    protected $table = 'amd_social_media';

    protected $fillable = ['nama','img_url','url_account','flag_publish'];
}
