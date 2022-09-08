@extends('home')
@section('title', 'List Mahasiswa Ujian')
@section('content')

    <div class="card-body">
        <h6></h6>
        </a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="90%" cellspacing="0">
                <thead class="">
                    <tr>
                        <th>No</th>
                        <th>Mahasiswa</th>
                        <th>File Jawaban</th>
                        <th>Waktu Pengumpulan</th>
                    </tr>
                </thead>
                <br><br>
                <tbody>
                    @php
                        $no = 1;
                    @endphp

                    @foreach ($m as $item)
                        <tr>

                            <td>{{ $no++ }} </td>

                            <td>{{ $item->mahasiswa['nama_mahasiswa'] }}</td>
                            {{-- <td>{{ $item->ujian}}</td> --}}
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

                        </tr>



                        </tr>
                    @endforeach

                </tbody>

            </table>


        </div>

    </div>

    </div>


@endsection
