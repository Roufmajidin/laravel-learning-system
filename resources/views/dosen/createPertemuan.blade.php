@extends('home')
@section('title', 'Tambah Materi')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Tambah Data </h4>
        </div>
        <div class="card-body">



            <form class="form-group" action="/tambahpertemuanproses/{{$dosen->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="form-group ml-4 col-md-5 row">
                        <label style="color:#17a2b8">Dosen ID : {{$dosen->id}}
                        </label>
                        <input type="text" class="form-control  name=""
                            value="{{ $dosen->nama_dosen }}" placeholder="" disabled>

                    </div>
                    <div class="form-group ml-4 col-md-5">
                        <label style="color:#17a2b8">dosen_id</label>
                        <input type="text" class="form-control @error('dosen_id') is-invalid @enderror"
                            name="dosen_id" value="{{ $dosen->id }}" placeholder="{{ $dosen->id }}">
                        @error('dosen_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                </div>





                {{-- select --}}
                <div class="form-row">
                    <div class="form-group ml-4 ml-4 col-sm-5 pt-0 ">
                        <label>Pilih kelas</label>

                        <select name = "kelas_id" class="form-control">
                            @foreach ($kel as $item)
                                <option value="{{$item->id}}">{{ $item->nama_kelas }} | Id : {{$item->id}}</option>
                            @endforeach

                        </select>

                    </div>
                       <div class="form-group ml-2 col-sm-5 pt-0 ">
                        <label>Select</label>

                        <select name = "dosen_mk"class="form-control">
                            @foreach ($mk as $item)
                                <option value=" {{ $item->matakuliah['id'] }}">{{ $item->matakuliah['nama_mk'] }} {{ $item->matakuliah['id'] }}</option>
                            @endforeach

                        </select>

                    </div>

                    {{--  --}}



                </div>

                 <div class="form-group ml-4 ml-4 col-sm-5 pt-0">
                    <label style="color:#17a2b8">file Modul</label>
                    <input type="file" class="form-control" name="file"
                        value="" placeholder="Input Pdf/PPT">

                </div>



                <div class="form-group ml-4 ml-4 col-sm-5 pt-0">
                    <label style="color:#17a2b8">tanggal</label>
                    <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal"
                        value="" placeholder="">
                    @error('tanggal')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                {{-- Xx --}}

                 <div class="form-group ml-4 ml-4 col-sm-5 pt-0">
                    <label style="color:#17a2b8">Jam MK</label>
                    <input type="text" class="form-control @error('jam_mk') is-invalid @enderror" name="jam_mk"
                        value="" placeholder="">
                    @error('jam_mk')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                  <fieldset class="form-group ml-4 col-lg-9 pt-0">
                        <div class="row">
                            <div class="col-form-label col-sm-2 pt-0">Perteuman noted</div>
                            <div class="col-sm-">
                                <div class="form-check">
                                    @foreach ($mk as $item)
                                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1"
                                            value="option1" checked disabled>
                                        <label class="form-check-label" for="gridRadios1">

                                            Pertemuan ke -
                                            @if (!empty($item->pertemuan_ke) and $item->pertemuan_ke == $item->pertemuan_ke)
                                                {{ $item->pertemuan_ke }} {{ $item->kelas['nama_kelas'] }}
                                            @endif
                                        </label>
                                        <br>
                                    @endforeach
                                </div>
                                <div class="form-group ml-4 ">
                                    <label>Pilih </label>

                                    <select name= "pertemuan_ke" class="form-control">

                                        <option value="1">1</option>
                                        <option value="2">3</option>
                                        <option value="3">2</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>



                                    </select>

                                </div>


                            </div>
                        </div>
                    </fieldset>



        </div>


    </div>



    <div class="card-footer text-right">
        <button class="btn btn-primary mr-1" type="submit">Submit</button>
        <button class="btn btn-secondary" type="reset">Reset</button>
    </div>
    </div>
    </form>

@endsection
