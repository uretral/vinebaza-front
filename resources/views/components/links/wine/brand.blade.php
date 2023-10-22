@if($data && $data->name)
<a href="{{$data->slug ? route('brand',$data->slug) : 'javascript:'}}" {{$attributes}}>
    @if ($slot->isNotEmpty())
        {{ $slot }}
    @else
        {{@$data->name}}
    @endif
</a>
@endif
