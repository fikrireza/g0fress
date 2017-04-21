<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SliderHome extends Model
{
    protected $table = 'amd_slider_home';

    protected $fillable = ['img_url', 'img_alt','posisi','tanggal_post','flag_publish'];


}
