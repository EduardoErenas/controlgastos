@extends('master')

@section('contenido')
  <div class="callout callout-info">
    <div class="content-header" style="padding-top: 0px !important">
      <h1>Ingresos <small></small></h1>
    </div> 
  </div>

	<div class="row">
    <div class="col-sm-4">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Registrar Ingreso</h3> 
        </div>
        <form class="">
          <div class="box-body">

            <div class="form-group">
              <label>Descripcion</label>  
              <input type="text" class="form-control" name="descri" required placeholder="Descripcion">
            </div>
            <div class="form-group">
              <label class="">Cantidad</label>    
              <input type="number" class="form-control" name="cantidad" required placeholder="$100.00">
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
          <h3 class="box-title">Lista de Ingresos</h3> 
        </div>
        <div class="box-body">
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <th class="text-center">ID</th>
                <th class="text-center">Descripcion</th>
                <th class="text-center">Total</th>
                <th class="text-center">Restante</th>
                <th class="text-center">fecha</th>
                <th class="text-center">Estatus</th>
                <th class="text-center">Opciones</th>
              </thead>
              <tbody>
                <tr>
                  <td class="text-center">1</td>
                  <td class="text-center">Sueldo</td>
                  <td class="text-center">10000</td>
                  <td class="text-center">9000</td>
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
@stop