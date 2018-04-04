@extends('coach.layout')
@section('content')
{{-- Cabecera --}}

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Producto</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/">Coach</a>
            </li>
            <li class="active">
                <a href="{{ route('coach.product.list') }}">Productos</a>
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
                            <h3 class="m-t-none m-b">Registrar nuevo producto</h3>
                            <p>Ingrese los datos del nuevo producto.</p>
                            <form action="{{route('coach.product.store')}}" method="POST" role="form" id="createForm" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                @if(Session::has('flash_message'))
                                <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em>
                                </div>
                                @endif
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input type="text" name="name" placeholder="Ingrese Nombre" class="form-control"  minlength="2" maxlength="100" required>
                                </div>
                                <div class="form-group">
                                    <label>Categoria</label>
                                    <input type="text" name="category" placeholder="Ingrese Categoria" class="form-control"  minlength="2" maxlength="100" required>
                                </div>
                                <div class="form-group">
                                    <label>Descripcion</label>
                                    <textarea name="description" class="form-control" rows="4"  minlength="2" maxlength="500" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Imagen</label><br>
                                    <img src="" style="max-width: 200px" id="preview">
                                    <input type="file" name="file" required id="file">
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
<script>
    $('#createForm').validate({
        rules: {
            file: {
                required: true,
                extension: "png|jpg|jpeg|gif|svg"
            }
        }
    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
            $('#preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#file").change(function() {
        readURL(this);
    });
</script>
@endpush

