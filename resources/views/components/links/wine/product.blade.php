@if($attributes->get('slug') && $attributes->get('title'))
    <a href="{{route('product',$attributes->get('slug'))}}" {{$attributes}}>
        @if ($slot->isNotEmpty())
            {{ $slot }}
        @else
            {{$attributes->get('title')}}
        @endif
    </a>
@endif

