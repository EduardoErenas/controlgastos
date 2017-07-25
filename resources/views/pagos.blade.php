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
          <h3 class="box-title">Lista de Pagos</h3> 
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
                @foreach($pagos as $p)
                  <tr>
                  <td class="text-center">{{$p->pa_id}}</td>
                  <td class="text-center">{{$p->ga_description}}</td>
                  <td class="text-center">{{$p->pa_numpago}} /10</td>
                  <td class="text-center">{{$p->pa_fecha_pagar}}</td>
                  <td class="text-center">{{$p->ga_prioridad}}</td>
                  <td class="text-center">
                    <a href="{{url('/pagar')}}/{{$p->pa_id}}" class="btn btn-primary btn-xs">
                      <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                    </a>
                  </td>
                </tr>
                @endforeach
                
                
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>      
  </div>
@stop