<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use App\Models\Kelas;
use App\Models\Dosen;
use App\Models\Absensi;
use App\Models\Dosen_jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class MahasiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        // $idd = 2;
        // $dosen = Dosen::with('user')->where('user_id', Auth::user()->id)->get();
        $m = Mahasiswa::with('kelas')->where('user_id', Auth::user()->id)->first();
        // dd($m);
        return view('mahasiswa.index', compact('m'));
    }
    public function jadwal()
    {
        // $id = 2;
        // $dosen = Dosen::with('user')->where('user_id', Auth::user()->id)->get();
        $m = Mahasiswa::with('kelas')->where('user_id', Auth::user()->id)->first();
        $mk = $m->kelas['id'];

        $k = Matakuliah::with('kelas', 'dosen')->where('kelas_id', $mk)->get();

        // dd($k    );
        return view('mahasiswa.jadwal', compact('k'));
    }
    public function absenMhs($id)

    {

        $absensi = Dosen_jadwal::with('absensi', 'matakuliah')->where('id', $id)->find($id);
        $m = Mahasiswa::with('kelas')->where('user_id', Auth::user()->id)->first();
        $date = Carbon::now();

        // dd($date);
        // $dosen = Kelas::with('dosen')->find($mah);
        // $m = Matakuliah::with('kelas')->find($id);
        // $detailJ = Dosen_jadwal::with('absensi')->where('id', $id)->find($id);
        return view('mahasiswa.absensi', compact('absensi', 'm', 'date'));
    }
    public function absenproses(Request $request, $id)

    {

        $p = Dosen_jadwal::with('matakuliah', 'kelas')->findOrfail($id);
        // $m = Kelas::with('mahasiswa', 'dosen_jadwal')findOrfail($id);


        $p->absensi()->create([

            'jadwal_id' => $request->jadwal_id,
            'mahasiswa_id' => $request->mahasiswa_id,
            'tanggal_absen' => $request->tanggal_absen,
            'dosen_jadwal_id' => $request->dosen_jadwal_id


        ]);
        // dd($request->all());
            return (redirect('jadwal'));


        // dd($date);
        // $dosen = Kelas::with('dosen')->find($mah);
        // $m = Matakuliah::with('kelas')->find($id);
        // $detailJ = Dosen_jadwal::with('absensi')->where('id', $id)->find($id);
        // return view('mahasiswa.absensi', compact('absensi', 'm', 'date'));
    }
    public function detailKelas($id)

    {
        // $d = Dosen::find(1);
        // $m = Mahasiswa::with('kelas')->where('user_id', Auth::user()->id)->first();

        // $kel = $m->kelas['id'];

        // $idd = 16;
        // $d = Dosen_jadwal::where('dosen_id', $id)->get();
        //  $kelas = Dosen_jadwal::with('kelas')->where('kelas_id', $kel)->get();
        $pertemuan =  Dosen_jadwal::with('absensi', 'matakuliah')->where('dosen_mk', $id)->get();
        $a =  Mahasiswa::all();

        // $aa =  $a->nama_mahasiswa;
        // foreach ($a as $u) {
        //     $a = Absensi::create([
        //         'mahasiswa_id' => $u->id,



        //     ]);
        //     // echo $u->nama_mahasiswa;
        // }

        // $aa = $a['nama_mahasiswa'];


        // $aa = $a->get();
        // $absensi = Absensi::with('mahasiswa', 'dosen_jadwal')->where('mahasiswa_id', NULL)->find($idd);
        // $absen = Absensi::all();
        // dd($a);

        return view('mahasiswa.jadwalDetail', compact('pertemuan'));
    }
}
