@extends('home')
@section('title', 'Detail Krs Mhs')
@section('content')
    <div class="card-body">
        <h6 class="float-left"> Kelas : {{ $kelas->nama_kelas }}</h6> <a href="">
            <h6></h6>
        </a>
        <h6 class="float-right mr-3"> <a href=""></a></h6>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="90%" cellspacing="0">
                <thead class="">

                    <button type="button" class="btn btn-primary float-md-right mb-2" data-toggle="modal"
                        data-target="#generateToken"><i class="fas fa-question"></i>
                        Generate Token
                    </button>
                    <button type="button" class="btn btn-primary float-md-right mb-2" data-toggle="modal"
                        data-target="#exampleModal"><i class="fas fa-question"></i>
                        Validasi
                    </button>

                    <tr>

                        <th>Matakuliah</th>
                        <th>Sks</th>
                        <th>Dosen Pengampu</th>
                        <th>Status_krs</th>

                    </tr>
                </thead>
                <br><br>
                <tbody>
                    <p>Semester Baru</p>
                    @forelse ($krs as $i)
                        <tr>
                            <td>{{ $i->matakuliah['nama_mk'] }}</td>
                            <td>{{ $i->matakuliah['sks'] }}</td>
                            @php
                                $dosen = App\Models\Dosen::find($i->matakuliah['dosen_id']);
                            @endphp
                            <td>{{ $dosen->nama_dosen }}</td>


                            @if ($i->status == 0)
                                <td><a href="">Belum di Acc</a></td>
                            @elseif($i->status == 1)
                                <td><a href="">Sudah</a></td>
                            @endif



                        </tr>
                    @empty

                        <a style="margin-left:40%; margin-top:20%; position: absolute; color:red; font-wight:bold">
                        </a>
                    @endforelse



                </tbody>

            </table>



        </div>


    </div>
    <div class="card-body">
        <h6 class="float-left"></h6> <a href="">
            <h6></h6>
        </a>
        <h6 class="float-right"> <a href=""></a></h6>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="90%" cellspacing="0">
                <thead class="">



                    <tr>

                        <th>Matakuliah</th>
                        <th>Sks</th>
                        <th>Dosen Pengampu</th>
                        <th>Status_krs</th>

                    </tr>
                </thead>
                <br><br>
                <tbody>
                    <p>Semester 1</p>
                    @forelse ($krsSemester1 as $i)
                        <tr>
                            <td>{{ $i->matakuliah['nama_mk'] }}</td>
                            <td>{{ $i->matakuliah['sks'] }}</td>
                            @php
                                $dosen = App\Models\Dosen::find($i->matakuliah['dosen_id']);
                            @endphp
                            <td>{{ $dosen->nama_dosen }}</td>


                            @if ($i->status == 0)
                                <td><a href="">Belum di Acc</a></td>
                            @elseif($i->status == 1)
                                <td><a href="">Sudah</a></td>
                            @endif



                        </tr>
                    @empty

                        <a style="margin-left:40%; margin-top:20%; position: absolute; color:red; font-wight:bold">
                        </a>
                    @endforelse



                </tbody>

            </table>



        </div>


    </div>

    {{-- semester 2 --}}
    <div class="card-body">
        <h6 class="float-left"></h6> <a href="">
            <h6></h6>
        </a>
        <h6 class="float-right"> <a href=""></a></h6>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="90%" cellspacing="0">
                <thead class="">



                    <tr>

                        <th>Matakuliah</th>
                        <th>Sks</th>
                        <th>Dosen Pengampu</th>
                        <th>Status_krs</th>

                    </tr>
                </thead>
                <br><br>
                <tbody>
                    <p>Semester 2</p>
                    @forelse ($krsSemester2 as $i)
                        <tr>
                            <td>{{ $i->matakuliah['nama_mk'] }}</td>
                            <td>{{ $i->matakuliah['sks'] }}</td>
                            @php
                                $dosen = App\Models\Dosen::find($i->matakuliah['dosen_id']);
                            @endphp
                            <td>{{ $dosen->nama_dosen }}</td>


                            @if ($i->status == 0)
                                <td><a href="">Belum di Acc</a></td>
                            @elseif($i->status == 1)
                                <td><a href="">Sudah</a></td>
                            @endif



                        </tr>
                    @empty

                        <a style="margin-left:40%; margin-top:20%; position: absolute; color:red; font-wight:bold">
                        </a>
                    @endforelse



                </tbody>

            </table>



        </div>


    </div>

    {{-- end --}}

    {{-- semester 3 --}}
    <div class="card-body">
        <h6 class="float-left"></h6> <a href="">
            <h6></h6>
        </a>
        <h6 class="float-right"> <a href=""></a></h6>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="90%" cellspacing="0">
                <thead class="">



                    <tr>

                        <th>Matakuliah</th>
                        <th>Sks</th>
                        <th>Dosen Pengampu</th>
                        <th>Status_krs</th>

                    </tr>
                </thead>
                <br><br>
                <tbody>
                    <p>Semester 3</p>
                    @forelse ($krsSemester3 as $i)
                        <tr>
                            <td>{{ $i->matakuliah['nama_mk'] }}</td>
                            <td>{{ $i->matakuliah['sks'] }}</td>
                            @php
                                $dosen = App\Models\Dosen::find($i->matakuliah['dosen_id']);
                            @endphp
                            <td>{{ $dosen->nama_dosen }}</td>


                            @if ($i->status == 0)
                                <td><a href="">Belum di Acc</a></td>
                            @elseif($i->status == 1)
                                <td><a href="">Sudah</a></td>
                            @endif



                        </tr>
                    @empty

                        <a style="margin-left:40%; margin-top:20%; position: absolute; color:red; font-wight:bold">
                        </a>
                    @endforelse



                </tbody>

            </table>



        </div>


    </div>

    {{-- end --}}


    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Krs Mahasiswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/validate-krs/" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            @php
                                $m = App\Models\Mahasiswa::where('kelas_id', $kelas->id)->find($mahasiswa->id);
                                $no = 1;
                            @endphp
                            <label for="recipient-name" class="col-form-label">Mahasiswa: {{ $m->nama_mahasiswa }} </label>
                            <input type="text" class="form-control" name="mahasiswa_id" value="{{ $m->user_id }}"
                                id="">
                        </div>

                        <div class="form-group">
                            @php
                                $semester = App\Models\Semester::find($m->semester_id);
                            @endphp
                            <label for="recipient-name" class="col-form-label">semester id : </label>
                            <select name="smt" class="form-control" style="height: 100px">
                                <option value="{{ $semester->id }}">{{ $semester->semester }}</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">
                                Matakuliah :
                                <a style=" color:rgb(0, 255, 42); font-wight:bold">
                                    Notice ! <i style="color:blue" id="myButton" class="fas fa-question"></i>
                                </a>
                            </label>
                            <select name="krs[]" class="form-control" multiple style="height: 100px">
                                @foreach ($krs as $i)
                                    @if ($i->status == 1)
                                        <option style="color: green" value="{{ $i->matakuliah['id'] }}" disabled>
                                            {{ $no++ }}.{{ $i->matakuliah['nama_mk'] }} </option>
                                    @else
                                        <option value="{{ $i->matakuliah['id'] }}">
                                            {{ $no++ }}.{{ $i->matakuliah['nama_mk'] }}</option>
                                    @endif
                                @endforeach


                            </select>
                        </div>

                        <div class="ml-2">
                            Jumlah Krs : {{ $krs->count() }} Matakuliah

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Validate</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

      <!-- Modal Token -->
    <div class="modal fade" id="generateToken" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Krs Mahasiswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/generate-token" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            @php
                                $m = App\Models\Mahasiswa::where('kelas_id', $kelas->id)->find($mahasiswa->id);
                                $no = 1;
                            @endphp
                            <label for="recipient-name" class="col-form-label">Mahasiswa: {{ $m->nama_mahasiswa }} </label>
                            <input type="text" class="form-control" name="mahasiswa_id" value="{{ $m->id }}"
                                id="">
                        </div>

                        <div class="form-group">
                            @php
                                $semester = App\Models\Semester::find($m->semester_id);
                            @endphp
                            <label for="recipient-name" class="col-form-label">semester id : </label>
                            <select name="smt" class="form-control" style="height: 100px">
                                <option value="{{ $semester->id }}">{{ $semester->semester }}</option>
                            </select>
                        </div>




                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Validate</button>
                    </div>
                </form>

            </div>
        </div>
    </div>






@endsection
@push('scripts')
    <script>
        // With the above scripts loaded, you can call `tippy()` with a CSS
        // selector and a `content` prop:
        tippy('#myButton', {
            content: 'Mk Berwarna Hijau Artinya Krs yang diambil sebelumnya, silahkan CTRL + A',
        });
    </script>
@endpush
