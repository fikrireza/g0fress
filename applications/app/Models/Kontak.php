<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    protected $table = 'amd_kontak';

    protected $fillable = ['alamat','email','no_telp'];
}
