<div>
    <section class="hey">

        <label>
            <span> Всего страниц:</span>
            <input type="text" wire:model="pagesCnt">
        </label>
        <label>
            <span> Начать со страницы:</span>
            <input type="text" wire:model="currentCatalogPage">
        </label>
        {{--        <label>
                    <span> Следующая страница:</span>
                    <input type="text" v-model="pagesCurrent" disabled>
                </label>--}}
        <label>
            <button>Автомат</button>
        </label>
        <label>
            <button wire:click="startParse">Старт</button>
        </label>
        <label>
            <button>Стоп</button>
        </label>
        <cite class="hey-message">
            {{$pageMessage}}
        </cite>
        <cite class="hey-message">
            {{$message}}
        </cite>

    </section>


        @foreach($b as $a)
        <section class="hey">{{$a}}</section>
        @endforeach


    <table class="hey-table">

        <thead>
        <tr>
            <th></th>
            <th>name</th>
            <th>translit</th>
            <th>code</th>
            <th>url</th>
            <th>experts_rating</th>
            <th>volume</th>
            <th>country</th>
            <th>region</th>
            <th>sub_region</th>
            <th>manufacturer</th>
            <th>brand</th>
            <th>strength</th>
            <th>grapes</th>
            <th>type</th>
            <th>color</th>
            <th>price</th>
            <th>price_discount</th>
            <th>stock</th>
            <th>picture_small</th>
        </tr>
        </thead>

        <tbody>

        @foreach($parsedCatalogRaw as $item)
            <tr
                @if(in_array($item->code,$parsedCatalogProductsCode)) class="created" @endif>
                <td class="indicator"></td>
                <td>{{$item->name}}</td>
                <td>{{$item->translit}}</td>
                <td>{{$item->code}}</td>
                <td>{{$item->url}}</td>
                <td>{{json_encode($item->experts_rating)}}</td>
                <td>{{$item->volume}}</td>
                <td>{{$item->country}}</td>
                <td>{{$item->region}}</td>
                <td>{{$item->sub_region}}</td>
                <td>{{$item->manufacturer}}</td>
                <td>{{$item->brand}}</td>
                <td>{{$item->strength}}</td>
                <td>{{json_encode($item->grapes)}}</td>
                <td>{{$item->type}}</td>
                <td>{{$item->color}}</td>
                <td>{{$item->price}}</td>
                <td>{{$item->price_discount}}</td>
                <td>{{$item->stock}}</td>
                <td>{{$item->picture_small}}</td>

            </tr>
        @endforeach

        </tbody>

    </table>


{{--    @dump($this->parsedCatalogResult)--}}
{{--    @dump($this->parsedCatalogRaw)--}}


    {{--        @if($parsedCatalog && $parsedCatalog->result && array_key_exists('donor_product_created',$parsedCatalog->result))
                @foreach($parsedCatalog->result['donor_product_created'] as $parsed)
                    <div class="donor_product_created">
                        <div class="id">{{@$parsed['id']}}</div>
                        <div class="name">{{@$parsed['name']}}</div>
                        <div class="slug">{{@$parsed['slug']}}</div>
                        <div class="translit">{{@$parsed['translit']}}</div>
                        <div class="articul">{{@$parsed['articul']}}</div>
                    </div>
                @endforeach
            @endif
            @if($parsedCatalog && $parsedCatalog->result && array_key_exists('donor_price_updated',$parsedCatalog->result))
                @foreach($parsedCatalog->result['donor_price_updated'] as $parsed)
                    <div class="donor_price_updated">
                        <div class="id">{{@$parsed['id']}}</div>
                        <div class="name">{{@$parsed['name']}}</div>
                        <div class="slug">{{@$parsed['slug']}}</div>
                        <div class="translit">{{@$parsed['translit']}}</div>
                        <div class="articul">{{@$parsed['articul']}}</div>
                    </div>
                @endforeach
            @endif--}}


</div>
