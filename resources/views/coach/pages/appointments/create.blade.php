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
                <strong>Crear</strong>
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
                            <h3 class="m-t-none m-b">Registrar nueva cita</h3>
                            <p>Ingrese los datos de la nueva cita.</p>
                            <form action="{{route('coach.appointment.store')}}" method="POST" role="form" id="createForm">
                                {{ csrf_field() }}
                                @if(Session::has('flash_message'))
                                <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em>
                                </div>
                                @endif
                                <div class="form-group">
                                    <label>Cliente</label><br>
                                    <select name="clients[]" id="clients" required multiple="multiple">
                                        @foreach ($clients as $client)
                                        <option value="{{ $client->user->id }}">{{ $client->user->full_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Fecha</label>
                                    <input type="text" name="appointment_date" id="appointment_date" placeholder="Ingrese Fecha" class="form-control"  minlength="2" maxlength="40" required>
                                </div>
                                <div class="form-group">
                                    <label>Hora</label>
                                    <input type="text" name="appointment_time" id="appointment_time" placeholder="Ingrese Hora" class="form-control"  minlength="2" maxlength="20" required>
                                </div>
                                <div class="form-group">
                                    <label>Lugar</label>
                                    <input type="text" name="place" placeholder="Ingrese Lugar" class="form-control"  minlength="2" maxlength="150" required>
                                </div>
                                <div class="form-group">
                                    <label>Asunto</label>
                                    <input type="text" name="subject" placeholder="Ingrese Asunto" class="form-control"  minlength="2" maxlength="250" required>
                                </div>
                                <div class="form-group">
                                    <label>Mensaje</label>
                                    <textarea name="message" id="message" cols="30" rows="3" minlength="2" maxlength="400" class="form-control" required></textarea>
                                </div>
                                <br>

                                <div class="form-group">
                                    <button class="btn btn-primary pull-right m-t-n-xs" type="submit" ><strong>REGISTRAR</strong></button>
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

