<?php

namespace App\Http\Controllers;

use App\Models\HasilStudi;
use App\Models\Krs;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use App\Models\Semester;
use App\Models\UjianMhs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HasilStudiController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        // $a = "halo";
        // dd($a);

        // $mh = Mahasiswa::with('hasilStudi')->where('user_id', Auth::user()->id)->first();
        $semester2 = Semester::find(2);
        $semester4 = Semester::find(4);
        $mhasilSemester1 = HasilStudi::with('mahasiswa', 'matakuliah', 'semester')->where('mahasiswa_id', Auth::user()->id)->where('semester_id', $semester2->id)->get();
        $mhasilSemester2 = HasilStudi::with('mahasiswa', 'matakuliah', 'semester')->where('mahasiswa_id', Auth::user()->id)->where('semester_id', $semester4->id)->get();

        // dd($mhasilSemester2);

        return view('mahasiswa.hasilStudi', compact('mhasilSemester1', 'mhasilSemester2'));
    }
    public function typeUjian()
    {

        return view('mahasiswa.type-ujian');
    }
    public function ujianOn($id)
    {
        $auth = Auth::user()->id;
        $type = decrypt($id);
        //1 $mhs = UjianMhs::with('mahasiswa')->where('mahasiswa_id', $auth)->get();
        $ujian = Mahasiswa::with('ujianMhs')->where('user_id', $auth)->first();

        // dd($ujian);
        $ujiane = UjianMhs::with('matakuliah')
        ->where('mahasiswa_id', $ujian->id)
        ->where('type_ujian', $type)
        ->where('status_ujian', 2)
        ->get();
        // $ujiane = Krs::with('matakuliah')->where('mahasiswa_id', $auth)->get();
        // dd($krs);

        return view('mahasiswa.ujian-online', compact('ujiane', 'type'));
    }
    public function kumpulkanJawaban($id)
    {
        $auth = Auth::user()->id;
        //1 $mhs = UjianMhs::with('mahasiswa')->where('mahasiswa_id', $auth)->get();


        $ujiane = UjianMhs::with('matakuliah')->find($id);
        $kelas_mhs = Mahasiswa::with('kelas')->where('user_id', $auth)->first();

        // dd($ujian);
        return view('mahasiswa.submit-ujian', compact('ujiane', 'kelas_mhs'));
    }

    public function storeUjian(Request $request, $id)
    {

        $file_nm = $request->file->getClientOriginalName();
        $f = $request->file->storeAs('thumbnail', $file_nm);

        $p = UjianMhs::findOrFail($id);

        $p->update([

            'matakuliah_id' => $request->matakuliah_id,
            'file_jawaban' => $f,


        ]);
        // dd(request()->all());


        return redirect('/ujian');
    }


}
