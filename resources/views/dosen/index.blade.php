@extends('home')
@section('title', 'Dosen')
@section('content')

    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="90%" cellspacing="0">
                <thead class="">

                    <a href="" class="btn btn-sm btn-primary mr-2"><i class="fa fa-plus"></i>Tambah Data</a>
                    <a class="btn btn-success btn-sm" href=""><i class="fa fa-print"></i> Print Data</a>
                    <tr>
                        <th>No</th>
                        <th>Nama Kelas</th>
                        <th>Bidang Kompetensi</th>

                        <th>Detail</th>

                    </tr>
                </thead>
                <br><br>
                <tbody>
                    @php
                        $no = 1;
                    @endphp

                    @foreach ($dosen as $item)
                        <tr>

                            <td>{{ $no++ }} </td>
                            <td>{{ $item->nama_dosen }}
                            <td>{{ $item->mk_dosen }}

                            <td>
                                <a href="detailkelas/{{$item->id}}" class="btn btn-sm btn-info" <i
                                    class="bi bi-pencil-square" title="Detail Kelas"></i>Join Kelas</a>
                            </td>
                        </tr>



                        </tr>
                    @endforeach

                    @foreach ($detailJ as $item)
                        <tr>

                            <td>{{ $no++ }} </td>
                            <td>{{ $item->tanggal }}</td>


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
