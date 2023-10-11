<p class="searchResult-informer">

    @foreach($this->colorTitles() as $key => $title)
        @if($key)
            или {{$title->name_ru}}
        @else
            {{$title->name_ru}}
        @endif
    @endforeach

    @foreach($this->colorSugars() as $key => $title)
        @if($key)
            или {{$title->name_ru}}
        @else
            {{$title->name_ru}}
        @endif

    @endforeach
вино
    @foreach($this->countryTitles() as $key => $title)
        @if($key)
            или {{$title->name_from_ru}}
        @else
           из {{$title->name_from_ru}}
        @endif

    @endforeach

</p>

