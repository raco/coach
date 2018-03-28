@extends('coach.layout')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading animated fadeInRight">
    <div class="col-lg-10">
        <h2>Citas</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/">Coach</a>
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
                        <a href="{{ route('coach.appointment.create') }}" class="btn btn-primary btn-sm">+ Registrar Nueva Cita</a>
                    </div>
                </div>
               
                <div class="ibox-content">
                    <div id='calendar'></div>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- Aqui Termina el listado --}}
@endsection

@push('scripts')
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />

<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/locale/es.js'></script>

<script>
    $(document).ready(function() {
        // page is now ready, initialize the calendar...
        $('#calendar').fullCalendar({
            locale: 'es',
            // put your options and callbacks here
            events : [
                @foreach($appointments as $appointment)
                {
                    title : '{{ $appointment->place }}, {{ $appointment->subject }}',
                    start : '{{ $appointment->appointment_date }}',
                    url : '{{ route('coach.appointment.edit', $appointment->id) }}'
                },
                @endforeach
            ]
        })
    });
</script>
@endpush    