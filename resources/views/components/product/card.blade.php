<x-frame.section row="itemCard-main">
    <div class="itemCard-main_item">

        <div class="itemImage">
            <x-src.product :src="$product->id" size="orig" :alt="$product->name"/>
        </div>


        <div class="itemDesc">
            <h3 class="itemDesc-winery">
                <x-links.wine.brand :data="@$product->brand">«{{@$product->brand->name}}»</x-links.wine.brand>
                <x-links.wine.winery :data="$product->winery"/>
            </h3>
            <h1 class="itemDesc-name"> {{$product->name}}</h1>
            <h2 class="itemDesc-prop">
                @isset($product->country)
                    <span class="itemDesc-prop_flag">
                                <x-src.flag :src="$product->country->flag"/>
                            </span>
                @endisset

                <span class="itemDesc-prop_type">
                            @isset($product->color->name_ru)
                        {{$product->color->name_ru}}
                    @endisset
                    @isset($product->sugar->name_ru)
                        {{$product->sugar->name_ru}}
                    @endisset

                        </span>
                <span class="itemDesc-prop_from">из</span>
                @isset($product->region)
                    <a href="{{$product->region->url}}"
                       class="itemDesc-prop_region">{{$product->region->name_ru}}</a>
                @endisset
                @isset($product->country)
                    <a href="{{$product->country->url}}"
                       class="itemDesc-prop_country">{{$product->country->name_ru}}</a>
                @endisset
            </h2>

            {{--                    @isset($v_statistics->ratings_average)
                                    <div class="itemDesc-rating">
                                        <span class="itemDesc-rating_rate">{{$v_statistics->ratings_average}}</span>
                                        @component('components.rating',['average' => $v_statistics->ratings_average, 'size' => 18, 'color' => 'red']) @endcomponent
                                        <span class="itemDesc-rating_ratings">{{$v_statistics->ratings_count}}</span>
                                    </div>
                                @endisset--}}


            <div class="itemDesc-wish">
                <a href="javascript:">Добавить в избранное</a>
            </div>

            {{--                    @isset($v_highlights)
                                    @foreach($v_highlights as $item)
                                        <div class="itemDesc-highlights">
                                            <img src="{{$const->baseSite.str_replace('public','storage',$item->icon)}}" alt="{{$item->type}}">
                                            {{$item->name_ru}}
                                        </div>
                                    @endforeach
                                @endisset--}}

            <div class="itemDesc-props">
                <div class="itemDesc-props-prop">
                    <span>Виноград</span>
                    @foreach($product->grapes as $k => $grape)
                        @if($k === 0)
                            {{--                                    <a href="{{$grape->url}}">{{$grape->name_ru}}</a>--}}
                        @else
                            {{--                                    , <a href="{{$grape->url}}">{{$grape->name_ru}}</a>--}}
                        @endif
                    @endforeach
                </div>
                <div class="itemDesc-props-prop">
                    @isset($product->strength)
                        <span>Процент алкоголя</span>
                        {{$product->strength}}%
                    @endisset
                </div>

            </div>


        </div>

    </div>
    <div class="itemCard-main_sell">
        <div class="itemCard-main_sellHead">
            <img src="{{ vite::asset('resources/assets/img/trophy.png') }}" alt="awards">
            Входит в 1% лучших вин мира

        </div>
        <div class="itemCard-main_sellBody">
            <div class="itemCard-main_sellPrice">
                879 Р
                <span>Средняя цена</span>
            </div>
            <div class="itemCard-main_sellSeePrice">
                <a href="javascript:">Смотреть цены в Москве</a>
            </div>
            <div class="itemCard-main_sellAdvantage">
                <img src="{{ vite::asset('resources/assets/img/favourite.png')}}" alt="adv">
                Рейтинг составлен на основе более
                25 миллионов отзывов по всему миру
            </div>
            <div class="itemCard-main_sellAdvantage">
                <img src="{{ vite::asset('resources/assets/img/Слой_657.png')}}" alt="adv">
                Сравните цены и попробуйте лучшие вина
            </div>

            <div class="itemCard-main_sellAdvantage">
                <img src="{{ vite::asset('resources/assets/img/shop_(1).png')}}" alt="adv">
                Сотрудничаем только с сертифицированными
                магазинами Москвы
            </div>
            <div class="itemCard-main_sellAdvantage">
                <img src="{{ vite::asset('resources/assets/img/email.png')}}" alt="adv">
                Подписаться на вино и получить
                выгодные предложения
            </div>
        </div>

    </div>
</x-frame.section>
