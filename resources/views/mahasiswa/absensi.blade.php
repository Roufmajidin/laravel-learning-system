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

                    <div id="reader" width="100px" class="form-group ml-3 col-md-3"></div>



                    <div class="form-group ml-4 col-md-5 row">
                        <label style="color:#17a2b8"> ID MK: {{ $absensi->id }}
                        </label>
                        <input type="text" class="form-control" value="{{ $absensi->id }}" name="jadwal_id"
                            placeholder="">



                    </div>


                </div>
                <div class="form-row">
                    <div class="form-group ml-4 col-md-2">
                        <label style="color:#17a2b8">Mhs id</label>
                        <input type="text" class="form-control" name="mahasiswa_id" value="{{ $m->id }}"
                            placeholder="">

                    </div>

                    <div class="form-group ml-4 col-md-2">
                        <label style="color:#17a2b8">dos id</label>
                        <input type="text" class="form-control" id="ur" data-id="{{ $absensi->id }}"  name="dosen_id" value="{{ $absensiii->dosen_id }}"
                            placeholder="">

                    </div>

                    <div class="form-group ml-3 col-md-7">
                        <label style="color:#17a2b8">waktu sekarang</label>
                        <input type="text" class="form-control" name="tanggal_absen" value="{{ $date }}"
                            placeholder="">


                    </div>


                </div>






        </div>


        <div class="card-footer text-right">
            <button class="btn btn-primary mr-1" type="submit">Submit</button>
            <button class="btn btn-secondary" type="reset">Reset</button>
        </div>
    </div>
    </form>

@endsection
