<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramEvents extends Model
{
    protected $table = 'amd_program_events';

    protected $fillable = ['program_events_kategori_id','judul_promosi_ID','judul_promosi_EN','deskripsi_ID','deskripsi_EN',
                            'img_url','img_alt','img_thumb','img_alt_thumb','video_url','show_homepage','tanggal_post',
                            'flag_publish','slug','actor'];
}
