<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    // use HasFactory;
     protected $fillable = [
        'nama_mk',
        'mk_dosen',


    ];

    public function user()
    {

        return $this->belongsTo(User::class);
    }

    public function dosen_jadwal()
    {

        return $this->hasMany(Dosen_jadwal::class, 'dosen_id', 'id');
    }

}
