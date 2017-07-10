<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    protected $table = 'amd_kontak';

    protected $fillable = ['kantor_kategori','alamat','maps','email','no_telp','flag_mancanegara','actor'];
}
