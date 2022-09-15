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
        Schema::create('hasil_studi', function (Blueprint $table) {
            $table->uuid();
            $table->string('matakuliah_id');
            $table->string('mahasiswa_id');
            $table->string('semester_id');
            $table->string('dosen_id');
            // $table->string('nilai_uts');
            $table->string('nilai_uts');
            $table->string('keterangan');
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
        Schema::dropIfExists('hasil_studis');
    }
};
