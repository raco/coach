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

            <li>
                <a href="{{ route('client.list') }}">Clientes</a>
            </li>
            <li class="active">
                <strong>Mensajes</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-8">
            <div class="ibox">
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="m-t-none m-b">Mensajes del Cliente</h3>
                            <p>Conversacion de cliente y su coach.</p>
                            
                            @forelse ($messages as $message)
                                <p><strong><small class="text-muted">[{{ $message->created_at->format('m/d/Y H:m') }}]</small> {{ $message->from_name }} <small class="text-muted">{{ $message->from_rol }}</small></strong>: {{ $message->message }}</p>
                            @empty
                                <h2>No hay conversaciones por el momento.</h2>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
