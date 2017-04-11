<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogAkses extends Model
{
    protected $table = 'amd_log_akses';

    protected $fillable = ['actor','aksi'];
}
