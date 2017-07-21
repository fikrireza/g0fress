<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TentangGaleri extends Model
{
    protected $table = 'amd_tentang_galeri';

    protected $fillable = ['img_url', 'img_alt', 'cer_ach', 'flag_publish', 'actor'];
}
