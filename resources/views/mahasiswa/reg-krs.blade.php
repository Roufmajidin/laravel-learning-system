@extends('home')
@section('title', 'Reg Krs')
@section('content')
    <div class="card">
        <div class="card-header">
            {{-- <h4>Tambah Data </h4> --}}
        </div>
        <div class="card-body">

            <form class="form-group" action="/krs-online-proses" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="form-group ml-4 col-md-5 row">
                        <label style="color:#17a2b8">Mahasiswa : {{$mhs->nama_mahasiswa}}
                        </label>
                        <input type="text" class="form-control" value="{{$mhs->user_id}}" placeholder="as"
                            name="mahasiswa_id">
                    </div>


                     <div class="form-group ml-2 col-md-5">
                         <label style="color: red">Semester</label>

                        <select name="smt" class="form-control">

                            @if ($mhs->semester_id == 10)
                            <option value="mahasiswa_baru">Mahasiswa Baru</option>


                            @else
                            <option value="{{$smt->id}}">{{$smt->semester}}</option>


                            @endif

                        </select>

                    </div>
                      <div class="form-group ml-4 col-md-5">
                        <label style="color:#17a2b8">Semester : </label>
                         <select style="width: 600px;height:200px" name="krsMK[]" class="form-control" multiple>
                            @foreach ($mk as $i)

                            <option value="{{$i->id}}"><ul><li>{{$i->sks}} SKS ================{{$i->nama_mk}}</li></ul></option>
                            @endforeach

                        </select>
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
