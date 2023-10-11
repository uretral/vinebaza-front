<section class="stores">
    <div>
        <div class="stores-row">
            <h2>Наличие в магазинах:</h2>
            <div class="stores-list">

                @foreach($this->stores as $store)
                    <a href="javascript:" class="stores-item">
                        <div class="stores-item-header">
                            <img src="{{asset('storage/'.$store->logo)}}" alt="store"/>
                        </div>
                        <div class="stores-item-footer">
                            <span><b>{{$store->offers_cnt}}</b> предложений</span>
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

