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

                        <th>Mata Kuliah</th>
                        <th>Kelas</th>

                    </tr>
                </thead>
                <br><br>
                <tbody>
                    @php
                        $no = 1;
                    @endphp

                    @foreach ($matkulDosen as $item)
                        <tr>

                            {{-- <td>{{ $no++ }} </td> --}}


                            <td>{{ $item->nama_mk }}

                            <td>
                                <a href="/kelas-detail/{{ $item->kelas['id'] }}" class="btn btn-sm btn-info" <i
                                    class="bi bi-pencil-square" title="Detail Kelas"></i>detail {{ $item->kelas['nama_kelas'] }}</a>
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
