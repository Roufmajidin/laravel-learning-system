@extends('home')
@section('title', 'Mahasiswa Detail')
@section('content')

    <div class="card-body">
        @php
            $kelas = App\Models\Kelas::find($id);
        @endphp
        <h6 class="float-left" id="kelasid" data-id="{{ $kelas->id }}"> Data Mhs Kelas : {{ $kelas->nama_kelas }} </h6> <a href="">
            <h6></h6>
        </a>
        <h6 class="float-right"> <a href=""></a></h6>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="90%" cellspacing="0">
                <thead class="">

                    {{--  --}}

                    <button type="button" id="tambah" class="btn btn-primary float-md-right">
                        Tambah Mahasiswa
                    </button>



                    {{--  --}}
                    <tr>
                        <th>-</th>
                        <th>Nama Mahasiswa</th>
                        <th>More</th>

                    </tr>
                </thead>
                <br><br>
                <tbody>
                    {{-- @forelse ($mahas as $i)
                        <tr>
                            <td></td>
                            <td>{{ $i->nama_mahasiswa }}</td>
                            <td><a href="/kelas/{{ encrypt($i->id) }}"><button class="btn btn-success">Detail
                                        Kelas</button></a>
                            </td>

                        </tr>
                    @empty

                        <a style="margin-left:40%; margin-top:20%; position: absolute; color:red; font-wight:bold">belum ada
                            Data</a>
                    @endforelse --}}
                </tbody>

            </table>



        </div>


    </div>


    </div>
    <!-- Modal -->
    <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nama Mahasiswa: </label>
                        <input type="text" id="nama_mahasiswa" class="form-control" name="nama_mahasiswa" value=""
                            id="">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Kelas</label>
                        <select id="kelas" name="kelas" class="form-control">
                            @php
                                $kelas = App\Models\Kelas::find($id);
                            @endphp
                            <option value="{{ $kelas->id }}">{{ $kelas->nama_kelas }}</option>

                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary insert">Save changes</button>
                </div>


            </div>
        </div>
    </div>

    {{-- delete modal --}}
     <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <p style="text-align: center">Menghapus <span class="isi"></span></p>
                <input type="hidden" id="deleting_id">

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btnKonfirmHapus">Yes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>

@endsection
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}

@push('scripts')
    {{-- post admin --}}
    <script>
        $("#tambah").on('click', function() {
            $("#modalTambah").modal('show');
        });
        $(document).on('click', '.hapus', function() {
            // var id = $(this).val();
            var id = $(this).val();
            $('#deleteModal').modal('show');
            $('#modalTitle').html('Delete data')
            $('.isi').html(id);
            $('#deleting_id').val(id)

        })
        $(document).on('click', '.btnKonfirmHapus', function(e) {
            e.preventDefault();
            $(this).text('Deleting..');
            var id = $('#deleting_id').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "DELETE",
                dataType: "JSON",
                url: "/hapus-mhs/" + id,
                success: function() {
                    semuaData();
                    $('.btnKonfirmHapus').html('yes');

                    $('.close').click();
                }

            })

        })

        $(".insert").on('click', function() {
            var nama_mahasiswa = $("#nama_mahasiswa").val();
            var kelas = $("#kelas").val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                method: "POST",
                url: '{{ url('/tambah-mhs-proses') }}',
                data: {
                    'nama_mahasiswa': nama_mahasiswa,
                    'kelas': kelas,
                },
                success: function(e) {
                    // resetModal();
                    $(".close").click();
                    console.log(nama_mahasiswa);
                    semuaData();
                    // getDataFromDB();
                }
            });
        });
        semuaData();

        function semuaData() {
            var kelas_id = $("#kelas").val();


            $.ajax({
                type: "GET",
                datType: 'JSON',
                url: "/data-mhs-ajax/" + kelas_id,
                success: function(response) {
                    // console.log(data)
                    $('tbody').html("");
                    $.each(response.data, function(key, item) {
                        $('tbody').append('<tr>\
                                                    <td>' + item.nama_mahasiswa + '</td>\
                                                    <td>' + item.kelas_id + '</td>\
                                                    <td><button type="button" value="' + item.id + '" class="btn btn-primary hapus">Hapus</button>\
                                                    <button type="button" value="' + item.id + '" class="btn btn-primary" id="">Edit</button></td>\
                                                    \</tr>');

                    });

                }


            })
        }
    </script>
@endpush
