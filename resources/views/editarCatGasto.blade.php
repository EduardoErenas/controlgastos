@extends('master')

@section('contenido')
	<div class="callout callout-success">
    <div class="content-header"  style="padding-top: 0px !important">
      <h1>Editar Categoría Gasto <small></small></h1>
    </div> 
  </div>
  

  <div class="row">
    <div class="col-sm-6">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Actualizar Categoría Gasto</h3> 
        </div>
        <form class="" action="{{url('/actualizarCatGasto')}}/{{$catGasto->cat_id}}" method="post">
          <input id="token" type="hidden" name="_token" value="{{csrf_token()}}">
          <div class="box-body">

            <div class="form-group">
              <label>Descripcion</label>  
              <input type="text" class="form-control" name="description" required placeholder="Descripcion" value="{{$catGasto->cat_description}}">
            </div>
          <div class="box-footer">
            <div class="row">
              <div class="col-sm-12">
                <button type="submit" class="btn btn-primary pull-right">Actualizar</button>
                <a href="{{url('/catalogos')}}"  class="btn btn-danger pull-right" style="margin-right: 5px;">Regresar</a>

              </div>
            </div>
              
          </div>
        </form>
      </div>
    </div>     
  </div>

@stop
