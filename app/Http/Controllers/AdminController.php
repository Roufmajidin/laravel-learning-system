<?php

namespace App\Http\Controllers;

// use App\Http\Middleware\Mahasiswa;
use App\Models\Dosen;
use App\Models\Kelas;
use App\Models\Krs;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use App\Models\Semester;
use App\Models\UjianMhs;
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

        $m = Matakuliah::with('dosen')->paginate(2);
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
    public function updateSemester()
    {

        // $semester1 = 1;
        $semester2 = 1;
        $semester4 = 2;
        $semester5 = 3;
        $kelas1 = 10;
        $kelas2 = 11;
        // $semester = Semester::get();
        $mahasiswas2 = Mahasiswa::with('semester')->where('semester_id', $semester2)
            ->where('kelas_id', $kelas1)
            ->paginate(3);
        $mahasiswas4 = Mahasiswa::with('semester')->where('semester_id', $semester4)
            ->where('kelas_id', $kelas2)
            ->paginate(3);
        $mahasiswas5 = Mahasiswa::with('semester')->where('semester_id', $semester5)
            ->where('kelas_id', $kelas2)
            ->paginate(3);

        return view('admin.semester-index', compact('mahasiswas2', 'mahasiswas4', 'mahasiswas5', 'semester2', 'semester4', 'semester5'));
    }
    public function mahasiswaBySemesterCreateUpdate()
    {

        // $id = $id;
        $mahasiswa = Mahasiswa::with('semester', 'kelas')
            // ->where('semester_id', $id)
            ->get();
        // dd($mahasiswa);
        return view('admin.semester-mahasiswa-create-update', compact('mahasiswa'));
    }
    public function mahasiswaBySemesterProsesUpdate(Request $request)
    {


        // dd($mahasiswa);
        $mahasiswa = Mahasiswa::with('semester', 'kelas');

        // dd($mahasiswa);
        // $name = 1;
        // $add = $request->semester + 1;

        foreach ($request->semester as $key => $name) {
            // $add = $key + 1;
            // $a = $add++;
            $mahasiswa->update([

                'semester_id' => $request->semester[$key]

            ]);

            // return view('admin.semester-mahasiswa-create-update', compact('mahasiswa' , 'id'));


        }
    }
    public function krsMahasiswa($id)
    {

        // $kelas =  Krs::with('mahasiswa')->wher()
        $mahasiswa = Mahasiswa::with('krs')->where('kelas_id', $id)->get();
        // dd($mahasiswa);
        $kelas = Kelas::find($id);
        return view('admin.list-kelas-krs-mhs', compact('mahasiswa', 'kelas'));
    }
    public function krsMhsDetail($id)
    {

        $mahasiswa =  Mahasiswa::where('user_id', $id)->first();
        $krs = Krs::with('mahasiswa', 'matakuliah')->where('mahasiswa_id', $id)->get();
        $kelasMhs = $mahasiswa->kelas_id;
        $kelas = Kelas::find($kelasMhs);

        // dd($mahasiswa);
        return view('admin.detail-krs-mhs', compact('krs', 'mahasiswa', 'kelas'));
    }
    public function validasikrs(Request $request)
    {
        $mahasiswa = Mahasiswa::find($request->mahasiswa_id);

        $krs = Krs::where('mahasiswa_id', $request->mahasiswa_id);
        //jika data status krs --> 1 maka update ke value-->2
        // lanjut kebaris new semester
        foreach ($request->krs as $key => $name) {

            $krs->update([

                // 'matakuliah_id' => $request->krs[$key],
                'mahasiswa_id' => $request->mahasiswa_id,
                'status' => 1,

            ]);
            $mahasiswa->update([

                'semester_id' => $request->smt + 1
            ]);
        }
        return redirect()->back();
    }

}
