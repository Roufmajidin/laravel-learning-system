@extends('home')
@section('title', 'Kelas')
@section('content')

    <div class="card-body">
        <h6>KELAS {{ $kelas->nama_kelas }} <span></span></h6>

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" cellspacing="0">
                <thead class="">

                    <a href="/tambahpertemuan/{{ $kelas->id }}" class="btn btn-sm btn-primary mr-2"><i
                            class="fa fa-plus"></i>Tambah Data</a>
                    <a class="btn btn-success btn-sm" href=""><i class="fa fa-print"></i> Print Data</a>
                    <tr>
                        {{-- <th>No</th> --}}

                        <th>Jam Kelas</th>
                        <th>Pertemuan</th>
                        <th>Jam Mk</th>
                        <th>Info</th>

                    </tr>
                </thead>
                <br><br>
                <tbody>
                    @php
                        $no = 1;
                    @endphp

                    @forelse ($detailJ as $item)
                        <tr>

                            {{-- <td>{{ $no++ }} </td> --}}

                            <td>{{ $item->tanggal }}
                            <td>Pertemuan <strong>{{ $item->pertemuan_ke }}</strong></td>
                            <td>{{ $item->jam_mk }}

                            <td>
                                <a href="/pertemuan/{{ $item->id }}" class="btn btn-sm btn-info" <i
                                    class="bi bi-pencil-square" title="Detail Kelas"></i>Absen Kelas</a>
                                <a href="/materi_detail/{{ $item->id }}" class="btn btn-sm btn-info" <i
                                    class="bi bi-pencil-square" title="Detail Kelas"></i>Materi</a>
                                <a href="/buat-absen/{{ $item->id }}" class="btn btn-sm btn-info" <i
                                    class="bi bi-pencil-square" title="Detail Kelas"></i>Buat Absen</a>

                            </td>
                        </tr>

                          @empty

                           <a style="margin-left:40%; margin-top:20%; position: absolute; color:red; font-wight:bold">belum ada Data</a>


                    @endforelse

                </tbody>

            </table>


        </div>

    </div>

    </div>
    <!-- /.card-body -->


@endsection
