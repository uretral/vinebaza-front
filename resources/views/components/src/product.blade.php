@if(@fopen(asset('storage/uploads/v/'.$size.'/'.$src.'_0.png'), "r") )
    <img src="{{asset('storage/uploads/v/'.$size.'/'.$src.'_0.png')}}" alt="{{$alt}}"/>
@elseif(@fopen(asset('storage/uploads/v/'.$size.'/'.$src.'_0.jpg'), "r"))
    <img src="{{asset('storage/uploads/v/'.$size.'/'.$src.'_0.jpg')}}" alt="{{$alt}}"/>
@elseif(@fopen(asset('storage/uploads/product/'.$size.'/'.$src.'_0.jpg'), "r"))
    <img src="{{asset('storage/uploads/product/'.$size.'/'.$src.'_0.jpg')}}" alt="{{$alt}}"/>
@elseif(@fopen(asset('storage/uploads/product/'.$size.'/'.$src.'_0.png'), "r"))
    <img src="{{asset('storage/uploads/product/'.$size.'/'.$src.'_0.png')}}" alt="{{$alt}}"/>
@else
    <img src="{{ vite::asset('resources/assets/img/empty.png') }}" alt="{{$alt}}">
@endif
