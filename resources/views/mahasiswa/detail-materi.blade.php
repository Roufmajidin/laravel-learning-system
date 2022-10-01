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
                <div class="col-sm-12 col-md-8">
                    Module

                    <select class="form-control selectric" disabled>
                        <option><a href="">{{ $item->dosen_jadwal['file_pertemuan'] }}</a></option>

                    </select>
                </div>

            </div>

            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                <div class="col-sm-12 col-md-8">
                    Isi Materi

                    <textarea name="isi_materi" class="form-control inputtags" disabled>{{ $item->teser_materi }}</textarea>

                </div>

            </div>

            <div class="form row mb-5">

                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                <div class="col-8 col-md-2">
                    Penugasan

                    <input type="text" class="form-control inputtags" disabled value="{{ $item->penugasan }}">
                </div>
                {{-- @php
                    $mid = Auth::user()->id;
                    $t = App\Models\Tugas::where('dosen_jadwal_id', $item->dosen_jadwal_id)->where('mahasiswa_id', $mid)->first();
                    $tt = $t->materi_id;
                @endphp --}}
                {{-- @if ($tt == $item->id)
                <p>Anda Sudah Mengumpulkan</p> --}}
                {{-- @else --}}
                @if ($item->penugasan == 'Ada')
                    <button type="button" class="btn btn-primary float-md-right" data-toggle="modal"
                        data-target="#exampleModal">
                        Submit Tugas ?
                    </button>
                @endif


            </div>

    </div>
    @endforeach
    <h6 class="float-right"> <a href=""></a></h6>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="90%" cellspacing="0">
            <thead class="">

                {{--  --}}

                <a href="">

                    Detail Pengumpulan Tugasmu
                </a>



                {{--  --}}
                <tr>
                    <th>Tanggal Pertemuan</th>
                    <th>Pertemuan</th>
                    <th>Tugas File</th>
                    <th>Keterangan</th>
                    <th>More</th>

                </tr>
            </thead>
            <br><br>
            <tbody>
                @php

                    $mat = App\Models\Tugas::with('materi')
                        ->where('dosen_id', $pertemuan->dosen_id)

                        ->where('mahasiswa_id', Auth::user()->id)
                        ->get();
                @endphp
                @forelse ($tugas as $i)
                    <tr>
                        @php
                            $dos = App\Models\Dosen_jadwal::find($i->dosen_jadwal_id);
                        @endphp
                        <td>{{ $dos->tanggal }}</td>

                        <td>Pertemuan {{ $dos->pertemuan_ke }}</td>
                        <td> {{ $i->file }}</td>
                        <td> {{ $i->ket }}</td>


                        <td>
                            <a href="#edit"><i class="fas fa-edit"></i></a>
                            <a href="/delete-upload/{{ encrypt($i->id) }}"><i class="fas fa-trash"></i></a>
                        </td>
                        {{-- @if ($i->file >= $i->file)
                            <p class="beep text-danger">Hy, ada upload yang duble. Harap Periksa</p>
                        @endif --}}

                    </tr>


                @empty

                    <a style="margin-left:40%; margin-top:20%; position: absolute; color:red; font-wight:bold">belum ada
                        Data</a>
                @endforelse








            </tbody>

        </table>



    </div>
    <div style="margin-top: 20%; ">
        <iframe src="{{ asset('storage/' . $pertemuan->file_pertemuan) }}"></iframe>


    </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Kumpulkan Tugas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/kumpulkan-tugas-mhs" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">jadwal id : </label>
                            <input type="text" class="form-control inputtags" name="id"
                                value="{{ $item->id }}">

                        </div>
                        <div class="form-group">
                            @php
                                $mahasiswa = App\Models\Mahasiswa::where('user_id', Auth::user()->id)->first();
                                $kelas = App\Models\Kelas::where('id', $mahasiswa->kelas_id)->first();
                            @endphp
                            <label for="recipient-name" class="col-form-label">kelas : {{ $kelas->nama_kelas }} </label>
                            <input type="text" class="form-control inputtags" name="kelas_id"
                                value="{{ $kelas->id }}">

                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Dosen id : </label>
                            <input type="text" class="form-control inputtags" name="dosen_id"
                                value="{{ $pertemuan->dosen_id }}">

                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nama Kelas : </label>
                            <select name="dosen_jadwal_id" class="form-control">
                                <option value="{{ $item->dosen_jadwal_id }}">{{ $item->dosen_jadwal_id }}</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">file TUgas: </label>
                            <input type="file" class="form-control inputtags" name="file" value="">

                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Keterangan: </label>
                            <input type="text" class="form-control inputtags" name="ket" value="">

                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                </form>

            </div>
        </div>
    </div>










@endsection
