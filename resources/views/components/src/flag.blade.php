@isset($src)
    <img src="{{asset('storage/'.$src)}}" alt="{{$alt ?? 'flag'}}"/>
@endisset

