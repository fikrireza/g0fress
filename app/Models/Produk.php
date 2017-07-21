<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'amd_produk';

    protected $fillable = ['kategori_id','nama_produk','deskripsi_ID','deskripsi_EN','ingredient',
                            'img_url','img_alt','img_url_kanan','img_alt_kanan','img_url_kiri','img_alt_kiri','tanggal_post','flag_publish','slug','actor'];
}
