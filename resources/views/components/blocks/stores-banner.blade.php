<section class="banner">
    <div>
        <div class="banner-row">
            <div class="banner-slogan">
                <cite>
                    Экономьте,  <br/>
                    выбирая лучшее!
                </cite>
                <p>
                    <span>Выбирайте среди миллионов рейтингов</span>
                    <a href="{{url('wines')}}">Вино</a>,
                    <a href="javascript:">Крепкий</a>,
                    <a href="javascript:">алкоголь</a>,
                    <a href="javascript:">Пиво</a>

                    <span>по отличным ценам в магазинах Москвы!</span>
                </p>
            </div>
            <div class="banner-stores">
                @foreach($stores as $store)
                    <a href="javascript:" class="stores-item">
                        <div class="stores-item-header">
                            <img src="{{ vite::asset('resources/assets/img/'.$store->img) }}" alt="store"/>
                        </div>
                        <div class="stores-item-footer">
                            <span><b>{{$store->d}}</b>{{$store->offer}}</span>
                            <div>
                                <em>{{$store->discount}}</em>
                            </div>

                        </div>

                    </a>
                @endforeach
                <a href="javascript:" class="stores-more">
                    <span>
                        Еще 36 магазинов
                    </span>
                </a>


            </div>
        </div>
    </div>
</section>
