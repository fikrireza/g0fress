<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tentang extends Model
{
    protected $table = 'amd_tentang';

    protected $fillable = ['deskripsi_ID', 'deskripsi_EN', 'visi_deskripsi_ID', 'visi_deskripsi_EN', 'misi_deskripsi_ID', 'misi_deskripsi_EN', 'img_url', 'img_alt', 'slug', 'actor'];


}
