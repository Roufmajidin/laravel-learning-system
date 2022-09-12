@extends('home')
@section('title', 'Detail Materi')
@section('content')
    <div class="card-body">
        <h6 class="float-left"> Matakuliah : </h6>


        <br>
        <br>
        <br>


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

                    <textarea name="isi_materi" class="form-control inputtags" disabled>{{ $item->teser_materi }}</textarea>

                </div>

            </div>

            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                <div class="col-sm-12 col-md-7">
                    Penugasan

                    <input type="text" class="form-control inputtags" disabled value="{{ $item->penugasan }}">
                </div>
            </div>
    </div>
    @endforeach

    <iframe src="{{ asset('storage/' . $pertemuan->file_pertemuan) }}"></iframe>

    </div>








@endsection
