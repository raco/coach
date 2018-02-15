@extends('admin.layout')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading animated fadeInRight">
    <div class="col-lg-10">
        <h2>Coaches</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/">Admin</a>
            </li>
            <li class="active">
                <strong>Coaches</strong>
            </li>
        </ol>

    </div>
</div>
<form>



</form>

<div class="wrapper wrapper-content">
    <div class="row">
        {{-- Aqui empieza el listado de Coach --}}
        <div class="col-sm-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h5>Listado de todos los coaches.</h5> 

                    <div class="ibox-tools">
                        <a href="{{ route('coach.create') }}" class="btn btn-primary btn-sm">+ Registrar Nuevo Coach</a>
                    </div>
                </div>
               
                <form action="{{route('coach.search')}}" method="POST" role="form">
                     {{csrf_field()}}
                    <div class="ibox-content">
                    <div class="input-group">
                        <input name='txtbuscoach' type="text" placeholder="Buscar coach..." class="input form-control" >
                        <span class="input-group-btn">
                        <button type="submit" class="btn btn btn-info"> <i class="fa fa-search"></i> Buscar</button>
                        </span>
                    </div>
                </form>

                    <div class="clients-list">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <tbody>
                                    @foreach ($coaches as $coach)
                                    <tr onclick="myFunction({{$coach->id}})" style="cursor: pointer" data-toggle="modal" data-target="#myModal">
                                        <td class="client-status">
                                            @if ($coach->state)
                                            <span class="label label-primary">Activo</span>
                                            @else
                                            <span class="label label-danger">Inactivo</span>
                                            @endif
                                        </td>
                                        <td class="client-avatar">
                                            <img alt="image" src="{{ $coach->image_url  or asset('img/user-default.png') }}">
                                        </td>
                                        <td>
                                            <a data-toggle="tab" href="#contact-1" class="client-link">{{ $coach->full_name }}</a>
                                        </td>
                                       
                                        <td class="contact-type"><i class="fa fa-phone"> </i></td>
                               
                                        <td>{{ $coach->phone }}</td>
                                        <td class="contact-type">
                                            <i class="fa fa-envelope"> </i>
                                        </td>

                                        <td>{{ $coach->email }}</td>
                                        @if ($coach->gender == 'f')
                                        <td class="contact-type">
                                            <i class="fa fa-female"></i>
                                        </td>
                                        <td>Mujer</td>
                                        @else
                                        <td class="contact-type">
                                            <i class="fa fa-male"></i>
                                        </td>
                                        <td>Hombre</td>
                                        @endif 
                                   
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
  <div class="modal-dialog modal-lg" role="document">
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
        $('#myModal .modal-content').load("/admin/coaches/edit/" + id);
    }
    </script>

@endpush    