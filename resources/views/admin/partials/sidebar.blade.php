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
                <a href="{{route('coach.list')}}"><i class="fa fa-users"></i> <span class="nav-label">Coaches</span></a>
            </li>
            <li {{ (Request::url() == route('client.list')) ? 'class=active' : '' }}>
                <a href="{{route('client.list')}}"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Clientes</a>
            </li>
            <li {{ (Request::url() == route('diet.list')) ? 'class=active' : '' }}>
                <a href="{{route('diet.list')}}"><i class="fa fa-heartbeat"></i> <span class="nav-label">Dietas</a>
            </li>
            <li {{ (Request::url() == route('product.list')) ? 'class=active' : '' }}>
                <a href="{{route('product.list')}}"><i class="fa fa-shopping-cart"></i> <span class="nav-label">Productos</a>
            </li>
            <li {{ (Request::url() == route('buyingrequest.list')) ? 'class=active' : '' }}>
                <a href="{{route('buyingrequest.list')}}"><i class="fa fa-ticket"></i> <span class="nav-label">Peticiones de Compra</a>
            </li>
            <li {{ (Request::url() == route('post.list')) ? 'class=active' : '' }}>
                <a href="{{route('post.list')}}"><i class="fa fa-newspaper-o"></i> <span class="nav-label">Noticias</a>
            </li>
            <li {{ (Request::url() == route('appointment.list')) ? 'class=active' : '' }}>
                <a href="{{route('appointment.list')}}"><i class="fa fa-calendar"></i> <span class="nav-label">Citas</a>
            </li>
            <li {{ (Request::url() == route('image.list')) ? 'class=active' : '' }}>
                <a href="{{route('image.list')}}"><i class="fa fa-picture-o"></i> <span class="nav-label">Imágenes</a>
            </li>
        </ul>
    </div>
</nav>