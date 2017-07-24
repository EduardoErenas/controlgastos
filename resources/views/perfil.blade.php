@extends('master')
@include('flash::message')
@section('titulo')
<h1>
    Perfil de Usuario
</h1>

@stop

@section('contenido')
	    <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="images/user2-160x160.jpg" alt="User profile picture">

              <h3 class="profile-username text-center">Nombre Apellido</h3>
              <h1 class="profile-username text-center" style="color: red;">{{Auth::user()->name}}</h1>

              <p class="text-muted text-center">{{Auth::user()->usu_occupation}}</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Ingresos</b> <a class="pull-right">{{$ingresos}}</a>
                </li>
                <li class="list-group-item">
                  <b>Gastos</b> <a class="pull-right">{{$gastos}}</a>
                </li>
              </ul>

              <a href="#editar" data-toggle="tab" class="btn btn-primary btn-block"><b>Editar Perfil</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box --> 
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#datos" data-toggle="tab">Datos</a></li>
              <li><a href="#editar" data-toggle="tab">Editar</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="datos">
                <form class="form-horizontal">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Nombre</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" placeholder="Nombre" readonly value="{{Auth::user()->name}}">
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Correo</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail" placeholder="correo" readonly value="{{Auth::user()->email}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Edad</label>

                    <div class="col-sm-10">
                      <input type="number" class="form-control" id="inputName" placeholder="Edad" readonly value="{{Auth::user()->usu_age}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Profesion</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" placeholder="Profesion" readonly value="{{Auth::user()->usu_occupation}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputoaddress" class="col-sm-2 control-label">Direccion</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputoaddress" placeholder="Direccion" readonly value="{{Auth::user()->usu_address}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputcity" class="col-sm-2 control-label">Ciudad</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputcity" placeholder="Ciudad" readonly value="{{Auth::user()->usu_city}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputstate" class="col-sm-2 control-label">Estado</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputstate" placeholder="Estado" readonly value="{{Auth::user()->usu_state}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputsexo" class="col-sm-2 control-label">Sexo</label>
                    <div class="col-sm-10">                    
                     @if(Auth::user()->usu_sex==1)
                      <input type="text" class="form-control" id="inputsexo" placeholder="Sexo" readonly value="Masculino">
                     @else
                     <input type="text" class="form-control" id="inputsexo" placeholder="Sexo" readonly value="Femenino">
                     @endif
                    </div>
                  </div>
                  
                  
                </form>
              </div>
              <!-- /.tab-pane -->

              <!-- /.tab-pane -->

              <div class="tab-pane" id="editar">
                <form class="form-horizontal" action="{{url('/editarperfil')}}/{{Auth::user()->id}}" method="post">
                <input id="token" type="hidden" name="_token" value="{{csrf_token()}}">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Nombre</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" name="nombre" placeholder="Nombre" required value="{{Auth::user()->name}}">
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Correo</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail" name="email" placeholder="correo" required value="{{Auth::user()->email}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Edad</label>

                    <div class="col-sm-10">
                      <input type="number" class="form-control" id="inputName" name="edad" placeholder="Edad" required value="{{Auth::user()->usu_age}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Profesion</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputExperience" name="ocupacion" placeholder="Profesion" required value="{{Auth::user()->usu_occupation}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputoaddress" class="col-sm-2 control-label">Direccion</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputoaddress" name="Direccion" placeholder="Direccion" required value="{{Auth::user()->usu_address}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputcity" class="col-sm-2 control-label">Ciudad</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputcity" name="Ciudad" placeholder="Ciudad" required value="{{Auth::user()->usu_city}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputstate" class="col-sm-2 control-label">Estado</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputstate" name="Estado" placeholder="Estado" required value="{{Auth::user()->usu_state}}">
                    </div>
                  </div>
                  <div class="form-group">   
                    <label class="col-sm-2 control-label" for="sexo">Sexo:</label> 
                    <div class="col-sm-10">
                      <select class="form-control"  name="sexo">
                       @if(Auth::user()->usu_sex==0)
                       <option value="0" selected="">Femenino</option>
                       <option value="1" >Masculino</option>
                        @else
                       <option value="0" >Femenino</option>
                       <option value="1" selected="">Masculino</option>
                       @endif
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-primary">Aceptar</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <script type="text/javascript">
  setTimeout(function(){
    $(".alert").fadeOut(1500);
  },1500);
</script>     
@stop