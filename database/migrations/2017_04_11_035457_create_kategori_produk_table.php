<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKategoriProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amd_produk_kategori', function(Blueprint $table){
          $table->increments('id');
          $table->string('nama_kategori')->unique();
          $table->text('deskripsi_ID');
          $table->text('deskripsi_EN');
          $table->string('img_url');
          $table->string('img_alt');
          $table->date('tanggal_post');
          $table->integer('flag_publish')->unsigned()->default(0);
          $table->string('slug');
          $table->integer('actor')->unsigned();
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
