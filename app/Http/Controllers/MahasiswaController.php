<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use App\Models\Kelas;
use App\Models\Dosen;
use App\Models\Absensi;
use App\Models\Dosen_jadwal;
use App\Models\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

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

        // $absensi = Absensi::with('mahasiswa', 'dosen_jadwal')->where('tanggal_absen', NULL)
        // dd($k    );
        return view('mahasiswa.jadwal', compact('k'));
    }
    public function detailKelas($id)

    {


        $kel = Mahasiswa::with('kelas')->where('user_id', Auth::user()->id)->get('kelas_id');
        // $pertemuan =  Dosen_jadwal::with('absensi', 'matakuliah')->where('dosen_mk', $id)->get();
        $pertemuan = Dosen_jadwal::with('kelas')->where('dosen_id', $id)->get();
        // dd($kel);
        return view('mahasiswa.jadwalDetail', compact('pertemuan'));
    }


    public function absensiMahasiswaByJadwalDosen($id)

    {
        $ka = Auth::user()->id;
        //  $m = Mahasiswa::where('user_id', $ka)->get();
        $m = Mahasiswa::with('user')->where('user_id',  Auth::user()->id)->first();

        $absensi = Absensi::with('dosen_jadwal')->where('jadwal_id', $id)->where('mahasiswa_id', $m->id)->get();
        // dd($m);

        $absens = Dosen_jadwal::find($id);



        //  if(DB::table('absensi')->where('jadwal_id', $id)->where('mahasiswa_id', $m->id)->doesntExist()){
        //     echo "tidak ada";

        // }
        // dd($absens);
        return view('mahasiswa.detailAbsensi', compact('absensi', 'absens'));
    }
    public function modul($id)
    {


        $modul = Dosen_jadwal::with('kelas')->where('dosen_id', $id)->get();
        $materi = Materi::with('dosen_jadwal')->where('dosen_jadwal_id', $id)->get();

        return view('mahasiswa.readModul', compact('modul', 'materi'));
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


        $p->absensi()->update([

            'jadwal_id' => $request->jadwal_id,
            'mahasiswa_id' => $request->mahasiswa_id,
            'tanggal_absen' => $request->tanggal_absen,
            'dosen_jadwal_id' => $request->dosen_jadwal_id,
            'status_absensi' => 1


        ]);
        // dd($request->all());
        return redirect('absensi/'. $request->jadwal_id);


        // dd($date);
        // $dosen = Kelas::with('dosen')->find($mah);
        // $m = Matakuliah::with('kelas')->find($id);
        // $detailJ = Dosen_jadwal::with('absensi')->where('id', $id)->find($id);
        // return view('mahasiswa.absensi', compact('absensi', 'm', 'date'));
    }
}
