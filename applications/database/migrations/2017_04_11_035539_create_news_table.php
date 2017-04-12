<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amd_news', function(Blueprint $table){
          $table->increments('id');
          $table->string('title_en');
          $table->string('title_id');
          $table->text('deskripsi_en');
          $table->text('deskripsi_id');
          $table->string('img_url');
          $table->string('img_alt');
          $table->text('video_url');
          $table->integer('show_homepage')->unsigned()->default(0);
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
