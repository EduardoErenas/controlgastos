@extends('master')

@section('titulo')
@stop

@section('contenido')
  <div class="callout callout-danger" >
    <div class="content-header" style="padding-top: 0px !important">
      <h1>GENERAL <small></small></h1>
    </div> 
  </div> 
	<div class="row">
        <div class="col-lg-4 col-xs-12 col-sm-4">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>Ingresos</h3>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            
            <a href="{{url('/ingresos')}}" class="small-box-footer">Nuevo Ingreso <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-12 col-sm-4">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>Gastos</h3>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{url('/gastos')}}" class="small-box-footer">Nuevo Gasto <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-12 col-sm-4">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>Pagos</h3>
            </div>
            <div class="icon">
              <i class="fa fa-files-o"></i>
            </div>
            <a href="{{url('/pagos')}}" class="small-box-footer">Realizar Pago <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        
      </div>
      <!-- Info boxes -->
      <div class="row">
      
      </div>

      <div class="row">
        
            <div class="col-md-6">
              <!-- USERS LIST -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Ultimos</h3>

                  <div class="box-tools pull-right">
                    
                    
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <ul class="users-list clearfix">
                    <li>
                      <img src="{{asset('images/pesos.png')}}" alt="User Image">
                      <a class="users-list-name" href="#">Ingreso</a>
                      <span class="users-list-date">Sueldo</span>
                    </li>
                    <li>
                      <img src="{{asset('images/pesos.png')}}" alt="User Image">
                      <a class="users-list-name" href="#">Ingreso</a>
                      <span class="users-list-date">Beca</span>
                    </li>
                    <li>
                      <img src="{{asset('images/pesos.png')}}" alt="User Image">
                      <a class="users-list-name" href="#">Ingreso</a>
                      <span class="users-list-date">Cundina</span>
                    </li>
                    <li>
                      <img src="{{asset('images/pesos.png')}}" alt="User Image">
                      <a class="users-list-name" href="#">Ingreso</a>
                      <span class="users-list-date">Prestamo</span>
                    </li>
                    
                  </ul>
                  <ul class="users-list clearfix">
                    <li>
                      <img src="{{asset('images/pesos.png')}}" alt="User Image">
                      <a class="users-list-name" href="#">Gasto</a>
                      <span class="users-list-date">Sueldo</span>
                    </li>
                    <li>
                      <img src="{{asset('images/pesos.png')}}" alt="User Image">
                      <a class="users-list-name" href="#">Gasto</a>
                      <span class="users-list-date">Beca</span>
                    </li>
                    <li>
                      <img src="{{asset('images/pesos.png')}}" alt="User Image">
                      <a class="users-list-name" href="#">Gasto</a>
                      <span class="users-list-date">Cundina</span>
                    </li>
                    <li>
                      <img src="{{asset('images/pesos.png')}}" alt="User Image">
                      <a class="users-list-name" href="#">Gasto</a>
                      <span class="users-list-date">Prestamo</span>
                    </li>
                    
                  </ul>
                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="{{url('/ingresos')}}" class="uppercase btn btn-primary btn-xs">Ingresos</a>
                  <a href="{{url('/gastos')}}" class="uppercase btn btn-success btn-xs">Gastos</a>
                </div>
                <!-- /.box-footer -->
              </div>
              <!--/.box -->
            </div>

            <div class="col-md-6">
              
                <div class="info-box">
                  <span class="info-box-icon bg-aqua"><i class="fa fa-money"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text">Ingresos</span>
                    <span class="info-box-number">10</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              
              <!-- /.col -->
              <!-- fix for small devices only -->
              <div class="clearfix visible-sm-block"></div>

              
                <div class="info-box">
                  <span class="info-box-icon bg-green"><i class="fa fa-credit-card-alt"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text">Gastos</span>
                    <span class="info-box-number">5</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              
              <!-- /.col -->
             
                <div class="info-box">
                  <span class="info-box-icon bg-red"><i class=" fa fa-list-alt"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text">Pagos</span>
                    <span class="info-box-number">2</span>
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