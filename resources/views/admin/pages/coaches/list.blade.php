@extends('admin.layout')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading animated fadeInRight">
    <div class="col-lg-10">
        <h2>Coaches</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/">Admin</a>
            </li>
            <li class="active">
                <strong>Coaches</strong>
            </li>
        </ol>

    </div>
</div>
<div class="wrapper wrapper-content">
    @if(Session::has('flash_message2'))
        <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message2') !!}</em>
        </div>
    @endif
    <div class="row">
        {{-- Aqui empieza el listado de Coach --}}
        <div class="col-sm-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h5>Listado de todos los coaches.</h5> 

                    <div class="ibox-tools">
                        <a href="{{ route('coach.create') }}" class="btn btn-primary btn-sm">+ Registrar Nuevo Coach</a>
                    </div>
                </div>
               
                <div class="ibox-content">
             {{--    <form action="{{route('coach.search')}}" method="POST" role="form">
                     {{csrf_field()}}
                    <div class="input-group">
                        <input name='txtbuscoach' type="text" placeholder="Buscar coach..." class="input form-control" >
                        <span class="input-group-btn">
                        <button type="submit" class="btn btn btn-info"> <i class="fa fa-search"></i> Buscar</button>
                        </span>
                    </div>
                </form> --}}

                    <div class="clients-list">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Foto</th>
                                        <th>Nombre</th>
                                        <th>Teléfono</th>
                                        <th>Correo Electrónico</th>
                                        <th>Sexo</th>
                                        <th >Estado</th>
                                        <th >Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($coaches as $coach)
                                    <tr>
                                        <td class="client-avatar">
                                            <img alt="image" src="{{ $coach->image_url  or asset('img/user-default.png') }}">
                                        </td>
                                        <td onclick="myFunction({{$coach->id}})" style="cursor: pointer" data-toggle="modal" data-target="#myModal">
                                            <a data-toggle="tab" href="#contact-1" class="client-link">{{ $coach->full_name }}</a>
                                        </td>
                               
                                        <td>{{ $coach->phone }}</td>

                                        <td>{{ $coach->email }}</td>
                                        @if ($coach->gender == 'f')
                                            <td><i class="fa fa-female"></i> Mujer</td>
                                        @else
                                            <td><i class="fa fa-male"></i> Hombre</td>
                                        @endif 
                                        <td class="client-status">
                                            @if ($coach->state)
                                            <span class="label label-primary">Activo</span>
                                            @else
                                            <span class="label label-danger">Inactivo</span>
                                            @endif
                                        </td>
                                        <td class="client-status">
                                            @if (\App\Coach::hasClients($coach->id))
                                                <button class="btn btn-danger btn-xs"
                                                onclick="deleteCoach({{$coach->id}})" 
                                                style="cursor: pointer" 
                                                data-toggle="modal" 
                                                data-target="#deletemodal"
                                                ><i class="fa fa-trash"></i></button>
                                            @else
                                                <form action="{{ route('coach.delete', $coach->id) }}" method="POST">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    
                                                    <button type="submit" class="btn btn-danger btn-xs">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            @endif
                                            
                                        </td>
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


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      
    </div>
  </div>
</div>
<!-- Fin del Modal -->
<!-- Modal -->
<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content text-center" style="padding: 30px">
        <h2 class="text-center">El coach a eliminar tiene clientes asignados. ¿Aún asi quiere eliminarlo?</h2>
        <form action="/admin/coaches/delete/" method="POST">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <button type="submit" class="btn btn-danger btn-xl">
                Eliminar
            </button>
        </form>
        <br>
        <button class="btn btn-default btn-xl"  data-dismiss="modal">
            Cancelar
        </button>
    </div>
  </div>
</div>
<!-- Fin del Modal -->


{{-- Aqui Termina el listado de Coach --}}
@endsection

@push('scripts')

<script>
$('.table').DataTable( {
	searching: true, 
	paging: true,
	ordering: true,
	language: {
		"sProcessing":     "Procesando...",
		"sLengthMenu":     "Mostrar _MENU_ registros",
		"sZeroRecords":    "No se encontraron resultados",
		"sEmptyTable":     "Ningún dato disponible en esta tabla",
		"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
		"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
		"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
		"sInfoPostFix":    "",
		"sSearch":         "Buscar:",
		"sUrl":            "",
		"sInfoThousands":  ",",
		"sLoadingRecords": "Cargando...",
		"oPaginate": {
			"sFirst":    "Primero",
			"sLast":     "Último",
			"sNext":     "Siguiente",
			"sPrevious": "Anterior"
		},
		"oAria": {
			"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
			"sSortDescending": ": Activar para ordenar la columna de manera descendente"
		}
	}
});
function myFunction(id) {
    $('#myModal .modal-content').load("/admin/coaches/edit/" + id);
}
function deleteCoach(id) {
    var action = $('#deletemodal .modal-content').find('form').attr('action');
    console.log(action + id);
    $('#deletemodal .modal-content').find('form').attr('action', action + id)
}
</script>

@endpush    