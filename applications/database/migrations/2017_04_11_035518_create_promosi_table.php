<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromosiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amd_promosi', function(Blueprint $table){
          $table->increments('id');
          $table->string('judul_promosi_en');
          $table->string('judul_promosi_id');
          $table->text('deskripsi_en');
          $table->text('deskripsi_id');
          $table->string('img_url');
          $table->string('img_alt');
          $table->text('video_url');
          $table->integer('show_homepage')->unsigned()->default(0);
          $table->date('tanggal_post');
          $table->integer('flag_publish')->unsigned()->default(0);
          $table->integer('slug');
          $table->integer('actor');
          $table->imestamps();
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
