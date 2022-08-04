<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    // use HasFactory;
    protected $table = 'kelas';
     protected $fillable = [
        'nama_kelas',
        'jam_mk',



    ];

     public function Mahasiswa()
    {

        return $this->hasMany(Mahasiswa::class);
    }
     public function dosen_jadwal()
    {

        return $this->hasMany(Dosen_jadwal::class);
    }
}
