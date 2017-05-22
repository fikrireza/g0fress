<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Distribution extends Model
{
    protected $table = 'amd_distribution';

    protected $fillable = ['id_provinsi','nama_kota', 'flag_publish', 'actor'];

}
