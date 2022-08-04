<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertemuan extends Model
{
    // use HasFactory;
    protected $table = 'pertemuan';
    protected $fillable = ['id', 'pertemuan', 'nama_file'];

     public function matakuliah(){

        return $this->hasMany(Matakuliah::class);
     }

}
