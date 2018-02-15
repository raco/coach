@extends('admin.layout')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Dashboard</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/">Dashboard</a>
            </li>

        </ol>



    </div>
</div>
<br>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(Session::has('flash_message'))
    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em>
    </div>
@endif
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		{{-- Fin de Cabecera --}}
        <div class="col-sm-5">
            <div class="ibox">
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="m-t-none m-b">Cambiar Contraseña</h3>
                           	<p>Modifique su contraseña.</p>
                            <form action="{{route('admin.updatePass')}}" method="POST" >
                                {{csrf_field()}}

                                @if(Session::has('flash_message2'))
                                <div class="alert alert-success"><span class="glyphicon glyphicon-ok">
                                </span><em> {!! session('flash_message2') !!}</em>
                                </div>
                                @endif
                                <div class="form-group">
                                    <label>Contraseña</label>
                                    <input type="password"  name="password" class="form-control" required="required">
                                </div>
                                <button class="btn btn-primary pull-right m-t-n-xs" type="submit"><strong>Actualizar Contraseña</strong></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>
</div>



@endsection



