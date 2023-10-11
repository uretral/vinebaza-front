@foreach($options as $option)
    <button wire:click="{{$action}}({{$option->id}})">
        {{$option->name_ru}}
    </button>
@endforeach


