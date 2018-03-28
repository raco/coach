@extends('coach.layout')
@section('content')
{{-- Cabecera --}}

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Dieta</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/">Coach</a>
            </li>
            <li class="active">
                <a href="{{ route('coach.diet.list') }}">Dietas</a>
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
                            <h3 class="m-t-none m-b">Registrar nueva dieta</h3>
                            <p>Ingrese los datos de la nueva dieta.</p>
                            <form action="{{route('coach.diet.store')}}" method="POST" role="form" id="createForm" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                @if(Session::has('flash_message'))
                                <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em>
                                </div>
                                @endif
                                <div class="form-group">
                                    <label>Categoria</label>
                                    <input type="text" name="category" placeholder="Ingrese Categoria" class="form-control"  minlength="2" maxlength="100" required>
                                </div>
                                <div class="form-group" style="min-height: 300px">
                                    <label>Contenido</label>
                                    <textarea id="summernote" name="content" rows="10"></textarea>
                                </div>

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
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
<script>
    $('#createForm').validate();
    $('#summernote').summernote({
        tabsize: 2,
        height: 300,
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['insert', ['picture']]
        ],
        disableDragAndDrop: true
    });
</script>
@endpush

