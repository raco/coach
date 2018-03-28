<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            {{-- PROFILE --}}
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                    <img alt="image" class="img-circle" src="{{ (auth()->user()->image_url) ? auth()->user()->image_url : asset('img/user-default.png') }}" width="48" height="48" />
                     </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{ auth()->user()->name }}</strong>
                     </span> <span class="text-muted text-xs block">Coach <b class="caret"></b></span> </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        {{-- <li><a href="profile.html">Perfil</a></li> --}}
                        <li><a href="#" onclick="document.getElementById('photo').click();">Cambiar Foto</a></li>
                        <li class="divider"></li>
                        <li><a href="javascript:void(0)" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out"></i> Cerrar Sesión
                            </a></li>
                    </ul>
                    <form action="{{ route('coach.photo') }}" method="POST" enctype="multipart/form-data" id="formphoto" style="display: none">
                        {{ csrf_field() }}
                        <input type="file" id="photo" name="photo" onchange="submitPhoto()">
                    </form>
                </div>
                <div class="logo-element">
                    <img src="{{ asset('img/logo-ynside.png') }}" style="width: 60px">
                </div>
            </li>
            <li {{ (Request::url() == route('coach.dashboard')) ? 'class=active' : '' }}>
                <a href="{{route('coach.dashboard')}}"><i class="fa fa-dashboard"></i> <span class="nav-label">Dashboard</a>
            </li>
            <li {{ (Request::url() == route('coach.client.list')) ? 'class=active' : '' }}>
                <a href="{{route('coach.client.list')}}"><i class="fa fa-users"></i> <span class="nav-label">Clientes</a>
            </li>
            <li {{ (Request::url() == route('coach.image.list')) ? 'class=active' : '' }}>
                <a href="{{route('coach.image.list')}}"><i class="fa fa-picture-o"></i> <span class="nav-label">Fotos de Clientes</a>
            </li>
            <li {{ (Request::url() == route('coach.diet.list')) ? 'class=active' : '' }}>
                <a href="{{route('coach.diet.list')}}"><i class="fa fa-heartbeat"></i> <span class="nav-label">Dietas</a>
            </li>
            <li {{ (Request::url() == route('coach.product.list')) ? 'class=active' : '' }}>
                <a href="{{route('coach.product.list')}}"><i class="fa fa-shopping-cart"></i> <span class="nav-label">Productos</a>
            </li>
            <li {{ (Request::url() == route('coach.buyingrequest.list')) ? 'class=active' : '' }}>
                <a href="{{route('coach.buyingrequest.list')}}"><i class="fa fa-ticket"></i> <span class="nav-label">Peticiones de Compra</a>
            </li>
            <li {{ (Request::url() == route('coach.appointment.list')) ? 'class=active' : '' }}>
                <a href="{{route('coach.appointment.list')}}"><i class="fa fa-calendar"></i> <span class="nav-label">Citas</a>
            </li>
        </ul>
    </div>
</nav>
<script>
    function submitPhoto() {
        document.getElementById("formphoto").submit()
    }
</script>