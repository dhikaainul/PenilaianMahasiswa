<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenilaiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penilaians', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_siswa');
            $table->unsignedBigInteger('id_mapel');
            $table->double('nilai');
            $table->double('nilai_setara');
            $table->char('nilai_huruf', 2);
            $table->timestamps();
            $table->foreign('id_siswa')->references('id')->on('siswas');
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
        Schema::dropIfExists('penilaians');
    }
}
