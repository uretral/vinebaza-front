@isset($data)
<a href="{{$data->slug ? route('color',$data->slug) : 'javascript:'}}" {{$attributes}}>
    @if ($slot->isNotEmpty())
        {{ $slot }}
    @else
        {{@$data->name_ru}}
    @endif
</a>
@endisset

