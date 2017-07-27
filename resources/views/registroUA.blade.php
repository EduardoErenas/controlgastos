@extends('master') 
 
@section('contenido')

  <div class="callout callout-info">
    <div class="content-header" style="padding-top: 0px !important">
      <h1>Registrar Usuario o Admin<small></small></h1>
    </div> 
  </div> 
  @include('flash::message')
	<div class="row">
    <div class="col-sm-4">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Registrar Ingreso</h3> 
        </div>
        <form action="{{url('/guardarIngreso')}}" method="post">
          <input id="token" type="hidden" name="_token" value="{{csrf_token()}}">
          <div class="box-body">
                <input id="token" type="hidden" name="_token" value="{{csrf_token()}}">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Nombre</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" name="nombre" placeholder="Nombre" required >
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Correo</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail" name="email" placeholder="correo" required >
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Edad</label>

                    <div class="col-sm-10">
                      <input type="number" class="form-control" id="inputName" name="edad" placeholder="Edad" required >
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Profesion</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputExperience" name="ocupacion" placeholder="Profesion" required >
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputoaddress" class="col-sm-2 control-label">Direccion</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputoaddress" name="Direccion" placeholder="Direccion" required >
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputcity" class="col-sm-2 control-label">Ciudad</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputcity" name="Ciudad" placeholder="Ciudad" required >
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputstate" class="col-sm-2 control-label">Estado</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputstate" name="Estado" placeholder="Estado" required >
                    </div>
                  </div>
                  <div class="form-group">   
                    <label class="col-sm-2 control-label" for="sexo">Sexo:</label> 
                    <div class="col-sm-10">
                      <select class="form-control"  name="sexo">
                       
                       <option value="0" >Femenino</option>
                       <option value="1" selected="">Masculino</option>
                       
                      </select>
                    </div>
                  </div>
                  <div class="form-group">   
                    <label class="col-sm-2 control-label" for="tipo">Tipo:</label> 
                    <div class="col-sm-10">
                      <select class="form-control"  name="tipo">
                       
                       <option value="0" selected="">Estandar</option>
                       <option value="1" >Administrador</option>
                        
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-primary">Aceptar</button>
                    </div>
                  </div>
                
              
          </div>

          <div class="box-footer">
            <div class="row">
              <div class="col-sm-12">
                <button type="submit" class="btn btn-primary pull-right">Aceptar</button>
              </div>
            </div> 
          </div>
        </form>
      </div>
    </div>

  </div>

<script type="text/javascript">
  setTimeout(function(){
    $(".alert").fadeOut(1500);
  },1500);
</script>
 
@stop