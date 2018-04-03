<div style="padding: 10px"> 
    <h3 class="m-t-none m-b">Editar Tarea</h3>
    <form action="{{ route('coach.task.update', $task) }}" method="POST" role="form" id="createForm" enctype="multipart/form-data">
        {{ method_field('PUT') }}
        {{ csrf_field() }}
   
        <div class="form-group" style="min-height: 300px">
            <label>Descripcion de la tarea</label>
            <textarea class="form-control" name="description" rows="3" required maxlength="400">{{ $task->description }}</textarea>
        </div>

        <div class="form-group row">
            <div class="col-sm-12">
                <button class="btn btn-primary pull-right m-t-n-xs" type="submit" ><strong>Actualizar</strong></button>
            </div>
        </div>
    </form>


    <script>
        $('#createForm').validate();
    </script>
</div>
