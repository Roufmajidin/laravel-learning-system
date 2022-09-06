<?php

namespace App\Http\Controllers;

use App\Models\HasilStudi;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HasilStudiController extends Controller
{
    //
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
    // $a = "halo";
    // dd($a);

    // $mh = Mahasiswa::with('hasilStudi')->where('user_id', Auth::user()->id)->first();
    $semester1 = 1;
    $semester2 = 2;
    $mhasilSemester1 = HasilStudi::with('mahasiswa', 'matakuliah', 'semester')->where('mahasiswa_id', Auth::user()->id)->where('semester_id', $semester1)->get();
    $mhasilSemester2 = HasilStudi::with('mahasiswa', 'matakuliah', 'semester')->where('mahasiswa_id', Auth::user()->id)->where('semester_id', $semester2)->get();

    // dd($mh);

    return view('mahasiswa.hasilStudi', compact('mhasilSemester1', 'mhasilSemester2'));

    }
}
