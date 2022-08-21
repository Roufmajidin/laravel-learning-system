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
                        <th>Info</th>

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
                                <a href="/modul/{{ $item->id }}" class="btn btn-sm btn-info" <i
                                    class="bi bi-pencil-square" title="Materi"></i>Materi</a></td>
                                <td>
                             <a href="/absensi/{{ $item->id }}" class="btn btn-sm btn-info" <i
                                    class="bi bi-pencil-square" title="Materi"></i>absen pertemuan {{$item->pertemuan_ke}}</a>

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
