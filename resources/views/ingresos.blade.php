@extends('master')
 
@section('contenido')
@include('flash::message')
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
        <form action="{{url('/guardarIngreso')}}" method="post">
          <input id="token" type="hidden" name="_token" value="{{csrf_token()}}">
          <div class="box-body">

            <div class="form-group">
              <label class="">Categoria</label> 

              <select class="form-control" name="categoria" required>
                @foreach($categorias as $a)  
                  <option value='{{$a->cat_id}}'>{{$a->cat_description}}</option>
                @endforeach                
              </select>

              <!--<input type="number" class="form-control" name="cantidad" required placeholder="$100.00">-->
            </div>
            <div class="form-group">
              <label>Descripcion</label>  
              <input type="text" class="form-control" name="descripcion" required placeholder="Descripcion">
            </div>
            <div class="form-group">
              <label class="">Cantidad</label>    
              <input type="number" class="form-control" name="monto" required placeholder="$100.00">
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
                <th class="text-center">Categoria</th>
                <th class="text-center">Descripcion</th>
                <th class="text-center">Total</th>
                <th class="text-center">Restante</th>
                <th class="text-center">Fecha Registro</th>
                <th class="text-center">Estatus</th>
                <th class="text-center">Opciones</th>
              </thead>
              <tbody>
                @foreach($ingresos as $a)
                <tr>
                  <td class="text-center">{{$a->in_id}}</td>
                  <td class="text-center">{{$a->cat_description}}</td>
                  <td class="text-center">{{$a->in_description}}</td>
                  <td class="text-center">{{$a->in_amount}}</td>
                  <td class="text-center">{{$a->in_restante}}</td>
                  <td class="text-center">{{$a->created_at}}</td>
                  <td class="text-center">
                    @if($a->in_status==1)
                      Activo
                    @else
                      Inactivo
                    @endif
                  </td>
                  <td class="text-center">
                    <a href="#" class="btn btn-primary btn-xs">
                      <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>
                    <a href="#" class="btn btn-danger btn-xs">
                      <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
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

<script type="text/javascript">
  setTimeout(function(){
    $(".alert").fadeOut(1500);
  },1500);
</script> 
@stop