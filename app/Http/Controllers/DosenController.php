<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Coba;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Dosen;
use App\Models\Matakuliah;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Pertemuan;
use App\Models\Mahasiswa;
use App\Models\Dosen_jadwal;
use App\Models\Materi;
use App\Models\UjianMhs;

use function GuzzleHttp\json_decode;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        // $idd = 2;
        // $dosen = Dosen::with('user')->where('user_id', Auth::user()->id)->get();
        $dosen = Dosen::with('dosen_jadwal')->where('user_id', Auth::user()->id)->get();
        $detailJ = Dosen_jadwal::where('dosen_id', Auth::user()->id)->get();
        // dd($dosen);
        return view('dosen.index', compact('dosen', 'detailJ'));
    }
    public function detail($id)
    {
        // $dosen = Dosen::with('kelas')->find($id);
        // $dosen = Dosen::with('kelas')->find($id);
        // $dosen_jadwal = Dosen_jadwal::with('kelas')->find($id);

        $detailJ = Dosen_jadwal::with('kelas')->where('dosen_id', Auth::user()->id)->where('kelas_id', $id)->get();

        $kelas = Kelas::find($id);
        // $mk = Matakuliah::with('kelas')->where('dosen_id', Auth::user()->id)->where('kelas_id', $id)->first();

        // $kk = Pertemuan::
        // $dosen = Dosen::with('dosen_jadwal')->where('user_id', Auth::user()->id)->get();

        // dd($detailJ);

        return view('dosen.show-kelas-dosen', compact('detailJ', 'kelas'));
    }
    public function detailKelasDosen($id)
    {

        // $matkulDosen = Matakuliah::with('kelas')->where('dosen_id', $id)->get();
        $matkulDosen = Dosen::with('kelas')->find($id);
        // $matak = Matakuliah
        // $matkulDosen = Dosen::with('kelas')->where('id', $id)->get();

        // dd($matkulDosen);
        return view('dosen.show-Mk-dosen', compact('matkulDosen'));
    }
    //kelas matakuliah
    public function pertemuan($id)
    {
        // $kelas = Kelas::with('mahasiswa')->find($id);
        // $id = Dosen::find(2);
        $absensi = Absensi::with('mahasiswa')->where('dosen_jadwal_id', $id)->get();
        // $m = Mahasiswa::where('user_id', $);
        $mah = 1;
        $detailJ = Dosen_jadwal::with('kelas')->where('dosen_id', Auth::user()->id)->get();
        // $detailJ = Kelas::find($detailJ->kelas_id);
        // $dosen = Kelas::with('mahasiswa')->where('kelas_id', $)->get();
        // $ef = $detailJ->where('kelas_id', 1);
        // $d =  1;
        // $m = Mahasiswa::with('kelas')->where('kelas_id', $d)->get();
        // $d = $detailJ->kelas;
        // dd($ef);
        // $mahas = Mahasiswa::where('kelas_id',)

        return view('dosen.absensiPertemuanKelas', compact('absensi'));
    }
    public function absen($id)
    {
        $kelas = Kelas::with('mahasiswa')->find($id);
        // $id = Dosen::find(2);
        $absensi = Absensi::with('mahasiswa', 'dosen_jadwal')->where('tanggal_absen', NULL)->find($id);
        // $m = Mahasiswa::where('user_id', $);
        // $mah = 1;
        // $dosen = Kelas::with('dosen')->find($mah);
        // $m = Matakuliah::with('kelas')->find($id);

        $detail = Dosen_jadwal::with('absensi')->where('id', $id)->find($id);

        // dd($absensi)
        return view('dosen.absensiPertemuanKelas', compact('absensi', 'detail', 'kelas'));
    }
    public function kelasAll()
    {
        // $kelas = Kelas::with('mahasiswa')->find($id);
        // $m = Dosen::with('matakuliah', 'kelas')->find($id);
        $ti2020 = 1;
        $ti2021 = 2;
        $kelas2020 = Kelas::with('mahasiswa')->find($ti2020);
        $kelas2021 = Kelas::with('mahasiswa')->find($ti2021);
        // dd($dosen);
        $p = Mahasiswa::with('kelas')->get('id');
        $a = Absensi::where('mahasiswa_id', $p);
        if (empty($a)) {
            echo $p;
        } else {
            echo "astaga";
        }
        // dd($p);
        // return view('dosen.kelas-all', compact('kelas2020', 'kelas2021'));
    }

    public function absenMhs($id)
    {
        $kelas = Kelas::with('pertemuan')->find($id);
        $absensi = Absensi::with('dosen_jadwal', 'mahasiswa')->where('jadwal_id', $id)->get();

        // dd($absensi);

        return view('dosen.absensiPertemuanKelas', compact('absensi'));
    }
    public function ingatkanAbsen($id)
    {
        /// spesifik di table absen

        // $absensi = Absensi::with('dosen_jadwal', 'mahasiswa')->where('id', $id)->first();

        //dump data ke mahasiswa table
        $mahasiswa = Mahasiswa::find($id);
        dd($mahasiswa);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createpertemuan($id)
    {
        //tambah pertemuan dosen
        // $kelas = Kelas::with('pertemuan')->find($id);
        $dosen = Dosen::with('dosen_jadwal')->where('user_id', Auth::user()->id)->first();
        $mkForUrut = Dosen_jadwal::with('matakuliah')->where('dosen_id', Auth::user()->id)->where('kelas_id', $id)->get();
        $kell = Kelas::with('mahasiswa')->get();
        $kelas = Kelas::find($id);
        $mk = Matakuliah::with('dosen')->first();

        // dd($mkForUrut);


        // dd($matkulDosen);
        return view('dosen.createPertemuan', compact('dosen', 'mk', 'kelas', 'mkForUrut'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storepertemuan(Request $request, $id)
    { {

            // tmabh pertemuan
            $request->validate(
                [

                    'dosen_id' => 'required',
                    'tanggal' => 'required',
                    'jam_mk' => 'required',


                ],
                [
                    // 'pertemuan_ke.required' => 'kode MK tidak boleh kosong',
                    'dosen_id.required' => 'Harap pilih file',
                    'tanggal.required' => 'Harap pilih file',
                    'matakuliah_id.required' => 'Harap pilih file',
                    'jam_mk.required' => 'Harap pilih file',
                ]
            );

            $file_nm = $request->file->getClientOriginalName();
            $image = $request->file->storeAs('thumbnail', $file_nm);
            // $mahasiswa = Ma
            // foreach($mahasiswa as $item)
            // $p = dosen::findOrfail($id);
            $id_kelas = $request->kelas_id;
            $kelasid = Kelas::find($id_kelas);
            $p = Dosen::find($id);
            $p->dosen_jadwal()->create(
                [
                    'tanggal' => $request->tanggal,
                    'pertemuan_ke' => $request->pertemuan_ke,
                    'dosen_id' => $request->dosen_id,
                    'dosen_mk' => $request->dosen_mk,
                    'jam_mk' => $request->jam_mk,
                    'kelas_id' => $request->kelas_id,
                    'file_pertemuan' => $image,


                ]
            );
            // dd($request->all());
            return (redirect('kelas-detail/' . $id_kelas));
        }
    }
    public function buatabsen($id)
    {
        $dosen = Dosen_jadwal::find($id);
        $kelas = Kelas::where('id', $dosen->kelas_id)->first();

        // dd($kelas);


        return view('dosen.buat-absen', compact('dosen', 'kelas'));
    }

    public function buatabsenProses(Request $request, $id)
    {

        // dd($request->all());
        $p = new Absensi;
        foreach ($request->mahasiswa as $key => $name) {
            $p->create([

                'jadwal_id' => $request->id_jadwal,
                'mahasiswa_id' => $request->mahasiswa[$key],
                'dosen_jadwal_id' => $request->dosen_mk,
                'status_absensi' => 0



            ]);
        }

        return redirect()->back();


        // return view('dosen.buat-absen', compact('dosen', 'kelas'));
    }


    public function detailMateri($id)
    {
        $materi = Materi::with('dosen_jadwal')->where('dosen_jadwal_id', $id)->get();
        // dd($materi);
        // $ma = Materi::where('u')
        // $m = Materi::with()
        return view('dosen.detailMateri', compact('materi'));
    }
    public function ujian()
    {
        $ujian = Matakuliah::with('dosen')->where('dosen_id', Auth::user()->id)->get();
        // dd($u);
        return view('dosen.ujian', compact('ujian'));
    }
    //
    public function ujianActive($id, $mk_id)
    {
        // dd($u);
        $kelas_id = $id;
        $kelas = Kelas::with('Mahasiswa')->where('id', $kelas_id)->first();
        // dd($kelas);
        $mk = Matakuliah::with('dosen')->where('id', $mk_id)->first();
        // dd($mk);
        return view('dosen.ujian-create', compact('kelas', 'mk'));
    }
    public function prosesActive(Request $request)
    {
        $file_nm = $request->file->getClientOriginalName();
        $f = $request->file->storeAs('thumbnail', $file_nm);

        $p = new UjianMhs();
        foreach ($request->mahasiswa as $key => $name) {

        $p->create([

            'mahasiswa_id' => $request->mahasiswa[$key],
            'matakuliah_id' => $request->matakuliah_id,
            'soal_ujian' => $f,
            'kelas_id' => $request->kelas_id

        ]);
        }

        return redirect('/ujian');
    }
     public function listMhsUjian($id, $mk_id)
    {

        $u =  Matakuliah::find($mk_id);
        $m = UjianMhs::with('mahasiswa')->where('matakuliah_id', $u->id)->get();
        // dd($m);
        return view('dosen.list-ujian-mhs', compact('m'));
    }

    //
}
