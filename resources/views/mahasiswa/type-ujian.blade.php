@extends('home')
@section('title', 'Ujian MHS')
@section('content')

    <div class="card-body">


        {{-- semester 1 --}}
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="90%" cellspacing="0">
                <thead class="">




                    <tr>
                        <th>-</th>

                        <th>Pilih</th>

                    </tr>
                </thead>
                <br>
                <tbody>
                    @php
                        $p = 1;
                    @endphp

                    <td> {{ $p++ }}</td>
                    @php
                        $ui = 'UTS';
                        $uii = 'UAS';
                    @endphp
                    <td>
                        <a href="/type/{{ encrypt($ui) }}"><button class="btn btn-primary">UTS</button></a>
                        <a href="/type/{{ encrypt($uii) }}"><button class="btn btn-primary">UAS</button></a>
                    </td>






                </tbody>

            </table>

        </div>

    </div>

    </div>


@endsection
