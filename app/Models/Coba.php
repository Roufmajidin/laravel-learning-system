<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coba extends Model
{
    use HasFactory;
     protected $table = 'coba';
     protected $fillable = [
        'mahasiswa_id',


    ];
}
