<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            {{-- PROFILE --}}
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                    <img alt="image" class="img-circle" src="{{ asset('img/profile_small.jpg') }}" />
                     </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{ auth()->user()->name }}</strong>
                     </span> <span class="text-muted text-xs block">Administrador <b class="caret"></b></span> </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        {{-- <li><a href="profile.html">Perfil</a></li> --}}
                        <li class="divider"></li>
                        <li>
                            <a href="javascript:void(0)" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out"></i> Cerrar Sesión
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="logo-element">
                    <img src="{{ asset('img/logo-ynside.png') }}" style="width: 60px">
                </div>
            </li>

            {{-- MENU --}}
            <li {{ (Request::url() == route('admin.dashboard')) ? 'class=active' : '' }}>
                <a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> <span class="nav-label">Dashboard</a>
            </li>
            <li {{ (Request::url() == route('coach.list')) ? 'class=active' : '' }}>
                <a href="{{route('coach.list')}}"><i class="fa fa-th-large"></i> <span class="nav-label">Coaches</span></a>
            </li>
            <li {{ (Request::url() == route('client.list')) ? 'class=active' : '' }}>
                <a href="{{route('client.list')}}"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Clientes</a>
            </li>
        </ul>
    </div>
</nav>