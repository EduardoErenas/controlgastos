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
              <input type="number" class="form-control" name="cantidad" min="1.00" required placeholder="Cantidad">
            </div>
            <div class="form-group">
              <label class="">No. de Pagos</label>    
              <input type="number" class="form-control" name="pagos" min="1" required placeholder="#Pagos">
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
                @foreach($frecuencia as $f)  
                  <option value='{{$f->ft_id}}'>{{$f->ft_description}}</option>
                @endforeach
                
              </select>    
              
            </div>
            <div class="form-group">
                <label>Fecha Inicio</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input class="form-control pull-right" required name="inicio" id="datepicker" type="text">
                </div>
            </div>
            <div class="form-group">
              <label class="">Prioridad</label>
              <select name="prio" required class="form-control">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
              </select>    
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
          <h3 class="box-title">Lista de Gastos Activos</h3> 
        </div>
        <div class="box-body">
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <th class="text-center">ID</th>
                <th class="text-center">Concepto</th>
                <th class="text-center">#Pagos</th>
                <th class="text-center">Total</th>
                <th class="text-center">Restante</th>
                <th class="text-center">Categoria</th>
                <th class="text-center">Frecuencia</th>
                <th class="text-center">Inicia</th>
                <th class="text-center">Estatus</th>
                <th class="text-center">Opciones</th>
              </thead>
              @if(sizeof($gastos)==0)
                  <tr><td colspan="10"><center><strong>Sin Gastos</strong></center></td></tr>
              @else
              
              <tbody>
                @foreach($gastos as $g) 
                <tr> 
                  <td class="text-center">{{$g->ga_id}}</td>
                  <td class="text-center">{{$g->ga_description}}</td>
                  <td class="text-center">{{$g->ga_pagoactual}}/{{$g->ga_numpagos}}</td>
                  <td class="text-center">{{$g->ga_amount}}</td>
                  <td class="text-center">{{$g->ga_restante}}</td>
                  <td class="text-center">{{$g->cat_description}}</td>
                  <td class="text-center">{{$g->ft_description}}</td>
                  <td class="text-center">{{$g->ga_dia}}-{{$g->ga_mes}}-{{$g->ga_ano}}</td>
                  <td class="text-center">
                    @if($g->ga_status==1)
                      Activo
                    @elseif($g->ga_status==2)
                      Liquidado
                    @endif
                  </td>
                  <td class="text-center">
                    <a href="{{url('/editarGasto')}}/{{$g->ga_id}}" class="btn btn-primary btn-xs">
                      <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>
                    <a href="{{url('/eliminarGasto')}}/{{$g->ga_id}}" class="btn btn-danger btn-xs">
                      <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </a>
                  </td>
                </tr>
                @endforeach
                <tr>
                
              </tbody>
              @endif
            </table>
          </div>
        </div>
      </div>
    </div> 
 
      <div class="col-sm-8">
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Lista de Gastos Liquidados</h3> 
        </div>
        <div class="box-body">
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <th class="text-center">ID</th>
                <th class="text-center">Concepto</th>
                <th class="text-center">#Pagos</th>
                <th class="text-center">Total</th>
                <th class="text-center">Restante</th>
                <th class="text-center">Categoria</th>
                <th class="text-center">Frecuencia</th>
                <th class="text-center">Inicia</th>
                <th class="text-center">Estatus</th>
                <th class="text-center">Opciones</th>
              </thead>
              @if(sizeof($liquidados)==0)
                  <tr><td colspan="10"><center><strong>Sin Gastos</strong></center></td></tr>
              @else
                <tbody>
                

                  @foreach($liquidados as $l) 
                 <tr>
                  <td class="text-center">{{$l->ga_id}}</td>
                  <td class="text-center">{{$l->ga_description}}</td>
                  <td class="text-center">{{$l->ga_pagoactual}}/{{$l->ga_numpagos}}</td>
                  <td class="text-center">{{$l->ga_amount}}</td>
                  <td class="text-center">{{$l->ga_restante}}</td>
                  <td class="text-center">{{$l->cat_description}}</td>
                  <td class="text-center">{{$l->ft_description}}</td>
                  <td class="text-center">{{$l->ga_dia}}-{{$l->ga_mes}}-{{$l->ga_ano}}</td>
                  <td class="text-center">
                    @if($l->ga_status==1)
                      Activo
                    @elseif($l->ga_status==2)
                      Liquidado
                    @endif
                  </td>
                  <td class="text-center">
                    <a href="{{url('/eliminarGasto')}}/{{$l->ga_id}}" class="btn btn-danger btn-xs">
                      <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </a>
                  </td>
                </tr>
                @endforeach                
                <tr>
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