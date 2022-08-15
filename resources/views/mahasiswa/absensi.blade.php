@extends('home')
@section('title', 'Tambah Materi')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Absen MK {{ $absensi->matakuliah['nama_mk'] }} </h4>
        </div>
        <div class="card-body">



            <form class="form-group" action="/absenproses/{{ $absensi->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="form-group ml-4 col-md-5 row">
                        <label style="color:#17a2b8"> ID MK: {{ $absensi->id }}
                        </label>
                        <input type="text" class="form-control" value="{{ $absensi->id }}" name="jadwal_id"
                            placeholder="}" >



                    </div>
                    <div class="form-group ml-4 col-md-2">
                        <label style="color:#17a2b8">Mhs id</label>
                        <input type="text" class="form-control" name="mahasiswa_id" value="{{ $m->id }}"
                            placeholder="">

                    </div>



                </div>
                <div class="form-group ml-3 col-md-3">
                    <label style="color:#17a2b8">waktu sekarang</label>
                    <input type="text" class="form-control" name="tanggal_absen" value="{{ $date }}"
                        placeholder="" >

                </div>
                <div class="form-group ml-3 col-md-4">
                    <label style="color:#17a2b8">id Hid</label>
                    <input type="text"  class="form-control" name="dosen_jadwal_id" value="{{ $absensi->id }}"
                        placeholder="">
                </div>
                   <?php
          $absensi = \App\Models\Absensi::where('mahasiswa_id', Auth::user()->id)->where('jadwal_id', $absensi->id)->first();

          if(!empty($absensi)){
            $notif = \App\Models\Dosen_jadwal::where('id', $absensi->id)->get();

          }
          ?>
           @if(!empty($absensi))
           halo, {{}}
         @elseif(!empty($notif))
         belum
         @endif
        </div>

        <div class="card-footer text-right">
            <button class="btn btn-primary mr-1" type="submit">Submit</button>
            <button class="btn btn-secondary" type="reset">Reset</button>
        </div>
    </div>
    </form>

@endsection
