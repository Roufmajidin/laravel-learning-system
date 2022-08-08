@extends('home')
@section('title', 'jadwal Mahasiswa')
@section('content')

    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="90%" cellspacing="0">
                <thead class="">

                    <tr>
                        <th>No</th>
                        <th>Nama Matakuliah</th>
                        <th>Dosen Pengampu</th>

                        <th>Detail</th>
                        <th>-</th>

                    </tr>
                </thead>
                <br><br>
                <tbody>
                    @php
                        $no = 1;
                    @endphp

                    @foreach ($k as $item)
                        <tr>

                            <td>{{ $no++ }} </td>
                            <td>{{ $item->nama_mk }}
                            <td>{{ $item->dosen['nama_dosen'] }}
                            <td>{{ $item->dosen['id'] }}

                            <td>
                                <a href="detailkelasmahasiswa/{{$item->id}}" class="btn btn-sm btn-info" <i
                                    class="bi bi-pencil-square" title="Detail Kelas"></i>Join Kelas</a>
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
        Footer
    </div>
    <!-- /.card-footer-->
    </div>


@endsection
