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

        $kelas = Kelas::with('matakuliah')->find($mk);
        // $mkk = Matakuliah::find($kelas->id);

        // dd($kelas);



        $km = Kelas::with('matakuliah', 'dosen')->where('id', $m->kelas_id)->first();

        // dd($km);
        return view('mahasiswa.jadwal', compact('km'));
    }
    public function detailKelas($id)

    {


        $kel = Mahasiswa::with('kelas')->where('user_id', Auth::user()->id)->first();
        // $pertemuan =  Dosen_jadwal::with('absensi', 'matakuliah')->where('dosen_mk', $id)->get();
        $pertemuan = Dosen_jadwal::with('kelas', 'absensi')->where('dosen_id', $id)->get();
        // dd($kel);
        // absensi
        $mahas = Mahasiswa::where('user_id', Auth::user()->id)->first();
        $dos = Dosen_jadwal::where('dosen_id', $id)->first();

        $absen = Absensi::with('dosen_jadwal')->where('mahasiswa_id', $mahas->id)->where('dosen_jadwal_id', $id)->get();
        // dd($pertemuan);

        return view('mahasiswa.jadwalDetail', compact('pertemuan', 'kel', 'absen'));
    }


    public function absensiMahasiswaByJadwalDosen($id)

    {
        $ka = Auth::user()->id;
        //  $m = Mahasiswa::where('user_id', $ka)->get();
        $m = Mahasiswa::with('user')->where('user_id',  Auth::user()->id)->first();

        $absensi = Absensi::with('dosen_jadwal')->where('jadwal_id', $id)->where('mahasiswa_id', $m->id)->get();
        // dd($m);

        $absens = Dosen_jadwal::find($id);



        return view('mahasiswa.detailAbsensi', compact('absensi', 'absens'));
    }
    public function modul($id)
    {


        $modul = Dosen_jadwal::with('kelas')->find($id);
        $materi = Materi::with('dosen_jadwal')->where('dosen_jadwal_id', $id)->get();
        // dd($materi);
        return view('mahasiswa.readModul', compact('modul', 'materi'));
    }

    public function cekabsenMhs($id)
    {
        // $k = Matakuliah::with('kelas', 'dosen')->where('kelas_id', $id)->get();

        $mahas = Mahasiswa::where('user_id', Auth::user()->id)->first();
        $k = Absensi::where('mahasiswa_id', $mahas->id)->where('dosen_jadwal_id', $id)->orderBy('jadwal_id', 'DESC')->get();
        // dd($k);

        return view('mahasiswa.cek-absen', compact('mahas', 'k'));
    }

    public function absenMhs($id)

    {

        $absensi = Dosen_jadwal::with('absensi', 'matakuliah')->where('id', $id)->find($id);
        $m = Mahasiswa::with('kelas')->where('user_id', Auth::user()->id)->first();
        $date = Carbon::now();
        $absensiii = Dosen_jadwal::find($id);


            // $detailJ = Dosen_jadwal::with('absensi')->where('id', $id)->find($id);
        return view('mahasiswa.absensi', compact('absensi', 'm', 'date', 'absensiii'));
    }
    public function absenproses(Request $request, $id)

    {

        $p = Absensi::where('jadwal_id', $id)->where('mahasiswa_id', $request->mahasiswa_id)->first();
        $mahas = Mahasiswa::where('user_id', Auth::user()->id)->first();

        $p->update([

            // 'jadwal_id' => $request->jadwal_id,
            // 'mahasiswa_id' => $request->mahasiswa_id,
            'tanggal_absen' => $request->tanggal_absen,
            // 'dosen_jadwal_id' => $request->dosen_jadwal_id,
            'status_absensi' => 1


        ]);
        // $mk = Matakuliah::where('nama_mk', 'Pemrograman Internet')->first();
        // $matakuliah = Absensi::where('dosen_jadwal_id', $mk->dosen_id)->first();
        // dd($matakuliah);
        // dd($request->all());
        return redirect('detailkelasmahasiswa/'. $request->dosen_id)->with('success', 'Success! Melakukan Absen');


        // dd($date);
        // $dosen = Kelas::with('dosen')->find($mah);
        // $m = Matakuliah::with('kelas')->find($id);
        // $detailJ = Dosen_jadwal::with('absensi')->where('id', $id)->find($id);
        // return view('mahasiswa.absensi', compact('absensi', 'm', 'date'));
    }
}
