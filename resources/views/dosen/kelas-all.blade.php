@extends('home')
@section('title', 'Kelas All')
@section('content')

    <div class="card-body">
        <h5 class="float-right">kelas {{ $kelas2020->nama_kelas }}</h5>

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="90%" cellspacing="0">
                <thead class="">

                    {{-- <a href="" class="btn btn-sm btn-primary mr-2"><i class="fa fa-plus"></i>Tambah Data</a> --}}
                    <a class="btn btn-success btn-sm" href=""><i class="fa fa-print"></i> Print Data</a>

                    <tr>
                        <th>No</th>
                        <th>Nama Kelas</th>
                        <th>NIM</th>

                        <th>Detail</th>

                    </tr>
                </thead>
                <br><br>
                <tbody>
                    @php
                        $no = 1;
                    @endphp

                    @foreach ($kelas2020->mahasiswa as $item)
                        <tr>

                            <td>{{ $no++ }} </td>
                            {{-- <td>{{ $item->nama_mk }} --}}
                            <td>{{ $item->nama_mahasiswa }}
                            <td>{{ $item->nim }}

                            <td>
                                <a href="/pertemuan/" class="btn btn-sm btn-info" <i class="bi bi-pencil-square"
                                    title="Detail Kelas"></i>Detail Kelas</a>
                            </td>
                        </tr>



                        </tr>
                    @endforeach

                </tbody>

            </table>


        </div>

    </div>


    <div class="card-body">
        <h5 class="float-right">kelas {{ $kelas2021->nama_kelas }}</h5>

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="90%" cellspacing="0">
                <thead class="">

                    {{-- <a href="" class="btn btn-sm btn-primary mr-2"><i class="fa fa-plus"></i>Tambah Data</a> --}}
                    <a class="btn btn-success btn-sm" href=""><i class="fa fa-print"></i> Print Data</a>

                    <tr>
                        <th>No</th>
                        <th>Nama Kelas</th>
                        <th>NIM</th>

                        <th>Detail</th>

                    </tr>
                </thead>
                <br><br>
                <tbody>
                    @php
                        $no = 1;
                    @endphp

                    @foreach ($kelas2021->mahasiswa as $item)
                        <tr>

                            <td>{{ $no++ }} </td>
                            {{-- <td>{{ $item->nama_mk }} --}}
                            <td>{{ $item->nama_mahasiswa }}
                            <td>{{ $item->nim }}

                            <td>
                                <a href="/pertemuan/" class="btn btn-sm btn-info" <i class="bi bi-pencil-square"
                                    title="Detail Kelas"></i>Detail Kelas</a>
                            </td>
                        </tr>



                        </tr>
                    @endforeach

                </tbody>

            </table>


        </div>

    </div>

    </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        aasasas
    </div>
    <!-- /.card-footer-->
    </div>


@endsection
