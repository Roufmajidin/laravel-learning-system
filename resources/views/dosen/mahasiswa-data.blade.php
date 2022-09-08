@extends('home')
@section('title', 'data Mahasiswa ')
@section('content')

    <div class="card-body">
        <h6 class="float-left"> Data Mahasiswa :</h6> <a href="">
            <h6> </h6>
        </a>
        <h6 class="float-right"> Kelas : <a href=""></a></h6>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="90%" cellspacing="0">
                <thead class="">

                    <a href="/tambahpertemuan/" class="btn btn-sm btn-primary mr-2"><i class="fa fa-plus"></i>Tambah
                        Pertemuan</a>
                    <a class="btn btn-success btn-sm" href=""><i class="fa fa-print"></i> Print Data</a>
                    <tr>
                        <th>No</th>
                        <th>Nama Mahasiswa</th>
                        <th>NIM</th>

                        <th>Absensi</th>

                    </tr>
                </thead>
                <br><br>
                <tbody>
                    @php
                        $no = 1;
                    @endphp

                    @forelse ($m->mahasiswa as $item)
                        <tr>

                            <td>{{ $no++ }} </td>
                            <td>{{ $item->nama_mahasiswa }}
                            <td>{{ $item->nim }}

                            <td>
                                <a href="/detail-te/" class="btn btn-sm btn-info" <i class="bi bi-pencil-square"
                                    title="Detail Kelas"></i>belum</a>
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




@endsection
