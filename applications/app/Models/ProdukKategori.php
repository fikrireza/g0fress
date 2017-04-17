<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProdukKategori extends Model
{
    protected $table = 'amd_produk_kategori';

    protected $fillable = ['nama_kategori','deskripsi_ID','deskripsi_EN','img_url','img_alt',
                            'tanggal_post','flag_publish','slug','actor'];
}
