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

                    @forelse ($km as $item)
                        <tr>

                            <td>{{ $no++ }} </td>
                            @php
                                $d = App\Models\Dosen::find($item->matakuliah['dosen_id']);
                            @endphp
                            <td>{{ $item->matakuliah['nama_mk'] }}
                            <td>{{ $d->nama_dosen }}


                            <td>
                                <a href="detailkelasmahasiswa/{{ encrypt($item->matakuliah['dosen_id']) }}" class="btn btn-sm btn-info" <i
                                    class="bi bi-pencil-square" title="Detail Kelas"></i>Join Kelas</a>
                            </td>
                        </tr>




                         @empty

                        <a style="margin-left:40%; margin-top:20%; position: absolute; color:red; font-wight:bold">belum ada
                            Data</a>
                    @endforelse




                </tbody>

            </table>


        </div>

    </div>



@endsection
