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
                        <th>Semester </th>
                        <th>MK Id</th>
                        <th>Input Nilai</th>
                    </tr>
                </thead>
                <br><br>
                <tbody>
                    @php
                        $no = 1;
                    @endphp

                    @forelse ($m as $item)
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
                            <td>{{$item->semester['semester']}}</td>

                            @php
                                $ma = App\Models\Matakuliah::find($item->matakuliah_id);
                            @endphp
                            <td>{{ $ma->nama_mk }}</td>
                            @if ($item->file_jawaban === null)
                                <td><a href="/submit-nilai-mhs/{{ $item->mahasiswa['id'] }}"><button disabled class="btn btn-secondary">Disbaled</button><a/></td>
                            @else
                                <td><a href="/submit-nilai-mhs/{{ $item->mahasiswa['id'] }}/{{ $ma->id }}/{{ $item->semester['id'] }}">Tap</a></td>
                            @endif


                        </tr>

                    @empty

                        <a style="margin-left:40%; margin-top:20%; position: absolute; color:red; font-wight:bold">belum ada
                            Data</a>
                    @endforelse



                </tbody>

            </table>


        </div>

    </div>

    </div>


@endsection
