@extends('home')
@section('title', ' admin')
@section('content')

    <div class="card-body">
        <h6 class="float-left"> Halaman Dosen</h6> <a href="">
            <h6></h6>
        </a>
        <h6 class="float-right"> <a href=""></a></h6>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="90%" cellspacing="0">
                <thead class="">

                    <a class="btn btn-success btn-sm" href=""><i class="fa fa-print"></i>
                        Absen</a>


                    <tr>
                        <th>Dosen</th>

                        <th>Mk Dosen</th>
                        <th>Kelas</th>



                    </tr>
                </thead>
                <br><br>
                <tbody>
                    @foreach ($m as $i)
                        <tr>
                            <td>{{ $i->dosen['nama_dosen'] }}</td>
                            <td>{{ $i->nama_mk }}</td>
                            <td><a href="/detail-dosen/{{ $i->dosen['id'] }}"><button
                                        class="btn btn-success">Detail</button></a></td>
                        </tr>
                    @endforeach







                </tbody>

            </table>
            {{ $m->links() }}



        </div>

    </div>



@endsection
