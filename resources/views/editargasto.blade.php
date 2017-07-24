@extends('master')

@section('contenido')
	<div class="callout callout-success">
    <div class="content-header"  style="padding-top: 0px !important">
      <h1>Editar Gasto <small></small></h1>
    </div> 
  </div>
  

  <div class="row">
    <div class="col-sm-6">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Actualizar Gasto</h3> 
        </div>
        <form class="" action="{{url('/actualizarGasto')}}/{{$gasto->ga_id}}" method="post">
          <input id="token" type="hidden" name="_token" value="{{csrf_token()}}">
          <div class="box-body">

            <div class="form-group">
              <label>Descripcion</label>  
              <input type="text" class="form-control" name="descri" required placeholder="Descripcion" value="{{$gasto->ga_description}}">
            </div>
            <div class="form-group">
              <label class="">Cantidad</label>    
              <input type="number" class="form-control" name="cantidad" required placeholder="Cantidad" value="{{$gasto->ga_amount}}">
            </div>
            <div class="form-group">
              <label class="">No. de Pagos</label>    
              <input type="number" class="form-control" name="pagos" required placeholder="#Pagos" value="{{$gasto->ga_numpagos}}">
            </div>
            <div class="form-group">
              <label class="">Categoria</label>
              <select name="cat" required class="form-control">
                @foreach($categorias as $a)
                  @if($a->cat_id==$gasto->cat_id)
                    <option value="{{$a->cat_id}}" selected="">{{$a->cat_description}}</option>
                  @else
                    <option value="{{$a->cat_id}}">{{$a->cat_description}}</option>
                  @endif
                @endforeach
              </select>    
              
            </div>
            
            <div class="form-group">
              <label class="">Frecuencia</label>
              <select name="frecuen" required class="form-control">
                @foreach($frecuencia as $f)  
                  <option value='{{$f->ft_id}}'>{{$f->ft_description}}</option>
                @endforeach
                @foreach($frecuencia as $f)
                  @if($f->ft_id==$gasto->ft_id)
                    <option value="{{$f->ft_id}}" selected="">{{$f->ft_description}}</option>
                  @else
                    <option value="{{$f->ft_id}}">{{$f->ft_description}}</option>
                  @endif
                @endforeach
                
              </select>    
              
            </div>
            <div class="form-group">
                <label>Fecha Inicio</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input class="form-control pull-right" required name="inicio" id="datepicker" type="text" value="{{$gasto->ga_mes}}/{{$gasto->ga_dia}}/{{$gasto->ga_ano}}">
                </div>
            </div>
            <div class="form-group">
              <label class="">Prioridad</label>
              <select name="prio" required class="form-control" value="{{$gasto->ga_prioridad}}">
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
                <button type="submit" class="btn btn-primary pull-right">Actualizar</button>
                <a href="{{url('/gastos')}}"  class="btn btn-primary pull-right" style="margin-right: 5px;">Regresar</a>

              </div>
            </div>
              
          </div>
        </form>
      </div>
    </div>     
  </div>

<script type="text/javascript">
  //var dia = ''+$gasto->ga_dia+'';
  //console.log(dia);
  //$('#datepicker').datepicker("setDate", new Date(($gasto->ga_ano) , ($gasto->ga_mes) , ($gasto->ga_dia)) );
</script>  

@stop