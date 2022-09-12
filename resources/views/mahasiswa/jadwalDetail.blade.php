@extends('home')
@section('title', 'jadwal Mahasiswa')
@section('content')

    <div class="card-body">
        <h6 class="float-left"> Matakuliah : </h6>
        <a href="/cekAbsenMhs/1">
            <h6 class="float-right btn btn-primary">Detail Absenmu</h6>
        </a>
        <br>
        <div class="table-responsive">

            @php
            @endphp
            @foreach ($absen as $ab)
                {{-- $ab = "a" --}}
                @if ($ab->status_absensi == 0)
                    <button class="btn btn-danger">P{{ $ab->dosen_jadwal['pertemuan_ke'] }}<br>

                    </button>
                @elseif($ab->status_absensi == 1)
                    <button class="btn btn-primary">P{{ $ab->dosen_jadwal['pertemuan_ke'] }}</button>
                @endif
            @endforeach


            <table class="table table-bordered" id="dataTable" width="90%" cellspacing="0">
                <thead class="">

                    <tr>
                        {{-- <th>No</th> --}}
                        <th>Pertemuan Ke</th>
                        <th>Jam MK</th>

                        <th>Tanggal</th>
                        <th>Modul</th>
                        <th>Info</th>
                        <th></th>

                    </tr>
                </thead>
                <br><br>
                <tbody>
                    @php
                        $no = 1;
                        // $ab = App\Models\Absensi::;
                    @endphp

                    @foreach ($absen as $item)
                        <tr>

                            {{-- <td>{{ $no++ }} </td> --}}
                            <td>{{ $item->dosen_jadwal['pertemuan_ke'] }}
                            <td>{{ $item->dosen_jadwal['jam_mk'] }} WIB</td>
                            <td>{{ $item->dosen_jadwal['tanggal'] }}</td>
                            <td><a
                                    href="/lihat-materi/{{ $item->dosen_jadwal['id'] }}">{{ $item->dosen_jadwal['file_pertemuan'] }}</a>
                            </td>




                            @if ($item->status_absensi === 0)
                                <td class=""><a href="/absen/{{ $item->dosen_jadwal['id'] }}"
                                        style="font-weight: 900;color:brown" href="#"> Belum Absen</a></td>
                            @else
                                <td><button class="btn btn-primary">sudah</button></td>
                                <td> {{ Carbon\Carbon::parse($item->tanggal_absen)->diffForHumans() }}</td>
                            @endif




                            </td>
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
