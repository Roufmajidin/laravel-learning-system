@extends('home')
@section('title', 'List Mahasiswa Ujian')
@section('content')

    <div class="card-body">
        <h6>Ujian Tengah Semester (UTS)</h6>

        <button type="button" class="btn btn-primary float-md-right mb-2" data-toggle="modal" data-target="#exampleModal"><i
                class="fas fa-question"></i>
            Validasi
        </button>

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="90%" cellspacing="0">
                <thead class="">
                    <tr>
                        <th>No</th>
                        <th>Mahasiswa</th>
                        <th>Tanggal Ujian</th>
                        <th>File Jawaban</th>
                        <th>Waktu Pengumpulan</th>
                        <th>Semester </th>
                        <th>Input Nilai</th>
                    </tr>
                </thead>
                <br><br>
                <tbody>
                    @php
                        $no = 1;
                    @endphp

                    @forelse ($m1 as $item)
                        <tr>

                            <td>{{ $no++ }} </td>

                            <td>{{ $item->mahasiswa['nama_mahasiswa'] }}</td>
                            <td>{{ date('d-M-Y', strtotime($item->tanggal_ujian)) }}</td>
                            <td>
                                @if ($item->file_jawaban === null)
                                    <a href="#"><button class="btn btn-danger"> belum mengumpulkan </button>
                                    @else
                                        <a href="#"> {{ $item->file_jawaban }} </a>
                                @endif

                            </td>
                            @if ($item->file_jawaban === null)
                                <td style="">none</td>
                            @else
                                <td>{{ $item->updated_at }}</td>
                            @endif
                            <td>{{ $item->semester['semester'] }}</td>

                            @php
                                $ma = App\Models\Matakuliah::find($item->matakuliah_id);
                            @endphp
                            @if ($item->file_jawaban === null)
                                <td><a href="/submit-nilai-mhs/{{ $item->mahasiswa['id'] }}"><button disabled
                                            class="btn btn-secondary">Disbaled</button><a /></td>
                            @else
                                <td><a
                                        href="/submit-nilai-mhs/{{ $item->mahasiswa['id'] }}/{{ $ma->id }}/{{ $item->semester['id'] }}">Tap</a>
                                </td>
                            @endif


                        </tr>

                    @empty

                        <a style="margin-left:40%; margin-top:20%; position: absolute; color:red; font-wight:bold">belum ada
                            Data</a>
                    @endforelse



                </tbody>

            </table>
            {{ $m1->links() }}


        </div>



    </div>






    {{-- semester 2 --}}

    <div class="card-body">
        <h6>Ujian Akhir Semester (UAS)</h6>
        <button type="button" class="btn btn-primary float-md-right mb-2" data-toggle="modal"
            data-target="#exampleModalUAS"><i class="fas fa-question"></i>
            Validasi
        </button>


        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="90%" cellspacing="0">
                <thead class="">
                    <tr>
                        <th>No</th>
                        <th>Mahasiswa</th>
                        <th>Tanggal Ujian</th>
                        <th>File Jawaban</th>
                        <th>Waktu Pengumpulan</th>
                        <th>Semester </th>
                        <th>Input Nilai</th>
                    </tr>
                </thead>
                <br><br>
                <tbody>
                    @php
                        $no = 1;
                    @endphp

                    @forelse ($m2 as $item)
                        <tr>

                            <td>{{ $no++ }} </td>

                            <td>{{ $item->mahasiswa['nama_mahasiswa'] }}</td>
                            <td>{{ date('d-M-Y', strtotime($item->tanggal_ujian)) }}</td>

                            <td>
                                @if ($item->file_jawaban === null)
                                    <a href="#"><button class="btn btn-danger"> belum mengumpulkan </button>
                                    @else
                                        <a href="#"> {{ $item->file_jawaban }} </a>
                                @endif

                            </td>
                            @if ($item->file_jawaban === null)
                                <td style="">none</td>
                            @else
                                <td>{{ $item->updated_at }}</td>
                            @endif
                            <td>{{ $item->semester['semester'] }}</td>

                            @php
                                $ma = App\Models\Matakuliah::find($item->matakuliah_id);
                            @endphp
                            @if ($item->file_jawaban === null)
                                <td><a href="/submit-nilai-mhs/{{ $item->mahasiswa['id'] }}"><button disabled
                                            class="btn btn-secondary">Disbaled</button><a /></td>
                            @else
                                <td><a
                                        href="/submit-nilai-mhs/{{ $item->mahasiswa['id'] }}/{{ $ma->id }}/{{ $item->semester['id'] }}">Tap</a>
                                </td>
                            @endif


                        </tr>

                    @empty

                        <a style="margin-left:40%; margin-top:20%; position: absolute; color:red; font-wight:bold">belum ada
                            Data</a>
                    @endforelse



                </tbody>

            </table>
            {{ $m2->links() }}


        </div>

    </div>
    </div>




    <!-- Modal validasi Uts -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Validasi Ujian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @php
                    $idnya = 'UTS';
                @endphp
                <form action="/validate-uts/{{$idnya}}" method="POST">
                    @csrf
                    <div class="modal-body">


                        {{-- <div class="form-group">

                            <label for="recipient-name" class="col-form-label">semester id : </label>
                            <select name="smt" class="form-control" style="height: 100px">
                                <option value=""></option>
                            </select>
                        </div> --}}

                        <div class="form-group">

                            <label for="recipient-name" class="col-form-label">Ujian Mhs : </label>
                            <select name="ujian[]" class="form-control" multiple style="height: 100px">
                                @foreach ($m1 as $i)
                                    <option value="{{ $i->tanggal_ujian }}">{{ $i->mahasiswa['nama_mahasiswa'] }}
                                    </option>
                                @endforeach


                            </select>
                        </div>

                        <div class="ml-2">
                            {{-- Jumlah Krs : {{ $krs->count() }} Matakuliah --}}

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Validate</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- Modal validasi UAS -->
    <div class="modal fade" id="exampleModalUAS" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Validasi Ujian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                 @php
                    $idnya = 'UAS';
                @endphp
                <form action="/validate-uts/{{$idnya}}" method="POST">
                    @csrf
                    <div class="modal-body">


                        {{-- <div class="form-group">

                            <label for="recipient-name" class="col-form-label">semester id : </label>
                            <select name="smt" class="form-control" style="height: 100px">
                                <option value=""></option>
                            </select>
                        </div> --}}

                        <div class="form-group">

                            <label for="recipient-name" class="col-form-label">Ujian Mhs : </label>
                            <select name="ujian[]" class="form-control" multiple style="height: 100px">
                                @foreach ($m2 as $i)
                                    <option value="{{ $i->tanggal_ujian }}">{{ $i->mahasiswa['nama_mahasiswa'] }}
                                    </option>
                                @endforeach


                            </select>
                        </div>

                        <div class="ml-2">
                            {{-- Jumlah Krs : {{ $krs->count() }} Matakuliah --}}

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Validate</button>
                    </div>
                </form>

            </div>
        </div>
    </div>





@endsection
