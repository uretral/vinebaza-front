<div class="spaceBetween">
    <label>
        <input type="search" class="searchItems" wire:model.live="{{$model}}Search" placeholder="{{$placeholder}}"/>
    </label>

    <div class="search_pool" id="country_filter">
        @foreach($options as $item)
            <div class="checkbox">
                <input
                    value="{{$item->id}}"
                    id="{{$model}}_{{$item->id}}"
                    wire:model.live="{{$model}}"
                    type="checkbox"
                />
                <label for="{{$model}}_{{$item->id}}">

                    @isset($icon)
                    <span class="flag">
                        <img src="{{asset("storage/$item->flag")}}" alt="flag"/>
                    </span>
                    @endisset

                    <span>{{$item->name_ru}}</span>
                </label>
            </div>
        @endforeach
    </div>
</div>
