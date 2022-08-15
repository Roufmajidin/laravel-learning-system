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
        // $mahas = Mahasiswa::where('kelas_id',)

        return view('dosen.absensiPertemuanKelas', compact('absensi'));
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
        $detail = Dosen_jadwal::with('absensi')->where('id', $id)->find($id);

        // dd($absensi);

        return view('dosen.absensiPertemuanKelas', compact('absensi', 'detail'));
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
        $kel = kelas::get();
        $kell = Kelas::with('mahasiswa')->get();
        // dd($kell);
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

            // $data = $request->all();

            // $doje = new Dosen_jadwal;
            // $doje->tanggal = $data['tanggal'];
            // $doje->pertemuan_ke = $data['pertemuan_ke'];
            // $doje->dosen_id = $data['dosen_id'];
            // $doje->dosen_mk = $data['dosen_mk'];
            // $doje->jam_mk = $data['jam_mk'];
            // $doje->kelas_id = $data['kelas_id'];

            // $doje->save();

            // // $dosen::findOrfail($id);

            // // $dj = Dosen_jadwal::findOrfail($id);

            // $kelass = $request->kelas_id;
            // $mahasiswa = new Mahasiswa;
            // $mahasiswa = Mahasiswa::where('kelas_id', $kelass)->get('id');
            //  $a = preg_replace('/[^A-Za-z0-9\  ]/', '', $kalimat);
            // $m = $mahasiswa->id->get();
            //  $a = [ preg_replace("/[^0-9]/", "", $mahasiswa)];
            // $kelas =  Kelas::with('mahasiswa')->get();
            // $mahasiswa= Mahasiswa::where('kelas_id', $kelas)->get();
            // $absensi = new Absensi;
            // $absensi->jadwal_id = $doje->id;
            // $absensi->tanggal_absen = '1';
            // $absensi->dosen_jadwal_id = $doje->id;
            // // $absensi->mahasiswa_id = '3'. '2';
            // $mahasiswa = [1,2];
            // $mahasiswa = preg_replace("/[^0-9]/", "", $mahasiswa1);
            // $will_insert = [];
            // // $sd = "s{}dsd12";
            // foreach ($mahasiswa as $key => $value) {
            //     array_push($will_insert, ['mahasiswa_id' => $value]);
            // }




            // Coba::insert($will_insert);

            // $absensi->save();
            // $a->save();
            //    $mahasiswa['alamat'];
            // dd($a);






            $p = dosen::findOrfail($id);
            $p->dosen_jadwal()->create(
                [
                    'tanggal' => $request->tanggal,
                    'pertemuan_ke' => $request->pertemuan_ke,
                    'dosen_id' => $request->dosen_id,
                    'dosen_mk' => $request->dosen_mk,
                    'jam_mk' => $request->jam_mk,
                    'kelas_id' => $request->kelas_id,


                ]
            );
            // $kelasId = $request->kelas_id;
            // $kelas = Kelas::findOrfail($kelasId);
            // $kelas->mahasiswa()->create([]);

            // $kell = Kelas::with('mahasiswa')->get();
            // $dj = Dosen_jadwal::findOrfail($id);
            // $dj->Absensi()->create([
            //     'jadwal_id' => $request->tanggal,
            //     'mahasiswa_id' => '',
            //     'tanggal_absen' => '',
            //     'dosen_jadwal_id' => '',


            // ]);


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
    // public function coba()
    // {
    //     $m = Coba::get('mahasiswa_id');
    //     $a = preg_replace("/[^0-9]/", "", $m);

    //     dd(preg_replace("/[^0-9]/", "", $m));



    //     //
    // }

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
