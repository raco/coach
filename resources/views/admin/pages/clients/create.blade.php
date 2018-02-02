@extends('admin.layout')
@section('content')
{{-- Cabecera --}}
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Coach</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/">Admin</a>
            </li>
            <li class="active">
                Coaches
            </li>
            <li class="active">
                <strong>Crear</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox">
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-sm-6 b-r">
                            <h3 class="m-t-none m-b">Editar</h3>
                            <p>Edite los datos del coach.</p>
                            
                            <form action="{{route('client.store')}}" method="POST" role="form">
                                {{csrf_field()}}
                                @if(Session::has('flash_message'))
                                <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></    span><em> {!! session('flash_message') !!}</em>
                                </div>
                                @endif
                                
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input type="text" name= "name" placeholder="Ingrese Nombres" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Apellidos</label>
                                    <input type="text" name='lastname' placeholder="Ingrese Apellidos" class="form-control" >
                                </div>
                                
                                <div class="form-group"><label class="form-group">Sexo</label >
                                    <select name="sexo" name="gender" class="form-control" >
                                        <option value="m">Masculino</option>
                                        <option value="f">Femenino </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Teléfono</label>
                                    <input type="text" placeholder="" name='phone'class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Email</label> 
                                    <input  type="email" name="email" placeholder="Enter email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Password</label> 
                                    <input  type="password" name="password" placeholder="" class="form-control">
                                </div>
                                <div class="form-group"><label class="form-group">Seleccione su coach</label>
                                    <select name="coach" class="form-control">
                                        @foreach($coaches as $data)
                                        <option value="{{ $data->id }}">{{ $data->full_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit"><strong>Guardar</strong></button>
                                </div>
                            </form>
                        </div>    
                    </div>    
                </div>
            </div>
        </div>
    </diDv>
</diDv>
@endsection