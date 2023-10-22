<div class="item-review">
    @if($review->note_ru)
        <p>“{{Str::limit($review->note_ru, 150)}}”</p>
    @else
        <p>“{{Str::limit($review->note, 150)}}”</p>
    @endif

    <div class="item-review_user">

        @isset($user->avatar)
            <div class="item-review_userAvatar">
                <img src="{{ asset(str_replace('public','storage',$user->avatar)) }}" alt="user"/>
            </div>
        @endisset

        <div class="item-review_userRate">
            @include('components.rating', ['average' => $review->rating,'size' => 16,'color' => 'red'])

            @isset($user->alias)
                <div class="item-review_userName">{{$user->alias}}</div>
            @endisset
        </div>

    </div>

</div>
