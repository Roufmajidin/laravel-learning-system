<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UjianMhs extends Model
{
    use HasFactory;
    protected $table = 'ujianMhs';
    protected $fillable = ['mahasiswa_id', 'matakuliah_id', 'file_jawaban', 'soal_ujian'];


}
