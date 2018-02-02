


        @extends('admin.layout')

@section('content')

{{-- Cabecera --}}
<div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Coaches</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="/">Admin</a>
                    </li>
                    <li class="active">
                        Coaches
                    </li>
                    <li class="active">
                        <strong>Editar</strong>
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
                                <p>Edite los datos del Coach.</p>
                                

                          <form action="{{route('coach.edit',$coach->id)}}" method="POST" role="form id=" id="frmeditcoach">

                        {{csrf_field()}}


 @if(Session::has('flash_message'))
                    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></    span><em> {!! session('flash_message') !!}</em>
                    </div>
                @endif




              
                        

                                <div class="form-group"><label>Nombre</label> 
                                <input value={{ $coach->user->name }} type="text" id="txtnomcoach"
                                name= "name" placeholder="Ingrese Nombres" class="form-control"></div>

                       

                                    <div class="form-group"><label>Apellidos</label> <input type="text" id="txtapecoach" name='lastname' placeholder="Ingrese Apellidos" class="form-control" value="{{ $coach->user->lastname }}"></div>
                                    
                                    

                                <div class="form-group"><label class="form-group">Sexo</label>

                                        <select name="sexo" class="form-control" name="account">
                                        <option value="m">Masculino</option>
                                        <option value="f">Femenino </option>
                                        </select>
                                        
                                </div>  



                                <div class="form-group"><label>Teléfono</label> 
                                    <input value="{{ $coach->user->phone }}" type="text" placeholder="" name='phone'             id="txtphonecoach"class="form-control"></div>



                                    <div class="form-group"><label>Email</label> <input value="{{ $coach->user->email }}"  type="email" id="txtemailcoach" name="email" placeholder="Enter email" class="form-control"></div>
                                   
                        
                                    <div class="form-group"">
                                        <div>
                                            @if ($coach->state)
                                            <label> 
                                                <input name="state" type="checkbox" value="1" checked="checked"> 
                                                <span>Coach activo</span>
                                            </label>
                                            @else
                                            <label> 
                                                <input name="state" type="checkbox"  value="0"> 
                                                <span>Coach inactivo</span>
                                            </label>
                                            @endif
                                      </label>
                                        </div>
                                  </div>    
                
                     <div style="color:red; margin-bottom:10px;" id="register-error" class="text-center" style="display:none"></div>


                                    <div>
                                        <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit" id="btnmod"><strong>Modificar</strong></button>
                                    </div>


                            </div>


                        </div>
        </div>

                
                
                    </div>
                                </form>
@endsection


{{-- Me valida los campos en blanco --}}

@push('scripts')
<script>
    $('#btnmod').click(function(event) {
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
        else{$('#frmeditcoach').submit(); 
        
    };


    });
</script>
{{-- Fin de la validacion de los campos en blanco --}}
@endpush



