<div class="item">
    <div class="item-img">
        <a href="/products/{{$item->product_slug}}" style="background-color: rgb(188, 188, 176);">
            @if(@fopen(asset('storage/uploads/v/thumb/'.$item->id.'_0.png'), "r") )
                <img src="{{asset('storage/uploads/v/thumb/'.$item->id.'_0.png')}}" alt="{{$item->name}}"/>
            @elseif(@fopen(asset('storage/uploads/v/thumb/'.$item->id.'_0.jpg'), "r"))
                <img src="{{asset('storage/uploads/v/thumb/'.$item->id.'_0.jpg')}}" alt="{{$item->name}}"/>
            @elseif(@fopen(asset('storage/uploads/product/thumb/'.$item->id.'_0.jpg'), "r"))
                <img src="{{asset('storage/uploads/product/thumb/'.$item->id.'_0.jpg')}}" alt="{{$item->name}}"/>
            @elseif(@fopen(asset('storage/uploads/product/thumb/'.$item->id.'_0.png'), "r"))
                <img src="{{asset('storage/uploads/product/thumb/'.$item->id.'_0.png')}}" alt="{{$item->name}}"/>
            @endif
        </a>
    </div>
    <div class="item-data">
        <div class="item-props">

            <div class="item-props-winery">
                @isset($item->brand->name)
                    <a href="{{$item->brand->url}}">"{{@$item->brand->name}}"</a>
                @endisset
                @isset($item->winery->name)
                    <a href="{{$item->winery->url}}">{{@$item->winery->name}}</a>
                @endisset
            </div>

            <div class="item-props-vintage">

                <a href="/products/{{$item->product_slug}}">
                    @if($item->name)
                        {{$item->name}}
                    @else
                        {{$item->translit}}
                    @endif

                </a>

            </div>

            <div class="item-props-sugar">
                @isset($item->color->name_ru)
                    <a href="{{$item->color->url}}">{{$item->color->name_ru}}</a>
                @endisset

            </div>

            <div class="item-props-country">
                <i class="round">
                    <img src="{{asset('storage/props/flags/'.$item->country->id.'.webp')}}" alt="flag"/>
                </i>
                @isset($item->country->name_ru)
                    <a href="{{$item->country->url}}" class="item-props-countryName">{{$item->country->name_ru}}</a>
                @endisset
                @isset($item->region->name_ru)
                    <span class="item-props-countryDot">·</span>
                    <a href="{{$item->region->url}}" class="item-props-countryRegion">{{$item->region->name_ru}}</a>
                @endisset
                @isset($item->sub_region->name_ru)
                    <span class="item-props-countryDot">·</span>
                    <a href="{{$item->sub->region_url}}"
                       class="item-props-countryRegion">{{$item->sub->region_name_ru}}</a>
                @endisset


            </div>

        </div>

        @isset($item->vivino->review->note)
            <x-catalog.item-review :item="$item->vivino"/>
        @endisset

        <div class="item-data-footer">

            <div class="item-data-footer_left">

                <x-catalog.item-rating :item="$item->vivino"/>

                <a href="javascript:" rel="seller" class="item-data-sellersBtn">
                    <span>Показать магазины</span>
                </a>

            </div>
            <div class="item-data-footer_right">

                @isset($item->vivino->price)
                    <div class="item-data-price">
                        <p>{{number_format($item->vivino->price,0,'',' ')}} Р</p>
                        <span>Средняя цена</span>
                    </div>

                    <div class="item-data-sellersList">
                        <ul>
                            <li><a href="javascript:">
                                    <img src="{{ vite::asset('resources/assets/img/seller_1.png') }}" alt="seller logo"/>
                                </a></li>
                            <li><a href="javascript:">
                                    <img src="{{ vite::asset('resources/assets/img/seller_2.png') }}" alt="seller logo"/>
                                </a></li>
                        </ul>
                        {{--                    <a href="javascript:">и еще в + 3</a>--}}
                    </div>
                @endisset
            </div>

        </div>

    </div>
</div>
