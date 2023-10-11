<div class="item-review">
    @if($item->review->note_ru)
        <p>“{{Str::limit($item->review->note_ru, 150)}}”</p>
    @else
        <p>“{{Str::limit($item->review->note, 150)}}”</p>
    @endif

    <div class="item-review_user">

        @isset($item->user->avatar)
            <div class="item-review_userAvatar">
                <img src="{{ asset(str_replace('public','storage',$item->user->avatar)) }}" alt="user"/>
            </div>
        @endisset

        <div class="item-review_userRate">
            @include('components.rating', ['average' => $item->review->rating,'size' => 16,'color' => 'red'])

            @isset($item->user->alias)
                <div class="item-review_userName">{{$item->user->alias}}</div>
            @endisset
        </div>

    </div>

</div>
