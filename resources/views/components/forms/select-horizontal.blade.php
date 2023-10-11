<div class="select horizontal"
     x-data="selectHorizontal({model: @entangle($model).live, current: @js($options[0]), title: @js($title), id: @js($id) })"
>

    <div class="label" for="vine_type">

        <em>Сортировать по:</em>
        <span @click="active = true" x-text="title"></span>
        <img src="{{vite::asset('resources/assets/img/i-chevron.svg') }}" alt="icon"/>

    </div>
    <div class="options" x-show="active">
        <div class="options-wrapper">
            @foreach($options as $option)
                <a href="javascript:" class="option" @click="setValues(
                @js($option)
                )">
                    <span>{{$option->name}}</span>
                </a>
            @endforeach
        </div>
    </div>
    <input type="hidden" x-model="model"/>
</div>
