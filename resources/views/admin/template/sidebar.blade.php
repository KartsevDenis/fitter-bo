<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse slimscrollsidebar">
        <div class="user-profile">
            <div class="dropdown user-pro-body">
                <div><img src="{{ asset($currentUserData['avatar']) }}" alt="user-img"
                          class="img-circle"></div>
                <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button"
                   aria-haspopup="true" aria-expanded="false">{{ $currentUserData['name'] }} <span class="caret"></span></a>
                <ul class="dropdown-menu animated flipInY">
                    <li><a href="#"><i class="ti-user"></i> Мой профиль</a></li>
                    {{--<li><a href="#"><i class="ti-wallet"></i> My Balance</a></li>--}}
                    {{--<li><a href="#"><i class="ti-email"></i> Inbox</a></li>--}}
                    <li role="separator" class="divider"></li>
                    <li><a href="#"><i class="ti-settings"></i> Настройки</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="login.html"><i class="fa fa-power-off"></i> Выход</a></li>
                </ul>
            </div>
        </div>
        <ul class="nav" id="side-menu">
            <li class="sidebar-search hidden-sm hidden-md hidden-lg">
                <!-- Search input-group this is only view in mobile -->
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Поиск...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button"> <i class="fa fa-search"></i> </button>
                        </span>
                </div>
                <!-- /Search input-group this is only view in mobile -->
            </li>

            {{--<li class="nav-small-cap m-t-10">Главное меню</li>--}}

            {{--<li>--}}
                {{--<a href="javascript:void(0)" class="waves-effect">--}}
                    {{--<i data-icon="&#xe008;" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Link type </span>--}}
                {{--</a>--}}
            {{--</li>--}}

            @foreach( $sidebar_items as $sidebar_item )

                @if( $sidebar_item['type'] = 'parent' )

                    <li>

                        <a href="javascript:void(0)" class="waves-effect active">
                            <i class="{{ $sidebar_item['icon'] }}"> </i>
                            <span class="hide-menu">
                            {{ $sidebar_item['title'] }}
                            <span class="fa arrow"></span>
                            </span>
                        </a>

                        <ul class="nav nav-second-level">
                            @foreach( $sidebar_item['children'] as $sub_item )
                                <li><a href="{{ $sub_item['url'] }}">{{ $sub_item['title'] }}</a></li>
                            @endforeach
                        </ul>

                    </li>

                @endif

            @endforeach

            <li>
                <a href="javascript:void(0)" class="waves-effect" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out"></i> <span class="hide-menu">ВЫХОД </span>
                </a>
            </li>

            {{--<li>--}}
                {{--<a href="javascript:void(0)" class="waves-effect active">--}}
                    {{--<i data-icon="&#xe008;" class="linea-icon linea-basic fa-fw"></i>--}}
                    {{--<span class="hide-menu">--}}
                        {{--Dropdown Link--}}
                        {{--<span class="fa arrow"></span>--}}
                        {{--<span class="label label-rouded label-purple pull-right">2</span>--}}
                    {{--</span>--}}
                {{--</a>--}}

                {{--<ul class="nav nav-second-level">--}}
                    {{--<li><a href="javascript:void(0)">Link one</a></li>--}}
                    {{--<li><a href="javascript:void(0)">Link Two</a></li>--}}
                {{--</ul>--}}

            {{--</li>--}}

            {{--<li>--}}
                {{--<a href="javascript:void(0)" class="waves-effect"><i data-icon="&#xe008;"--}}
                                                                     {{--class="linea-icon linea-basic fa-fw"></i> <span--}}
                            {{--class="hide-menu">Multi Dropdown<span class="fa arrow"></span></span></a>--}}
                {{--<ul class="nav nav-second-level">--}}
                    {{--<li><a href="javascript:void(0)">Second Level Item</a></li>--}}
                    {{--<li><a href="javascript:void(0)">Second Level Item</a></li>--}}
                    {{--<li>--}}
                        {{--<a href="javascript:void(0)" class="waves-effect">Third Level <span class="fa arrow"></span></a>--}}
                        {{--<ul class="nav nav-third-level">--}}
                            {{--<li><a href="javascript:void(0)">Third Level Item</a></li>--}}
                            {{--<li><a href="javascript:void(0)">Third Level Item</a></li>--}}
                            {{--<li><a href="javascript:void(0)">Third Level Item</a></li>--}}
                            {{--<li><a href="javascript:void(0)">Third Level Item</a></li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</li>--}}

        </ul>
    </div>
</div>