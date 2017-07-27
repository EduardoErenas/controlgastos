<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
     
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{asset("css/AdminLTE.css")}}">
    <link rel="stylesheet" href="{{asset("css/bootstrap.min.css")}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <style>
        body{
            background-color: #e3f2fd;
        }
        .panel{
            margin-top: 20%;
            height: 100%;
            width: 100%; 
            padding: 0% 1% 0% 1%;
            border: 2px #e0f7fa;
            border-radius: 10px;
        }
        .top{
            margin-top: 10px;
        }
        .fondo{
            background-color: white;
        }
        .navbar{
            font-weight: bold;
            display: block;
        }
        .navbar{
            background-color: lightblue;
        }
        h4{
            font-weight: bold;
        }
        h5{
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                @include('flash::message')
                  <div class="panel-body text-center">
                    <img src="images/logo.png" alt="" width="180px">
                  </div>
                  <div class="panel-footer fondo">
                    <form class="top" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="input-group">
                                <span class="input-group-addon input-lg fondo" id="basic-addon1">
                                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                </span>
                                <input id="email" type="email" class="form-control input-lg" name="email" value="{{ old('email') }}" required >

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="input-group">
                                <span class="input-group-addon input-lg fondo" id="basic-addon1">
                                    <span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span>
                                </span>
                                <input id="password" type="password" class="form-control input-lg" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="checkbox icheck">
                            <label>
                                <input type="checkbox"  name="remember" {{ old('remember') ? 'checked' : '' }}> Recordarme
                            </label>
                            <a class=" pull-right" href="{{ route('password.request') }}">
                                    ¿Olvidaste la Contraseña?
                                </a>
                        </div>

                        <div class="panel-footer fondo">
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="{{ route('register') }}" class="pull-left">Registrate</a>
                                    <button type="submit" class="btn btn-primary pull-right">
                                        Aceptar
                                    </button>
                                </div>
                            </div>      
                        </div>
                    </form>
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
<script type="text/javascript">
  setTimeout(function(){
    $(".alert").fadeOut(1500);
  },1500);
</script>
<script src="{{asset("js/jquery-3.1.1.min.js")}}"></script>
<script src="{{asset("js/bootstrap.min.js")}}"></script>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
