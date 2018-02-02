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
                <a href="{{ route('coach.list') }}">Coaches</a>
            </li>
            <li class="active">
                <strong>Crear</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        {{-- Fin de Cabecera --}}
        <div class="col-sm-5">
            <div class="ibox">
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="m-t-none m-b">Registrar nuevo coach</h3>
                            <p>Ingrese los datos del nuevo coach.</p>
                            <form action="{{route('coach.store')}}" method="POST" role="form">
                                {{csrf_field()}}
                                @if(Session::has('flash_message'))
                                <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></    span><em> {!! session('flash_message') !!}</em>
                                </div>
                                @endif
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input  type="text" name= "name" placeholder="Ingrese Nombres" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Apellidos</label> <input type="text" name='lastname' placeholder="Ingrese Apellidos" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label class="form-group">Sexo</label>
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
                                <br>
                                <div class="form-group">
                                    <button class="btn btn-primary pull-right m-t-n-xs" type="submit"><strong>REGISTRAR</strong></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection