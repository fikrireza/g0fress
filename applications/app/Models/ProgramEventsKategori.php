<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramEventsKategori extends Model
{
    protected $table = 'amd_program_events_kategori';

    protected $fillable = ['judul_kategori_ID','judul_kategori_EN','img_url','img_alt','flag_publish','slug','actor'];
}
