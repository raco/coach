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
                <strong>Pesos</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-4">
            <div class="ibox">
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="m-t-none m-b">Pesos del Cliente</h3>
                            <p>Historial de pesos enviados por el cliente.</p>
                            
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Peso</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($weights as $w)
                                    <tr>
                                        <td>{{ $w->created_at->format('m/d/Y') }}</td>
                                        <td>{{ $w->kg }}kg</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="2">
                                            <h3>El cliente aun no registra pesos.</h3>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
