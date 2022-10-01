<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role_ujian extends Model
{
    // use HasFactory;
    protected $table = 'role_ujian';
    protected $fillable = [
        'type_ujian',
        'tanggal_ujian',
        'keterangan',
    ];
}