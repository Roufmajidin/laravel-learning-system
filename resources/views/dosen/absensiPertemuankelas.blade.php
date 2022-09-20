@extends('home')
@section('title', 'Absensi ' )
@section('content')

    <div class="card-body">
        <div class="col">
        <h6 class=""> Matakuliah : {{$mk->nama_mk}} <br>
         Pertemuan Ke - {{$pertemuan->pertemuan_ke}} </h6>
        </div>




        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="90%" cellspacing="0">
                <thead class="">


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
                            @if ($item->status_absensi == 1)
                                <td> <a href="" class="btn btn-sm btn-info" <i class="bi bi-pencil-square"
                                        title="Detail Kelas">{{ $item->tanggal_absen }}</i></a></td>
                            @elseif ($item->status_absensi == '0')
                                <td>Belum absen</td>
                                <td>
                                    <a href="/absensi-mhs/{{ $item->mahasiswa['id'] }}" class="btn btn-sm btn-info" <i
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
