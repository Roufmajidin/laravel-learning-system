@extends('home')
@section('title', 'Kelas Mahasiswa')
@section('content')

    <div class="card-body">
        <h6 class="float-left"> Ssemua Kelas : </h6> <a href="">
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
                    @forelse ($kelas as $i)
                        <tr>
                            <td>{{ $i->nama_kelas }}</td>
                            <td><a href="/kelas/{{ encrypt($i->id) }}"><button class="btn btn-success">Detail
                                        Kelas</button></a>
                                <a href="/krs-mahasiswa/{{ $i->id }}"><button class="btn btn-success">Detail
                                        Krs</button></a>
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
    <button type="button" style="width:1000px" class="btn btn-primary float-md-left ml-4" data-toggle="modal" data-target="#exampleModalDisable">
        Disable Krs Mahasiswa
    </button>


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


    <!-- Modal diable -->

      <div class="modal fade" id="exampleModalDisable" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Disable Krs</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/validateDisKrs" method="POST">
                    @csrf
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Semua Krs Mahasiswa (CTR + A) </label>

                            <select style="height: 400px" name="kelas" class="form-control" multiple>

                            @foreach ($mahasiswa as $i)
                            <option value="">{{$i->nama_mahasiswa}} ========> ( Jumlah Krs : {{$i->krs->count()}} )</option>

                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Valid</button>
                    </div>
                </form>

            </div>
        </div>

    </div>






@endsection
