<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    // use HasFactory;
    protected $table = 'mahasiswa';
    protected $fillable = ['user_id', 'nama_mahasiswa', 'semester_id', 'nim', 'alamat', 'kelas_id', 'foto_mahasiswa', 'keterangan'];
    public function kelas()
    {

        return $this->belongsTo(Kelas::class);
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
     public function semester()
    {

        return $this->belongsTo(semester::class);
    }
     public function krs()
    {

        return $this->hasMany(Krs::class);
    }
}
