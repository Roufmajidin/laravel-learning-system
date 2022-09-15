@extends('home')
@section('title', 'Penugasan_mhs')
@section('content')

    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="90%" cellspacing="0">
                <thead class="">
                    @php
                        $m = App\Models\Matakuliah::where('dosen_id', $dosen->id)->first();
                    @endphp
                    <a class="float-left" href=""><i class="fa fa-question"></i> Penugasan matakuliah <strong>
                            {{ $m->nama_mk }}</strong> </a>
                    <tr>
                        {{-- <th>No</th> --}}

                        <th>Nama Mahasiswa</th>
                        <th>Keterangan</th>
                        <th>Waktu Pengumpulan</th>
                        <th>Aksi</th>

                    </tr>
                </thead>
                <br><br>
                <tbody>
                    @php
                        $no = 1;
                    @endphp

                    @foreach ($ma as $i)
                        <tr>

                            {{-- <td>Pertemuan {{ $i->pertemuan_ke }} </td> --}}
                            @php
                                $M = App\Models\Mahasiswa::where('id', $i->mahasiswa_id)->get();
                            @endphp
                            <td>{{ $i->mahasiswa['nama_mahasiswa'] }} </td>
                            <td>{{ $i->ket }} </td>
                            <td>{{ $i->created_at->format('d M Y') }} </td>
                            <td><a href="#/{{ $i->file }}">Lihat Tugas</a> </td>

                            <td>
                                {{-- <a href="/kelas-detail/{{ encrypt($item->id) }}" class="btn btn-sm btn-info" <i
                                    class="bi bi-pencil-square" title="Detail Kelas"></i>detail Kelas</a>
                                <a href="/detail-penugasan/{{ encrypt($item->id) }}" class="btn btn-sm btn-info" <i
                                    class="bi bi-pencil-square" title="Detail Kelas"></i>detail Penugasan</a> --}}
                            </td>
                        </tr>



                        </tr>
                    @endforeach

                </tbody>

            </table>


        </div>

    </div>

    </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        Footer
    </div>
    <!-- /.card-footer-->
    </div>


@endsection
