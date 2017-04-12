<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriProduk extends Model
{
    protected $table = 'amd_produk_kategori';

    protected $fillable = ['nama_kategori_en','nama_kategori_id','deskripsi_en','deskripsi_id',
                            'img_url','img_alt','tanggal_post','flag_publish','slug'];
}
