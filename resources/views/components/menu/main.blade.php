@foreach($menu as $top)
    <div class="menu-link">
        <a href="{{$top->link}}">
            <span><img src="{{asset('storage/'.$top->icon)}}" alt="ico"/></span>
            <span>{{$top->name}}</span>
        </a>
        @isset($top->submenu)
            <div class="menu-link_helper">

                <div class="menu-link_submenu">

                    <div class="menu-link_header">
                        @foreach($top->submenu as $submenu)
                            @if(count($submenu->menuort) && !$submenu->icon)
                                <div class="menu-link_headerItem">
                                    <a href="{{$submenu->link}}">{{$submenu->name}}</a>

                                    <ul>
                                        @foreach($submenu->menuort as $ort)
                                            @if(!$ort->icon)
                                                <li><a href="{{$ort->link}}">{{$ort->name}}</a></li>
                                            @endif
                                        @endforeach
                                    </ul>

                                </div>
                            @endif
                        @endforeach
                        <div class="menu-link_headerItem">
                            @foreach($top->submenu as $submenu)
                                @if(!count($submenu->menuort) && !$submenu->icon)
                                    <a href="{{$submenu->link}}">{{$submenu->name}}</a>
                                @endif
                            @endforeach
                        </div>

                    </div>

                    <div class="menu-link_withIcon">
                        @foreach($top->submenu as $submenuIcon)
                            @if($submenuIcon->icon)
                                <a href="{{$submenuIcon->link}}">
                                    <span><img src="{{asset('storage/'.$submenuIcon->icon)}}" alt="img"/></span>
                                    <p>{{$submenuIcon->name}}</p>
                                </a>
                            @endif
                        @endforeach
                    </div>

                    <div class="menu-link_footer">
                        <a href="/wines">Все вина</a>
                    </div>

                </div>
            </div>
        @endisset

    </div>
@endforeach


