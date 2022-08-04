@extends('home')
@section('title', 'Kelas')
@section('content')

    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="90%" cellspacing="0">
                <thead class="">
                    @foreach ($dosen as $item)

                    <a href="/tambahpertemuan/{{$item->id}}" class="btn btn-sm btn-primary mr-2"><i class="fa fa-plus"></i>Tambah Data</a>
                    @endforeach
                    <a class="btn btn-success btn-sm" href=""><i class="fa fa-print"></i> Print Data</a>
                    <tr>
                        <th>No</th>
                        <th>Pertemuan</th>
                        <th>Jam Kelas</th>
                        <th>Nama Kelas</th>

                        <th>Detail</th>
                        <th>Lebih</th>

                    </tr>
                </thead>
                <br><br>
                <tbody>
                    @php
                        $no = 1;
                    @endphp

                    @foreach ($detailJ as $item)
                        <tr>

                            <td>{{ $no++ }} </td>
                            <td>{{ $item->pertemuan_ke }}
                            <td>{{ $item->tanggal }}
                            <td>{{ $item->kelas['nama_kelas'] }}
                            <td>{{ $item->jam_mk }}

                            <td>

                                <a href="/pertemuan/{{$item->id}}" class="btn btn-sm btn-info" <i
                                    class="bi bi-pencil-square" title="Detail Kelas"></i>Detail Kelas</a>
                            </td>
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
