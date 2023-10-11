{{--<form action="javascript:" id="filterCatalog" data-method="post">--}}
<section class="filter">

    <div>
        <div class="filter-vine">

            <div class="filter-vine_type">

                <x-forms.select :list="$colors" :title="$colorName" model="color" lang="name_ru"/>

            </div>
            <div class="filter-vine_price">

                <div class="filter-vine-slider">

                    <div class="filter-vine-slider_title">
                        <span>Выберите стоимость</span>
                    </div>

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

                </div>

            </div>
            <div class="filter-vine_rating">
                <div class="filter-vine-slider">

                    <div class="filter-vine-slider_title">
                        <span>Рейтинг</span>
                    </div>

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

                </div>

            </div>
            <div class="filter-vine_show">
                <button wire:click="submitRedirect">Показать</button>
            </div>
        </div>
    </div>
</section>


{{--</form>--}}
