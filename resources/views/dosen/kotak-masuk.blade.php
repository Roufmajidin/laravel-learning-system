@extends('home')
@section('title', 'Kotak Masuk')
@section('content')

    <div class="card-body">
        <h6 class="float-left"> Kelas :</h6> <a href="">
            <h6></h6>
        </a>
        <h6 class="float-right"> <a href=""></a></h6>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="90%" cellspacing="0">
                <thead class="">


                    {{-- <button type="button" class="btn btn-primary float-md-right mb-2" data-toggle="modal"
                        data-target="#exampleModal"><i class="fas fa-question"></i>
                        Validasi
                    </button> --}}
                    <tr>

                        <th>-</th>
                        <th>Pesan</th>
                        <th>Tanggal</th>
                        <th>Ceklist</th>


                    </tr>
                </thead>
                <br><br>
                <tbody>
                    @forelse ($p as $i)
                        <tr>
                            <td>Admin</td>
                            <td>{{ $i->isi_pesan }}</td>

                            <td>{{ $i->created_at->diffForHumans() }}</td>


                           <td>
                            <input type="checkbox" data-toggle="toggle" data-on="Dibaca" class="toogle-class"
                                data-id="{{ $i->id }}" data-off="Tandai Baca?"
                                {{ $i->keterangan == true ? 'checked' : '' }}>
                        </td>


                        </tr>
                    @empty

                        <a style="margin-left:40%; margin-top:20%; position: absolute; color:red; font-wight:bold">
                        Krs Sudah di Validasi</a>
                    @endforelse


                </tbody>

            </table>



        </div>


    </div>


    </div>
    <!-- Modal -->
    {{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Krs Mahasiswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/validate-krs/" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            @php
                                $m = App\Models\Mahasiswa::where('kelas_id', $kelas->id)->find($mahasiswa->id);
                                $no = 1;
                            @endphp
                            <label for="recipient-name" class="col-form-label">Mahasiswa: {{ $m->nama_mahasiswa }} </label>
                            <input type="text" class="form-control" name="mahasiswa_id" value="{{ $m->id }}"
                                id="">
                        </div>

                        <div class="form-group">
                            @php
                                $semester = App\Models\Semester::find($m->semester_id);
                            @endphp
                            <label for="recipient-name" class="col-form-label">semester id : </label>
                            <select name="smt" class="form-control" style="height: 100px">
                                <option value="{{ $m->semester_id }}">{{ $semester->semester }}</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">
                            Matakuliah :
                            <a style=" color:rgb(0, 255, 42); font-wight:bold">
                        Notice !  <i style="color:blue" id="myButton" class="fas fa-question"></i>
                        </a>
                            </label>
                            <select name="krs[]" class="form-control" multiple style="height: 100px">
                                @foreach ($krs as $i)
                                    @if ($i->status == 1)
                                        <option style="color: green" value="{{ $i->matakuliah['id'] }}" disabled >
                                            {{ $no++ }}.{{ $i->matakuliah['nama_mk'] }} </option>
                                    @else
                                        <option value="{{ $i->matakuliah['id'] }}">
                                            {{ $no++ }}.{{ $i->matakuliah['nama_mk'] }}</option>
                                    @endif
                                @endforeach


                            </select>
                        </div>

                        <div class="ml-2">
                            Jumlah Krs : {{ $krs->count() }} Matakuliah

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Validate</button>
                    </div>
                </form>

            </div>
        </div>
    </div> --}}






@endsection
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

@push('scripts')
<script>
      // With the above scripts loaded, you can call `tippy()` with a CSS
      // selector and a `content` prop:
      tippy('#myButton', {
        content: 'Mk Berwarna Hijau Artinya Krs yang diambil sebelumnya, silahkan CTRL + A',
      });
    </script>

    <script>
        $(function() {
            $('#toggle-two').bootstrapToggle({
                on: 'diproses',
                off: 'pesanan M'
            });
        })
    </script>
    <script>
        $('.toogle-class').on('change', function() {
            var keterangan = $(this).prop('checked') == true ? 1 : 0;
            // console.log(status);
            var id = $(this).data('id');
            console.log(id);
            $.ajax({

                type: 'GET',
                dataType: 'JSON',
                url: '{{ route('update-status') }}',
                data: {
                    'keterangan': keterangan,
                    'id': id
                },
                success: function(data) {
                    console.log(data);

                }

            })


        });
    </script>

@endpush
