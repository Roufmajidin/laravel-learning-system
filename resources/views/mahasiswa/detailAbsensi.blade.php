@extends('home')
@section('title', ' Detail Absensi mu')
@section('content')

    <div class="card-body">
        <h6 class="float-left"> Matakuliah :  </h6> <a href="">
            <h6></h6>
        </a>
        <h6 class="float-right"> Kelas : <a href=""></a></h6>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="90%" cellspacing="0">
                <thead class="">
<<<<<<< HEAD

                        <a class="btn btn-success btn-sm" href="/absen/{{ $absens->id }}"><i class="fa fa-print"></i>
                            Absen</a>

=======
                    @if ($absens->id === $absens->id)
                        <a class="btn btn-success btn-sm" href="/absen/{{ $absens->id }}"><i class="fa fa-print"></i>
                            Absen</a>
                    @else
                        <a class="btn btn-success btn-sm" href="/absen/{{ $absens->id }}"><i class="fa fa-print"></i>
                            Abssssn</a>
                    @endif
>>>>>>> f05a7fe2a277def957606f2b19a9cc1a238e5e9e

                    <tr>
                        <th>Pertemuan Ke</th>

                        <th>Hadir Pada</th>
                        <th>Detail</th>



                    </tr>
                </thead>
                <br><br>
                <tbody>

                    @foreach ($absensi as $item)
                        <tr>

                            <td> {{ $item->dosen_jadwal['pertemuan_ke'] }}</td>
                            @if ($item->status_absensi === 0)
                            <td> Belum Absen</td>


                            @else
                            <td> {{ $item->tanggal_absen }}</td>
<<<<<<< HEAD
                            <td> {{ Carbon\Carbon::parse($item->tanggal_absen)->diffForHumans()}}</td>
=======
                            <td> {{ Carbon\Carbon::parse($item->created_at)->diffForHumans()}}</td>
>>>>>>> f05a7fe2a277def957606f2b19a9cc1a238e5e9e


                            @endif




                        </tr>
                    @endforeach



                    </tr>

                </tbody>

            </table>


        </div>

    </div>

    </div>


@endsection
