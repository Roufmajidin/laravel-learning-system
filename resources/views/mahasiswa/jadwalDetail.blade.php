@extends('home')
@section('title', 'jadwal Mahasiswa')
@section('content')

    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="90%" cellspacing="0">
                <thead class="">

                     <tr>
                        <th>No</th>
                        <th>Pertemuan KE</th>
                        <th>Jam MK</th>

                        <th>Tanggal</th>
                        <th>Status Absensi</th>

                    </tr>
                </thead>
                <br><br>
                <tbody>
                    @php
                        $no = 1;
                        // $ab = App\Models\Absensi::;
                    @endphp

                    @foreach ($pertemuan as $item)

                        <tr>

                            <td>{{ $no++ }} </td>
                            <td>{{ $item->pertemuan_ke }}
                            <td>{{ $item->jam_mk }} \\ {{ $item->dosen['nama_dosen'] }}</td>
                            <td>{{ $item->tanggal }}



                                {{-- @if ( $item->absensi['''] == $item->id) --}}
                            <td>
                                <a href="/absen/{{ $item->id }}" class="btn btn-sm btn-info" <i
                                    class="bi bi-pencil-square" title="Detail Kelas"></i> Kosong</a>
                            </td>
                            {{-- @else --}}
                             {{-- <td>
                                <a href="detailkelasmahasiswa/{{ $item->id }}" class="btn btn-sm btn-info" <i
                                    class="bi bi-pencil-square" title="Detail Kelas"></i> belum</a>
                            </td> --}}

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
