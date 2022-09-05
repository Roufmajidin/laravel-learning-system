@extends('home')
@section('title', 'Absensi')
@section('content')

    <div class="card-body">
        <h6 class="float-left"> Matakuliah : </h6> <a href="">
            <h6></h6>
        </a>
        <h6 class="float-right"> Kelas : <a href=""></a></h6>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="90%" cellspacing="0">
                <thead class="">

                    <a href="/tambahpertemuan/" class="btn btn-sm btn-primary mr-2"><i class="fa fa-plus"></i>Tambah
                        Pertemuan</a>
                    <a class="btn btn-success btn-sm" href=""><i class="fa fa-print"></i> Print Data</a>
                    <tr>
                        <th>No</th>
                        <th>Mahasiswa</th>
                        <th>Tanggal MK</th>
                        <th>Hadir Pada</th>
                        <th>Opsi</th>



                    </tr>
                </thead>
                <br><br>
                <tbody>

                    @php
                        $no = 1;
                    @endphp

                    @foreach ($absensi as $item)
                        <tr>

                            <td>{{ $no++ }} </td>
                            <td>{{ $item->mahasiswa->nama_mahasiswa }}</td>
                            <td>{{ $item->dosen_jadwal['tanggal'] }}</td>
<<<<<<< HEAD
                            @if ($item->status_absensi == 1)
                                <td> <a href="" class="btn btn-sm btn-info" <i class="bi bi-pencil-square"
                                        title="Detail Kelas">{{ $item->tanggal_absen }}</i></a></td>
=======
                            @if ($item->status_absensi == '1')
                                <td> <a href="" class="btn btn-sm btn-info" <i class="bi bi-pencil-square"
                                        title="Detail Kelas">{{ $item->tanggal }}</i></a></td>
>>>>>>> f05a7fe2a277def957606f2b19a9cc1a238e5e9e
                            @elseif ($item->status_absensi == '0')
                                <td>Belum absen</td>
                                <td>
                                    <a href="/absen/{{ $item->id }}" class="btn btn-sm btn-info" <i
                                        class="bi bi-pencil-square" title="Detail Kelas"></i>Ingatkan</a>
                                </td>
                            @endif



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
