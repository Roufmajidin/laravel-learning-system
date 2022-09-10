@extends('home')
{{-- @section('title', 'Mahasiswa Ujian') --}}
@section('content')

    <div class="card-body">
    @php
        $p = App\Models\Matakuliah::with('dosen')->where('dosen_id', Auth::user()->id)->first();
    @endphp
        <h6>Dosen : {{$p->dosen['nama_dosen']}}</h6>
        <h6>Nama Mk : {{$p->nama_mk}}</h6>
        </a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="90%" cellspacing="0">
                <thead class="">
                    <tr>
                        <th>No</th>
                        <th>Matakuliah</th>
                        <th>Kelas</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <br><br>
                <tbody>
                    @php
                        $no = 1;
                    @endphp

                    @foreach ($ujian->kelas as $item)
                        <tr>

                            <td>{{ $no++ }} </td>
                            <td>{{ $item->nama_kelas }} </td>


                            <td>
                                <a href="/active-mahasiswa/{{ $item->id}}/{{$item->nama_kelas}}"><button class="btn btn-primary"> Aktifkan Mahasiswa </button>



                                <a href="/list-mhs-ujian/{{ $item->nama_kelas}}/{{$item->id}}"><button class="btn btn-success"> E-ujian </button>
                            </a>
                            </td>






                        </tr>



                        </tr>
                    @endforeach

                </tbody>

            </table>


        </div>

    </div>

    </div>


@endsection
