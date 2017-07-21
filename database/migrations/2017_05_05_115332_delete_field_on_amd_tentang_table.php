<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteFieldOnAmdTentangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('amd_tentang', function (Blueprint $table) {
          $table->dropColumn(['tentang_ID', 'tentang_EN', 'visi_judul_ID', 'visi_judul_EN', 'misi_judul_ID', 'misi_judul_EN']);
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
