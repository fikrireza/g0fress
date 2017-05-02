<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsAmdProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('amd_produk', function(Blueprint $table){
          $table->string('img_url_kanan')->after('img_alt');
          $table->string('img_alt_kanan')->after('img_url_kanan');
          $table->string('img_url_kiri')->after('img_alt_kanan');
          $table->string('img_alt_kiri')->after('img_url_kiri');
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
