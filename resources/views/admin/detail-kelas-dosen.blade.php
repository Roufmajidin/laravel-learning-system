@extends('home')
@section('title', ' detail Dosen')
@section('content')

    <div class="card-body">
        <h6 class="float-left"> Halaman Detail Dosen : {{ $dosen->nama_dosen }}</h6> <a href="">
            <h6></h6>
        </a>
        <h6 class="float-right"> <a href=""></a></h6>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="90%" cellspacing="0">
                <thead class="">

                    {{--  --}}

                    <button type="button" class="btn btn-primary float-md-right" data-toggle="modal"
                        data-target="#exampleModal">
                        Tambah Kelas
                    </button>



                    {{--  --}}
                    <tr>
                        <th>Kelas</th>
                        <th>More</th>

                    </tr>
                </thead>
                <br><br>
                <tbody>
                    @forelse ($dosen->kelas as $i)
                        <tr>
                            <td>{{ $i->nama_kelas }}</td>
                            @php
                                $m = App\Models\Matakuliah::with('dosen')
                                    ->where('dosen_id', Auth::user()->id)
                                    ->first();

                            @endphp
                            {{-- <td><a href="/aktifkan-kelas-dosen/{{ $i->id }}/{{$dosen->id}}"><button
                                        class="btn btn-success">Aktifkan Kelas</button></a>
                            </td> --}}
                            <td><a href="#edit"><button class="btn btn-success">Edit Kelas</button></a>
                            </td>

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
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/dosen-kelas-tambah/{{ $dosen->id }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Dosen id : </label>
                            <input type="text" class="form-control" name="dosen_id" value="{{ $dosen->id }}"
                                id="dosen_id">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nama Kelas : </label>
                            <select name="kelas" class="form-control">
                                @php
                                    $kelas = App\Models\Kelas::all();
                                @endphp
                                @foreach ($kelas as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_kelas }}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>

            </div>
        </div>
    </div>






@endsection
