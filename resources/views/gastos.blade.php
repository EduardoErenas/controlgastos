@extends('master')

@section('contenido')
	<div class="callout callout-success">
    <div class="content-header"  style="padding-top: 0px !important">
      <h1>Gastos <small></small></h1>
    </div> 
  </div>
  @include('flash::message')

  <div class="row">
    <div class="col-sm-4">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Registrar Gastos</h3> 
        </div>
        <form class="" action="{{url('/guardarGasto')}}" method="post">
          <input id="token" type="hidden" name="_token" value="{{csrf_token()}}">
          <div class="box-body">

            <div class="form-group">
              <label>Descripcion</label>  
              <input type="text" class="form-control" name="descri" required placeholder="Descripcion">
            </div>
            <div class="form-group">
              <label class="">Cantidad</label>    
              <input type="number" class="form-control" name="cantidad" required placeholder="Cantidad">
            </div>
            <div class="form-group">
              <label class="">No. de Pagos</label>    
              <input type="number" class="form-control" name="pagos" required placeholder="#Pagos">
            </div>
            <div class="form-group">
              <label class="">Categoria</label>
              <select name="cat" required class="form-control">
                @foreach($categorias as $a)  
                  <option value='{{$a->cat_id}}'>{{$a->cat_description}}</option>
                @endforeach
              </select>    
              
            </div>
            
            <div class="form-group">
              <label class="">Frecuencia</label>
              <select name="frecuen" required class="form-control">
                <option value="0">Seleccionar Frecuencia</option>
                <option value="1">Semanal</option>
                <option value="2">Quincenal</option>
                <option value="3">Mensual</option>
                <option value="3">Unico</option>
              </select>    
              
            </div>
            <div class="form-group">
                <label>Corte</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input class="form-control pull-right" required name="corte" id="datepicker" type="text">
                </div>
            </div>
            <div class="form-group">
              <label class="">Prioridad</label>    
              <input type="number" class="form-control" name="prio" required placeholder="Prioridad">
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

    <div class="col-sm-8">
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Lista de Gastos</h3> 
        </div>
        <div class="box-body">
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <th class="text-center">ID</th>
                <th class="text-center">Concepto</th>
                <th class="text-center">#Pagos</th>
                <th class="text-center">Categoria</th>
                <th class="text-center">Frecuencia</th>
                <th class="text-center">fecha</th>
                <th class="text-center">Estatus</th>
                <th class="text-center">Opciones</th>
              </thead>
              <tbody>
                <tr>
                  <td class="text-center">1</td>
                  <td class="text-center">Pañales</td>
                  <td class="text-center">2/10</td>
                  <td class="text-center">D</td>
                  <td class="text-center">Mensual</td>
                  <td class="text-center">2017-07-17</td>
                  <td class="text-center">Activo</td>
                  <td class="text-center">
                    <a href="#" class="btn btn-primary btn-xs">
                      <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>
                    <a href="#" class="btn btn-danger btn-xs">
                      <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </a>
                  </td>
                </tr>
                <tr>
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>      
  </div>

<script type="text/javascript">
  setTimeout(function(){
    $(".alert").fadeOut(1500);
  },1500);
</script>  

@stop