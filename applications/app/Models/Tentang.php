<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tentang extends Model
{
    protected $table = 'amd_tentang';

    protected $fillable = ['judul_ID','judul_EN','deskripsi_EN','deskripsi_ID','img_url','img_alt','actor'];


}
