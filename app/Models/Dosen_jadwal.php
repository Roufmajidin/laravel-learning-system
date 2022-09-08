<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen_jadwal extends Model
{
    // use HasFactory;
    protected $table = 'dosen_jadwal';
     protected $fillable = [
        'tanggal',
        'dosen_id',
        'dosen_mk',
        'pertemuan_ke',
        'jam_mk',
        'kelas_id',
        'file_pertemuan',
        'detail_materi',


    ];
    public function dosen()
    {

        return $this->belongsTo(Dosen::class);
    }
     public function matakuliah()
    {

        return $this->belongsTo(Matakuliah::class, 'dosen_mk', 'id');
    }
    public function kelas()
    {

        return $this->belongsTo(Kelas::class, 'kelas_id', 'id');
    }
    public function absensi()
    {

        return $this->belongsTo(Absensi::class, 'jadwal_id', 'id');
    }
    public function materi()
    {

        return $this->hasMany(Materi::class);
    }


}
