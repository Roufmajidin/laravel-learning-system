<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Dosen;
use App\Models\Matakuliah;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Pertemuan;
use App\Models\Mahasiswa;
use App\Models\Dosen_jadwal;

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
        // dd($dosenx);
        return view('dosen.index', compact('dosen', 'detailJ'));
    }
    public function detail($id)
    {
        // $dosen = Dosen::with('kelas')->find($id);
        // $dosen = Dosen::with('kelas')->find($id);
        // $dosen_jadwal = Dosen_jadwal::with('kelas')->find($id);

        $detailJ = Dosen_jadwal::with('kelas')->where('dosen_id', Auth::user()->id)->get();

        // $dosen = Kelas::find($id);
        // $kk = Pertemuan::
        $dosen = Dosen::with('dosen_jadwal')->where('user_id', Auth::user()->id)->get();

        // dd($detailJ);

        return view('dosen.show-kelas-dosen', compact('detailJ', 'dosen'));
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
        return view('dosen.pertemuanKelas', compact('absensi'));
    }
    public function absen($id)
    {
        // $kelas = Kelas::with('mahasiswa')->find($id);
        // $id = Dosen::find(2);
        $absensi = Absensi::with('mahasiswa', 'dosen_jadwal')->where('tanggal_absen', NULL)->find($id);
        // $m = Mahasiswa::where('user_id', $);
        // $mah = 1;
        // $dosen = Kelas::with('dosen')->find($mah);
        // $m = Matakuliah::with('kelas')->find($id);
        $detailJ = Dosen_jadwal::with('absensi')->where('id', $id)->find($id);

        dd($detailJ->absensi);
        return view('dosen.pertemuanKelas', compact('absensi'));
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
        return view('dosen.kelas-all', compact('kelas2020', 'kelas2021'));
    }

    // public function detailTemu($id)
    // {
    //     $kelas = Kelas::with('pertemuan')->find($id);

    //     dd($kelas);



    // }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createpertemuan($id)
    {
        //tambah pertemuan dosen
        // $kelas = Kelas::with('pertemuan')->find($id);
        $dosen = Dosen::with('dosen_jadwal')->where('user_id', Auth::user()->id)->find($id);
        $mk = Dosen_jadwal::with('matakuliah')->where('dosen_id', $id)->get();
        $kel = kelas::all();
        // dd($mk);
        return view('dosen.createPertemuan', compact('dosen', 'mk', 'kel'));
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
            $p = dosen::findOrfail($id);
            $p->dosen_jadwal()->create([
                'tanggal' => $request->tanggal,
                'pertemuan_ke' => $request->pertemuan_ke,
                'dosen_id' => $request->dosen_id,
                'dosen_mk' => $request->dosen_mk,
                'jam_mk' => $request->jam_mk,
                'kelas_id' => $request->kelas_id,


            ]);

            // dd($request->all());
            return (redirect('pertemuan/' . $id));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
