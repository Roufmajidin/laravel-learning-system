@extends('home')
@section('title', 'Detail Materi')
@section('content')
    <div class="card-body">
        <h6 class="float-left"> Matakuliah : </h6>


        <button type="button" class="btn btn-primary float-lg-right" data-toggle="modal" data-target=".bd-example-modal-lg">+
            Materi</button>


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
    </div>

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <br>
                <br>
                <h5 class="ml-2"> Materi untuk : pertemuan {{ $pertemuan->pertemuan_ke }}</h5>
                <form action="/tambah_materi_proses/{{ $pertemuan->id }}" method="POST">
                    @csrf
                    <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-md-2 col-lg-3"></label>
                        <div class="col-sm-10 col-md-4">
                            {{-- @foreach ($m as $item) --}}
                            Pertemuan Id

                            <input type="text" name="dosen_jadwal_id" class="form-control" value="{{ $pertemuan->id }}">
                        </div>
                        <div class="col-sm-10 col-md-4">
                            {{-- @foreach ($m as $item) --}}
                            Judul Materi

                            <input type="text" class="form-control" name="judul_materi" value="">
                        </div>
                    </div>


                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                        <div class="col-sm-12 col-md-7">
                            Module


                        </div>

                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                        <div class="col-sm-12 col-md-7">
                            Teaser Materi

                            <input type="text" name="teaser_materi" class="form-control inputtags" value="">
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                        <div class="col-sm-12 col-md-7">
                            Isi Materi

                            <textarea name="isi_materi" class="form-control inputtags"></textarea>

                        </div>

                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                        <div class="col-sm-12 col-md-7">
                            Penugasan

                            <input type="text" name="penugasan" class="form-control inputtags" value="">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>

        </div>



    </div>





@endsection
