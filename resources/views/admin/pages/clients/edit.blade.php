<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox">
                <div class="col-sm-12">
                    <h3 class="m-t-none m-b">Editar</h3>
                    <p>Edite los datos del cliente.</p>
                    <form action="{{route('client.update',$client->id)}}" method="POST" role="form" id="frmeditclient">
                        {{csrf_field()}}
                        @if(Session::has('flash_message'))
                        <div class="alert alert-success">
                            <span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em>
                        </div>
                        @endif
                            <div class="form-group"><label>Nombre</label>
                            <input value={{ $client->user->name }} type="text" id="txtnomclient"
                        name= "name" placeholder="Ingrese Nombres" class="form-control"></div>
                        <div class="form-group"><label>Apellidos</label> <input type="text" name='lastname' id="txtlastnameclient" placeholder="Ingrese Apellidos" class="form-control" value="{{ $client->user->lastname }}"></div>
                        <div class="form-group"><label class="form-group">Sexo</label>
                            <select name="sexo" class="form-control" name="account">
                                <option value="m"
                                    @if ($client->user->gender == 'm')
                                       selected="selected"
                                    @endif
                                >Masculino</option>
                                <option value="f"
                                    @if ($client->user->gender == 'f')
                                       selected="selected"
                                    @endif
                                >Femenino </option>
                            </select>
                        </div>
                        <div class="form-group"><label>Teléfono</label>
                        <input value="{{ $client->user->phone }}" type="text" id="txtfonoclient" placeholder="" name='phone'class="form-control"></div>
                        <div class="form-group"><label>Email</label> <input data-validation="email" value="{{ $client->user->email }}"  type="email" id="txtemailclient" name="email" placeholder="Enter email" class="form-control"></div>
                        <div id="xmail" class="hide"><h7 class="text-danger">Ingresa un email valido</h7></div>
                        <div style="color:red; margin-bottom:10px;" id="email-error" class="" style="display:none"></div>
                        <div class="form-group"><label class="form-group">Seleccione su coach</label>
                            <select name="coach" class="form-control" name="account">
                                <option value="none" selected="selected">Ninguno</option>
                                @foreach($coaches as $data)
                                @if ($client->coach && $client->coach->id == $data->id)
                                <option value="{{ $data->id }}" selected="selected">{{ $data->full_name }}</option>
                                @else
                                <option value="{{ $data->id }}">{{ $data->full_name }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group"">
                            <div>
                                @if ($client->state)
                                <label>
                                    <input name="state" type="checkbox" value="1" checked="checked">
                                    <span>Cliente activo</span>
                                </label>
                                @else
                                <label>
                                    <input name="state" type="checkbox"  value="0">
                                    <span>Cliente inactivo</span>
                                </label>
                                @endif
                            </div>
                        </div>
                        <div style="color:red; margin-bottom:10px;" id="register-error" class="text-center" style="display:none"></div>
                        <div>
                            <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit" id="btnmod"><strong>Modificar</strong></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


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
// Me valida los campos en blanco
$('#btnmod').click(function(event) {
    event.preventDefault();
    var name = $('#txtnomclient'),
    lastname = $('#txtlastnameclient'),
    fone = $('#txtfonoclient'),
    email = $('#txtemailclient');

    if (name.val().length == 0 ||
        lastname.val().length == 0 ||
        fone.val().length == 0 ||
        email.val().length == 0) {
        $('#register-error').css('visibility', 'visible');
        $('#register-error').text('Llena todos los campos.');
    }
    else{
        $('#frmeditclient').submit();
    };
});
</script>

