
<div style="padding: 10px">
    <h3 class="m-t-none m-b">Editar producto</h3>
    <p>Edita los datos del producto {{ $product->name }}.</p>
    <form action="{{route('product.update', $product)}}" method="POST" role="form" id="createForm" enctype="multipart/form-data">
        {{ method_field('PUT') }}
        {{csrf_field()}}
        @if(Session::has('flash_message'))
        <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em>
        </div>
        @endif
        <div class="form-group">
            <label>Nombre</label>
            <input type="text" name="name" placeholder="Ingrese Nombre" class="form-control"  minlength="2" maxlength="100" required value="{{ $product->name }}">
        </div>
        <div class="form-group">
            <label>Categoria</label>
            <input type="text" name="category" placeholder="Ingrese Categoria" class="form-control"  minlength="2" maxlength="100" required value="{{ $product->category }}">
        </div>
        <div class="form-group">
            <label>Descripcion</label>
            <textarea name="description" class="form-control" rows="4"  minlength="2" maxlength="500" required>{{ $product->description }}</textarea>
        </div>
        <div class="form-group">
            <label>Imagen</label><br>
            <img src="{{ $product->image }}" style="max-width: 200px">
            <input type="file" name="file">
        </div>
        <div class="form-group">
            <button class="btn btn-primary" type="submit" ><strong>Actualizar</strong></button>
        </div>
    </form>
    <script>
    $('#createForm').validate({
        rules: {
            file: {
            extension: "png|jpg|jpeg|gif|svg"
            }
        }
    });
    </script>
</div>

