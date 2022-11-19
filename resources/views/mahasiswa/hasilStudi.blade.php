@extends('home')
@section('title', 'Hasil Studis')
@section('content')

    <div class="card-body">
        @php
            $m = App\Models\Mahasiswa::with('kelas')
                ->where('user_id', Auth::user()->id)
                ->first();
        @endphp
        <h6 class="float-left"> none : {{ $m->nama_mahasiswa }} </h6> <a href="">
            <h6></h6>
        </a>

        <h6 class="float-right"> Kelas : {{ $m->kelas['nama_kelas'] }}<a href=""></a></h6>
        {{-- semester 1 --}}
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="90%" cellspacing="0">
                <thead class="">

                    <a class="btn btn-success btn-sm" href="#"><i class="fa fa-print"></i>
                        Print</a>


                    <tr>
                        <th>-</th>
                        <th>Matakuliah</th>
                        <th>Nilai UTS</th>
                        <th>Nilai UAS</th>
                        {{-- <th>Semester</th> --}}
                        <th>Keterangan</th>
                        <th>Average</th>
                    </tr>
                </thead>
                <br>
                <br class="text-center"><strong>Semester 1</strong><br>
                <tbody>
                    @php
                        $p = 1;
                    @endphp

                    @foreach ($mhasilSemester1 as $item)
                        <tr>

                            <td> {{ $p++ }}</td>
                            <td> {{ $item->matakuliah['nama_mk'] }}</td>
                            <td>{{ $item->nilai_uts }} </td>
                            <td>{{ $item->nilai_uas }} </td>
                            {{-- <td>{{ $item->semester['semester'] }} </td> --}}
                            @php
                                $a = $item->nilai_uts + $item->nilai_uas;
                                // $b = sum($a);
                                $b = $a / 4;
                                $nilai_uas = ($item->nilai_uas * 50) / 100;
                                $nilai_uts = ($item->nilai_uas * 30) / 100;
                                $absen = (85 * 20) / 100;
                                $total = $nilai_uas + $nilai_uts + $absen;
                                // $persen = $
                            @endphp
                            {{-- <td>{{ $total }}</td> --}}
                            @if ($total > 85 and $total <= 100)
                                <td>A </td>
                            @elseif ($total > 76 and $total <= 85)
                                <td>B </td>
                            @elseif ($total > 65 and $total <= 76)
                                <td>C </td>
                            @elseif ($total > 40 and $total <= 65)
                                <td>D </td>
                            @endif
                            <td style="color: blue">{{ $total }}</td>
                        </tr>
                    @endforeach





                    </tr>

                </tbody>

            </table>


        </div>

        {{-- semester 2 --}}
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="90%" cellspacing="0">
                <thead class="">




                    <tr>
                        <th>-</th>
                        <th>Matakuliah</th>
                        <th>Nilai UTS</th>
                        <th>Nilai UAS</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <br>
                <br class="text-center"><strong>Semester 2</strong><br>
                <tbody>
                    @php
                        $p = 1;
                    @endphp

                    @foreach ($mhasilSemester2 as $item)
                        <tr>

                            <td> {{ $p++ }}</td>
                            <td> {{ $item->matakuliah['nama_mk'] }}</td>
                            <td>{{ $item->nilai_uts }} </td>
                            <td>{{ $item->nilai_uas }} </td>
                            @php
                                $a = $item->nilai_uts + $item->nilai_uas;
                                // $b = sum($a);
                                $b = $a / 2;
                            @endphp


                            <td>{{ $b }} </td>

                        </tr>
                    @endforeach
                    </tr>

                </tbody>

            </table>


        </div>

    </div>

    </div>


@endsection
