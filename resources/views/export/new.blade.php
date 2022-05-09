@php
    // $j = ;
    $foto = storage_path("app/public/" . Auth::user()->guru->ttd);
    $logos = storage_path("app/public/" . Auth::user()->guru->ttd);
@endphp
<img src="{{$foto}}" alt="" width="150px">

@foreach ($sekolah as $s)
    $foto = storage_path("app/public/" . $s->image);
    <img src="{{$foto}}" alt="">
@endforeach
