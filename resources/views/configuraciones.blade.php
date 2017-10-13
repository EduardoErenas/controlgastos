@extends('master')

@section('contenido')


	<div class="callout callout-info">
    <div class="content-header"  style="padding-top: 0px !important">
      <h1>Configuraciones <small></small></h1>
    </div>
  </div>
  @include('flash::message')
  <form class="form-horizontal" action="{{url('/editarContrasena')}}/{{Auth::user()->id}}" method="post">
    <input id="token" type="hidden" name="_token" value="{{csrf_token()}}">
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
                  <input type="password" class="form-control" name="contra" placeholder="Contraseña Actual"  >
                </div>
              </div>
              <div class="form-group">
                <label  class="col-sm-2 control-label">Contraseña Nueva</label>

                <div class="col-sm-10">
                  <input type="password" class="form-control" name="newpas" placeholder="Contraseña Nueva" required >
                </div>
              </div>
              <div class="form-group">
                <label  class="col-sm-2 control-label">Confirmar Contraseña</label>

                <div class="col-sm-10">
                  <input type="password" class="form-control" name="password"  placeholder="Confirmar Contraseña" required> 
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
  </form>

  <form class="form-horizontal" action="{{url('/updateRango')}}/{{Auth::user()->id}}" method="post">
    <input id="token" type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="row">
      <div class="col-sm-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Cambiar Rango de Notificaciones</h3> 
          </div>
          
          <div class="box-body">
            <form class="form-horizontal">
              <div class="form-group">
                <label  class="col-sm-2 control-label">Rango (Días)</label>

                <div class="col-sm-10">
                  <input type="number" class="form-control" name="rango" placeholder="Rango de notificaciones (Días)" value ="{{Auth::user()->usu_rango}}">
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
  </form>

  <form class="form-horizontal" action="{{url('/updateAlgoritmo')}}/{{Auth::user()->id}}" method="post">
    <input id="token" type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="row">
      <div class="col-sm-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Cambiar Algoritomo de Pago</h3> 
          </div>
          
          <div class="box-body">
            <form class="form-horizontal" id="algoritmo">
              <div class="form-group">
                <label  class="col-sm-2 control-label">Algoritmo</label>
                <div class="col-sm-10">
                  <select class="form-control" name="algoritmo" required>
                    @if(Auth::user()->usu_algoritmo == 1){
                      <option value="1" selected="">Prioridad</option>
                      <option value="2">Cuentas Menores</option>
                      <option value="3">Cuentas Mayores</option>
                    }@elseif (Auth::user()->usu_algoritmo == 2){
                      <option value="1">Prioridad</option>
                      <option value="2" selected="">Cuentas Menores</option>
                      <option value="3">Cuentas Mayores</option>
                    }@else(Auth::user()->usu_algoritmo == 3){
                      <option value="1">Prioridad</option>
                      <option value="2" >Cuentas Menores</option>
                      <option value="3" selected="">Cuentas Mayores</option>
                    }
                    @endif
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
  </form>

  <script type="text/javascript">
    setTimeout(function(){
      $(".alert").fadeOut(1500);
    },1500);
  </script>
@stop