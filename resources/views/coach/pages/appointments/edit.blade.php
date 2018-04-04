@extends('coach.layout')
@section('content')
{{-- Cabecera --}}

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Citas</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/">Coach</a>
            </li>
            <li class="active">
                <a href="{{ route('coach.appointment.list') }}">Citas</a>
            </li>
            <li class="active">
                <strong>Editar</strong>
            </li>
        </ol>
    </div>
</div>


<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        {{-- Fin de Cabecera --}}
        <div class="col-sm-5">
            <div class="ibox">
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="m-t-none m-b">Actualizar Cita</h3>
                            <form action="{{route('coach.appointment.update', $appointment)}}" method="POST" role="form" id="createForm" enctype="multipart/form-data">
                                {{ method_field('PUT') }}
                                {{ csrf_field() }}
                                @if(Session::has('flash_message'))
                                <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em>
                                </div>
                                @endif
                                <div class="form-group">
                                    <label>Cliente</label>
                                    <select name="clients[]" id="clients" required multiple="multiple">
                                        <option disabled readonly>Elija cliente</option>
                                            @foreach ($clients as $client)
                                            @if (in_array($client->user->id, $assistants))
                                            <option value="{{ $client->user->id }}" selected>{{ $client->user->full_name }}</option>
                                            @else
                                            <option value="{{ $client->user->id }}">{{ $client->user->full_name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Fecha</label>
                                    <input type="text" name="appointment_date" id="appointment_date" placeholder="Ingrese Fecha" class="form-control"  minlength="2" maxlength="40" required value="{{ $appointment->appointment_date }}">
                                </div>
                                <div class="form-group">
                                    <label>Hora</label>
                                    <input type="text" name="appointment_time" id="appointment_time" placeholder="Ingrese Hora" class="form-control"  minlength="2" maxlength="20" required value="{{ $appointment->appointment_time }}">
                                </div>
                                <div class="form-group">
                                    <label>Lugar</label>
                                    <input type="text" name="place" placeholder="Ingrese Lugar" class="form-control"  minlength="2" maxlength="150" required value="{{ $appointment->place }}">
                                </div>
                                <div class="form-group">
                                    <label>Asunto</label>
                                    <input type="text" name="subject" placeholder="Ingrese Asunto" class="form-control"  minlength="2" maxlength="250" required value="{{ $appointment->subject }}">
                                </div>
                                <div class="form-group">
                                    <label>Mensaje</label>
                                    <textarea name="message" id="message" cols="30" rows="3" minlength="2" maxlength="400" class="form-control" required>{{ $appointment->message }}</textarea>
                                </div>
                                <br>
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit" ><strong>Actualizar</strong></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <link href="{{ asset('js/classic.css') }}" rel="stylesheet">
    <link href="{{ asset('js/classic.date.css') }}" rel="stylesheet">
    <link href="{{ asset('js/classic.time.css') }}" rel="stylesheet">
    <script src="{{ asset('js/picker.js') }}"></script>
    <script src="{{ asset('js/picker.date.js') }}"></script>
    <script src="{{ asset('js/picker.time.js') }}"></script>
    <script src="{{ asset('js/es_ES.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('js/bootstrap-multiselect.css') }}">
    <script src="{{ asset('js/bootstrap-multiselect.js') }}"></script>
    <script>
        $('#createForm').validate();
        $('#appointment_date').pickadate({
            formatSubmit: 'yyyy-mm-dd',
        });
        $('#appointment_time').pickatime({
            format: 'HH:i',
            formatSubmit: 'HH:i',
        });
        
        $('#createForm').validate();
        $('#clients').multiselect({
            buttonWidth: '100%',
            buttonText: function(options, select) {
                    if (options.length === 0) {
                        return 'Elija Clientes ...';
                    } else {
                        var labels = [];
                        options.each(function() {
                            if ($(this).attr('label') !== undefined) {
                                labels.push($(this).attr('label'));
                            }
                            else {
                                labels.push($(this).html());
                            }
                        });
                        return labels.join(', ') + '';
                    }
                }
        });
    </script>
@endpush
