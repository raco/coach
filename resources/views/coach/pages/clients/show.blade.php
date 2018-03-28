<div style="padding: 10px">
    <ul id="coachTabs" class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active">
            <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Datos de Perfil</a>
        </li>
        <li role="presentation">
            <a href="#medical" aria-controls="medical" role="tab" data-toggle="tab">Datos Médicos</a>
        </li>
    </ul>
    <div class="tab-content">
        <div id="profile" class="tab-pane active" role="tabpanel">
            <div class="wrapper wrapper-content">
                <div class="row">
                    <div class="col-sm-6" style="font-size: 18px">
                        <strong>Nombre:</strong>
                        {{ $client->user->name }} <br>

                        <strong>Apellido:</strong>
                        {{ $client->user->lastname }} <br>

                        <strong>Sexo:</strong>
                        @if ($client->user->gender == 'm')
                            Hombre
                        @else    
                            Mujer
                        @endif
                        <br>

                        <strong>Teléfono:</strong>
                        {{ $client->user->phone }} <br>

                        <strong>Correo:</strong>
                        {{ $client->user->email }} <br>
                        
                        <strong>Activo:</strong>
                        @if ($client->state)
                            Si
                        @else    
                            No
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div id="medical" class="tab-pane" role="tabpanel">
            <div class="wrapper wrapper-content">
                <div class="row">
                    <div class="col-sm-12">
                        @empty($client->medical_data)
                            <h2>No dispone de datos médicos.</h2>
                        @else
                            {!! $client->medical_data !!}
                        @endempty
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>

        