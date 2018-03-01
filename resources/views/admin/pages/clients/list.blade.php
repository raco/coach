@extends('admin.layout')
@section('content')
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
								<tbody>
									@foreach ($clientes as $client)
									<tr style="cursor: pointer" onclick="myFunction({{$client->id}})" data-toggle="modal" data-target="#myModal">
										
										<td class="client-avatar">
											<img alt="image" src="{{ $client->user->image_url  or asset('img/user-default.png') }}">
										</td>

										<td>
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
												<a href="#">{{$client->coach->full_name }}</a>
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
  <div class="modal-dialog" role="document">
    <div class="modal-content">
   
    </div>
  </div>
</div>
<!-- Fin del Modal -->

@endsection

@push('scripts')
		<script>
  	 function myFunction(id) {
  	 $('#myModal .modal-content').load("/admin/clients/edit/" + id);};

	</script>

@endpush				
