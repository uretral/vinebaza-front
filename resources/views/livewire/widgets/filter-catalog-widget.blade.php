<form action="javascript:" id="filterCatalog" data-method="post">
    <section class="filter" x-data="">
        <div>
            <div class="filter-vine" x-data="{ color: '', price: '', rating: '' }">

                <div class="filter-vine_type">

                    <x-forms.select :list="$colors" :title="$colorName" model="color" lang="name_ru"/>

                </div>
                <div class="filter-vine_price">

                    {{--                        @include('components.rangeSlider', ['data' => $filters->price, 'name' => 'price', 'heading' => 'Цена','icon' => '₽'])--}}
                </div>
                <div class="filter-vine_rating">
                    {{--                        @include('components.rangeSlider', ['data' => $filters->rating, 'name' => 'rating', 'heading' => 'Рейтинг', 'icon' => ''])--}}
                </div>
                <div class="filter-vine_show">
                    <button onclick="window.location = window.uLink">Показать</button>
                    {{--                        <button @click="alert(itemName)">Показать</button>--}}
                </div>
            </div>
        </div>
    </section>


</form>
