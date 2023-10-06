<div class="select vertical" x-data="select(@entangle($model).live)">

    <div class="select-title">{{$title}}</div>

    <label @click="active = true">
        <input type="hidden" x-model="value"/>
        <img src="{{ vite::asset('resources/assets/img/i-chevron.svg') }}" alt="icon"/>
    </label>

    <div class="options" x-show="active" @click.outside="active = false" x-transition.duration.500ms>

        <div class="options-wrapper">

            @foreach($list as $key => $item)
                <a href="javascript:" class="option @if($key === 0) active @endif"
                   @click="value = '{{$item->id}}'"
                >
                    <span>{{$item->$lang}}</span>
                </a>
            @endforeach

        </div>

    </div>

</div>
