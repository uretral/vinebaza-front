<div class="spaceBetween">
    @foreach($options as $item)
        <div class="checkbox fixed">
            <input type="checkbox" value="{{$item->id}}" id="{{$model}}_{{$item->id}}" wire:model.live="{{$model}}"/>
            <label for="{{$model}}_{{$item->id}}">
                <span>{{$item->name_ru ? $item->name_ru : $item->name_en}}</span>
            </label>
        </div>
    @endforeach
</div>
