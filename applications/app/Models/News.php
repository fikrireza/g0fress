<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'amd_news';

    protected $fillable = ['title_en','title_id','deskripsi_en','deskripsi_id','img_url','img_alt',
                            'video_url','show_homepage','tanggal_post','flag_publish','slug'];
}
