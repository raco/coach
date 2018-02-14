@extends('admin.layout')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
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

<div class="wrapper wrapper-content animated fadeInRight">
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
                                    <tr>
                                        <td class="client-status">
                                            @if ($coach->state)
                                            <span class="label label-primary">Activo</span>
                                            @else
                                            <span class="label label-danger">Inactivo</span>
                                            @endif
                                        </td>
                                        <td class="client-avatar">
                                            <img alt="image" src="{{ asset('img/a2.jpg') }}">
                                        </td>
                                        <td>
                                            <a data-toggle="tab" href="#contact-1" class="client-link">{{ $coach->full_name }}</a>
                                        </td>
                                       
                                        <td class="contact-type"><i class="fa fa-phone"> </i></td>
                                        {{-- <td>{{ $coach->user->phone }}</td> --}}
                                        <td>{{ $coach->phone }}</td>
                                        <td class="contact-type">
                                            <i class="fa fa-envelope"> </i>
                                        </td>

                                        {{-- <td>{{ $coach->user->email }}</td> --}}
                                        <td>{{ $coach->email }}</td>
                                       {{--  @if ($coach->user->gender == 'f') --}}
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

                                        <td>
                                           {{--  <a href="{{ route('coach.edit', $coach->id) }}" class="btn btn-default">
                                                <i class="fa fa-pencil"></i>
                                            </a> --}}

                                        <a id="link" href="#" onclick="myFunction({{$coach->id}});" class="btn btn-default" data-toggle="modal" data-target="#myModal">
                                                    <i class="fa fa-pencil"></i>
                                        </a>


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
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- Fin del Modal -->


{{-- Aqui Termina el listado de Coach --}}
@endsection

@push('scripts')
        <script>
     function myFunction(id) {
     $('#myModal .modal-content').load("/admin/coaches/edit/" + id);};

    </script>

@endpush    