<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UjianMhs extends Model
{
    use HasFactory;
    protected $table = 'ujianMhs';
    protected $fillable = [
        'mahasiswa_id',
        'type_ujian',
        'tanggal_ujian',
        'status_ujian',
        'matakuliah_id',
        'file_jawaban',
        'soal_ujian',
        'kelas_id',
        'dosen_id',
        'semester_id'
    ];
    public function mahasiswa()
    {

        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id', 'user_id');
    }
    public function matakuliah()
    {

        return $this->belongsTo(Matakuliah::class);
    }
    public function semester()
    {

        return $this->belongsTo(Semester::class);
    }
}