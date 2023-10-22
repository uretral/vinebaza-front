@isset($data)
<a href="{{$data->slug ? route('winery',$data->slug) : 'javascript:'}}" {{$attributes}}>
    @if ($slot->isNotEmpty())
        {{ $slot }}
    @else
        {{@$data->name}}
    @endif
</a>
@endisset
