@extends('coach.layout')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading animated fadeInRight">
    <div class="col-lg-10">
        <h2>Dietas</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/">Coach</a>
            </li>
            <li class="active">
                <strong>Dietas</strong>
            </li>
        </ol>

    </div>
</div>
<div class="wrapper wrapper-content">
    @if(Session::has('flash_message'))
        <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em>
        </div>
    @endif
    <div class="row">
        {{-- Aqui empieza el listado de Coach --}}
        <div class="col-sm-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h5>Listado de todas las dietas.</h5> 

                    <div class="ibox-tools">
                        <a href="{{ route('coach.diet.create') }}" class="btn btn-primary btn-sm">+ Registrar Nueva Dieta</a>
                    </div>
                </div>
               
                <div class="ibox-content">

                    <div class="clients-list">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Cliente</th>
                                        <th>Categoria</th>
                                        <th>Resumen</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($diets as $diet)
                                        <tr>
                                            <td>{{ $diet->client->name }} {{ $diet->client->lastname }}</td>
                                            <td>{{ $diet->category }}</td>
                                            <td>{{ $diet->excerpt }}</td>
                                            <td>
                                                <button class="btn btn-default btn-xs"  onclick="myFunction({{$diet->id}})" style="cursor: pointer" data-toggle="modal" data-target="#myModal">
                                                    <i class="fa fa-pencil"></i>
                                                </button>
                                         
                                                <form action="{{ route('coach.diet.delete', $diet->id) }}" method="POST">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                                                </form>
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


{{-- Aqui Termina el listado de Coach --}}
@endsection

@push('scripts')
    <script src="{{ asset('js/table.js') }}"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
    <script>
    function myFunction(id) {
        $('#myModal .modal-content').load("/coach/diets/edit/" + id);
    }
    </script>
@endpush    