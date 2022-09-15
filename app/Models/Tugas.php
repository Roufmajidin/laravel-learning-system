<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'materi_id', 'kelas_id', 'dosen_id', 'ket', 'dosen_jadwal_id', 'file', 'mahasiswa_id'];
    protected $table = 'tugas_mhs';
    public function materi()
    {

        return $this->belongsTo(Materi::class);
    }
    public function mahasiswa()
    {

        return $this->belongsTo(Mahasiswa::class);
    }
}
