@extends('home')
@section('title', 'Mahasiswa Profile')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Profile</h4>
                </div>
                <div class="card-body">
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Mahasiswa</label>
                        <div class="col-sm-12 col-md-7">
                            {{-- @foreach ($m as $item) --}}
                            <input type="text" class="form-control" disabled value="{{ $m->nama_mahasiswa }}">
                        </div>
                    </div>
                    {{-- @endforeach --}}

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">NIM</label>
                        <div class="col-sm-12 col-md-7">
                            <select class="form-control selectric" disabled>
                                <option>{{$m->nim}}</option>

                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control inputtags" disabled value="{{$m->alamat}}">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                        <div class="col-sm-12 col-md-7">
                            <select class="form-control selectric" disabled>

                                <option>Belum Aktif</option>


                            </select>
                        </div>
                    </div>
                     <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kelas</label>
                        <div class="col-sm-12 col-md-7">
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
