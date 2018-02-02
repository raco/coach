@extends('admin.layout')
@section('content')
{{-- Cabecera --}}
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Clientes</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/">Admin</a>
            </li>
            <li>
                <a href="{{ route('client.list') }}">Clientes</a>
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
        <div class="col-sm-12">
            <div class="ibox">
                <div class="ibox-content">
                    <div class="row">

                        <div class="col-sm-6 b-r"><h3 class="m-t-none m-b">Editar</h3>
                            <p>Edite los datos del cliente.</p>

                            <form action="{{route('client.update',$client->id)}}" method="POST" role="form" id="frmeditclient">
                                {{csrf_field()}}
                                @if(Session::has('flash_message'))
                                <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></    span><em> {!! session('flash_message') !!}</em>
                                </div>
                                @endif

                                <div class="form-group"><label>Nombre</label>
                                <input value={{ $client->user->name }} type="text" id="txtnomclient"
                            name= "name" placeholder="Ingrese Nombres" class="form-control"></div>

                            <div class="form-group"><label>Apellidos</label> <input type="text" name='lastname' id="txtlastnameclient" placeholder="Ingrese Apellidos" class="form-control" value="{{ $client->user->lastname }}"></div>


                            <div class="form-group"><label class="form-group">Sexo</label>
                            <select name="sexo" class="form-control" name="account">
                                <option value="m">Masculino</option>
                                <option value="f">Femenino </option>
                            </select>

                        </div>
                        <div class="form-group"><label>Teléfono</label>
                        <input value="{{ $client->user->phone }}" type="text" id="txtfonoclient" placeholder="" name='phone'class="form-control"></div>
                        <div class="form-group"><label>Email</label> <input value="{{ $client->user->email }}"  type="email" id="txtemailclient" name="email" placeholder="Enter email" class="form-control"></div>


                        <div class="form-group"><label class="form-group">Seleccione su coach</label>
                        <select name="coach" class="form-control" name="account">
                            @foreach($coaches as $data)
                            <option value="{{ $data->id }}">{{ $data->full_name }}</option>
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
                        </label>
                    </div>
                </div>
                <div style="color:red; margin-bottom:10px;" id="register-error" class="text-center" style="display:none"></div>

                <div>
                    <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit" id="btnmod"><strong>Modificar</strong></button>
                </div>
            </div>
        </div>
    </div>


</div>
</form>
@endsection
@push('scripts')
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
{{-- Fin de la validacion de los campos en blanco --}}
@endpush