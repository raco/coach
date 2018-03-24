@extends('admin.layout')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading animated fadeInRight">
    <div class="col-lg-10">
        <h2>Peticiones de clientes</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/">Admin</a>
            </li>
            <li class="active">
                <strong>Peticiones</strong>
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
                    <h5>Listado de todos las peticiones de los clientes.</h5> 
                </div>
               
                <div class="ibox-content">

                    <div class="clients-list">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Estado</th>
                                        <th>Producto/Servicio</th>
                                        <th>Cliente</th>
                                        <th>Coach Encargado</th>
                                        <th>Fecha</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($buyingrequests as $br)
                                        <tr>
                                            <td>
                                                @if ($br->state)
                                                    <span class="label label-success">
                                                @else
                                                    <span class="label label-danger">
                                                @endif
                                                {{ $br->literal_state }}</span>
                                            </td>
                                            <td>{{ $br->product->name }}</td>
                                            <td>{{ $br->user->name }}</td>
                                            <td>{{ $br->coach->full_name }}</td>
                                            <td>{{ $br->created_at->format('d/m/Y') }}</td>
                                            <td>
                                                <form action="{{ route('buyingrequest.update', $br) }}" method="POST" role="form">
                                                    {{ method_field('PUT') }}
                                                    {{ csrf_field() }}
                                                    @if ($br->state)
                                                        <button class="btn btn-default btn-sm">
                                                            <i class="fa fa-refresh"></i> Pendiente
                                                        </button>
                                                    @else
                                                        <button class="btn btn-primary btn-sm">
                                                            <i class="fa fa-check"></i> Entregar
                                                        </button>
                                                    @endif
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
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script>
    function myFunction(id) {
        $('#myModal .modal-content').load("/admin/products/edit/" + id);
    }
    </script>

@endpush    