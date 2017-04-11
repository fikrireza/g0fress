<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'amd_produk';

    protected $fillable = ['kategori_id','nama_produk_en','nama_produk_id','deskripsi_en',
                            'deskripsi_id','img_url','img_alt','tanggal_post','flag_publish','slug'];
}
