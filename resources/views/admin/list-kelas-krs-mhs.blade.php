@extends('home')
@section('title', 'Mahasiswa')
@section('content')

    <div class="card-body">
        <h6 class="float-left"> Kelas : {{ $kelas->nama_kelas }}</h6> <a href="">
            <h6></h6>
        </a>
        <h6 class="float-right"> <a href=""></a></h6>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="90%" cellspacing="0">
                <thead class="">


                    <button type="button" class="btn btn-primary float-md-right" data-toggle="modal"
                        data-target="#exampleModal">
                        Tambah Kelas
                    </button>
                    <tr>
                        <th>Mahasiswa</th>
                        <th>semester</th>
                        <th>Status_krs</th>
                        <th>krs sebelumnya</th>

                    </tr>
                </thead>
                <br><br>
                <tbody>
                    @forelse ($mahasiswa as $i)
                        <tr>
                            <td>{{ $i->nama_mahasiswa }}</td>
                            @php
                                $sem = App\Models\Semester::find($i->semester_id);
                            @endphp
                            <td>{{ $sem->semester }}</td>
                            <td><a href="/krs-mhs/{{ $i->user_id }}"><button class="btn btn-success">Detail</button></a>
                                @if ($i->krs_backup == null)
                            <td class="text-danger">Belum KRS <p class="text-success">
                                    @if ($i->token_krs == null)
                                        belum divalidasi
                                    @else
                                        {{ $i->token_krs }}
                                    @endif
                                </p>
                            </td>
                        @else
                            <td>{{ $i->krs_backup }}</td>
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
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/dosen-kelas-tambah/" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Dosen id : </label>
                            <input type="text" class="form-control" name="dosen_id" value="" id="dosen_id">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nama Kelas : </label>
                            <select name="kelas" class="form-control">


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
