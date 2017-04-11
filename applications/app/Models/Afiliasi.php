<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Afiliasi extends Model
{
    protected $table = 'amd_afiliasi';

    protected $fillable = ['nama_afiliasi','img_url','img_alt','tanggal_post','flag_publish'];
}
