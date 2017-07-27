@extends('master')

@section('contenido')
	<div class="callout callout-danger">
    <div class="content-header" style="padding-top: 0px !important">
      <h1>Pagos <small></small></h1>
    </div> 
  </div>
  @include('flash::message')

  <div class="row">
    <div class="col-sm-12">
      <div class="box box-danger">
        <div class="box-header with-border">
          <h3 class="box-title">Lista de Pagos Pendientes</h3> 
        </div>
        <div class="box-body">
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <th class="text-center">ID</th>
                <th class="text-center">Concepto</th>
                <th class="text-center">Categoria</th>
                <th class="text-center">Monto</th>
                <th class="text-center">#Pago</th>
                <th class="text-center">Fecha Maxima</th>
                <th class="text-center">Prioridad</th>
                <th class="text-center">Estatus</th>
                <th class="text-center">PAGAR</th>
              </thead>
              @if(sizeof($pagos)==0)
                  <tr><td colspan="9"><center><strong>Sin Pagos</strong></center></td></tr>
              @else
              <tbody>
                @foreach($pagos as $p)
                  <tr>
                  <td class="text-center">{{$p->pa_id}}</td>
                  <td class="text-center">{{$p->ga_description}}</td>
                  <td class="text-center">{{$p->cat_description}}</td>
                  <td class="text-center">${{$p->pa_monto}}</td>
                  <td class="text-center">{{$p->pa_numpago}}/{{$p->ga_numpagos}}</td>
                  <td class="text-center">{{$p->pa_fecha_pagar}}</td>
                  <td class="text-center">{{$p->ga_prioridad}}</td>
                  <td class="text-center">
                    @if($p->pa_estatus==1)
                      Por Pagar
                    @elseif($p->pa_estatus==2)
                      Pagado
                    @else
                      {{$p->pa_estatus}}
                    @endif

                  </td> 

                  <td class="text-center">
                    <a href="{{url('/pagar')}}/{{$p->pa_id}}/{{$p->pa_monto}}" class="btn btn-primary btn-xs">
                      <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                    </a>
                  </td>
                </tr>
                @endforeach 
              </tbody>
              @endif
            </table>
          </div>
        </div>
      </div>
    </div> 

    <div class="col-sm-12">
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Lista de Pagos Realizados</h3> 
        </div>
        <div class="box-body">
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <th class="text-center">ID</th>
                <th class="text-center">Concepto</th>
                <th class="text-center">Categoria</th>
                <th class="text-center">Monto</th>
                <th class="text-center">#Pago</th>
                <th class="text-center">Fecha Maxima</th>
                <th class="text-center">Fecha Pago</th>
                <th class="text-center">Prioridad</th>
                <th class="text-center">Estatus</th>
              </thead>
              @if(sizeof($liquidados)==0)
                  <tr><td colspan="9"><center><strong>Sin Pagos</strong></center></td></tr>
              @else
              <tbody>
                @foreach($liquidados as $p)
                  <tr>
                  <td class="text-center">{{$p->pa_id}}</td>
                  <td class="text-center">{{$p->ga_description}}</td>
                  <td class="text-center">{{$p->cat_description}}</td>
                  <td class="text-center">${{$p->pa_monto}}</td>
                  <td class="text-center">{{$p->pa_numpago}}/{{$p->ga_numpagos}}</td>
                  <td class="text-center">{{$p->pa_fecha_pagar}}</td>
                  <td class="text-center">{{$p->pa_fecha_pago}}</td>
                  <td class="text-center">{{$p->ga_prioridad}}</td>
                  
                  <td class="text-center">
                    @if($p->pa_estatus==1)
                      Por Pagar
                    @elseif($p->pa_estatus==2)
                      Pagado
                    @else
                      {{$p->pa_estatus}}
                    @endif

                  </td>
                </tr>
                @endforeach
              </tbody>
              @endif
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