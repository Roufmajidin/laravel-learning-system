@extends('home')
@section('title', 'jadwal Mahasiswa')
@section('content')

    <div class="card-body">
    @php
        $m = App\Models\Matakuliah::where('dosen_id',$id)->first();
    @endphp
        <h6 class="float-left" id="idnya" data-id="{{ $id }}"> Matakuliah : {{ $m->nama_mk }}</h6>
        <a href="/cek-ativitas/{{ encrypt($id) }}">
            <h6 class="float-right btn btn-primary">Detail Aktivitas</h6>
        </a>
        <br>
        <div class="table-responsive">

            @php
            @endphp
            @foreach ($absen_urut as $ab)
                {{-- $ab = "a" --}}
                @if ($ab->status_absensi == 0)
                    <button class="btn btn-danger">P{{ $ab->dosen_jadwal['pertemuan_ke'] }}<br>

                    </button>
                @elseif($ab->status_absensi == 1)
                    <button class="btn btn-primary">P{{ $ab->dosen_jadwal['pertemuan_ke'] }}</button>
                @endif
            @endforeach
            <div class="mb-2">
            </div>

            {{-- <div aria-label="breadcrumb mt-2">
                <ol class="breadcrumb bg-primary text-white-all">
                    <i class="fas fa-question mr-3"><a style="font-size: 16px" href="">Jika Akan Mengumpulkan tugas
                            Klik pada tabel dibawah, pilih pertemuan pada Column Modul</a></i>
                </ol>
            </div> --}}

            <table class="table table-bordered" id="dataTable" width="90%" cellspacing="0">
                <thead class="">


                    <tr>
                        {{-- <th>No</th> --}}
                        <th>Pertemuan Ke</th>
                        <th>Jam MK</th>

                        <th>Tanggal</th>
                        <th>Modul</th>
                        <th>Info</th>
                        <th></th>

                    </tr>
                </thead>
                <br><br>
                <tbody>
                    @php
                        $no = 1;
                        // $ab = App\Models\Absensi::;
                    @endphp

                    @foreach ($absen as $item)
                        <tr id="user_data">

                            {{-- <td>{{ $no++ }} </td> --}}
                            <td>{{ $item->dosen_jadwal['pertemuan_ke'] }}
                            <td>{{ $item->dosen_jadwal['jam_mk'] }} WIB</td>
                            {{-- <td>{{ $item->dosen_jadwal['tanggal']->diffForHumans() }}</td> --}}

                            <td></td>
                            <td><a href="/lihat-materi/{{ Crypt::encrypt($item->dosen_jadwal['id']) }}">Detail</a>
                            </td>




                            @if ($item->status_absensi === 0)
                                <td class=""><a href="/absen/{{ Crypt::encrypt($item->dosen_jadwal['id']) }}"
                                        style="font-weight: 900;color:brown" href="#"> Belum Absen</a></td>
                            @else
                                <td><button class="btn btn-primary">sudah</button></td>
                                <td> {{ Carbon\Carbon::parse($item->tanggal_absen)->diffForHumans() }}</td>
                            @endif




                            </td>
                    @endforeach
                    {{-- {{$absen->links()}} --}}




                </tbody>

            </table>
            {!! $absen->links() !!}


        </div>

    </div>

    </div>
    </div>
@endsection

    {{-- @push('scripts')
        <script>
            $(document).ready(function() {
                $(document).on('click', '.pagination a', function(event) {

                    event.preventDefault();
                    var page = $(this).attr('href').split('page=')[1];
                    // alert(page);
                    getMore(page);
                });
            });

            function getMore(page) {
                let idnya = $('#idnya').val();
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    type: "GET",
                    url: "{{ route('test') }}" + "?page=" + page,
                    // data: "data",
                    // data: {
                    //     _methode: "POST",
                    //     _token: CSRF_TOKEN,
                    //     idnya: idnya,
                    // },
                    success: function(data) {

                        console.log(data);
                        console.log(idnya);
                        // alert();
                        $('#user_data').html(data)

                    }
                });

            }
        </script>
    @endpush --}}


