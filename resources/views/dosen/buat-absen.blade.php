@extends('home')
@section('title', 'buat Absen')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Tambah Data </h4>
        </div>
        <div class="card-body">



            <form class="form-group" action="/buatAbsenProses/{{ $dosen->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="form-group ml-4 col-md-5 row">
                        <label style="color:#17a2b8">Dosen ID : {{ $dosen->id }}
                        </label>
                        <input type="text" class="form-control" value="{{ $dosen->nama_dosen }}" placeholder="" disabled>

                    </div>
                    <div class="form-group ml-4 col-md-5">
                        <label style="color:#17a2b8">dosen_id</label>
                        <input type="text" class="form-control @error('dosen_id') is-invalid @enderror" name="id_jadwal"
                            value="{{ $dosen->id }}" placeholder="{{ $dosen->id }}">
                        @error('dosen_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group ml-4 col-md-5">
                        <label style="color:#17a2b8">dosen_id</label>
                        <input type="text" class="form-control @error('dosen_id') is-invalid @enderror" name="dosen_mk"
                            value="{{ $dosen_id->id }}" placeholder="{{ $dosen_id->id }}">
                        @error('dosen_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group ml-4 ">
                        <label>Aktifkan Mahasiswa() </label>
                        @php
                            $m = App\Models\Mahasiswa::where('kelas_id', $kelas->id)->get();

                        @endphp

                        <select style="width: 300px; height:200px" name="mahasiswa[]" class="form-control" multiple>
                            @foreach ($m as $i)
                                <option value="{{ $i->id }}">{{ $i->nama_mahasiswa }}</option>
                            @endforeach


                        </select>

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
