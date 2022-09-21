@extends('home')
@section('title', 'Mahasiswa Profile')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header author-box-left">

                    <h4>Profile</h4>
                </div>
                 <img  width="200px" style="position: absolute; top:90px; left:10px" src="{{ asset('style/img/20200120049.jpg') }}"/>

                <div class="card-body">

                    <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                        <div class="col-sm-10 col-md-4">
                            {{-- @foreach ($m as $item) --}}
                            Nama Mahasiswa
                            <input type="text" class="form-control" disabled value="{{ $m->nama_mahasiswa }}">
                        </div>
                    </div>
                    {{-- @endforeach --}}

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                        <div class="col-sm-12 col-md-7">
                        NIM

                            <select class="form-control selectric" disabled>
                                <option>{{$m->user_id}}</option>

                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                        <div class="col-sm-12 col-md-7">
                        Semester

                            <input type="text" class="form-control inputtags" disabled value="{{$m->semester['semester']}}">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                        <div class="col-sm-12 col-md-7">
                        Status
                            <select class="form-control selectric" disabled>

                                <option>Belum Aktif</option>


                            </select>
                        </div>
                    </div>
                     <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                        <div class="col-sm-12 col-md-7">
                        Kelas
                            <select class="form-control selectric" disabled>
                            @if (!empty($m->kelas['nama_kelas']))
                                <option>{{$m->kelas['nama_kelas']}}</option>

                            @endif

                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                        <div class="col-sm-12 col-md-7">
                            <button class="btn btn-primary"></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


@endsection
