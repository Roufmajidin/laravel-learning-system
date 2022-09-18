@extends('home')
@section('title', 'Detail Krs Mhs')
@section('content')

    <div class="card-body">
        <h6 class="float-left"> Kelas : {{$kelas->nama_kelas}}</h6> <a href="">
            <h6></h6>
        </a>
        <h6 class="float-right"> <a href=""></a></h6>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="90%" cellspacing="0">
                <thead class="">


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

                        <a style="margin-left:40%; margin-top:20%; position: absolute; color:red; font-wight:bold">belum ada
                            Data</a>
                    @endforelse


                </tbody>

            </table>



        </div>


    </div>


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
                            <label for="recipient-name" class="col-form-label">Mahasiswa: {{$m->nama_mahasiswa}} </label>
                            <input type="text" class="form-control" name="mahasiswa_id" value="{{$m->id}}"
                                id="">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Matakuliah : </label>
                            <select name="krs[]" class="form-control" multiple style="height: 100px">
                            @foreach ($krs as $i)

                            <option value="{{$i->matakuliah['id']}}"> {{$no++}}. {{$i->matakuliah['nama_mk']}}</option>
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






@endsection
