@extends('home')
@section('title', 'Mahasiswa Ujian')
@section('content')

    <div class="card-body">
        <h6></h6>
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

                    @foreach ($ujian as $item)
                        <tr>

                            <td>{{ $no++ }} </td>
                            <td>{{ $item->nama_mk }} </td>
                            <td>{{ $item->kelas['nama_kelas'] }} </td>
                            <td>
                                <a href="/active-mahasiswa/{{ $item->kelas['id']}}/{{$item->id}}"><button class="btn btn-primary"> Aktifkan Mahasiswa </button>
                                <a href="/list-mhs-ujian/{{ $item->kelas['id']}}/{{$item->id}}"><button class="btn btn-success"> E-ujian </button>
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
