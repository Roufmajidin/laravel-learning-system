@extends('home')
@section('title', 'Aktivitas Mahasiswa')
@section('content')

    <div class="card-body">
        <h6 class="float-left"> Matakuliah : {{ $mk->nama_mk }} </h6> <a href="">
            <h6></h6>
        </a>
        @php
            $kelasMhs = App\Models\Mahasiswa::where('user_id', Auth::user()->id)->first();
            $kelas = App\Models\Kelas::where('id', $kelasMhs->kelas_id)->first();
        @endphp
        <h6 class="float-right"> Kelas : {{ $kelas->nama_kelas }} <a href=""></a></h6>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="90%" cellspacing="0">
                <thead class="">

                    @foreach ($absen as $ab)
                        @if ($ab->status_absensi == 0)
                            <button class="btn btn-danger mr-2">P{{ $ab->dosen_jadwal['pertemuan_ke'] }}<br>

                            </button>
                        @elseif($ab->status_absensi == 1)
                            <button class="btn btn-primary mr-2">P{{ $ab->dosen_jadwal['pertemuan_ke'] }}</button>
                        @endif
                    @endforeach


                    <tr>
                        <th>Pertemuan Ke</th>

                        <th>Hadir Pada</th>
                        <th>Detail</th>



                    </tr>
                </thead>
                <br>
                <br><p><strong> aktivitas Pengumpulan Tugas</strong></p><br>
                <tbody>

                    @foreach ($k as $item)
                        <tr>

                            <td>Pertemuan <strong> {{ $item->dosen_jadwal['pertemuan_ke'] }} </strong></td>
                            @if ($item->status_absensi === 0)
                                <td class=""><a style="font-weight: 900;color:brown" href="#"> Belum Absen</a></td>
                            @else
                                <td><button class="btn btn-primary">sudah</button></td>
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
