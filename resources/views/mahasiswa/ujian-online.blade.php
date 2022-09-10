@extends('home')
@section('title', 'Hasil Studis')
@section('content')

    <div class="card-body">
    {{-- @php
        $m = App\Models\Mahasiswa::with('kelas')->where('user_id', Auth::user()->id)->first();
    @endphp
        <h6 class="float-left"> none :  {{ $m->nama_mahasiswa }} </h6> <a href="">
            <h6></h6>
        </a> --}}

        <h6 class="float-right"> Kelas :<a href=""></a></h6>
       {{-- semester 1 --}}
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="90%" cellspacing="0">
                <thead class="">

                        <a class="btn btn-success btn-sm" href="#"><i class="fa fa-print"></i>
                            Print</a>


                    <tr>
                        <th>-</th>
                        <th>Matakuliah</th>
                        <th>Soal</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <br>
                <br class="text-center"><strong>Semester 1</strong><br>
                <tbody>
                @php
                    $p = 1;
                @endphp

                    @foreach ($ujiane as $item)
                        <tr>

                            <td> {{ $p++ }}</td>
                            <td> {{ $item->matakuliah->nama_mk }}</td>
                            <td> {{ $item->soal_ujian }}</td>
                            @if ($item->file_jawaban == NULL)
                            <td> None</td>

                            @else
                             <td><a href="">{{$item->file_jawaban}}</a></td>

                            @endif
                             @if ($item->file_jawaban !== NULL)
                             <td>Sudah </td>

                            @else
                            <td><a href="/mhsJawaban/{{$item->id}}">Kumpulkan Jawaban</a></td>


                            @endif



                        </tr>
                    @endforeach




                    </tr>

                </tbody>

            </table>


        </div>

         {{-- semester 2 --}}

    </div>

    </div>


@endsection
