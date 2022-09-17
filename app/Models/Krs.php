<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Krs extends Model
{
    // use HasFactory;
    // use HasFactory;
    protected $table = 'krs';
    protected $fillable = ['id', 'nama_mk', 'mahasiswa_id', 'matakuliah_id', 'status'];
    public function mahasiswa()
    {

        return $this->belongsTo(Mahasiswa::class);
    }
    public function matakuliah()
    {

        return $this->belongsTo(Matakuliah::class);
    }
}
