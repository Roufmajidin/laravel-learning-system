<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesan_dosen extends Model
{
    use HasFactory;
    protected $table= 'pesan_dosen';
    protected $fillable = [
    'id',
    'dosen_id',
    'isi_pesan',
    'keterangan'


    ];
}
