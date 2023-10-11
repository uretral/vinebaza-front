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

        <div class="menu">
            <x-menu.main/>
        </div>
    </div>

</header>
