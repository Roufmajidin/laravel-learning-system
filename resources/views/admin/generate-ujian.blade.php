@extends('home')
{{-- @section('title', 'C Materi') --}}
@section('content')
    <div class="card">
        <div class="card-header">

            <h6 class="btn btn-primary float-md-left ml-4" data-toggle="modal" data-target="#exampleModalDisable">Aktive Ujian
            </h6>
        </div>

        @php
            $role = App\Models\Role_ujian::where('keterangan', 'Sedang Dimulai')->get();
        @endphp
        @forelse ($role as $i)
            <div class="container mt-5">
                <div class="page-error">
                    <div class="page-inner">
                        <h1 style="cursor: pointer" data-toggle="modal" data-target="#disabled">
                            {{ $i->type_ujian }}</h1>
                        <div class="page-description">
                            @php
                                $d = Carbon\Carbon::parse($i->tanggal_ujian)->format('d - M - Y');
                            @endphp
                            <b>Note!</b> Ujian sedang berlangsung. Tanggal {{ $d }}
                        </div>
                    </div>
                </div>
            </div>




        @empty

            <a style="margin-left:40%; margin-top:20%; position: absolute; color:red; font-wight:bold">belum
                ada
                Data</a>
        @endforelse

    </div>
    </div>


    <div class="modal fade lg" id="exampleModalDisable" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Disable Krs</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form class="form-group" action="/active-generate" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group ml-4 col-md-5 row">
                            <label style="color:#17a2b8">Tanggal Ujian
                            </label>
                            <input type="date" class="form-control" name="tanggal_ujian" value="" placeholder="">

                        </div>
                        <div class="form-group ml-4 col-md-5 row">
                            <label style="color:#17a2b8">Ujian
                            </label>
                            <select name="type_ujian" class="form-control">
                                @php
                                    $r = App\Models\Role_ujian::get();
                                @endphp
                                @foreach ($r as $item)
                                    @if ($item->type_ujian == 'UTS')
                                        <option value="{{ $item->id }}"> (UTS) Ujian Tengah Semester</option>
                                    @elseif($item->type_ujian == 'UAS')
                                        <option value="{{ $item->id }}">(UAS) Ujian Akhir Semester</option>
                                    @endif
                                @endforeach
                            </select>


                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary mr-1" type="submit">Submit</button>
                        <button class="btn btn-secondary" type="reset">Reset</button>
                    </div>
                </form>
            </div>
        </div>



    </div>
    </div>

    {{-- disabled --}}

    <div class="modal fade lg" id="disabled" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="">Disable UJian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form class="form-group" action="/disactive" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        {{-- @php
                            $r = App\Models\Role_ujian::where('keterangan', 'Sedang Dimulai')->first();
                        @endphp --}}

                        <div class="form-group ml-4 col-md-5 row">
                            <label style="color:#17a2b8">Ujian
                            </label>
                            <select name="type_ujian" class="form-control">
                                @php
                                    $r = App\Models\Role_ujian::where('keterangan', 'Sedang Dimulai')->first();
                                @endphp


                            </select>


                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary mr-1" type="submit">Submit</button>
                        <button class="btn btn-secondary" type="reset">Reset</button>
                    </div>
                </form>
            </div>
        </div>



    </div>
@endsection
