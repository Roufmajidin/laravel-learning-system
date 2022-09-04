@extends('home')
@section('title', 'Read Materi')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">

                <h4>Materi</h4>
            </div>
                 <img  width="200px" style="position: absolute; top:90px; left:10px" src="{{ asset('style/img/p.png') }}"/>


            <div class="card-body">
                @foreach ($materi as $item)
                    <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-md-2 col-lg-3"></label>
                        <div class="col-sm-10 col-md-4">
                            {{-- @foreach ($m as $item) --}}
                            Pertemuan

                            <input type="text" class="form-control" disabled
                                value="pertemuan {{ $item->dosen_jadwal['pertemuan_ke'] }}">
                        </div>
                        <div class="col-sm-10 col-md-4">
                            {{-- @foreach ($m as $item) --}}
                            Judul Materi

                            <input type="text" class="form-control" disabled value=" {{ $item->judul_materi }}">
                        </div>
                    </div>

                     <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-4 col-md-3 col-lg-3"></label>
                        <div class="col-sm-3 col-md-3">
                            Penugasan

                            <input type="text" style="color: red; font-weight:bold" class="form-control inputtags text-bg-danger" disabled value="{{ $item->penugasan }}">
                        </div>
                    </div>


                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                        <div class="col-sm-12 col-md-7">
                            Module

                            <select class="form-control selectric" disabled>
                                <option><a href="">{{ $item->dosen_jadwal['file_pertemuan'] }}</a></option>

                            </select>
                        </div>

                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                        <div class="col-sm-12 col-md-7">
                            Isi Materi

                            <select class="form-control selectric" disabled>
                                <option>{{ $item->teser_materi }}</option>

                            </select>
                        </div>

                    </div>




                    <iframe src="{{ asset('storage/' . $item->dosen_jadwal['file_pertemuan']) }}"></iframe>

            </div>
            @endforeach

        </div>
    </div>
    </div>
    </div>
    </div>


@endsection
