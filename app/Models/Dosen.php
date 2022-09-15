<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    // use HasFactory;
    protected $table = 'dosens';
     protected $fillable = [
        'id',
        'user_id',
        'nama_dosen',


    ];

    public function user()
    {

        return $this->belongsTo(User::class);
    }

    public function dosen_jadwal()
    {

        return $this->hasMany(Dosen_jadwal::class, 'dosen_id', 'id');
    }
    public function kelas()
    {

        return $this->belongsToMany(Kelas::class);
    }
    public function matakuliah()
    {

        return $this->belongsTo(Matakuliah::class);
    }


}
