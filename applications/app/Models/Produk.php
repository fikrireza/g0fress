<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'amd_produk';

    protected $fillable = ['kategori_id','nama_produk','deskripsi_ID','deskripsi_EN','ingredient',
                            'nutrition_fact','img_url','img_alt','tanggal_post','flag_publish','slug','actor'];
}
