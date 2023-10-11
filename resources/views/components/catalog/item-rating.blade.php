<div class="item-data-rating rating-block">
    @if(isset($item->ratings_average) && $item->ratings_average)

        <div class="rate">
            <span>{{$item->ratings_average ? number_format($item->ratings_average,1,'.','') : 0}}</span>
        </div>

        <div class="stars">
            @include('components.rating',['average' => $item->ratings_average ? number_format($item->ratings_average,1,'.','') : 0, 'color' => 'red', 'size' => '12'])

{{--            @isset($item->ratings_count)--}}
                <em>{{--{{$item->ratings_count}}--}} 167 отзывов</em>
{{--            @endisset--}}

        </div>
    @endif
</div>
