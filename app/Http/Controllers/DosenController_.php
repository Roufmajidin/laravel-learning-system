<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Dosen;
use App\Models\Matakuliah;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Pertemuan;
use App\Models\Mahasiswa;

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
        $id = 1;


        $User = User::find($id);

        // $kelas = Kelas::with('dosen')->find(2);
        // $user = Auth::user()->id;
        // $matakuliah = Dosen::with('kelas')->where('user_id', Auth::user()->id)->get();
        // dd($Uer);
        // return view('dosen.index', compact('dosen'));
    }
    public function detailKelas($id)
    {
        // $idd = 2;



        $matakuliah = Matakuliah::with('pertemuan')->find($id);
        // $dosen = Dosen::with('jadwal_dosen')->find($idd);

        // $user = Auth::user()->id;
        // $kelass = Pertemuan::where('kelas_id', $idd)->get();

        // $matakuliah = Dosen::with('kelas')->where('user_id', Auth::user()->id)->get();
        // dd($dosen);
        return view('dosen.show-kelas-dosen', compact('dosen'));
    }
    public function pertemuan($id)
    {
        // $idd = 2;



        // $k =1;       // $user = Auth::user()->id;
        // $m = Matakuliah::with('pertemuan')->find($id);

        // bener //
        // $kelas = Pertemuan::with('matakuliah')->where('kelas_id', $id)->find($id);
        // $kel = Matakuliah::find($m);
        $kelas = Pertemuan::where('matakuliah_id', $id)->get();
        $allM = Mahasiswa::with('kelas')->where('kelas_id', $id)->get();
        dd($allM);
        // $matakuliah = Matakuliah::with('pertemuan')->find($id);
        // $m = Kelas::with('dosen')->find($id);

        // dd($kelas);
        return view('dosen.pertemuankelas', compact('kelas', 'matakuliah', 'm'));
    }



     public function detailTemu($id)
    {
        $m = Kelas::with('mahasiswa')->find($id);
        $matakuliah = Matakuliah::with('pertemuan')->find($id);

        // dd($m);
        return view('dosen.mahasiswa-data', compact('matakuliah', 'm'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createpertemuan($id)
    {
        //tambah pertemuan dosen
        #
        $matakuliah = Matakuliah::with('pertemuan')->find($id);
        // dd($matakuliah);
        return view('dosen.createPertemuan', compact('matakuliah'));
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

                    'pertemuan_ke' => 'required',
                    'kelas_id' => 'required',
                    'matakuliah_id' => 'required',


                ],
                [
                    // 'pertemuan_ke.required' => 'kode MK tidak boleh kosong',
                    'pertemuan_ke.required' => 'Harap pilih file',
                    'kelas_id.required' => 'Harap pilih file',
                    'matakuliah_id.required' => 'Harap pilih file',
                ]
            );
            $p = Matakuliah::findOrfail($id);
            $p->pertemuan()->create([

                'pertemuan_ke' => $request->pertemuan_ke,
                'kelas_id' => $request->kelas_id,
                'matakuliah_id' => $request->matakuliah_id
                // 'detail_mahasiswa_id' =>  $request->detail_mahasiswa_id,


            ]);
            // dd($request->all());
            return(redirect('detailpertemuan/'.$id));

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
