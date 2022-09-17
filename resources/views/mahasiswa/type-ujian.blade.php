@extends('home')
@section('title', 'Ujian MHS')
@section('content')

    <div class="card-body">
    {{-- @php
        $m = App\Models\Mahasiswa::with('kelas')->where('user_id', Auth::user()->id)->first();
    @endphp
        <h6 class="float-left"> none :  {{ $m->nama_mahasiswa }} </h6> <a href="">
            <h6></h6>
        </a> --}}

        <h6 class="float-right"> Kelas :<a href=""></a></h6>
       {{-- semester 1 --}}
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="90%" cellspacing="0">
                <thead class="">

                        <a class="btn btn-success btn-sm" href="#"><i class="fa fa-print"></i>
                            Print</a>


                    <tr>
                        <th>-</th>

                        <th>Pilih</th>

                    </tr>
                </thead>
                <br>
                <br class="text-center"><strong>Ujian Mahasiswa</strong><br>
                <tbody>
                @php
                    $p = 1;
                @endphp


                            <td> {{ $p++ }}</td>
                            @php
                                $ui ='UTS';
                                $uii = 'UAS';
                            @endphp
                            <td>
                            <a href="/type/{{ encrypt($ui)}}"><button class="btn btn-primary">UTS</button></a>
                            <a href="/type/{{encrypt($uii)}}"><button class="btn btn-primary">UAS</button></a>
                            </td>






                </tbody>

            </table>

        </div>

    </div>

    </div>


@endsection
