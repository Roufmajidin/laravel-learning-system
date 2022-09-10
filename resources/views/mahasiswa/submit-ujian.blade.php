@extends('home')
@section('title', 'Submit Ujian')
@section('content')
    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">
            <h6>Nama Mhs : <span>{{ $kelas_mhs->nama_mahasiswa }}</span> </h6>
            <h6>Kelas : <span>{{ $kelas_mhs->kelas['nama_kelas'] }}</span> </h6>





            <form class="form-group" action="/submit-proses/{{ $ujiane->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- @method('PUT') --}}
                <div class="form-row">
                    <div class="form-group ml-4 col-md-5 row">
                        <label style="color:#17a2b8"> ID MK:
                        </label>
                        <input type="file" class="form-control" value="" name="file"
                            placeholder="File ujian | PDF">

                    </div>
                    @php
                        $i = App\Models\Matakuliah::find($ujiane->matakuliah_id);
                    @endphp

                    <div class="form-group ml-4 col-md-2">
                        <label style="color:#17a2b8">Mk : {{$i->nama_mk}}</label>
                        <input type="text" class="form-control" name="matakuliah_id" value=" {{$i->id}}" placeholder="">

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
