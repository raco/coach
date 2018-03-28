@extends('admin.layout')
@section('content')
<style>
	.btn-xs {
		margin-right: 5px;
		float: left;
	}
</style>
<div class="row wrapper border-bottom white-bg page-heading animated fadeInRight">
	<div class="col-lg-10">
		<h2>Clientes</h2>
		<ol class="breadcrumb">
			<li>
				<a href="/">Admin</a>
			</li>
			<li class="active"> 
				<strong>Clientes</strong> 
			</li>
		</ol>
		<div class="pull-right">

		</div>
	</div>
</div>
<div class="wrapper wrapper-content">
	@if(Session::has('flash_message2'))
        <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message2') !!}</em>
        </div>
    @endif
	<div class="row">
		{{-- Aqui empieza el listado de Clientes --}}
		<div class="col-sm-12">
			<div class="ibox">
				<div class="ibox-title">
                    <h5>Listado de todos los clientes.</h5>
                    <div class="ibox-tools">
                        <a href="{{ route('client.create') }}" class="btn btn-primary btn-sm">+ Registrar Nuevo Cliente</a>
                    </div>
                </div>
				<div class="ibox-content">
				  	{{-- <form action="" method="POST" role="form">
                     	{{csrf_field()}}
						<div class="input-group">
							<input type="text" name='txtbuscar' placeholder="Buscar cliente..." class="input form-control">
							<span class="input-group-btn">
								<button type="button" class="btn btn btn-primary"> <i class="fa fa-search"></i> Buscar</button>
							</span>
						</div>
					</form> --}}
					<div class="clients-list">
						<div class="table-responsive">
							<table class="table table-striped table-hover">
								<thead>
									<tr>
										<th colspan="2">Nombre</th>
										<th colspan="2">Coach</th>
										<th colspan="2">Correo Electrónico</th>
										<th colspan="2">Teléfono</th>
										<th >Estado</th>
										<th >Acciones</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($clientes as $client)
									<tr>
										
										<td class="client-avatar">
											<img alt="image" src="{{ $client->user->image_url  or asset('img/user-default.png') }}">
										</td>

										<td style="cursor: pointer" onclick="myFunction({{$client->id}})" data-toggle="modal" data-target="#myModal">
											<a href="#" class="client-link">
												@if ($client->user->gender == 'f')
												{{ $client->user->name }} {{ $client->user->lastname }}
												<i class="fa fa-venus text-muted"></i>
												@else
												{{ $client->user->name }} {{ $client->user->lastname }}
												<i class="fa fa-mars text-muted"></i>
												@endif
											</a>
										</td>
										<td class="contact-type">
											<span class="label label-default">Coach</span>
										</td>
										<td>
											@if ($client->coach)
												{{$client->coach->full_name }}
											@else 
												Sin asignar
											@endif
										</td>
										<td class="contact-type">
											<i class="fa fa-envelope"> </i>
										</td>
										<td>{{ $client->user->email }}</td>

										<td class="contact-type"><i class="fa fa-phone"> </i></td>
										<td>{{ $client->user->phone }}</td>
										<td class="client-status">
											@if ($client->state)
											<span class="label label-primary">Activo</span>
											@else
											<span class="label label-default">Inactivo</span>
											@endif
										</td>
										<td class="client-status">
											<button class="btn btn-default btn-xs"  onclick="getMedicalData({{$client->id}})" style="cursor: pointer" data-toggle="modal" data-target="#myModal" title="Datos médicos del cliente">
												<i class="fa fa-stethoscope"></i>
											</button>
											<a href="{{ route('client.messages', $client->user->id) }}" class="btn btn-info btn-xs pull-left" title="Conversaciones entre cliente y su coach"><i class="fa fa-comments"></i></a>
                                            <form action="{{ route('client.delete', $client->id) }}" method="POST">
                                              {{ method_field('DELETE') }}
                                              {{ csrf_field() }}
                                              <button type="submit" class="btn btn-danger btn-xs" title="Eliminar cliente"><i class="fa fa-trash"></i></button>
                                            </form>
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
{{-- Aqui Termina el listado de Clientes --}}

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
   
    </div>
  </div>
</div>
<!-- Fin del Modal -->

@endsection

@push('scripts')
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>

<script>
function myFunction(id) {
	$('#myModal .modal-content').load("/admin/clients/edit/" + id);
};
function getMedicalData(id) {
	$('#myModal .modal-content').load("/admin/clients/medical/" + id);
};
</script>
@endpush				
