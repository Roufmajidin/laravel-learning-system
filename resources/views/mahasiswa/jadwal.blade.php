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
                        <th>Tugas</th>


                    </tr>
                </thead>
                <br><br>
                <tbody>
                    @php
                        $no = 1;
                    @endphp

                    @foreach ($km->matakuliah as $item)
                        <tr>

                            <td>{{ $no++ }} </td>
                            <td>{{ $item->nama_mk }}
                            <td>{{ $item->dosen['nama_dosen'] }}


                            <td>
                                <a href="detailkelasmahasiswa/{{$item->dosen['id']}}" class="btn btn-sm btn-info" <i
                                    class="bi bi-pencil-square" title="Detail Kelas"></i>Join Kelas</a>
                            </td>
                        </tr>



                        </tr>
                    @endforeach




                </tbody>

            </table>


        </div>

    </div>



@endsection
