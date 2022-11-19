<?php

namespace App\Http\Controllers;

use App\Models\HasilStudi;
use App\Models\Krs;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use App\Models\Role_ujian;
use App\Models\Semester;
use App\Models\UjianMhs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Alert;

class HasilStudiController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        // NB
        // semester id = 1 -> semester dua
        // semester id = 2  -> semester empat
        // semester id = 3  -> semester Lima
        // semester id = 4  -> semester Enam

        // $mh = Mahasiswa::with('hasilStudi')->where('user_id', Auth::user()->id)->first();
        $semester1 = Semester::find(1);
        $semester2 = Semester::find(2);
        $semester4 = Semester::find(4);
        $mhasilSemester1 = HasilStudi::with('mahasiswa', 'matakuliah', 'semester')->where('mahasiswa_id', Auth::user()->id)->where('semester_id', $semester1->id)->get();
        $mhasilSemester2 = HasilStudi::with('mahasiswa', 'matakuliah', 'semester')->where('mahasiswa_id', Auth::user()->id)->where('semester_id', $semester2->id)->get();
        
        // dd($mhasilSemester2);

        return view('mahasiswa.hasilStudi', compact('mhasilSemester1', 'mhasilSemester2'));
    }
    public function typeUjian()
    {
        $type = Role_ujian::where('keterangan', 'Sedang Dimulai')->first();
        $nu = Role_ujian::where('keterangan', 'NULL')->first();




        $auth = Auth::user()->id;

        //1 $mhs = UjianMhs::with('mahasiswa')->where('mahasiswa_id', $auth)->get();
        $ujian = Mahasiswa::with('ujianMhs')->where('user_id', $auth)->first();

        // dd($ujian);
        if ($type == NULL) {
            # code...
            Alert::warning(' Hayy ! ', 'Ujian Sudah Selesai !');
            return redirect()->back();
        } else {
            # code...
            $ujiane = UjianMhs::with('matakuliah')
                ->where('mahasiswa_id', $ujian->user_id)
                ->where('type_ujian', $type->type_ujian)
                ->where('status_ujian', 2)
                ->get();
            return view('mahasiswa.ujian-online', compact('ujiane', 'type', 'ujian'));
        }



        // $ujiane = Krs::with('matakuliah')->where('mahasiswa_id', $auth)->get();
        // dd($type);

    }
    public function ujianOn($id)
    {
        $auth = Auth::user()->id;
        $type = decrypt($id);
        //1 $mhs = UjianMhs::with('mahasiswa')->where('mahasiswa_id', $auth)->get();
        $ujian = Mahasiswa::with('ujianMhs')->where('user_id', $auth)->first();

        // dd($ujian);
        $ujiane = UjianMhs::with('matakuliah')
            ->where('mahasiswa_id', $ujian->user_id)
            ->where('type_ujian', $type)
            ->where('status_ujian', 2)
            ->get();
        // $ujiane = Krs::with('matakuliah')->where('mahasiswa_id', $auth)->get();
        dd($ujian);

        return view('mahasiswa.ujian-online', compact('ujiane', 'type', 'ujian'));
    }
    public function kumpulkanJawaban($id)
    {
        $auth = Auth::user()->id;
        //1 $mhs = UjianMhs::with('mahasiswa')->where('mahasiswa_id', $auth)->get();


        $ujiane = UjianMhs::with('matakuliah')->find($id);
        $kelas_mhs = Mahasiswa::with('kelas')->where('user_id', $auth)->first();

        // dd($ujian);
        return view('mahasiswa.submit-ujian', compact('ujiane', 'kelas_mhs'));
    }

    public function storeUjian(Request $request, $id)
    {

        $file_nm = $request->file->getClientOriginalName();
        $f = $request->file->storeAs('thumbnail', $file_nm);

        $p = UjianMhs::findOrFail($id);

        $p->update([

            'matakuliah_id' => $request->matakuliah_id,
            'file_jawaban' => $f,


        ]);
        // dd(request()->all());


        return redirect('/ujian');
    }
}