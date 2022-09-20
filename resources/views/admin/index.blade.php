@extends('home')
@section('title', ' admin')
@section('content')

    <div class="card-body">
        {{-- <h6 class="float-left"> Halaman Dosen</h6> <a href=""> --}}
            <h6></h6>
        </a>
        <h6 class="float-right"> <a href=""></a></h6>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="90%" cellspacing="0">
                <thead class="">

                    <button type="button" class="btn btn-success float-md-right mb-2" data-toggle="modal"
                        data-target="#exampleModal"><i class="fas fa-envelope"></i>
                        Buat Pengumuman
                    </button>


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
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Buat Pengumuman</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/send-pengumuman/" method="POST">
                    @csrf
                    <div class="modal-body">


                        <div class="form-group">
                            <div class="form-group">

                            <label for="recipient-name" class="col-form-label">Isi Pesan:</label>
                            <input type="text" class="form-control" name="isi_pesan" value=""
                                id="">
                        </div>

                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">
                                    Tujuan
                                    <a style=" color:rgb(0, 255, 42); font-wight:bold">
                                        Notice ! <i style="color:blue" id="myButton" class="fas fa-question"></i>
                                    </a>
                                </label>
                                <select name="dosen[]" class="form-control" multiple style="height: 100px">
                                    @foreach ($dosen as $i)

                                        <option value="{{ $i->id }}">
                                            {{ $i->nama_dosen }}</option>
                                @endforeach


                                </select>
                            </div>

                            <div class="ml-2">
                                {{-- Jumlah Krs : {{ $krs->count() }} Matakuliah --}}

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Validate</button>
                        </div>
                </form>

            </div>
        </div>
    </div>



@endsection
@push('scripts')
<script>

      tippy('#myButton', {
        content: 'CTR+A (kirim untuk Tujuan Dosen',
      });
    </script>

@endpush
