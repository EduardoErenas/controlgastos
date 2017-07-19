@extends('master')

@section('contenido')
	<div class="callout callout-info">
    <div class="content-header"  style="padding-top: 0px !important">
      <h1>Configuraciones <small></small></h1>
    </div> 
  </div>

  <div class="row">
    <div class="col-sm-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Cambiar Contraseña</h3> 
        </div>
        
        <div class="box-body">
          <form class="form-horizontal">
            <div class="form-group">
              <label  class="col-sm-2 control-label">Contraseña Actual</label>

              <div class="col-sm-10">
                <input type="password" class="form-control" name="pass" placeholder="Contraseña Actual" required >
              </div>
            </div>
            <div class="form-group">
              <label  class="col-sm-2 control-label">Contraseña Nueva</label>

              <div class="col-sm-10">
                <input type="password" class="form-control" name="newpas" placeholder="Contraseña Nueva" required >
              </div>
            </div>
            <div class="form-group">
              <label  class="col-sm-2 control-label">Repetir Contraseña</label>

              <div class="col-sm-10">
                <input type="password" class="form-control" name="repas"  placeholder="Repetir Contraseña" required> 
              </div>
            </div>
            
            <div class=" row">
              <div class="col-md-12">
                <button type="submit" class="btn btn-primary pull-right">Aceptar</button>
              </div>
            </div>
            
          </form>     
        </div>
  
      </div>
    </div>

    
  </div>

  <div class="row">
    <div class="col-sm-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Cambiar Algoritmo</h3> 
        </div>
        
        <div class="box-body">
          <form class="form-horizontal">
            <div class="form-group">
              <label  class="col-sm-2 control-label">Contraseña Actual</label>

              <div class="col-sm-10">
                <select class="form-control" name="algo" required>
                  <option value="1">Prioridad</option>
                  <option value="2">Opcion 2</option>
                </select>
              </div>
            </div>
            
            <div class=" row">
              <div class="col-md-12">
                <button type="submit" class="btn btn-primary pull-right">Aceptar</button>
              </div>
            </div>
            
          </form>     
        </div>
  
      </div>
    </div>

    
  </div>
@stop