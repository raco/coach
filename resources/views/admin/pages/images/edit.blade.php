<div style="padding: 10px">
    <h3 class="m-t-none m-b">Editar imagen</h3>
    <p>Edita los datos de la imagen {{ $image->name }}.</p>
    <form action="{{route('image.update', $image)}}" method="POST" role="form" id="createForm" enctype="multipart/form-data">
        {{ method_field('PUT') }}
        {{csrf_field()}}
        @if(Session::has('flash_message'))
        <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em>
        </div>
        @endif
        <div class="form-group">
            <label>Imagen</label><br>
            <img src="{{ $image->url }}" style="max-width: 200px" id="preview">
            <input type="file" name="file" id="file">
        </div>
        <div class="form-group">
            <label>Cliente</label>
            <select name="client_id" required class="form-control">
                <option disabled readonly>Elija cliente</option>
                @foreach ($clients as $client)
                    @if ($client->user->id == $image->client_id)
                    <option value="{{ $client->user->id }}" selected>{{ $client->user->full_name }}</option>
                    @else
                    <option value="{{ $client->user->id }}">{{ $client->user->full_name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Comentario</label>
            <textarea name="comment" class="form-control" rows="4"  minlength="2" maxlength="500" required>{{ $image->comment }}</textarea>
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
</div>

