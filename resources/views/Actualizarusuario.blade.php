@extends('masteradmin')


@section('titulo')
<h1>
    Actualizar Usuario
</h1> 

@stop 
@section('contenido')
@include('flash::message')
	    <div class="tab-pane" id="editar">
                <form class="form-horizontal" action="{{url('/Actualizar')}}/{{$user->id}}" method="post">
                <input id="token" type="hidden" name="_token" value="{{csrf_token()}}">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Nombre</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" name="nombre" placeholder="Nombre" required value="{{$user->name}}">
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Correo</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail" name="email" placeholder="correo" required value ="{{$user->email}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Edad</label>

                    <div class="col-sm-10">
                      <input type="number" class="form-control" id="inputName" name="edad" placeholder="Edad" required value="{{$user->usu_age}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Profesion</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputExperience" name="ocupacion" placeholder="Profesion" required value="{{$user->usu_occupation}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputoaddress" class="col-sm-2 control-label">Direccion</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputoaddress" name="Direccion" placeholder="Direccion" required value="{{$user->usu_address}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputcity" class="col-sm-2 control-label">Ciudad</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputcity" name="Ciudad" placeholder="Ciudad" required value="{{$user->usu_city}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputstate" class="col-sm-2 control-label">Estado</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputstate" name="Estado" placeholder="Estado" required value="{{$user->usu_state}}">
                    </div>
                  </div>
                  <div class="form-group">   
                    <label class="col-sm-2 control-label" for="sexo">Sexo:</label> 
                    <div class="col-sm-10">
                      <select class="form-control"  name="sexo">
                       @if($user->usu_sex==0)
                       <option value="0" selected="">Femenino</option>
                       <option value="1" >Masculino</option>
                        @else
                       <option value="0" >Femenino</option>
                       <option value="1" selected="">Masculino</option>
                       @endif
                      </select>
                    </div>
                  </div>
                  <div class="form-group">   
                    <label class="col-sm-2 control-label" for="tipo">Tipo:</label> 
                    <div class="col-sm-10">
                      <select class="form-control"  name="tipo">
                       @if($user->usu_type==0)
                       <option value="0" selected="">Estandar</option>
                       <option value="1" >Administrador</option>
                        @else
                       <option value="0" >Estandar</option>
                       <option value="1" selected="">Administrador</option>
                       @endif
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-primary">Aceptar</button>
                    </div>
                  </div>
                </form>
              </div>

      <script type="text/javascript">
  setTimeout(function(){
    $(".alert").fadeOut(1500);
  },1500);
</script>     
@stop