<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    // use HasFactory;
    protected $table = 'materi';

    protected $fillable = [
        'id',
        'dosen_jadwal_id',
        'judul_materi',
        'teser_materi',
        'penugasan',


    ];
     public function dosen_jadwal()
    {

        return $this->belongsTo(Dosen_jadwal::class);
    }
}
