<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body class="gray-bg">
    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>
                <h1 class="logo-name"><img src="{{ asset('img/logo-ynside.png') }}"></h1>
            </div>
            @if(Session::has('flash_error_message'))
                <div class="alert alert-danger"><em> {!! session('flash_error_message') !!}</em>
                </div>
            @endif
            <h3>Bienvenido</h3>
            <p>Ingresa tu correo y contraseña para acceder a tu panel. </p>
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text text-danger">{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <form class="m-t" id="formlogin" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Correo Electrónico" autofocus="autofocus" maxlength="200">
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input id="password" type="password" class="form-control" name="password" required placeholder="Contraseña" maxlength="100">
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                
                {!! Recaptcha::render() !!}

                <div style="color:red; margin-bottom:10px;" id="register-error" class="text-center" style="display:none"></div>

                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recordarme
                        </label>
                    </div>
                </div>
                <button id="btnlogin" type="submit" class="btn btn-primary block full-width m-b">
                    Ingresar
                </button>
                <a href="{{ route('password.request') }}"><small>Olvidé mi contraseña</small></a>
            </form>
        </div>
    </div>

@push('scripts')

{{-- Me valida caracteres maximo de emails y usuarios --}}
    <script>

    $("#btnlogin").click(function (event)
     { event.preventDefault();
    var vemail = $('#email'),
        vcontraseña = $('#contraseña'),
        if(vemail.val().length >=100
            // vcontraseña.val().length >=32)
        {
            $('#register-error').css('visibility', 'visible');
            $('#register-error').text('Cantidad maxima de correo es 100 caracteres');
            return false;
        }
            else{$('#formlogin').submit();}
    });

        if(vcontraseña.val().length >=32
            // vcontraseña.val().length >=32)
        {
            $('#register-error').css('visibility', 'visible');
            $('#register-error').text('Cantidad maxima de password es 32 caracteres');
            return false;
        }
            else{$('#formlogin').submit();}
    });



}
</script>

@endpush

</body>

</html>


