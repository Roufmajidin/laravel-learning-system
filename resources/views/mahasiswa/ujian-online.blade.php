@extends('home')
@section('title', 'Ujian Studis')
@section('content')

    <div class="card-body">
        {{-- @php
        $m = App\Models\Mahasiswa::with('kelas')->where('user_id', Auth::user()->id)->first();
    @endphp
        <h6 class="float-left"> none :  {{ $m->nama_mahasiswa }} </h6> <a href="">
            <h6></h6>
        </a> --}}

        @if ($type->type_ujian == 'UTS')
            <h6 class="float-right"> Ujian Tengah Semester<a href=""></a></h6>
        @else
            <h6 class="float-right"> Ujian Akhir Semester<a href=""></a></h6>
        @endif
        {{-- semester 1 --}}
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="90%" cellspacing="0">
                <thead class="">




                    <tr>
                        <th>-</th>
                        <th>Matakuliah</th>
                        <th>Soal</th>
                        <th>Source</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <br>
                @php
                    $semester = App\Models\Semester::find($ujian->semester_id);
                @endphp
                <br class="text-center"><strong>Semester {{ $semester->semester }}</strong><br>
                <tbody>
                    @php
                        $p = 1;
                    @endphp

                    @forelse ($ujiane as $item)
                        <tr>

                            <td> {{ $p++ }}</td>
                            <td> {{ $item->matakuliah->nama_mk }}</td>
                            <td> {{ $item->soal_ujian }}</td>
                            @if ($item->file_jawaban == null)
                                <td> None</td>
                            @else
                                <td><a href="">{{ $item->file_jawaban }}</a></td>
                            @endif
                            @if ($item->file_jawaban !== null)
                                <td>Hadir </td>
                            @else
                                <td><a href="/mhsJawaban/{{ $item->id }}">Kumpulkan Jawaban</a></td>
                            @endif



                        </tr>
                    @empty

                        <a style="margin-left:40%; margin-top:20%; position: absolute; color:red; font-wight:bold">
                            Sesi Ujian Berakhir/ No Updated <i style="color:blue" id="myButton"
                                class="fas fa-question"></i>
                        </a>
                    @endforelse




                    </tr>

                </tbody>

            </table>


        </div>

        {{-- semester 2 --}}

    </div>

    </div>


@endsection
@push('scripts')
    <script>
        // With the above scripts loaded, you can call `tippy()` with a CSS
        // selector and a `content` prop:
        tippy('#myButton', {
            content: 'Data Ujian Sudah Di validasi Oleh Dosen, Silahkan Cek Hasil Studi !',
        });
    </script>
@endpush
