<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilStudi extends Model
{
    use HasFactory;
    protected $table = 'hasil_studi';
    protected $fillable = ['mahasiswa_id', 'dosen_id', 'semester_id',  'matakuliah_id', 'nilai_uts', 'nilai_uas', 'keterangan', 'semester_id'];
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id', 'user_id');
    }
    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class);
    }
    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }
}
