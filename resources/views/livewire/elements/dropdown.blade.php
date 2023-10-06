<div class="select vertical" x-data="{ open: false ,  obj: $wire.data}">
        <label @click="open = true">
            <em x-text="obj.heading"></em>
            <span x-text="obj.active[obj.title] ?? obj.heading" ></span>
            <img src="{{ asset('assets/img/i-chevron.svg') }}" alt="icon" x-bind:class="{active : open}"/>
        </label>

        <div class="options" x-show="open" @mouseleave="open = false" x-transition.duration.500ms>

            <div class="options-wrapper"  @notified.window="$root.color = $event.detail">

{{--                x-on:click="obj.active = i"   x-on:click="$dispatch('notified','some value')"    --}}

                <template x-for="i in obj.list" :key="i.id">

                    <a href="javascript:"
                       x-bind:class="{'active' : obj.active[obj.title] === i[obj.title]}"

                       ware:click="$emit('postAdded','457845')"
                    >
                        <span x-text="i[obj.title]"></span>
                    </a>

                </template>
            </div>

        </div>

</div>
