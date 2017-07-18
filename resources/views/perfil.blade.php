@extends('master')

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

              <p class="text-muted text-center">Ingeniero Sistemas</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Ingresos</b> <a class="pull-right">5</a>
                </li>
                <li class="list-group-item">
                  <b>Gastos</b> <a class="pull-right">10</a>
                </li>
              </ul>

              <a href="#" class="btn btn-primary btn-block"><b>Editar Perfil</b></a>
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
              <li><a href="#historial" data-toggle="tab">Historial</a></li>
              <li><a href="#editar" data-toggle="tab">Editar</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="datos">
                <form class="form-horizontal">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Nombre</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" placeholder="Nombre" readonly value="Jose Eduardo">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Apellido</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" placeholder="Apellido" readonly value="Erenas">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Correo</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail" placeholder="correo" readonly value="Eduardo_00914@hotmail.com">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Edad</label>

                    <div class="col-sm-10">
                      <input type="number" class="form-control" id="inputName" placeholder="Edad" readonly value="21">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Sexo</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" placeholder="Sexo" readonly value="Masculino">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Profesion</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" placeholder="Profesion" readonly value="Ingeniero Sistemas">
                    </div>
                  </div>
                  
                </form>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="historial">
                <!-- The timeline -->
                <ul class="timeline timeline-inverse">
                  <!-- timeline time label -->
                  <li class="time-label">
                        <span class="bg-green">
                          10 Feb. 2014
                        </span>
                  </li>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-usd bg-blue"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                      <h3 class="timeline-header no-border"><span style="font-weight: 600;color: #337ab7;">Ingreso</span> Registrado
                      </h3>

                    </div>
                  </li>
                  <li>
                    <i class="fa fa-usd bg-blue"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                      <h3 class="timeline-header no-border"><span style="font-weight: 600;color: #dd4b39;">Gasto</span> Registrado
                      </h3>
                      
                    </div>
                  </li>
                  <!-- END timeline item -->
                  
                  
                  <!-- timeline time label -->
                  <li class="time-label">
                        <span class="bg-green">
                          3 Jan. 2014
                        </span>
                  </li>
                  <!-- /.timeline-label -->
                  <li>
                    <i class="fa fa-usd bg-blue"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                      <h3 class="timeline-header no-border"><span style="font-weight: 600;color: #337ab7;">Ingreso</span> Registrado
                      </h3>

                    </div>
                  </li>
                  <li>
                    <i class="fa fa-usd bg-blue"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                      <h3 class="timeline-header no-border"><span style="font-weight: 600;color: #dd4b39;">Gasto</span> Registrado
                      </h3>
                      
                    </div>
                  </li>
                  
                  <!-- END timeline item -->
                  <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                  </li>
                </ul>
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="editar">
                <form class="form-horizontal">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Nombre</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" placeholder="Nombre" required value="Jose Eduardo">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Apellido</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" placeholder="Apellido" required value="Erenas">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Correo</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail" placeholder="correo" required value="Eduardo_00914@hotmail.com">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Edad</label>

                    <div class="col-sm-10">
                      <input type="number" class="form-control" id="inputName" placeholder="Edad" required value="21">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Sexo</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" placeholder="Sexo" required value="Masculino">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Profesion</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" placeholder="Profesion" required value="Ingeniero Sistemas">
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
@stop