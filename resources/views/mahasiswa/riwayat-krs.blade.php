@extends('home')
@section('title', 'Riwayat Krs')
@section('content')

    <div class="card-body">
        @php
            $m = App\Models\Mahasiswa::with('kelas')
                ->where('user_id', Auth::user()->id)
                ->first();
        @endphp
        <h6 class="float-left"> none : {{ $m->nama_mahasiswa }} </h6> <a href="">
            <h6></h6>
        </a>

        <h6 class="float-right"> Kelas : {{ $m->kelas['nama_kelas'] }}<a href=""></a></h6>
        {{-- semester 1 --}}
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="90%" cellspacing="0">
                <thead class="">

                    <a class="btn btn-success btn-sm" href="#"><i class="fa fa-print"></i>
                        Print</a>


                    <tr>
                        <th>-</th>
                        <th>Matakuliah</th>
                        <th>Sks</th>

                        <th>Keterangan</th>

                    </tr>
                </thead>
                <br>
                <br class="text-center"><strong>Semester 1</strong><br>
                <tbody>
                    @php
                        $p = 1;
                    @endphp

                    @foreach ($krs1 as $item)
                        <tr>

                            <td> {{ $p++ }}</td>
                            <td> {{ $item->matakuliah['nama_mk'] }}</td>
                            <td>{{ $item->matakuliah->sks }} </td>
                        </tr>
                    @endforeach





                    </tr>

                </tbody>

            </table>


        </div>

        {{-- semester2 --}}
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="90%" cellspacing="0">
                <thead class="">




                    <tr>
                        <th>-</th>
                        <th>Matakuliah</th>
                        <th>Sks</th>

                        <th>Keterangan</th>

                    </tr>
                </thead>
                <br>
                <br class="text-center"><strong>Semester 1</strong><br>
                <tbody>
                    @php
                        $p = 1;
                    @endphp

                    @foreach ($krs2 as $item)
                        <tr>

                            <td> {{ $p++ }}</td>
                            <td> {{ $item->matakuliah['nama_mk'] }}</td>
                            <td>{{ $item->matakuliah->sks }} </td>
                        </tr>
                    @endforeach





                    </tr>

                </tbody>

            </table>


        </div>


    </div>

    </div>


@endsection
