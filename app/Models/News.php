<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'amd_news';

    protected $fillable = ['judul_ID','judul_EN','deskripsi_ID','deskripsi_EN','img_url','img_alt',
                            'video_url','show_homepage','tanggal_post','flag_publish','slug','actor'];
}
