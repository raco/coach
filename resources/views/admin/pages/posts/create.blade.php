@extends('admin.layout')
@section('content')
{{-- Cabecera --}}

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Noticias</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/">Admin</a>
            </li>
            <li class="active">
                <a href="{{ route('post.list') }}">Noticias</a>
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
                            <h3 class="m-t-none m-b">Registrar nueva noticia</h3>
                            <p>Ingrese los datos de la nueva noticia.</p>
                            <form action="{{route('post.store')}}" method="POST" role="form" id="createForm" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                @if(Session::has('flash_message'))
                                <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em>
                                </div>
                                @endif
                                <div class="form-group">
                                    <label>Título</label>
                                    <input type="text" name="title" placeholder="Ingrese Título" class="form-control"  minlength="2" maxlength="250" required>
                                </div>
                                <div class="form-group">
                                    <label>Resumen</label>
                                    <textarea name="excerpt" id="excerpt" cols="30" rows="3" minlength="2" maxlength="400" class="form-control" required></textarea>
                                </div>
                                <div class="form-group" style="min-height: 300px">
                                    <label>Contenido</label>
                                    <textarea id="summernote" name="content" rows="10"></textarea>
                                </div>
                                 <div class="form-group">
                                    <label>Imagen</label>
                                    <input type="file" name="file" required>
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

