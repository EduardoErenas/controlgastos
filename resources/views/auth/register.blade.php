<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
     
    <title>Registro de Usuario Nuevo</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{asset("css/AdminLTE.css")}}">
    <link rel="stylesheet" href="{{asset("css/bootstrap.min.css")}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <style>
         body{
            background-color: #e3f2fd;
        }
        .container{
             
            padding: 0% 1% 0% 1%;
            border: 2px #e0f7fa;
            border-radius: 10px;
        }
        h1{
            display: block;
            font-weight: bold;
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

    <div class="container-fluid" style="background-color: #f1f1f1; padding: 10px; margin-bottom: 15px;">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('login') }}" class="pull-right" style="margin-right: 15px; font-weight: bold;">Login</a>
            </div>
        </div>
    </div>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" ><h1>Registro de Usuario Nuevo</h1></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre:</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail:</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                    

                        <div class="form-group{{ $errors->has('usu_sex') ? ' has-error' : '' }}">
                            <label for="usu_sex" class="col-md-4 control-label">Sexo:</label>

                            <div class="col-md-6">
                                <select id="usu_sex" class="form-control" name="usu_sex" value="{{ old('usu_sex') }}" required>
                                    <option value="1">Hombre</option>
                                    <option value="2">Mujer</option>
                                </select>
                                <!--<input id="usu_sex" type="number" class="form-control" name="usu_sex" value="{{ old('usu_sex') }}" required>-->

                                @if ($errors->has('usu_sex'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('usu_sex') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>  


                        <div class="form-group{{ $errors->has('usu_age') ? ' has-error' : '' }}">
                            <label for="usu_age" class="col-md-4 control-label">Edad:</label>

                            <div class="col-md-6">
                                <input id="usu_age" type="number" class="form-control" name="usu_age" value="{{ old('usu_age') }}" required>

                                @if ($errors->has('usu_age'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('usu_age') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>  

                        <div class="form-group{{ $errors->has('usu_occupation') ? ' has-error' : '' }}">
                            <label for="usu_occupation" class="col-md-4 control-label">Ocupacion:</label>

                            <div class="col-md-6">
                                <input id="usu_occupation" type="text" class="form-control" name="usu_occupation" value="{{ old('usu_occupation') }}" required>

                                @if ($errors->has('usu_occupation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('usu_occupation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 

                        <div class="form-group{{ $errors->has('usu_address') ? ' has-error' : '' }}">
                            <label for="usu_address" class="col-md-4 control-label">Direccion:</label>

                            <div class="col-md-6">
                                <input id="usu_address" type="text" class="form-control" name="usu_address" value="{{ old('usu_address') }}" required>

                                @if ($errors->has('usu_address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('usu_address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('usu_city') ? ' has-error' : '' }}">
                            <label for="usu_city" class="col-md-4 control-label">Ciudad:</label>

                            <div class="col-md-6">
                                <input id="usu_city" type="text" class="form-control" name="usu_city" value="{{ old('usu_city') }}" required>

                                @if ($errors->has('usu_city'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('usu_city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('usu_state') ? ' has-error' : '' }}">
                            <label for="usu_state" class="col-md-4 control-label">Estado:</label>

                            <div class="col-md-6">
                                <input id="usu_state" type="text" class="form-control" name="usu_state" value="{{ old('usu_state') }}" required>

                                @if ($errors->has('usu_state'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('usu_state') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password:</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password:</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Registrar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>