<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
     
    <title>Recuperación de Contraseña</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{asset("css/AdminLTE.css")}}">
    <link rel="stylesheet" href="{{asset("css/bootstrap.min.css")}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <style>
         body{
            background-image: url("public/images/fondo.jpg");
        }
        .container{
             
            padding: 0% 1% 0% 1%;
            border: 2px #e0f7fa;
            border-radius: 10px;
        }
        h3{
            display: block;
            font-weight: bold;
        }
        .navbar{
            font-weight: bold;
            display: block;
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

    <div class="container-fluid" style="background-color: #314550; padding: 10px; margin-bottom: 15px;">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('login') }}" class="pull-right" style="margin-right: 15px; font-weight: bold; color: white;">Login</a>
            </div>
        </div>
    </div>
    <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Send Password Reset Link
                                </button>
                            </div>
                        </div>
                    </form>
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
</body>
</html>
