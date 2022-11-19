@extends('home')
@section('title', 'List Mahasiswa Ujian')
@section('content')

    {{-- semestr 2 --}}
    <div class="card-body">
        <h6>Semster 2</h6>
        @php
            $m = App\Models\Mahasiswa::where('semester_id', $semester2)->count();
        @endphp
        <h6>Jumlah {{ $m }}</h6>

        </a>
        <a href="/update-mhs"><button class="btn btn-primary">update mhs Semester</button></a>


        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="90%" cellspacing="0">
                <thead class="">
                    <tr>
                        <th>No</th>
                        <th>Nama Semester</th>
                        <th>Aksi</th>

                    </tr>
                </thead>
                <br><br>
                <tbody>
                    @php
                        $no = 1;
                    @endphp

                    @forelse ($mahasiswas2 as $i)
                        <tr>

                            <td>{{ $no++ }} </td>

                            <td>{{ $i->nama_mahasiswa }}</td>
                            <td><a href="update-semester/{{ $i->id }}"><button class="btn btn-success">update semester
                                        Mahasiswa</button><a /></td>

                        </tr>

                    @empty

                        <a style="margin-left:40%; margin-top:20%; position: absolute; color:red; font-wight:bold">belum ada
                            Data</a>
                    @endforelse



                </tbody>

            </table>
            {{ $mahasiswas2->links() }}


        </div>

    </div>

    {{-- semester 4 --}}
    <div class="card-body">
        <h6>Semster 4</h6>
        </a>
        @php
            $m = App\Models\Mahasiswa::where('semester_id', $semester4)->count();
        @endphp
        <h6>Jumlah {{ $m }}</h6>

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="90%" cellspacing="0">
                <thead class="">
                    <tr>
                        <th>No</th>
                        <th>Nama Semester</th>
                        <th>Aksi</th>
                        {{-- <th><a href="/update-mhs/{{$semester4}}"><button class="btn btn-primary">update mhs Semester</button></a></th> --}}


                    </tr>
                </thead>
                <br><br>
                <tbody>
                    @php
                        $no = 1;
                    @endphp

                    @forelse ($mahasiswas4 as $i)
                        <tr>

                            <td>{{ $no++ }} </td>

                            <td>{{ $i->nama_mahasiswa }}</td>
                            <td><a href="update-semester/{{ $i->id }}"><button class="btn btn-success">update
                                        semester Mahasiswa</button><a /></td>

                        </tr>

                    @empty

                        <a style="margin-left:40%; margin-top:20%; position: absolute; color:red; font-wight:bold">belum ada
                            Data</a>
                    @endforelse



                </tbody>

            </table>
            {{ $mahasiswas4->links() }}


        </div>

    </div>

    {{-- semester5 --}}

    <div class="card-body">
        <h6>Semster 5</h6>
        @php
            $m = App\Models\Mahasiswa::where('semester_id', $semester5)->count();
        @endphp
        <h6>Jumlah : {{ $m }} </h6>
        </a>

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="90%" cellspacing="0">
                <thead class="">
                    <tr>
                        <th>No</th>
                        <th>Nama Semester</th>
                        <th>Aksi</th>
                        {{-- <th><a href="/update-mhs/{{$semester4}}"><button class="btn btn-primary">update mhs Semester</button></a></th> --}}


                    </tr>
                </thead>
                <br><br>
                <tbody>
                    @php
                        $no = 1;
                    @endphp

                    @forelse ($mahasiswas5 as $i)
                        <tr>

                            <td>{{ $no++ }} </td>

                            <td>{{ $i->nama_mahasiswa }}</td>
                            <td><a href="update-semester/{{ $i->id }}"><button class="btn btn-success">update
                                        semester Mahasiswa</button><a /></td>

                        </tr>

                    @empty

                        <a style="margin-left:40%; margin-top:20%; position: absolute; color:red; font-wight:bold">belum ada
                            Data</a>
                    @endforelse



                </tbody>

            </table>
            {{ $mahasiswas5->links() }}


        </div>

    </div>








@endsection
