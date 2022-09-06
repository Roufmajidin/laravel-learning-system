@extends('home')
@section('title', ' Semua Absensi')
@section('content')

    <div class="card-body">
        <h6 class="float-left"> Matakuliah : </h6> <a href="">
            <h6></h6>
        </a>
        <h6 class="float-right"> Kelas : <a href=""></a></h6>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="90%" cellspacing="0">
                <thead class="">

                    <a class="btn btn-success btn-sm" href=""><i class="fa fa-print"></i>
                        Absen</a>


                    <tr>
                        <th>Pertemuan Ke</th>

                        <th>Hadir Pada</th>
                        <th>Detail</th>



                    </tr>
                </thead>
                <br><br>
                <tbody>

                    @foreach ($k as $item)
                        <tr>

                            <td>Pertemuan <strong> {{ $item->dosen_jadwal['pertemuan_ke'] }} </strong></td>
                            @if ($item->status_absensi === 0)
                                <td class=""><a style="font-weight: 900;color:brown" href="#"> Belum Absen</a></td>
                            @else
                                <td> {{ $item->tanggal_absen }}</td>
                                <td> {{ Carbon\Carbon::parse($item->tanggal_absen)->diffForHumans() }}</td>
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
