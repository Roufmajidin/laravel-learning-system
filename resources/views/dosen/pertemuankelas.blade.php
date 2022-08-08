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
                            @if (!empty($item))
                           <td> <a href="" class="btn btn-sm btn-info" <i class="bi bi-pencil-square"
                                    title="Detail Kelas">{{$item->tanggal_absen}} || {{$item->created_at}}</i></a></td>
                            @else

                                <td>Belum absen</td>
                                 <td>
                                <a href="/absen/{{$item->id}}" class="btn btn-sm btn-info" <i class="bi bi-pencil-square"
                                    title="Detail Kelas"></i>Ingatkan</a>
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
