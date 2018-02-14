@extends('admin.layout')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
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
<div class="wrapper wrapper-content animated fadeInRight">
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
				  <form action="" method="POST" role="form">
                     {{csrf_field()}}
				<div class="ibox-content">
					<div class="input-group">
						<input type="text" name='txtbuscar' placeholder="Buscar cliente..." class="input form-control">
						<span class="input-group-btn">
							<button type="button" class="btn btn btn-primary"> <i class="fa fa-search"></i> Buscar</button>
						</span>
					</div>
				</form>
					<div class="clients-list">
						<div class="table-responsive">
							<table class="table table-striped table-hover">
								<tbody>
									@foreach ($clientes as $client)
									<tr>
										<td class="client-status">
											@if ($client->state)
											<span class="label label-primary">Activo</span>
											@else
											<span class="label label-default">Inactivo</span>
											@endif
										</td>
										<td class="client-avatar">
											<img alt="image" src="{{ asset('img/a2.jpg') }}">
										</td>

										<td>
											<a data-toggle="tab" href="#contact-1" class="client-link">
												@if ($client->user->gender == 'f')
											<a href	{{ $client->user->name }} {{ $client->user->lastname }}
												<i class="fa fa-venus text-muted"></i>
												@else
												{{ $client->user->name }} {{ $client->user->lastname }}
												<i class="fa fa-mars text-muted"></i>
												@endif
											</a>
										</td>

										<td class="contact-type"><i class="fa fa-phone"> </i></td>
										<td>{{ $client->user->phone }}</td>
										<td class="contact-type">
											<i class="fa fa-envelope"> </i>
										</td>
										<td>{{ $client->user->email }}</td>
										<td class="contact-type">
											<span class="label label-default">Coach</span>
										</td>
										<td>
											@if ($client->coach)
												{{-- expr --}}
											<a href="{{ route('coach.edit', $client->coach->id) }}">{{$client->coach->full_name }}</a>
											@else 
											Sin asignar
											@endif
										</td>
										<td>
							

										<a id="link" href="#" onclick="myFunction({{$client->id}});" class="btn btn-default" data-toggle="modal" data-target="#myModal">
													<i class="fa fa-pencil"></i>
										</a>
											
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
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
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
