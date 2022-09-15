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
            $table->uuid();
            $table->string('tanggal');
            $table->integer('pertemuan_ke');
            $table->string('dosen_id');
            $table->string('dosen_mk');
            $table->string('jam_mk');
            $table->string('kelas_id');
            $table->string('file_pertemuan');
            $table->string('qr_code');
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
