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
                        <li><a href="profile.html">Perfil</a></li>
                        <li><a href="#" onclick="document.getElementById('photo').click();">Cambiar Foto</a></li>
                        <li class="divider"></li>
                        <li><a href="login.html">Cerrar Sesión</a></li>
                    </ul>
                    <form action="{{ route('coach.photo') }}" method="POST" enctype="multipart/form-data" id="formphoto" style="display: none">
                        {{ csrf_field() }}
                        <input type="file" id="photo" name="photo" onchange="submitPhoto()">
                    </form>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>
            <li {{ (Request::url() == route('coach.dashboard')) ? 'class=active' : '' }}>
                <a href="{{route('coach.dashboard')}}"><i class="fa fa-dashboard"></i> <span class="nav-label">Dashboard</a>
            </li>
            <li {{ (Request::url() == route('coach.client.list')) ? 'class=active' : '' }}>
                <a href="{{route('coach.client.list')}}"><i class="fa fa-users"></i> <span class="nav-label">Clientes</a>
            </li>
        </ul>
    </div>
</nav>
<script>
    function submitPhoto() {
        document.getElementById("formphoto").submit()
    }
</script>