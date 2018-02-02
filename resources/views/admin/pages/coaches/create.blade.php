@extends('admin.layout')

@section('content')

{{-- Cabecera --}}
<div class="row wrapper border-bottom white-bg page-heading"> 
            <div class="col-lg-10">
                <h2>Coach</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="/">Admin</a>
                    </li>
                    <li class="active">
                        Coaches
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



	<div class="col-sm-12">
                    <div class="ibox">
        <div class="ibox-content">
                        <div class="row">
                            
                            <div class="col-sm-6 b-r"><h3 class="m-t-none m-b">Editar</h3>
                                <p>Edite los datos del coach.</p>
                                

                          <form action="{{route('coach.store')}}" method="POST" role="form" id="frmgrabacoach">

						{{csrf_field()}}



				@if(Session::has('flash_message'))
    				<div class="alert alert-success"><span class="glyphicon glyphicon-ok"></	span><em> {!! session('flash_message') !!}</em>
    				</div>
				@endif
						

								<div class="form-group"><label>Nombre</label> 
								<input  type="text" 
								name= "name" placeholder="Ingrese Nombres" id="txtnomcoach" class="form-control"></div>

                       

                                	<div class="form-group"><label>Apellidos</label> <input type="text" name='lastname' placeholder="Ingrese Apellidos" id="txtapecoach" class="form-control" ></div>
                                    
                                    

								<div class="form-group"><label class="form-group">Sexo</label >

                                    	<select name="sexo" name="gender" class="form-control" >
                                        <option value="m">Masculino</option>
                                        <option value="f">Femenino </option>
                                    	</select>
                                		
								</div>	



								<div class="form-group"><label>Teléfono</label> 
									<input id="txtphonecoach" type="text" placeholder="" name='phone'class="form-control"></div>



                                    <div class="form-group"><label>Email</label> <input  type="email" name="email" placeholder="Enter email" id="txtemailcoach" class="form-control"></div>

                                      <div class="form-group"><label>Password</label> <input  type="password" name="password" placeholder="" class="form-control"></div>
                                   
						
								
                                    <div style="color:red; margin-bottom:10px;" id="register-error" class="text-center" style="display:none">                                    
                                     </div>

                                    <div>
                                        <button class="btn btn-sm btn-primary pull-right m-t-n-xs" id="btnguardar" type="submit"><strong>Guardar</strong></button>
                                    </div>


                            </div>


                        </div>
        </div>

                
				
    				</div>
                                </form>
@endsection

@push('scripts')


<script type="text/javascript">

// funcion para validar el correo
function caracteresCorreoValido(email, div){
    console.log(email);
    // var email = $(email).val();
    var caract = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);

    if (caract.test(email) == false){
        $(div).hide().removeClass('hide').slideDown('fast');

        return false;
    }else{
        $(div).hide().addClass('hide').slideDown('slow');
//        $(div).html('');
        return true;
    }
}
</script>
{{-- Fin de la  funcion para validar el correo --}}


 <script>
   // cuando pierde el foco, este valida si lo que esta en el campo de texto si es un correo o no y muestra una respuesta
   $('form').find('input[type=email]').blur(function(){
      caracteresCorreoValido($(this).val(), '#xmail')
    });
</script> 






<script>
    $('#btnguardar').click(function(event) {
        event.preventDefault();
        var name = $('#txtnomcoach'),
        lastname = $('#txtapecoach'),
        fone = $('#txtphonecoach'),
        email = $('#txtemailcoach');
        
        if (name.val().length == 0 ||
            lastname.val().length == 0 ||
            fone.val().length == 0 ||
            email.val().length == 0) { 
            $('#register-error').css('visibility', 'visible');
            $('#register-error').text('Llena todos los campos.');
        }
        else{$('#frmgrabacoach').submit(); 
        
    };


    });
</script>
{{-- Fin de la validacion de los campos en blanco --}}
@endpush