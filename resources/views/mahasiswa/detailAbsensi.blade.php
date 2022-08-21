@extends('home')
@section('title', ' Detail Absensi mu')
@section('content')

    <div class="card-body">
        <h6 class="float-left"> Matakuliah : </h6> <a href="">
            <h6></h6>
        </a>
        <h6 class="float-right"> Kelas : <a href=""></a></h6>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="90%" cellspacing="0">
                <thead class="">
                @if ($absens->id === $absens->id)
                    <a class="btn btn-success btn-sm" href="/absen/{{$absens->id}}"><i class="fa fa-print"></i> Absen</a>

                   @else
                    <a class="btn btn-success btn-sm" href="/absen/{{$absens->id}}"><i class="fa fa-print"></i> Abssssn</a>


                @endif

                    <tr>
                        <th>Pertemuan Ke</th>

                        <th>Hadir Pada</th>
                        <th>mhs id</th>



                    </tr>
                </thead>
                <br><br>
                <tbody>

                    @foreach ($absensi as $item)





                                <tr>

                                    <td> {{ $item->dosen_jadwal['pertemuan_ke'] }}</td>
                                    <td> {{ $item->tanggal_absen }}</td>
                                    <td> {{ $item->mahasiswa_id }}</td>




                                </tr>
                        @endforeach



                    </tr>

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
