<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ujian_mhs', function (Blueprint $table) {
            $table->uuid();
            $table->bigInteger('matakuliah_id');
            $table->bigInteger('kelas_id');
            $table->bigInteger('dosen_id');
            $table->string('semester_id');
            $table->string('soal_ujian');
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
        Schema::dropIfExists('ujian_mhs');
    }
};
