<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    // use HasFactory;
    protected $table = 'absensi';
     protected $fillable = [
        'jadwal_id',
        'mahasiswa_id',
        'tanggal_absen',
        'dosen_jadwal_id',
        'status_absensi',


    ];
    public function dosen_jadwal()
    {

        return $this->belongsTo(Dosen_jadwal::class, 'jadwal_id', 'id');
    }
     public function mahasiswa()
    {

        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id', 'id');
    }

}
