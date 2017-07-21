<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table = 'amd_banner_head';

    protected $fillable = ['img_url','img_alt','halaman','flag_publish','actor'];
}
