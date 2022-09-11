@extends('home')
{{-- @section('title', 'C Materi') --}}
@section('content')
    <div class="card">
        <div class="card-header">
            @php
                $dosen = App\Models\Dosen::find($dosen_id)
            @endphp
            <h6>aktive matakuliah :<br> {{$dosen->nama_dosen}} </h6>
        </div>
        <div class="card-body">

            <form class="form-group" action="/active-proses" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="form-group ml-4 col-md-5 row">
                        <label style="color:#17a2b8">Kelas ID :
                        </label>
                        <input type="text" class="form-control" name="kelas_id" value="{{ $kelas->id }}"
                            placeholder="">

                    </div>
                    <div class="form-group ml-4 col-md-5 row">
                        <label style="color:#17a2b8">Matakuliah Id
                        </label>
                        <input type="text" class="form-control" name="mk_id" value="{{ $dosenMk->id }}"
                            placeholder="">

                    </div>
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
