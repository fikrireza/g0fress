<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promosi extends Model
{
    protected $table = 'amd_promosi';

    protected $fillable = ['judul_promosi_en','judul_promosi_id','deskripsi_en','deskripsi_id',
                            'img_url','img_alt','video_url','show_homepage','tanggal_post','flag_publish','slug'];
}
