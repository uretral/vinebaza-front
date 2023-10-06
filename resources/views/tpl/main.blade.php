<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <link rel="shortcut icon" href="{{ asset('assets/favicon/favicon.ico') }}"/>

    @vite(['resources/assets/less/app.less', 'resources/assets/js/app.js'])

{{--    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/less/style.css') }}"/>
    <script src="{{ asset('/assets/js/test.js') }}" defer></script>
    <script src="{{ asset('/assets/js/alpine.js') }}" defer></script>--}}



    <script
            src="https://code.jquery.com/jquery-2.2.4.min.js"
            integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
            crossorigin="anonymous"></script>
{{--    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>--}}

    @livewireStyles
    <title></title>
</head>
<body>

<header>
    <div>
        <!--		<a href="javascript:" class="mobile-logo">-->
        <!--			<img src="assets/assets/img/logo.svg" alt="img" title="logotype"/>-->
        <!--		</a>-->
        <!--		<input type="checkbox" id="mobile-menu"/>-->
        <!--		<label for="mobile-menu"></label>-->
        <div class="header">

            <a href="/" class="header-logo">
                <img src="{{ vite::asset('resources/assets/img/logo.png') }}" alt="img" title="logotype"/>
            </a>

            <form class="header-search" action="/search" method="get">
                <input type="text" maxlength="200" id="search_wine" name="q" placeholder="Поиск" autocomplete="off"  value="">

                <div class="header-search_box">

                </div>

            </form>

            <div class="header-user">

            </div>

        </div>
{{--MENU--}}
        <div class="menu">
            <x-menu.main/>
        </div>
    </div>

</header>
@if(Route::currentRouteName() !== 'home')
<section class="breadcrumbs" >
    <div>
        <div class="breadcrumbs-row"> <!--row-->

            <div class="breadcrumbs-box">
                <a href="javascript:">Главная</a><i></i>
                <a href="javascript:">Каталог</a><i></i>
                <a href="javascript:">Вина</a><i></i>
                <a href="javascript:">Красные сухие вина</a><i></i>
                <span>Lieu dit Malakoff Shiraz 2014</span>
            </div>

        </div>
    </div>
</section>
@endif
<div class="modal">

    <div class="modal-box">
        <a class="modal-close" href="javascript:"></a>

        <div class="modal-content">
            <div class="lightBox">
                <h2>Online Shops</h2>
                <p>Online shops selling this wine</p>

                <div class="lightBox-seller" >
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

                <div class="lightBox-seller" >
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

                <div class="lightBox-seller" >
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

<x-blocks.footer/>

{{--<script src="/assets/js/multirange.js"></script>--}}

@livewireScriptConfig

</body></html>


