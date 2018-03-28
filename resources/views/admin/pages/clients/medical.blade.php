<div style="padding: 10px"> 
    <h3 class="m-t-none m-b">Actualizar Datos Médicos</h3>
    <form action="{{route('client.medical.update', $client->id)}}" method="POST" role="form" id="createForm" enctype="multipart/form-data">
        {{ method_field('PUT') }}
        {{ csrf_field() }}
    
        <div class="form-group" style="min-height: 300px">
            <label>Contenido</label>
            <textarea id="summernote" name="medical_data" rows="10" required>{{ $client->medical_data }}</textarea>
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
            ],
            disableDragAndDrop: true
        });
    </script>
</div>
