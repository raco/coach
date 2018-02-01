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
                    <li class="active">
                        Clientes
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
                                

                          <form action="{{route('client.update',$client->id)}}" method="POST" role="form">

						{{csrf_field()}}

						

								<div class="form-group"><label>Nombre</label> 
								<input value={{ $client->user->name }} type="text" 
								name= "name" placeholder="Ingrese Nombres" class="form-control"></div>

                       

                                	<div class="form-group"><label>Apellidos</label> <input type="text" name='lastname' placeholder="Ingrese Apellidos" class="form-control" value="{{ $client->user->lastname }}"></div>
                                    
                                    

								<div class="form-group"><label class="form-group">Sexo</label>

                                    	<select name="sexo" class="form-control" name="account">
                                        <option value="m">Masculino</option>
                                        <option value="f">Femenino </option>
                                    	</select>
                                		
								</div>	



								<div class="form-group"><label>Teléfono</label> 
									<input value="{{ $client->user->phone }}" type="text" placeholder="" name='phone'class="form-control"></div>



                                    <div class="form-group"><label>Email</label> <input value="{{ $client->user->email }}"  type="email" name="email" placeholder="Enter email" class="form-control"></div>
                                   
						
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
                

                                    <div>
                                        <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit"><strong>Modificar</strong></button>
                                       
                                    </div>

                            </div>
                        </div>
        </div>
    </div>
                                </form>
@endsection