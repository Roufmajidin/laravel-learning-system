@extends('home')
@section('title', 'Create Ujian')
@section('content')
    <div class="card">
        <div class="card-header">
            {{-- <h4>Tambah Data </h4> --}}
        </div>
        <div class="card-body">



            <form class="form-group" action="/update-mhs-proses" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-row">


                    <div class="form-group ml-4 ">
                        <label>Mahasiswa() </label>


                        <select style="width: 600px; height:200px" name="mahasiswa[{{$mahasiswa}}]" class="form-control" multiple>

                            @foreach ($mahasiswa as $i)
                                <option value="{{ $i->id }}">{{ $i->nama_mahasiswa }}</option>
                            @endforeach
                        </select>

                    </div>
                     <div class="form-group ml-4 ">
                        <label>Mahasiswa() </label>


                        <select style="width: 300px; height:200px" name="semester[]" class="form-control" multiple>

                            @foreach ($mahasiswa as $i)
                                @php
                                    $id = $i->semester_id;
                                @endphp
                                <option value="1">{{ $id+1  }}</option>
                            @endforeach
                        </select>

                    </div>

                    {{-- <div class="form-group ml-4 col-md-5">
                        <label style="color:#17a2b8">{{ $kelas->nama_kelas }}</label>
                        <input type="text" class="form-control" name="kelas_id" value="{{ $kelas->id }}"
                            placeholder="">

                    </div> --}}







                </div>

        </div>



        <div class="card-footer text-right">
            <button class="btn btn-primary mr-1" type="submit">Submit</button>
            <button class="btn btn-secondary" type="reset">Reset</button>
        </div>
    </div>
    </form>

@endsection
