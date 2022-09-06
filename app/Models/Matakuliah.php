<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    // use HasFactory;
    protected $table = 'matakuliah';

    protected $fillable = [
        'nama_mk',
        'kelas_id',
        'dosen_id',


    ];
    public function kelas()
    {

        return $this->belongsTo(Kelas::class, 'kelas_id', 'id');
    }
     public function dosen()
    {

        return $this->belongsTo(Dosen::class);
    }
    public function pertemuan()
    {

        return $this->hasMany(Pertemuan::class, 'matakuliah_id', 'id');
    }
    public function hasilStudi()
    {

        return $this->hasMany(HasilStudi::class);
    }
}
