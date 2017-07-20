@extends('master')

@section('titulo')

    <div class="" ">
     <h3 class="text-center" style="background: rgba(120,47,85,0.6);padding: 10px; border-radius: 3px;">GENERAL</h3>
    </div> 
@stop

@section('contenido')
	<div class="row">
        <div class="col-lg-4 col-xs-12 col-sm-4">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>Gastos</h3>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{url('/gastos')}}" class="small-box-footer">Nuevo Gasto <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-12 col-sm-4">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>Ingresos</h3>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{url('/ingresos')}}" class="small-box-footer">Nuevo Ingreso <i class="fa fa-arrow-circle-right"></i></a>
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
      
      <div class="row">

        <div class="col-lg-3 col-sm-6 col-xs-12">
            <div class="info-box bg-red">
            <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Ultimo Ingreso</span>
              <span class="info-box-number">$ 5,200</span> 
               <span class="info-box-number">12/06/2017</span>
            </div>
        </div>
        
        </div>
        <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Fondo Actual</span>
              <span class="info-box-number">$ 530.00</span>
            </div>
            <!-- /.info-box-content -->
          </div>
        </div>
        <div class="col-sm-6">
         
        </div>
      </div>
        
      

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