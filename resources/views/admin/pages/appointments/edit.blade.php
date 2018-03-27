<div style="padding: 10px"> 
    <h3 class="m-t-none m-b">Actualizar Cita</h3>
    <form action="{{route('appointment.update', $appointment)}}" method="POST" role="form" id="createForm" enctype="multipart/form-data">
        {{ method_field('PUT') }}
        {{ csrf_field() }}
        @if(Session::has('flash_message'))
        <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em>
        </div>
        @endif
        <div class="form-group">
            <label>Cliente</label>
            <select name="client_id" id="client" required class="form-control">
                <option disabled readonly>Elija cliente</option>
                    @foreach ($clients as $client)
                    @if ($client->user->id == $appointment->client_id)
                    <option value="{{ $client->user->id }}" selected>{{ $client->user->full_name }}</option>
                    @else
                    <option value="{{ $client->user->id }}">{{ $client->user->full_name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Coach</label>
            <select name="coach_id" id="coach" required class="form-control">
                <option disabled readonly>Elija coach</option>
            @foreach ($coaches as $coach)
                @if ($coach->user->id == $appointment->coach_id)
                    <option value="{{ $coach->user->id }}" selected>{{ $coach->user->full_name }}</option>
                @else
                    <option value="{{ $coach->user->id }}">{{ $coach->user->full_name }}</option>
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

    <link href="{{ asset('js/classic.css') }}" rel="stylesheet">
    <link href="{{ asset('js/classic.date.css') }}" rel="stylesheet">
    <link href="{{ asset('js/classic.time.css') }}" rel="stylesheet">
    <script src="{{ asset('js/picker.js') }}"></script>
    <script src="{{ asset('js/picker.date.js') }}"></script>
    <script src="{{ asset('js/picker.time.js') }}"></script>
    <script src="{{ asset('js/es_ES.js') }}"></script>
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
    </script>
</div>
