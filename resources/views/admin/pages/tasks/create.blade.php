<div style="padding: 10px"> 
    <h3 class="m-t-none m-b">Crear Tarea</h3>
    <form action="{{ route('task.store') }}" method="POST" role="form" id="createForm" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="client_id" value="{{ $id }}">
        <div class="form-group" style="min-height: 300px">
            <label>Descripcion de la tarea</label>
            <textarea class="form-control" name="description" rows="3" required></textarea>
        </div>

        <div class="form-group row">
            <div class="col-sm-12">
                <button class="btn btn-primary pull-right m-t-n-xs" type="submit" ><strong>Crear</strong></button>
            </div>
        </div>
    </form>


    <script>
        $('#createForm').validate();
    </script>
</div>
