<div class="select vertical" x-data="select(@entangle($model).live)">

    <div class="select-title" @click="active = true">{{$title}}</div>

    <label @click="active = true">
        <input type="hidden" x-model="value"/>
        <img src="{{ vite::asset('resources/assets/img/i-chevron.svg') }}" alt="icon"/>
    </label>

    <div class="options" x-show="active"
         @click.outside="active = false"
         @mouseleave="active = false" x-transition.duration.500ms>

        <div class="options-wrapper scroll-thin">

            @foreach($list as $key => $item)
                <a href="javascript:" :class="{active: value == '@js($key + 1)'}" @click="value = '{{$item->id}}'">
                    <span>{{$item->$lang}}</span>
                </a>
            @endforeach

        </div>

    </div>

</div>
