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
        Schema::create('hasil_studis', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('matakuliah_id');
            $table->bigInteger('mahasiswa_id');
            $table->string('nilai_uts');
            $table->string('nilai_uas');
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
