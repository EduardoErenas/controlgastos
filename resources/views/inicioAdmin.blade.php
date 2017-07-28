@extends('masterAdmin')

@section('titulo')
@stop

@section('contenido')
  <div class="callout callout-info" style="background: rgba(120,47,85,0.6) !important;border-color: rgba(120,47,85,1) !important;">
    <div class="content-header" style="padding-top: 0px !important">
      <h1>Bienvenido Administrador <small></small></h1>
    </div> 
  </div> 
	<div class="row">
        
        <!-- ./col -->
              <div class="col-md-6">
              <!-- USERS LIST -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Ultimos usuarios registrados</h3>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.box-header -->
                  <div class="box-body no-padding">
                  <ul class="users-list clearfix">
                    @foreach($usuarioA as $u) 
                <li>
                  <img src="{{asset('images/usuario/h.png')}}" class="user-image" alt="User Image">
                        <p class="users-list-name">Administrador</p>
                        <span class="users-list-date">{{$u->name}}</span>
                </li>
                    @endforeach
                    
                </ul> 
                <hr>
                <ul class="users-list clearfix">
                    @foreach($usuarioS as $us)
                <li>
                  <img src="{{asset('images/usuario/h.png')}}" class="user-image" alt="User Image">
                        <p class="users-list-name">Estándar</p>
                        <span class="users-list-date">{{$us->name}}</span>
                </li>
                    @endforeach
                    
                </ul>
              </div>

              <!--/.box -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
          <div class="col-md-6">
              
                <div class="info-box">
                  <span class="info-box-icon bg-aqua"><i class="fa fa-user"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text">Total Usuarios</span>
                    <span class="info-box-number">
                        {{$users[0]->total}}</span>  
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              
              <!-- /.col -->
              <!-- fix for small devices only -->
              <div class="clearfix visible-sm-block"></div>

              
                <div class="info-box">
                  <span class="info-box-icon bg-green"><i class="fa fa-user"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Usuarios Administradores</span>
                    <span class="info-box-number">
                      {{$usersA[0]->total}}</span>  
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              
              <!-- /.col -->
             
                <div class="info-box">
                  <span class="info-box-icon bg-red"><i class=" fa fa-user"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text">Usuarios Estándar</span>
                    <span class="info-box-number">{{$usersS[0]->total}}</span>   
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              
            </div>
      </div>
      <!--

      
      <div class="row">

        <div class="col-lg-4 col-sm-6 col-xs-12">
            <div class="info-box bg-red">
            <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Ultimo Ingreso</span>
              <span class="info-box-number">$ 5,200</span> 
               <span class="info-box-number">12/06/2017</span>
            </div>
        </div>
        
        </div>
        <div class="col-lg-4 col-sm-6 col-xs-12">
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Fondo Actual</span>
              <span class="info-box-number">$ 530.00</span>
            </div>
            <!-- /.info-box-content -->
            <!--
          </div>
        </div>
        <div class="col-sm-6">
         
        </div>
      </div>-->
        
      

      <script type="text/javascript">
        new Morris.Line({
  // ID of the element in which to draw the chart.
  element: 'myfirstchart',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [
    { year: '2008', value: 20 },
    { year: '2009', value: 10 },
    { year: '2010', value: 5 },
    { year: '2011', value: 5 },
    { year: '2012', value: 20 }
  ],
  // The name of the data record attribute that contains x-values.
  xkey: 'year',
  // A list of names of data record attributes that contain y-values.
  ykeys: ['value'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['Value']
});
      </script>
@stop