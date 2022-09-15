@extends('home')
@section('title', 'Mk Dosen')
@section('content')

    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="90%" cellspacing="0">
                <thead class="">

                    <a class="btn btn-success btn-sm" href=""><i class="fa fa-print"></i> Print Data</a>
                    <tr>
                        {{-- <th>No</th> --}}

                    <th>Kelas</th>
                        <th>Aksi</th>

                    </tr>
                </thead>
                <br><br>
                <tbody>
                    @php
                        $no = 1;
                    @endphp

                    @foreach ($matkulDosen->kelas as $item)
                        <tr>

                            <td>{{ $item->nama_kelas }} </td>

                            <td>
                                <a href="/kelas-detail/{{ encrypt($item->id) }}" class="btn btn-sm btn-info" <i
                                    class="bi bi-pencil-square" title="Detail Kelas"></i>detail Kelas</a>
                                <a href="/detail-penugasan/{{ encrypt($item->id) }}" class="btn btn-sm btn-info" <i
                                    class="bi bi-pencil-square" title="Detail Kelas"></i>detail Penugasan</a>
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
