<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    // use HasFactory;
    protected $table = 'mahasiswa';
    public function kelas()
    {

        return $this->belongsTo(Kelas::class, 'kelas_id', 'id');
    }
    public function user()
    {

        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    // ngambang dulu yang ini
    public function hasilStudi()
    {

        return $this->hasMany(HasilStudi::class);
    }
     public function ujianMhs()
    {

        return $this->hasMany(UjianMhs::class);
    }

}
