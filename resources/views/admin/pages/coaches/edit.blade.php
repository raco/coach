@extends('admin.layout')
@section('content')
{{-- Cabecera --}}
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Coaches</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/">Admin</a>
            </li>
            <li class="active">
                <a href="{{ route('coach.list') }}">Coaches</a>
            </li>
            <li class="active">
                <strong>Editar</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        {{-- Fin de Cabecera --}}
        <div class="col-sm-5">
            <div class="ibox">
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-sm-12"><h3 class="m-t-none m-b">Editar</h3>
                            <p>Edite los datos del Coach.</p>
                            <form action="{{route('coach.edit',$coach->id)}}" method="POST" role="form id=" id="frmeditcoach">
                                {{csrf_field()}}
                                @if(Session::has('flash_message'))
                                <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></    span><em> {!! session('flash_message') !!}</em>
                                </div>
                                @endif
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input type="text" id="txtnomcoach" name="name" placeholder="Ingrese Nombres" class="form-control" value="{{ $coach->user->name }}">
                                </div>
                                <div class="form-group">
                                    <label>Apellidos</label>
                                    <input type="text" id="txtapecoach" name='lastname' placeholder="Ingrese Apellidos" class="form-control" value="{{ $coach->user->lastname }}">
                                </div>
                                <div class="form-group">
                                    <label class="form-group">Sexo</label>
                                    <select name="sexo" class="form-control" name="account">
                                        <option value="m">Masculino</option>
                                        <option value="f">Femenino </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Teléfono</label>
                                    <input value="{{ $coach->user->phone }}" type="text" placeholder="" name='phone'             id="txtphonecoach"class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input value="{{ $coach->user->email }}"  type="email" id="txtemailcoach" name="email" placeholder="Enter email" class="form-control">
                                </div>
                                

                                <div id="xmail" class="hide"><h7 class="text-danger">Ingresa un email valido</h7></div>

                         <div style="color:red; margin-bottom:10px;" id="email-error" class="" style="display:none"></div>



                                <div class="form-group"">
                                    @if ($coach->state)
                                    <label>
                                        <input name="state" type="checkbox" value="1" checked="checked">
                                        <span>Coach activo</span>
                                    </label>
                                    @else
                                    <label>
                                        <input name="state" type="checkbox"  value="0">
                                        <span>Coach inactivo</span>
                                    </label>
                                    @endif
                                </div>
                                <div style="color:red; margin-bottom:10px;" id="register-error" class="text-center" style="display:none"></div>
                                <button class="btn btn-primary pull-right m-t-n-xs" type="submit" id="btnmod"><strong>Actualizar Datos</strong></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
{{-- Me valida los campos en blanco --}}
@push('scripts')


<script type="text/javascript">

// funcion para validar el correo
function caracteresCorreoValido(email, div){
    console.log(email);
    // var email = $(email).val();
    var caract = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);

    if (caract.test(email) == false){
        $(div).hide().removeClass('hide').slideDown('fast');

        return false;
    }else{
        $(div).hide().addClass('hide').slideDown('slow');
//        $(div).html('');
        return true;
    }
}
</script>
{{-- Fin de la  funcion para validar el correo --}}


 <script type="text/javascript">

// funcion para validar el correo
function caracteresCorreoValido(email, div){
    console.log(email);
    // var email = $(email).val();
    var caract = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);

    if (caract.test(email) == false){
        $(div).hide().removeClass('hide').slideDown('fast');
$('#email-error').hide();
        return false;
    }else{
        $(div).hide().addClass('hide').slideDown('slow');
//        $(div).html('');

        $('#email-error').show();
        return true;
    }
}
</script>
{{-- Fin de la  funcion para validar el correo --}}


 <script>
   // cuando pierde el foco, este valida si lo que esta en el campo de texto si es un correo o no y muestra una respuesta y me valida emails existentes
   $('form').find('input[type=email]').blur(function(){
      caracteresCorreoValido($(this).val(), '#xmail');



        $.ajax({ 
            url: '{{ route('validate.email') }}', 
            type: 'POST', 
            dataType: 'json', 
            data: { email: $(this).val() }, 

        })
        .done(function(data) { 
                 $('#email-error').css('visibility', 'visible');
                 $('#email-error').css('color', 'green');
           $('#email-error').text('Correo aceptado');
         

        })
        .fail(function(response) { 
            // alert(response.responseJSON.errors[0]); ]
             $('#email-error').css('visibility', 'visible');
             $('#email-error').css('color', 'red');
           $('#email-error').text('El correo ya ha sido registrado');

        });

    });
</script> 



<script>
$('#btnmod').click(function(event) {
event.preventDefault();
var name = $('#txtnomcoach'),
lastname = $('#txtapecoach'),
fone = $('#txtphonecoach'),
email = $('#txtemailcoach');
if (name.val().length == 0 ||
lastname.val().length == 0 ||
fone.val().length == 0 ||
email.val().length == 0) {
$('#register-error').css('visibility', 'visible');
$('#register-error').text('Llena todos los campos.');
}
else{$('#frmeditcoach').submit();
};
});
</script>
{{-- Fin de la validacion de los campos en blanco --}}
@endpush