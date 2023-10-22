@isset($data->name_ru)
<a href="{{$data->slug ? route('sub-region',$data->slug) : 'javascript:'}}" {{$attributes}}>
    @if ($slot->isNotEmpty())
        {{ $slot }}
    @else
        @if($dot)
            <span class="item-props-countryDot">·</span>
        @endif
        {{@$data->name_ru}}
    @endif
</a>
@endisset
