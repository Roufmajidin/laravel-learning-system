<?php

namespace App\Http\Controllers;

// use App\Http\Middleware\Mahasiswa;
use App\Models\Dosen;
use App\Models\Kelas;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index()
    {
        //

        // dd($dosen);
        // dosen table create //

        // $user_dosen = User::where('name', 'linda norhan')->first();

        // $dosen = new Dosen;
        // $dosen->create([
        // 'user_id' => $user_dosen->id,
        // 'nama_dosen' => $user_dosen->name,


        // ]);

        // dd($user_dosen);


        // //
        // $dosen = Dosen::where('nama_dosen', 'linda norhan')->first();

        // $ma = new Matakuliah;
        // $ma->create([
        // 'nama_mk' => 'Kalkulus',
        // 'dosen_id' => $dosen->id,

        // ]);

        // // dd($user_dosen);
        // return 'ok';

        $m = Matakuliah::with('dosen')->get();
        // dd($m);


        return view('admin.index', compact('m'));
    }
    public function detailDosen($id)
    {
        $dosen = Dosen::with('kelas')->find($id);

        // dd($dosen);
        // $dosen = new Dosen;
        // $dosen= Dosen::find($id);
        // $dosen->kelas()->create([

        // 'nama_kelas' => 'TI 2021',
        // // 'dosen_id' => $dosen->id,


        // ]);
        // return 'ok';
        // $d = Dosen::where('user_id', Auth::user()->id)->first();
        // dd($dosenMk);


        return view('admin.detail-kelas-dosen', compact('dosen'));
    }
    public function CreateKelasDosen(Request $request, $id)
    {

        // dd($dosen);
        $dosen = new Dosen;

        $dosen = Dosen::find($id);
        $kelas_id = $request->kelas;

        $kelas = Kelas::find($kelas_id);
        $dosenMk = Matakuliah::where('dosen_id', $id)->first();

        $kelas->matakuliah()->attach($dosenMk->id);

        $dosen->kelas()->attach($request->kelas);
        // return 'ok';
        // dd($kelas_id);

        return redirect('detail-dosen/' . $id);
    }
    public function AktifKelasDosen($id, $dosen_id)
    {

        // dd($dosen);
        // $dosen = new Kelas;
        $a = Auth::user()->id;
        $dosen_id = $dosen_id;
        $dosenKelas = Kelas::find($id);
        $kelas = Kelas::find($id);
        $dosenMk = Matakuliah::where('dosen_id', $dosen_id)->first();

        // return 'ok';
        // dd($kelas);

        return view('admin.active-dosen-mk', compact('dosenMk', 'kelas', 'dosen_id'));
    }
    public function prosesActiveMk(Request $request)

    {
        // $kelas = Kelas::find($request->kelas_id);
        $mk = Matakuliah::find($request->mk_id);
        $kelas = Kelas::find($request->kelas_id);
        $kelas->matakuliah()->attach($request->mk_id);
        $m = Matakuliah::all();
        // return 'succes';
        // dd($mk);
        // dd(request()->all());
        // return 'ok';


        return redirect('detail-dosen/' . $mk->dosen_id);
    }

    public function mahasiswa()
    {


        $mahas = Mahasiswa::get();
        $kelas = Kelas::get();
        // dd($m);
        return view('admin.kelas-mahasiswa-all', compact('kelas'));
    }
    public function kelasMahasiswa($id)
    {

        $id = decrypt($id);
        $mahas = Mahasiswa::where('kelas_id', $id)->get();
        // $kelas = Kelas::get();
        // dd($m);
        // return response()->json([
        //     'data' => $mahas,

        // ]);
        return view('admin.mahasiswa', compact('mahas', 'id'));
    }
    public function tambahMhs(Request $request)
    {

        $mahasiswa = new Mahasiswa;
        $mahasiswa->create([
            'nama_mahasiswa' => $request->nama_mahasiswa,
            'kelas_id' => $request->kelas,
        ]);
        return response()->json([]);
        // return view('admin.mahasiswa', compact('mahas', 'id'));
    }
     public function kelasMahasiswaAjax($kelas_id)
    {

        // $id = decrypt($kelas_id);
        $mahas = Mahasiswa::where('kelas_id', $kelas_id)->get();
        // $kelas = Kelas::get();
        // dd($m);
        return response()->json([
            'data' => $mahas,

        ]);
        // return view('admin.mahasiswa', compact('mahas', 'id'));
    }
     public function hapusMhs($id)
    {

        $mhs = Mahasiswa::find($id);
        $mhs->delete();


        // return redirect('/data-produk');
        return response()->json();
    }
}
