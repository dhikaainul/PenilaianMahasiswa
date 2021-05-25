<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsensisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absensis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('datetime');
            $table->String('status');
            $table->unsignedBigInteger('id_mapel');
            $table->String('nama_siswa');
            $table->String('kelas');
            $table->timestamps();
            $table->foreign('id_mapel')->references('id')->on('mata_pelajarans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('absensis');
    }
}
