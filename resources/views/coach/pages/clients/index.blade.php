@extends('coach.layout')
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
                    <h5>Listado de todos mis clientes.</h5>
                </div>

               		
				<div class="ibox-content">
					{{-- <div class="input-group">
						<input type="text" placeholder="Buscar cliente..." name="txtbuscar" class="input form-control">
					
							<span class="input-group-btn">
								<button type="submit" class="btn btn btn-primary"> <i class="fa fa-search"></i> Buscar</button>
							</span>	
					</div> --}}
				
					<div class="clients-list">
						<div class="table-responsive">
							<table class="table table-striped table-hover">
								<thead>
                                    <tr>
                                        <th >Estado</th>
                                        <th colspan="2">Nombre</th>
                                        <th colspan="2">Teléfono</th>
										<th colspan="2">Correo Electrónico</th>
										<th></th>
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
										<td class="client-avatar">
											<img alt="image" src="{{ $client->user->image_url  or asset('img/user-default.png') }}">
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

										<td class="contact-type"><i class="fa fa-phone"> </i></td>
										<td>{{ $client->user->phone }}</td>
										<td class="contact-type">
											<i class="fa fa-envelope"> </i>
										</td>
										<td>{{ $client->user->email }}</td>
										<td>
											<button class="btn btn-default" onclick="myFunction({{$client->id}})" style="cursor: pointer" data-toggle="modal" data-target="#myModal">
												<i class="fa fa-eye"></i>
											</button>
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
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      
    </div>
  </div>
</div>
<!-- Fin del Modal -->

{{-- Aqui Termina el listado de Clientes --}}
@endsection


@push('scripts')
   
    <script>
    function myFunction(id) {
        $('#myModal .modal-content').load("/coach/clients/show/" + id);
    }
    </script>

@endpush    