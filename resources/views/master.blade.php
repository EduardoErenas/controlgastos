<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Control de Gatos | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{asset("css/AdminLTE.css")}}">
    <link rel="stylesheet" href="{{asset("css/morris.css")}}">
  <link rel="stylesheet" href="{{asset("css/bootstrap.min.css")}}">
  <link rel="stylesheet" href="{{asset("css/_all-skins.min.css")}}">
  <link rel="stylesheet" href="{{asset("css/sweetalert.min.css")}}">
  <link rel="stylesheet" href="{{asset("css/font-awesome.min.css")}}">
  <link rel="stylesheet" href="{{asset("css/ionicons.min.css")}}">

  <style type="text/css">
    [ng\:cloak], [ng-cloak], [data-ng-cloak], [x-ng-cloak], .ng-cloak, x-ng-cloak, .ng-hide {
        display:none !important;
    }
    input[type=number]::-webkit-outer-spin-button,

    input[type=number]::-webkit-inner-spin-button {

      -webkit-appearance: none;

      margin: 0;

    }


    input[type=number] {

      -moz-appearance:textfield;

    }  
  </style>
  <link rel="stylesheet" href="{{asset("css/bootstrap-datepicker.min.css")}}">
  <link rel="stylesheet" href="{{asset("css/bootstrap-datepicker.min.css")}}">
  <link rel="stylesheet" href="{{asset("css/bootstrap-colorpicker.min.css")}}">
  
</head>
<body class="hold-transition skin-blue-light fixed sidebar-mini" ng-app="principalBase">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="{{url('')}}" class="logo" style="text-decoration: none;">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b></b>CG</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Control</b> Gastos</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Notifications: style can be found in dropdown.less -->
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              @if(Auth::user()->usu_sex==1)
                <img src="images/usuario/h.png" class="user-image" alt="User Image">
              @else
                <img src="images/usuario/m.png" class="user-image" alt="User Image">
              @endif
              
              <span class="hidden-xs">{{Auth::user()->name}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="images/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  {{Auth::user()->name}} - {{Auth::user()->usu_occupation}}
                  <small>Miembro desde {{substr((Auth::user()->created_at), 0, 10)}}</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{url('/perfil')}}" class="btn btn-default btn-flat">Perfíl</a>
                </div>
                <div class="pull-right">
                  <a href="{{ route('logout') }}" class="btn btn-default btn-flat" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      Salir
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>
                  
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          @if(Auth::user()->usu_sex==1)
                <img src="images/usuario/h.png" class="img-circle" alt="User Image">
          @else
                <img src="images/usuario/m.png" class="img-circle" alt="User Image">
          @endif
          
        </div>
        <div class="pull-left info">
          <p>{{Auth::user()->name}} </p>
          
        </div>
      </div>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MENÚ PRINCIPAL</li>
        
        <li>
          <a href="{{url('/home')}}">
            <i class="fa fa-home"></i> <span>Inicio</span>
          </a>
        </li>
        <li>
          <a href="{{url('/perfil')}}">
            <i class="fa fa-user"></i> <span>Perfil</span>
            
          </a>
        </li>
        <li>
          <a href="{{url('/ingresos')}}">
            <i class="fa fa-money"></i> <span>Ingresos</span>
            
          </a>
        </li>
        <li>
          <a href="{{url('/gastos')}}">
            <i class="fa fa-credit-card-alt"></i> <span>Gastos</span>
            
          </a>
        </li>
        <li>
          <a href="{{url('/pagos')}}">
            <i class=" fa fa-list-alt"></i> <span>Pagos</span>
            
          </a>
        </li>
        <li>
          <a href="{{url('/reportes')}}">
            <i class="fa fa-bar-chart"></i> <span>Reportes</span>
            
          </a>
        </li>
        <li>
          <a href="{{url('/configuraciones')}}">
            <i class="fa fa-cog"></i> <span>Configuraciones</span>
            
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      @yield('titulo')
    </section>

    <!-- Main content -->
    <section class="content">
      @yield('contenido')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Versión</b> 1.0
    </div>
    <strong>Copyright &copy; 2017 <a href="{{url('/')}}">Control de Gastos</a>.</strong> Todos los Derechos Reservados.
  </footer>
</div>
<script src="{{asset("js/jquery-3.1.1.min.js")}}"></script>
<script src="{{asset("js/morris.min.js")}}"></script>
<script src="{{asset("js/angular.min.js")}}"></script>
<script src="{{asset("app/app.js")}}"></script>
<script src="{{asset("js/bootstrap.min.js")}}"></script>
<script src="{{asset("js/app.min.js")}}"></script>
<script src="{{asset("js/jquery.slimscroll.min.js")}}"></script>
<script src="{{asset("js/sweetalert.min.js")}}"></script>
<script src="{{asset("js/jquery-ui.min.js")}}"></script>


<script src="{{asset("js/Chart.js")}}"></script>
<script src="{{asset("js/fastclick.js")}}"></script>
<script src="{{asset("js/adminlte.min.js")}}"></script>



<!--DatePicker-->
<script src="{{asset("js/bootstrap-datepicker.js")}}"></script>
<script src="{{asset("js/bootstrap-colorpicker.min.js")}}"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
@stack('scripts')

  <script type="text/javascript">  
    $('#datepicker').datepicker({
      autoclose: true
    });
    //$(document).on('ready',function(){
      @yield('javascriptC')
    //});
    $(function () {
      
    });

    $(document).on('ready',function(){
      @yield('javascriptC')
    });
    
  </script>
</body>
</html>
