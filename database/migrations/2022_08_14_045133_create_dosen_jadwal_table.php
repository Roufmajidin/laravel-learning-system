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
        Schema::create('dosen_jadwal', function (Blueprint $table) {
            $table->id();
            $table->string('tanggal');
            $table->integer('pertemuan_ke');
            $table->integer('dosen_id');
            $table->integer('dosen_mk');
            $table->string('jam_mk');
            $table->integer('kelas_id');
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
        Schema::dropIfExists('dosen_jadwal');
    }
};
