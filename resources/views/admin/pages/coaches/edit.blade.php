<div style="padding: 10px">
    <ul id="coachTabs" class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active">
            <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Datos de Perfil</a>
        </li>
        <li role="presentation">
            <a href="#clients" aria-controls="clients" role="tab" data-toggle="tab">Clientes Asignados</a>
        </li>
    </ul>
    <div class="tab-content">
        <div id="profile" class="tab-pane active" role="tabpanel">
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="ibox">
                            <div class="">
                                <div class="row">
                                    <div class="col-sm-12"><h3 class="m-t-none m-b">Editar Datos</h3>
                                        <p>Edite los datos del Coach.</p>
                                        <form action="{{route('coach.edit',$coach->id)}}" method="POST" role="form id=" id="frmeditcoach">
                                            {{csrf_field()}}

                                            @if(Session::has('flash_message'))
                                            <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em>
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
                                                    <option value="m"
                                                        @if ($coach->user->gender == 'm')
                                                           selected="selected"
                                                        @endif
                                                    >Masculino</option>
                                                    <option value="f"
                                                        @if ($coach->user->gender == 'f')
                                                           selected="selected"
                                                        @endif
                                                    >Femenino </option>
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
                                            <div class="form-group">
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
                    <div class="col-sm-6">
                        <div class="ibox">
                            <div class="">
                                <div class="row">
                                    <div class="col-sm-12"><h3 class="m-t-none m-b">Editar Contraseña</h3>
                                        <p>Modifique la contraseña del Coach.</p>
                                        <form action="{{route('coach.UpdatepasswordCoach',$coach->id)}}" method="POST" >
                                            {{csrf_field()}}

                                            @if(Session::has('flash_message2'))
                                            <div class="alert alert-success"><span class="glyphicon glyphicon-ok">
                                            </span><em> {!! session('flash_message2') !!}</em>
                                            </div>
                                            @endif
                                            <div class="form-group">
                                                <label>Contraseña</label>
                                                <input value=""  type="password"  name="passcoach2" placeholder="" class="form-control">
                                            </div>

                                            <div style="color:red; margin-bottom:10px;" id="register-error" class="text-center" style="display:none"></div>
                                            <button class="btn btn-primary pull-right m-t-n-xs" type="submit"><strong>Actualizar Contraseña</strong></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="clients" class="tab-pane" role="tabpanel">
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="m-t-none m-b">Listado de clientes asignados</h3>
                        <div class="table-responsive">
                            <table id="clientsTable" class="table table-striped table-hover" data-coach="{{ $coach->full_name }}">
                                <thead>
                                    <tr>
                                        <th>Estado</th>
                                        <th>Nombre</th>
                                        <th>Teléfono</th>
                                        <th>Correo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clients as $client)
                                    <tr>
                                        <td class="client-status">
                                            @if ($client->state)
                                            <span class="label label-primary">Activo</span>
                                            @else
                                            <span class="label label-default">Inactivo</span>
                                            @endif
                                        </td>

                                        <td>
                                            <a data-toggle="tab" href="#contact-1" class="client-link">
                                                @if ($client->user->gender == 'f')
                                                {{ $client->user->name }} {{ $client->user->lastname }}
                                                <i class="fa fa-venus text-muted"></i>
                                                @else
                                                {{ $client->user->name }} {{ $client->user->lastname }}
                                                <i class="fa fa-mars text-muted"></i>
                                                @endif
                                            </a>
                                        </td>

                                        <td>{{ $client->user->phone }}</td>
                                   
                                        <td>{{ $client->user->email }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('#clientsTable').DataTable( {
        dom: 'Bfrtip',
        language: {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        },
        buttons: [
            'copyHtml5',
            {
                extend: 'excelHtml5',
                title: 'Clientes - '+$('#clientsTable').data('coach'),
                messageTop: 'Reporte de clientes asignados a: ' + $('#clientsTable').data('coach')
            },
            {
                extend: 'csvHtml5',
                title: 'Clientes - '+$('#clientsTable').data('coach'),
                messageTop: 'Reporte de clientes asignados a: ' + $('#clientsTable').data('coach')
            },
            {
                extend: 'pdfHtml5',
                title: 'Clientes - '+$('#clientsTable').data('coach'),
                messageTop: 'Reporte de clientes asignados a: ' + $('#clientsTable').data('coach')
            },
        ],
        searching: false, paging: false
    } );



$('#coachTabs a').click(function (e) {
  e.preventDefault()
  console.log('??');
  $(this).tab('show')
})
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
