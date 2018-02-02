@extends('admin.layout')
@section('content')
{{-- Cabecera --}}

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Coach</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/">Admin</a>
            </li>
            <li class="active">
                <a href="{{ route('coach.list') }}">Coaches</a>
            </li>
            <li class="active">
                <strong>Crear</strong>
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
                        <div class="col-sm-12">
                            <h3 class="m-t-none m-b">Registrar nuevo coach</h3>
                            <p>Ingrese los datos del nuevo coach.</p>
                            <form action="{{route('coach.store')}}" method="POST" role="form">
                                {{csrf_field()}}
                                @if(Session::has('flash_message'))
                                <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></    span><em> {!! session('flash_message') !!}</em>
                                </div>
                                @endif
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input id='txtnomcoach' type="text" name= "name" placeholder="Ingrese Nombres" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Apellidos</label> 
                                    <input id='txtlnamecoach' type="text" name='lastname' placeholder="Ingrese Apellidos" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label class="form-group">Sexo</label>
                                    <select name="sexo" name="gender" class="form-control" >
                                        <option value="m">Masculino</option>
                                        <option value="f">Femenino </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Teléfono</label>
                                    <input id='txtphonecoach' type="text" placeholder="" name='phone'class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input  type="email" name="email" placeholder="Enter email" id="txtemailcoach" class="form-control">
                                </div>

                                  <div id="xmail" class="hide"><h7 class="text-danger">Ingresa un email valido</h7></div>

                                       <div style="color:red; margin-bottom:10px;" id="email-error" class="" style="display:none">                                    
                                </div>


                                <div class="form-group">
                                    <label>Password</label>
                                    <input id='txtpasscoach'  type="password" name="password" placeholder="" class="form-control">
                                </div>
                               

                               <div style="color:red; margin-bottom:10px;" id="register-error" class="text-center" style="display:none">                                    
                                </div>

                                


                                <div class="form-group">
                                    <button class="btn btn-primary pull-right m-t-n-xs" type="submit" id='btnguardar'><strong>REGISTRAR</strong></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')


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
    $('#btnguardar').click(function(event) {
        event.preventDefault();
        var name = $('#txtnomcoach'),
        lastname = $('#txtlnamecoach'),
        fone = $('#txtphonecoach'),
        email = $('#txtmailcoach');
         password = $('#txtpasscoach');
        
        if (name.val().length == 0 ||
            lastname.val().length == 0 ||
            fone.val().length == 0 ||
            password.val().length == 0 ||
            email.val().length == 0) { 
            $('#register-error').css('visibility', 'visible');
            $('#register-error').text('Llena todos los campos.');
        }
        else
            {$('#frmgrabacoach').submit(); 

            $('#register-error').css('visibility', 'visible');
           $('#register-error').text('Llena todos los campos.');
        
    };


    });
</script>
{{-- Fin de la validacion de los campos en blanco --}}
@endpush

