<div class="item">
    <div class="item-img">
        <x-links.wine.product :slug="$item->slug" :title="$item->name ?? $item->translit"  style="background-color: rgb(188, 188, 176);">
            <x-src.product :src="$item->id" size="thumb" :alt="$item->name"/>
        </x-links.wine.product>
    </div>
    <div class="item-data">

        <div class="item-props">

            <div class="item-props-winery">
                <x-links.wine.brand :data="$item->brand"/>
                <x-links.wine.winery :data="$item->winery"/>
            </div>

            <div class="item-props-vintage">
                <x-links.wine.product :slug="$item->slug" :title="$item->name ?? $item->translit" />
            </div>

            <div class="item-props-color">
                <x-links.wine.color :data="$item->color"/>
            </div>

            <div class="item-props-country">

                <i class="round">
                    <x-src.flag :src="$item->country->flag"/>
                </i>

                <x-links.wine.country :data="$item->country" class="item-props-countryName"/>

                <x-links.wine.region :data="$item->region" :dot="true" class="item-props-countryRegion"/>

                <x-links.wine.sub-region :data="$item->sub_region" :dot="true" class="item-props-countryRegion"/>

            </div>

        </div>

        @isset($item->vivino->review->note)
            <x-catalog.item-review :review="$item->vivino->review" :user="$item->user"/>
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
                                    <img src="{{ vite::asset('resources/assets/img/seller_1.png') }}"
                                         alt="seller logo"/>
                                </a></li>
                            <li><a href="javascript:">
                                    <img src="{{ vite::asset('resources/assets/img/seller_2.png') }}"
                                         alt="seller logo"/>
                                </a></li>
                        </ul>
                        {{--                    <a href="javascript:">и еще в + 3</a>--}}
                    </div>
                @endisset
            </div>

        </div>

    </div>
</div>
