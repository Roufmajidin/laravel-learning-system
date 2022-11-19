@extends('home')
@section('title', 'Mahasiswa Profile')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header author-box-left">

                    <h4>Profile</h4>
                </div>
                <img width="200px" style="position: absolute; top:90px; left:10px"
                    src="{{ asset('style/img/20200120049.jpg') }}" />

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
                                <option>{{ $m->user_id }}</option>

                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                        <div class="col-sm-12 col-md-7">
                            Semester

                            <input type="text" class="form-control inputtags" disabled
                                value="{{ $m->semester['semester'] }}">
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
                                    <option>{{ $m->kelas['nama_kelas'] }}</option>
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

    {{-- krs --}}
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="90%" cellspacing="0">
                <thead class="">

                    <tr>
                        <th>Semester</th>
                        <th>Detail</th>


                    </tr>
                </thead>
                <br><br>
                <tbody>
                    @php
                        $no = 1;
                        $krs = $krs3->count();
                    @endphp

                    <tr>
                        @if ($krs == 0)
                        @else
                            <td>semester 1</td>

                            <td>{{ $krs }} Matakuliah</td>
                        @endif

                    </tr>
                </tbody>
                {{-- semester 2 --}}
                <tbody>
                    @php
                        $no = 1;
                        $krs = $krs2->count();
                    @endphp

                    <tr>
                        @if ($krs == 0)
                        @else
                            <td>semester 2</td>

                            <td>{{ $krs }} Matakuliah</td>
                        @endif

                    </tr>









                </tbody>
                {{-- semester 3 --}}
                <tbody>
                    @php
                        $no = 1;
                        $krs = $krs3->count();
                    @endphp

                    <tr>
                        @if ($krs == 0)
                        @else
                            <td>semester 3</td>

                            <td>{{ $krs }} Matakuliah</td>
                        @endif

                    </tr>

                </tbody>

                {{-- semester 4 --}}

                <tbody>
                    @php
                        $no = 1;
                        $krs = $krs4->count();
                    @endphp

                    <tr>
                        @if ($krs == 0)
                        @else
                            <td>semester 4</td>

                            <td>{{ $krs4->count() }} Matakuliah</td>
                        @endif

                    </tr>
                </tbody>

            </table>


        </div>

    </div>


@endsection
