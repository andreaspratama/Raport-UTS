{{-- {{$coba->pivot->id}} {{$coba->pivot->pivot->thnakademik}} --}}

{{-- @foreach ($cetakPeraka as $mapel)
    @foreach($mapel->mapel as $h)
        <li> {{ $h->pivot->thnakademik }} </li>
    @endforeach
@endforeach --}}

{{$cetakPeraka->pivot->thnakademik}}