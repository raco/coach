<div style="padding: 10px"> 
    <h3 class="m-t-none m-b">Actualizar Noticia</h3>
    <form action="{{route('post.update', $post)}}" method="POST" role="form" id="createForm" enctype="multipart/form-data">
        {{ method_field('PUT') }}
        {{ csrf_field() }}
        @if(Session::has('flash_message'))
        <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em>
        </div>
        @endif
        <div class="form-group">
            <label>Título</label>
            <input type="text" name="title" placeholder="Ingrese Título" class="form-control"  minlength="2" maxlength="250" required value="{{ $post->title }}">
        </div>
        <div class="form-group">
            <label>Resumen</label>
            <textarea name="excerpt" id="excerpt" cols="30" rows="3" minlength="2" maxlength="400" class="form-control" required>{{ $post->excerpt }}</textarea>
        </div>
        <div class="form-group" style="min-height: 300px">
            <label>Contenido</label>
            <textarea id="summernote" name="content" rows="10">{{ $post->content }}</textarea>
        </div>
        <div class="form-group">
            <label>Imagen</label><br>
            <img src="{{ $post->image }}" style="max-width: 200px">
            <input type="file" name="file">
        </div>
        <div class="form-group">
            <label><input type="checkbox" name="featured" value="1"
                @if ($post->featured)
                    checked
                @endif
                > Noticia Destacada</label>
        </div>    
        <div class="form-group row">
            <div class="col-sm-12">
                <button class="btn btn-primary pull-right m-t-n-xs" type="submit" ><strong>Actualizar</strong></button>
            </div>
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
</div>
