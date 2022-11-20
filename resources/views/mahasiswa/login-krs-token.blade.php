@extends('home')
@section('title', 'Token Krs')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Masukkan Token Krs Sebelum select Matakuliah</h4>
            <h4 style="margin-left: 500px; font-weight:bold "><a href="/riwayat-krs">Riwayat Krs</a></h4>
        </div>
        <div class="card-body">

            <form class="form-group" action="/krs-token-login" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="form-group ml-4 col-md-5 row">
                        <label style="color:#17a2b8">Mahasiswa : {{ $mhs->nama_mahasiswa }}
                        </label>
                        <input type="text" class="form-control" value="{{ $mhs->user_id }}" placeholder="as"
                            name="mahasiswa_id">
                    </div>


                    <div class="form-group ml-2 col-md-5">
                        <label style="color: red">Semester</label>

                        <select name="smt" class="form-control">

                            @if ($mhs->semester_id == 10)
                                <option value="mahasiswa_baru">Mahasiswa Baru</option>
                            @else
                                <option value="{{ $smt->id }}">{{ $smt->semester }}</option>
                            @endif

                        </select>

                    </div>
                    <div class="form-group ml-4 col-md-5">
                        <label style="color: red"> Token KRS</label>
                        <input type="text" class="form-control" value=""
                            placeholder="Cek Email-mu untuk melihat Token KRS" name="token_krs">


                    </div>





                </div>

        </div>



        <div class="card-footer text-right">
            <button class="btn btn-primary mr-1" type="submit">Submit</button>
            <button class="btn btn-secondary" type="reset">Reset</button>
        </div>
    </div>
    </form>

@endsection
