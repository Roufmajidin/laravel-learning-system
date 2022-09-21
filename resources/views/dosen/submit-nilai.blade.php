@extends('home')
@section('title', 'submit Nilai Ujian')
@section('content')
    <div class="card">
        <div class="card-header">
            {{-- <h4>Tambah Data </h4> --}}
        </div>
        <div class="card-body">

            <form class="form-group" action="/proses-submit-nilai" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="form-group ml-4 col-md-5 row">
                        <label style="color:#17a2b8">Matakuliah_id : {{ $matakuliah->nama_mk }}
                        </label>

                        <input type="text" class="form-control" value="{{ $matakuliah->id }}" placeholder=""
                            name="matakuliah_id">
                    </div>
                    <div class="form-group ml-4 col-md-5">
                        <label style="color:#17a2b8">Mahasiswa : {{ $mahasiswa->nama_mahasiswa }}</label>
                        <input type="text" class="form-control" name="mahasiswa_id"
                            value="{{ $mahasiswa->user_id }}" placeholder="">

                    </div>
                    <div class="form-group ml-4 col-md-5">
                        <label style="color:#17a2b8">dosen : {{ $matakuliah->dosen['nama_dosen'] }}</label>
                        <input type="text" class="form-control" name="dosen_id" value="{{ $matakuliah->dosen['id'] }}"
                            placeholder="">

                    </div>
                     <div class="form-group ml-2 col-md-5">
                         <label style="color: red">type ujian</label>

                        <select name="type_ujian" class="form-control">
                            <option value="UTS">UTS</option>
                            <option value="UAS">UAS</option>

                        </select>

                    </div>
                      <div class="form-group ml-4 col-md-5">
                        <label style="color:#17a2b8">Semester : {{ $semester->semester }}</label>
                        <input type="text" class="form-control" name="semester_id" value="{{ $semester->id }}"
                            placeholder="">

                    </div>
                    <div class="form-group ml-2 col-md-5">
                        <label style="color:red">Nilai</label>
                        <input type="text" class="form-control" name="nilai" value="" placeholder="">

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
