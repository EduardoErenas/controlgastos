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
              <label class="">Prioridad</label>
              <select name="prio" required class="form-control" id="prioridad" value="">
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
            
            <div class="form-group">
              <label>Interes</label>  
              <input type="number" class="form-control" name="interes" required placeholder="Interes agregado ($)" value="{{$gasto->ga_interes}}"> 
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



@stop

@section('javascriptC')
    $('#prioridad').val({{$gasto->ga_prioridad}});
    $('#datepicker').datepicker("setDate", new Date(({{$gasto->ga_ano}}) , ({{($gasto->ga_mes)-1}}) , ({{$gasto->ga_dia}})) );
@stop