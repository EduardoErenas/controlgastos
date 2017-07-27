@extends('masteradmin')

@section('contenido')

  <div class="callout callout-info">
    <div class="content-header" style="padding-top: 0px !important">
      <h1>Usuarios del Sistema <small></small></h1>
    </div> 
  </div> 
  @include('flash::message')
  <div class="row">
      
    <div class="col-sm-12">
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Lista de Usuarios Registrados</h3> 
        </div>
        <div class="box-body">
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <th class="text-center">ID</th>
                <th class="text-center">Nombre</th>
                <th class="text-center">Correo</th>
                <th class="text-center">Edad</th>
                <th class="text-center">Profesion</th>
                <th class="text-center">Direccion</th>
                <th class="text-center">Ciudad</th>
                <th class="text-center">Estado</th>
                <th class="text-center">Sexo</th>
                <th class="text-center">Tipo</th>
                <th class="text-center">Fecha de registro</th>

              </thead>
              <tbody>
                @foreach($users as $a)
                <tr>
                  <td class="text-center">{{$a->id}}</td>
                  <td class="text-center">{{$a->name}}</td>
                  <td class="text-center">{{$a->email}}</td>
                  <td class="text-center">{{$a->usu_age}}</td>
                  <td class="text-center">{{$a->usu_occupation}}</td>
                  <td class="text-center">{{$a->usu_address}}</td>
                  <td class="text-center">{{$a->usu_city}}</td>
                  <td class="text-center">{{$a->usu_state}}</td>
                  <td class="text-center">
                    @if($a->usu_sex==1)
                      Masculino
                    @else
                      Femenino
                    @endif
                  </td>
                  <td class="text-center">
                    @if($a->usu_type==1)
                      Administrador
                    @else
                      Estandar
                    @endif
                  </td>
                  <td class="text-center">{{$a->created_at}}</td>
                  <td class="text-center">
                    <a href="{{url('/editarusuario')}}/{{$a->id}}" class="btn btn-primary btn-xs">
                      <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>
                    <a href="{{url('/eliminarusuario')}}/{{$a->id}}" class="btn btn-danger btn-xs">
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