<div style="padding: 10px"> 
    <h3 class="m-t-none m-b">Actualizar dieta</h3>
    <form action="{{route('diet.update', $diet)}}" method="POST" role="form" id="createForm" enctype="multipart/form-data">
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
                    @if ($client->user->id == $diet->client_id)
                    <option value="{{ $client->user->id }}" selected>{{ $client->user->full_name }}</option>
                    @else
                    <option value="{{ $client->user->id }}">{{ $client->user->full_name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Categoria</label>
            <input type="text" name="category" placeholder="Ingrese Categoria" class="form-control"  minlength="2" maxlength="100" value="{{ $diet->category }}" required>
        </div>
        <div class="form-group" style="min-height: 300px">
            <label>Contenido</label>
            <textarea id="summernote" name="content" rows="10" required>{{ $diet->content }}</textarea>
        </div>

        <div class="form-group row">
            <div class="col-sm-12">
                <button class="btn btn-primary pull-right m-t-n-xs" type="submit" ><strong>Actualizar</strong></button>
            </div>
        </div>
    </form>


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
</div>
