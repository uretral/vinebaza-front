<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <link rel="shortcut icon" href="{{ asset('assets/favicon/favicon.ico') }}"/>

    @vite(['resources/assets/less/app.less', 'resources/assets/js/app.js'])

    <title></title>
</head>
<body @if(request()->has('tpl') && request('tpl')) class="tpl" @endif>

<x-general.header/>
<div id="apps">
    <test></test>
</div>
<div class="modal">

    <div class="modal-box">
        <a class="modal-close" href="javascript:"></a>

        <div class="modal-content">
            <div class="lightBox">
                <h2>Online Shops</h2>
                <p>Online shops selling this wine</p>

                <div class="lightBox-seller">
                    <div class="lightBox-seller_desc">
                        <div class="lightBox-seller_descLogo">
                            <img src="{{ vite::asset('resources/assets/img/seller-logo.png') }}" alt="seller logo"/>
                        </div>
                        <div class="lightBox-seller_descText">
                            <div class="lightBox-seller_descName">Vitrina Vin</div>
                            <div class="lightBox-seller_descFeatures">Mobile friendly checkout. No minimum order.</div>
                            <div class="lightBox-seller_descBased">
                                <i><img src="{{ vite::asset('resources/assets/img/ru.svg') }}" alt="flag icon"/></i>
                                Based in Russia
                            </div>
                        </div>

                    </div>
                    <div class="lightBox-seller_price">

                        <a href="javascript:" class="btn snow">961₽</a>

                    </div>
                </div>

                <div class="lightBox-seller">
                    <div class="lightBox-seller_desc">
                        <div class="lightBox-seller_descLogo">
                            <img src="{{ vite::asset('resources/assets/img/seller-logo.png') }}" alt="seller logo"/>
                        </div>
                        <div class="lightBox-seller_descText">
                            <div class="lightBox-seller_descName">Vitrina Vin</div>
                            <div class="lightBox-seller_descFeatures">Mobile friendly checkout. No minimum order.</div>
                            <div class="lightBox-seller_descBased">
                                <i><img src="{{ vite::asset('resources/assets/img/ru.svg') }}" alt="flag icon"/></i>
                                Based in Russia
                            </div>
                        </div>

                    </div>
                    <div class="lightBox-seller_price">

                        <a href="javascript:" class="btn snow">961₽</a>

                    </div>
                </div>

                <div class="lightBox-seller">
                    <div class="lightBox-seller_desc">
                        <div class="lightBox-seller_descLogo">
                            <img src="{{ vite::asset('resources/assets/img/seller-logo.png') }}" alt="seller logo"/>
                        </div>
                        <div class="lightBox-seller_descText">
                            <div class="lightBox-seller_descName">Vitrina Vin</div>
                            <div class="lightBox-seller_descFeatures">Mobile friendly checkout. No minimum order.</div>
                            <div class="lightBox-seller_descBased">
                                <i><img src="{{ vite::asset('resources/assets/img/ru.svg') }}" alt="flag icon"/></i>
                                Based in Russia
                            </div>
                        </div>

                    </div>
                    <div class="lightBox-seller_price">

                        <a href="javascript:" class="btn snow">961₽</a>

                    </div>
                </div>

            </div>

        </div>

    </div>
</div>


@yield('main')

<x-general.footer/>

@livewireScriptConfig

</body>
</html>


