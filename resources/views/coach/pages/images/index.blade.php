@extends('coach.layout')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading animated fadeInRight">
    <div class="col-lg-10">
        <h2>Imágenes</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/">Coach</a>
            </li>
            <li class="active">
                <strong>Imágenes</strong>
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
                    <h5>Listado de todos las imágenes.</h5> 
                </div>
               
                <div class="ibox-content">

                    <div class="clients-list">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Imagen</th>
                                        <th>Cliente</th>
                                        <th>Comentario</th>
                                        <th>Fecha</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($images as $image)
                                        <tr>
                                            <td><img src="{{ $image->url }}" style="width: 60px"></td>
                                            <td>{{ $image->user->full_name }}</td>
                                            <td>{{ $image->short_comment }}</td>
                                            <td>
                                                {{ $image->created_at->format('d/m/Y') }}
                                            </td>
                                            <td>
                                                <button class="btn btn-default"  onclick="myFunction({{$image->id}})" style="cursor: pointer" data-toggle="modal" data-target="#myModal">
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


{{-- Aqui Termina el listado de Coach --}}
@endsection

@push('scripts')
    <script src="{{ asset('js/table.js') }}"></script>
    <script>
    function myFunction(id) {
        $('#myModal .modal-content').load("/coach/images/show/" + id);
    }
    </script>

@endpush    