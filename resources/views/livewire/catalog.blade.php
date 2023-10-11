<div>

    {{--    @dump($this->getProducts()->items()[3]->toArray()) --}}{{-- ['grapes'] --}}


    <x-frame.section class="searchResult">
        <div class="searchResult-frame">
            <div class="searchResult-data">
                <x-catalog.search-description/>
                <p class="searchResult-prices">
                    цена {{$priceMin}}р - {{$priceMax}} р, с рейтингом выше {{$ratingMin}} звезд
                </p>
                <p class="searchResult-props">
                    From 4 grapes, 2 regional wine styles, 3 countries and 2 regions
                </p>
            </div>


            <div class="searchResult-count">
                найдено <b>{{$this->getProducts()->total()}}</b>
            </div>


        </div>


    </x-frame.section>


    <section class="sort">
        <div>
            <div class="sort-row">
                <div class="sort-props" id="filter_params">
                    <x-catalog.filtered-params :options="$this->colorTitles()" action="deleteColor"/>
                    <x-catalog.filtered-params :options="$this->colorSugars()" action="deleteSugar"/>
                    <x-catalog.filtered-params :options="$this->countryTitles()" action="deleteCountry"/>
                </div>
                <div class="sort-block">
                    <x-forms.select-horizontal
                        :options="$this->sortingList()"
                        :value="$sortBy"
                        model="sortBy"
                        title="name"
                        id="id"
                    />

                </div>
            </div>
        </div>
    </section>

    <section class="catalog">
        <div>
            <div class="catalog-row">

                <div class="catalog-filter">
                    <em>Выбрать несколько</em>

                    <x-blocks.fieldset legend="Тип вина">
                        <x-forms.checkbox-buttons
                            :options="$this->getColors()" model="color"/>
                    </x-blocks.fieldset>

                    <x-blocks.fieldset legend="Сахар">
                        <x-forms.checkbox-buttons
                            :options="$this->getSugar()" model="sugar" icon="flag"/>
                    </x-blocks.fieldset>

                    <x-blocks.fieldset legend="Цена">
                        <x-forms.range-slider
                            min="priceMin"
                            max="priceMax"
                            icon="₽"
                            :static-min="$priceMinStatic"
                            :static-max="$priceMaxStatic"
                            :dynamic-min="$priceMin"
                            :dynamic-max="$priceMax"
                            :step="100"
                            :gap="1000"
                        />
                    </x-blocks.fieldset>


                    <x-blocks.fieldset legend="Рейтинг">
                        <x-forms.range-slider
                            min="ratingMin"
                            max="ratingMax"
                            icon=""
                            :static-min="0"
                            :static-max="5"
                            :dynamic-min="$ratingMin"
                            :dynamic-max="$ratingMax"
                            :step="0.5"
                            :gap="1"
                        />
                    </x-blocks.fieldset>

                    <x-blocks.fieldset legend="Страна">
                        <x-forms.checkbox-buttons-search
                            :options="$this->getCountries()"
                            model="country"
                            placeholder="название страны"
                            icon="flag"
                        />
                    </x-blocks.fieldset>


                    <x-blocks.fieldset legend="Сорт винограда">
                        <x-forms.checkbox-buttons-search
                            :options="$this->getGrapes()"
                            model="grape"
                            placeholder="название винограда"
                        />
                    </x-blocks.fieldset>

                    <x-blocks.fieldset legend="Сочетания вкусов">
                        <x-forms.checkbox-buttons-search
                            :options="$this->getPairings()"
                            model="pairing"
                            placeholder="название сочетания"
                        />
                    </x-blocks.fieldset>

                </div>

                <div class="catalog-items">
                    <div id="catalog-container">
                        @foreach($this->getProducts()->items() as $key => $item)
{{--                            @if(!$key)--}}
                                <x-blocks.catalog-item :item="$item"/>
{{--                            @endif--}}
                        @endforeach
                    </div>
                    <div id="target" class="ajax-loading" x-data="isVisible('target')">
                        {{--                        <img src="{{vite::asset('resources/assets/img/loading.gif') }}"/>--}}
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>

