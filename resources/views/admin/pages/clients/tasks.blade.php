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
                <strong>Tareas</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    @if(Session::has('flash_message'))
        <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em>
        </div>
    @endif
    <div class="row">
        <div class="col-sm-8">
            <div class="ibox">
                <div class="ibox-title">
                    <div class="ibox-tools">
                    <h5>Tareas de <strong>{{ $user->full_name }}</strong> con Coach: <strong>{{ $user->client->coach->full_name }}</strong></h5>
                        <button class="btn btn-sm btn-success" onclick="crear()" style="cursor: pointer" data-toggle="modal" data-target="#myModal">+ Registrar Nueva Tarea</button>
                    </div>
                </div>
                <div class="ibox-content">
				
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Descripcion</th>
                                        <th>Realizada</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($tasks as $task)
                                    <tr>
                                        <td>{{ $task->created_at->format('m/d/Y') }}</td>
                                        <td>{{ $task->description }}</td>
                                        <td>{{ $task->isDone() }}</td>
                                        <td>
                                            <button class="btn btn-xs" onclick="editar({{$task->id}})" style="cursor: pointer" data-toggle="modal" data-target="#myModal">
												<i class="fa fa-pencil"></i>
                                            </button>
                                            <form action="{{ route('task.delete', $task->id) }}" method="POST">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="2">
                                            <h3>El cliente aun no tiene tareas.</h3>
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
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      
    </div>
  </div>
</div>
<!-- Fin del Modal -->
@endsection
@push('scripts')

    <script>
    function crear() {
        $('#myModal .modal-content').load("{{ route('task.create', $id) }}");
    }
    function editar(id) {
        $('#myModal .modal-content').load("/admin/tasks/edit/" + id);
    }
    </script>

@endpush    