@foreach ($pertemuan as $item)
        {{$item->absensi}}

        @if($item->absensi === NULL)
        "kosonh"

        @endif


        @endforeach


