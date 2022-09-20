<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use App\Models\Kelas;
use App\Models\Dosen;
use App\Models\Absensi;
use App\Models\Coba;
use App\Models\Dosen_jadwal;
use App\Models\Krs;
use App\Models\Materi;
use App\Models\Semester;
use App\Models\Tugas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;
use Str;
// use Carbon\Carbon;

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


        $auth = Auth::user()->id;


        $km = Krs::with('mahasiswa', 'matakuliah')
        ->where('mahasiswa_id', $auth)
        ->where('status', 1)
        ->get();
        // dd($km);

        // dd($km);
        return view('mahasiswa.jadwal', compact('km'));
    }
    public function detailKelas($id)

    {
        // Paginator;

        $id = decrypt($id);
        // dd($id);
        $kel = Mahasiswa::with('kelas')->where('user_id', Auth::user()->id)->first();
        // $pertemuan =  Dosen_jadwal::with('absensi', 'matakuliah')->where('dosen_mk', $id)->get();
        $pertemuan = Dosen_jadwal::with('kelas', 'absensi')->where('dosen_id', $id)->get();
        // dd($id);
        // absensi
        $mahas = Mahasiswa::where('user_id', Auth::user()->id)->first();
        $dos = Dosen_jadwal::where('dosen_id', $id)->first();

        $absen = Absensi::with('dosen_jadwal')->where('mahasiswa_id', $mahas->id)->where('dosen_jadwal_id', $id)->orderBy('id', 'DESC')->paginate(3);
        $absen_urut = Absensi::with('dosen_jadwal')->where('mahasiswa_id', $mahas->id)->where('dosen_jadwal_id', $id)->orderBy('id', 'ASC')->get();
        // dd($pertemuan);

        return view('mahasiswa.jadwalDetail', compact('pertemuan', 'kel', 'absen', 'id', 'absen_urut'));
    }

    public function ajaxPage(Request $request)
    {
        if ($request->ajax()) {
            $id = 25;
            $kel = Mahasiswa::with('kelas')->where('user_id', Auth::user()->id)->first();
            // $pertemuan =  Dosen_jadwal::with('absensi', 'matakuliah')->where('dosen_mk', $id)->get();
            $pertemuan = Dosen_jadwal::with('kelas', 'absensi')->where('dosen_id', $id)->get();
            // dd($kel);
            // absensi
            $mahas = Mahasiswa::where('user_id', Auth::user()->id)->first();
            $dos = Dosen_jadwal::where('dosen_id', $id)->first();

            $absen = Absensi::with('dosen_jadwal')->where('mahasiswa_id', $mahas->id)->where('dosen_jadwal_id', $id)->orderBy('id', 'DESC')->paginate(3);
            $absen_urut = Absensi::with('dosen_jadwal')->where('mahasiswa_id', $mahas->id)->where('dosen_jadwal_id', $id)->orderBy('id', 'ASC')->get();
            return view('mahasiswa.jadwalDetail', compact('pertemuan', 'kel', 'absen', 'id', 'absen_urut'))->render();
        }
    }


    public function absensiMahasiswaByJadwalDosen($id)

    {
        $id = decrypt($id);
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

        $id = decrypt($id);

        $modul = Dosen_jadwal::with('kelas')->find($id);
        $materi = Materi::with('dosen_jadwal')->where('dosen_jadwal_id', $id)->get();
        // dd($materi);
        return view('mahasiswa.readModul', compact('modul', 'materi'));
    }

    public function cekabsenMhs($id)
    {
        $id = decrypt($id);
        $mahas = Mahasiswa::where('user_id', Auth::user()->id)->first();
        $k = Absensi::where('mahasiswa_id', $mahas->id)->where('dosen_jadwal_id', $id)->orderBy('jadwal_id', 'DESC')->get();
        // dd($k);

        return view('mahasiswa.cek-absen', compact('mahas', 'k'));
    }

    public function absenMhs($id)

    {
        $id = decrypt($id);
        $absensi = Dosen_jadwal::with('absensi', 'matakuliah')->where('id', $id)->find($id);
        $m = Mahasiswa::with('kelas')->where('user_id', Auth::user()->id)->first();
        $date = Carbon::now();
        $absensiii = Dosen_jadwal::find($id);

        // dd($id);

        // $detailJ = Dosen_jadwal::with('absensi')->where('id', $id)->find($id);
        return view('mahasiswa.absensi', compact('absensi', 'm', 'date', 'absensiii'));
    }
    public function absenproses(Request $request, $id)

    {
        $id = decrypt($id);
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
        return redirect('detailkelasmahasiswa/' . $request->dosen_id)->with('success', 'Success! Melakukan Absen');


        // dd($date);
        // $dosen = Kelas::with('dosen')->find($mah);
        // $m = Matakuliah::with('kelas')->find($id);
        // $detailJ = Dosen_jadwal::with('absensi')->where('id', $id)->find($id);
        // return view('mahasiswa.absensi', compact('absensi', 'm', 'date'));
    }
    public function lihatMateri($id)
    {
        $id = decrypt($id);
        $materi = Materi::with('dosen_jadwal')->where('dosen_jadwal_id', $id)->get();
        $pertemuan = Dosen_jadwal::find($id);

        $auth = Auth::user()->id;
        $tugas = Tugas::where('mahasiswa_id', $auth)->where('dosen_id', $pertemuan->dosen_id)->get();
        //
        // $qr = 100;
        // $urut =  Absensi::find($id);
        // $urut_id = $urut->jadwal_id;
        // $auth = Auth::user()->id;

        // $absensi = Absensi::where('mahasiswa_id', Auth::user()->id)->where('jadwal_id', $urut)->first();
        // $p = $absensi->jadwal_id;
        // dd($tugas);
        return view('mahasiswa.detail-materi', compact('materi', 'pertemuan', 'tugas'));
    }
    public function coba(Request $request)
    {
        $qr = $request->qr_code;
        $jd = $request->id_jadwal;
        // $decrpt = decrypt($qr);
        // $data = '359';
        $matakuliah = Matakuliah::where('nama_mk', 'Mobile Apps Programming')->first();
        $nama_mk = $matakuliah->dosen_id;
        $auth = Auth::user()->id;
        $urut =  Absensi::where('jadwal_id', $qr)->first();
        $urut_id = $urut->id;
        $absensi = Absensi::where('mahasiswa_id', $auth)->where('jadwal_id', $qr)->first();
        $p = $absensi->jadwal_id;
        // $p = Absensi::where('jadwal_id', $qr)->first();
        // $pp =  $p->jadwal_id;
        $tanggal_absens = Carbon::now();
        if ($qr == $jd) {
            $absensi->update([

                'status_absensi' => 1,
                'tanggal_absen' => $tanggal_absens,


            ]);
            return response()->json([
                'status' => 200,

            ]);
        } else {
            return response()->json([
                'status' => 400,

            ]);
        }






        // dd($qr);
        // return redirect()->back();
    }
    public function cobaC()
    {


        // $qr = $request->qr_code;
        $data = Str::random(20);

        // $absensi = Absensi::find($request->qr_code);
        // 5eeccf92-d54e-4b24-b8f4-cf8c3b0d7d54
        // $dosen = Dosen::find(25);
        // dd($dosen);
        // $u = User::find(11);
        // $u = Auth::user()->password;
        // $p = Dosen::find(26);
        //     $p->update([

        //     'id' => $data,

        //     ]);
        // dd($u);
    }
    public function tet()
    {




        $dosen = Dosen::find(713470768);

        $r = rand();
        // $r2 = rand();
        // $dosen->update([
        // 'id' => $r,
        // 'user_id' => Str::uuid()

        // ]);
    }
    public function kumpulkanTugas(Request $request)
    {




        $tugas = new Tugas;
        $auth_mhs = Auth::user()->id;
        $mahasiswa = Mahasiswa::where('user_id', $auth_mhs)->first();
        $file_nm = $request->file->getClientOriginalName();
        $image = $request->file->storeAs('thumbnail', $file_nm);

        $tugas->create([
            'mahasiswa_id' => $mahasiswa->user_id,
            'materi_id' => $request->id,
            'dosen_jadwal_id' => $request->dosen_jadwal_id,
            'dosen_id' => $request->dosen_id,
            'file' => $file_nm,
            'ket' => $request->ket,
            'kelas_id' => $request->kelas_id,



        ]);
        return redirect()->back();
    }
    public function aktivitasMhs($id)
    {

        $id = decrypt($id);
        $auth = Auth::user()->id;
        $absen = Absensi::where('dosen_jadwal_id', $id)->where('mahasiswa_id', $auth)->get();
        $mk = Matakuliah::where('dosen_id', $id)->first();
        $dt = Dosen::find($id);
        dd($dt);
        $tugas = Tugas::with('materi')->where('');
        // dd($absen);

        return view('mahasiswa.detail-aktivitas', compact('absen', 'mk'));
    }
    public function deleteProses($id)
    {

        $id = decrypt($id);
        $tugas = Tugas::find($id);
        $tugas->delete();

        return redirect('lihat-materi/' . decrypt($id));
    }
    public function krsMhs(){

    $auth = Auth::user()->id;
    $mk = Matakuliah::get();
    $mhs = Mahasiswa::where('user_id', $auth)->first();
    $smt = Semester::find($mhs->semester_id);
    return view('mahasiswa.reg-krs', compact('mk', 'mhs', 'smt'));
    }
    // store

    public function krsMhsProses(Request $request){

    $auth = Auth::user()->id;
    // $mk = Matakuliah::get();
    $mhs = Mahasiswa::where('user_id', $auth)->first();
    // $smt = Semester::find($mhs->semester_id);
    $p = new Krs;
    foreach ($request->krsMK as $key => $name) {

            $p->create([

                'mahasiswa_id' => $request->mahasiswa_id,
                'matakuliah_id' => $request->krsMK[$key],
                //mahasiswa baru
                'status' => 0

            ]);

            // $smtplus = $request->smt + 1;
            // $mhs->update([


            // 'semester_id' => $smtplus


            // ]);
    }
    return redirect('/jadwal');
    }
}
