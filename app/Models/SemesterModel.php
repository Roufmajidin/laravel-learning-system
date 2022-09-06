<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SemesterModel extends Model
{
    use HasFactory;
    protected $table ='semester';
    protected $fillable = ['semester'];
}
