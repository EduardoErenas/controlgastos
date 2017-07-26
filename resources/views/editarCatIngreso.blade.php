@extends('master')
 
@section('contenido')
@include('flash::message')
  <div class="callout callout-info">
    <div class="content-header" style="padding-top: 0px !important">
      <h1>Editar Categoria Ingreso <small></small></h1>
    </div> 
  </div> 

	<div class="row">
    <div class="col-sm-6">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Actualizar Categoría Ingreso</h3>
        </div>
        <form action="{{url('/actualizarCatIngreso')}}/{{$catIngreso->cat_id}}" method="post">
          <input id="token" type="hidden" name="_token" value="{{csrf_token()}}">
          <div class="box-body">

            <div class="form-group">
              <label>Descripcion</label>  
              <input type="text" class="form-control" name="description" required value="{{$catIngreso->cat_description}}">
            </div>

          </div>

          <div class="box-footer">
            <div class="row" align="center">
              <div class="col-sm-12" call="text-center">
                <a href="{{url('/catalogos')}}" class="btn btn-danger">Regresar</a>
                <button type="submit" class="btn btn-primary">Actualizar</button>
              </div>
            </div>
            
          </div>
        </form>
      </div>
    </div>      
  </div>

<script type="text/javascript">
  setTimeout(function(){
    $(".alert").fadeOut(1500);
  },1500);
</script> 
@stop