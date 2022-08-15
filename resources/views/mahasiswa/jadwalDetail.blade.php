@extends('home')
@section('title', 'jadwal Mahasiswa')
@section('content')

    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="90%" cellspacing="0">
                <thead class="">

                     <tr>
                        <th>No</th>
                        <th>Pertemuan Ke</th>
                        <th>Jam MK</th>

                        <th>Tanggal</th>
                        <th>Modul</th>
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
                            <td>{{ $item->jam_mk }} WIB</td>
                            <td>{{ $item->tanggal }}</td>
                            {{-- <td><a href="#">{{ $item->file_pertemuan }}</a></td> --}}


                             <td>
                                <a href="/modul/{{ $item->file_pertemuan }}" class="btn btn-sm btn-info" <i
                                    class="bi bi-pencil-square" title="Materi"></i>Materi</a>
                            </td>



                                {{-- @if ( $item->absensi['''] == $item->id) --}}
                            {{-- validasi --}}
                            @php
                            $a = App\Models\Absensi::with('dosen_jadwal')->where('jadwal_id', $item->id);
                            $m = App\Models\Absensi::with('mahasiswa')->where('mahasiswa_id', Auth::user()->id)->get();
                            @endphp

                            @if (!empty($m->id))
                            <td>
                                <a href="/absen/{{ $item->id }}" class="btn btn-sm btn-info" <i
                                    class="bi bi-pencil-square" title="Detail Kelas"></i> sudah</a>
                            </td>
                            @else
                            <td>
                                <a href="/absen/{{ $item->id }}" class="btn btn-sm btn-info" <i
                                    class="bi bi-pencil-square" title="Detail Kelas"></i> bl</a>
                            </td>

@endif

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
