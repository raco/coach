@extends('coach.layout')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Dashboard</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/">Dashboard</a>
            </li>
        </ol>
        <div class="text-center">
            <h3><strong> Tu frase</strong></h3>
        </div>

        <div class="text-center">
          @empty ($coaches->phrase)
          <h1 class="text-muted"><strong>Ingrese una frase por favor </strong></h1>
          @else
          <h1><strong > {{ $coaches->phrase}} </strong></h1>
          @endempty
          <a href="{{ route('client.create') }}" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#miModal">Editar Frase</a>
		</div>
    </div>
</div>
<div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <form class="form-horizontal"  action="{{route('coach.updphrase')}}" method="POST">
                    <fieldset>
                      {{csrf_field()}}
                    <!-- Form Name -->
                    <legend>Ingrese su frase por favor</legend>
                    {{--    {{auth()->user()->id}} --}}

                    <!-- Text input-->
                    <div class="form-group">
                            <label class="col-md-3 control-label" for="txtphrase">Frase</label>
                      <div class="col-md-8">
                        @empty ($coaches->phrase)
                            <input id="txtphrase" name="txtphrase" placeholder="" class="form-control input-md" type="text">
                            @else
                         <input id="txtphrase" name="txtphrase" placeholder="" class="form-control input-md" type="text" value="{{ $coaches->phrase}}">
                         @endempty
                      </div>
                    </div>

                    <!-- Button -->
                    <div class="form-group">
                            <label class="col-md-6 control-label" for="btnGuardar"></label>
                      <div class="col-md-6">
                            <button id="btnGuardar" name="btnGuardar" type="submit" class="btn btn-primary">Guardar</button>
                      </div>
                    </div>

                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection