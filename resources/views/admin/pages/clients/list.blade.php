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
            </div>
            <div class="col-lg-2">

            </div>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                
{{-- Aqui empieza el listado de Clientes --}}
                <div class="col-sm-12">
                    <div class="ibox">
                        <div class="ibox-content">
                            <div class="input-group">
                                <input type="text" placeholder="Buscar coach..." class="input form-control">
                                <span class="input-group-btn">
                                        <button type="button" class="btn btn btn-primary"> <i class="fa fa-search"></i> Buscar</button>
                                </span>
                            </div>
                            <div class="clients-list">
                          		<div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                    	<tbody>
                                    		@foreach ($clientes as $client)
	                                    		<tr>
		                                            <td class="client-avatar">
		                                            	<img alt="image" src="img/a2.jpg"> 
		                                            </td>
		                                          
		                                            <td>
		                                            	<a data-toggle="tab" href="#contact-1" class="client-link">{{ $client->user->name }}</a>
		                                            </td>
		                                            <td> 
		                                            	{{ $client->user->lastname }}		                                            	
		                                            </td>
		                                            <td class="contact-type"><i class="fa fa-phone"> </i></td>
                                            		<td>{{ $client->user->phone }}</td>
		                                            <td class="contact-type">
		                                            	<i class="fa fa-envelope"> </i>
		                                            </td>
		                                            <td>{{ $client->user->email }}</td>
		                                            	@if ($client->user->gender == 'f')
			                                            <td class="contact-type">
		                                            		<i class="fa fa-female"></i>
			                                            </td>
			                                            <td>Mujer</td>
		                                            	@else
	                                            	    <td class="contact-type">
		                                            		<i class="fa fa-male"></i>
			                                            </td>
			                                            <td>Hombre</td>
		                                            	@endif

		                                            <td class="client-status">
		                                            	@if ($client->state)
		                                            		<span class="label label-primary">Activo</span>
		                                            	@else
		                                            		<span class="label label-danger">Inactivo</span>
		                                            	@endif
		                                            </td>
		                                            <td>
		                                            	<a href="#" class="btn btn-default">
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
@endsection