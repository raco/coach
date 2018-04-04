@extends('admin.layout')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading animated fadeInRight">
    <div class="col-lg-10">
        <h2>Citas</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/">Admin</a>
            </li>
            <li class="active">
                <strong>Citas</strong>
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
        {{-- Aqui empieza el listado --}}
        <div class="col-sm-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h5>Listado de todas las Citas.</h5> 
                    <div class="ibox-tools">
                        <a href="{{ route('appointment.create') }}" class="btn btn-primary btn-sm">+ Registrar Nueva Cita</a>
                    </div>
                </div>
               
                <div class="ibox-content">

                    <div class="clients-list">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Coach</th>
                                        <th>Fecha y hora</th>
                                        <th>Asunto</th>
                                        <th>Mensaje</th>
                                        <th>Lugar</th>
                                        {{-- <th>Visto</th> --}}
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($appointments as $appointment)
                                        <tr>
                                            <td>{{ $appointment->coach->name }} {{ $appointment->coach->lastname }}</td>
                                            <td>{{ date_create($appointment->appointment_date)->format('d/m/Y') }} {{ substr($appointment->appointment_time, 0, 5) }}</td>
                                            <td>{{ $appointment->subject }}</td>
                                            <td>{{ $appointment->message }}</td>
                                            <td>{{ $appointment->place }}</td>
                                            {{-- <td>{{ $appointment->seen ? 'Si' : 'No' }}</td> --}}
                                            <td class="client-status">
                                                <button class="btn btn-default btn-xs"  onclick="myFunction({{$appointment->id}})" style="cursor: pointer" data-toggle="modal" data-target="#myModal">
                                                    <i class="fa fa-pencil"></i>
                                                </button>
                                           
                                                <form action="{{ route('appointment.delete', $appointment->id) }}" method="POST">
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


{{-- Aqui Termina el listado --}}
@endsection

@push('scripts')
    <script src="{{ asset('js/table.js') }}"></script>
    <script>
    
    function myFunction(id) {
        $('#myModal .modal-content').load("/admin/appointments/edit/" + id);
    }
    </script>
@endpush    