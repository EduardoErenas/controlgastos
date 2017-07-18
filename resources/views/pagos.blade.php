@extends('master')

@section('contenido')
	<div class="callout callout-danger">
    <div class="content-header" style="padding-top: 0px !important">
      <h1>Pagos <small></small></h1>
    </div> 
  </div>

  <div class="row">
    <div class="col-sm-12">
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Lista de Ingresos</h3> 
        </div>
        <div class="box-body">
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <th class="text-center">ID</th>
                <th class="text-center">Concepto</th>
                <th class="text-center">#Pago</th>
                <th class="text-center">Fecha Maxima</th>
                <th class="text-center">Prioridad</th>
                <th class="text-center">Opciones</th>
              </thead>
              <tbody>
                <tr>
                  <td class="text-center">1</td>
                  <td class="text-center">Pañales</td>
                  <td class="text-center">3/10</td>
                  <td class="text-center">2017-07-17</td>
                  <td class="text-center">5</td>
                  <td class="text-center">
                    <a href="#" class="btn btn-primary btn-xs">
                      <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
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