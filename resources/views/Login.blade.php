<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Iniciar Sesión</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<style>
		body{
			background-color: rgb(15, 55, 168);
		}
		.panel{
			margin-top: 8%;
			padding: 0% 1% 0% 1%;
			border: 1px solid darkblue;
		}
		.top{
			margin-top: 10px;
		}
		.fondo{
			background-color: white;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-6 col-md-offset-3">
				<div class="panel panel-default">
				  <div class="panel-body text-center">
				    <img src="images/logo.png" alt="" width="180px">
				  </div>
				  <div class="panel-footer fondo">
				  	<form class="top">
				  		<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon input-lg fondo" id="basic-addon1">
									<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
								</span>
								<input type="text" class="form-control input-lg" placeholder="Correo electrónico" aria-describedby="basic-addon1">
							</div>
				  		</div>
				  		<div class="form-group">
				  			<div class="input-group">
								<span class="input-group-addon input-lg fondo" id="basic-addon1">
									<span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span>
								</span>
								<input type="password" class="form-control input-lg" placeholder="Contraseña" aria-describedby="basic-addon1">
							</div>
				  		</div>
				  		<div class="form-group">
				  			<a class="btn btn-info">RE-CAPTCHA</a>
				  		</div>
				  		<div class="form-group">
				  			<button class="btn btn-primary btn-lg btn-block">Iniciar Sesión</button>
				  		</div>
				  	</form>
				  	<div class="panel-footer fondo">
				  		<div class="form-group">
						    <a class="pull-right" href="#" data-target="#forgetPassword" data-toggle="modal">¿Olvidaste la contraseña?</a>
						    <input id="checkbox1" type="checkbox" name="remember">
						    <label for="checkbox1">Recordar</label> 
						</div>
						<div class="form-group"> <!-- Mensajes de alerta -->
							<!-- <div class="alert alert-danger" role="alert">
							  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
							  <span class="sr-only">Error:</span>
							  Aquí van los mensajes de alerta
							</div> -->
						</div>
				  	</div>
				  </div>
				</div>
			</div>
		</div>
	</div>
      <div id="forgetPassword" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header modal-header-primary">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <font color="black">
               <h4 class="modal-title" align="center"><font color="white">¿Olvidaste tu contraseña?</font></h4>
              </font>
            </div>
            <div class="modal-body">
              <form  action="#" method="POST" onsubmit="return validaForm()">
                <div class="box-body">
                  <div class="form-group">
                    <label for="correo"><b>Correo:</b></label>
                    <input type="email" name="correo" id="correo" class="form-control" required placeholder="Correo electronico">
                    <p id="correoM"></p>
                  </div>
                  <div class="form-group">
                    <label for="confirmar"><b>Confirmar correo:</b></label>
                    <input type="email" name="confirmar" id="confirmar" class="form-control" required placeholder="Confirmar correo">
                  </div>
                  <div class="form-group" align="center">
                    <button type="submit" id="submit_log" class="btn btn-primary">Confirmar</button>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                  </div>
                  <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>