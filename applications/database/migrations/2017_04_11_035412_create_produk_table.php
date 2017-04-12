<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amd_produk', function(Blueprint $table){
          $table->increments('id');
          $table->integer('kategori_id')->unsigned();
          $table->string('nama_produk');
          $table->text('deskripsi_en');
          $table->text('deskripsi_id');
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
