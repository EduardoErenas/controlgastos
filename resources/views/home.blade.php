@extends('master')

@section('titulo')
<div class="callout callout-info">
    <div class="content-header" style="padding-top: 0px !important">
      <h1>General <small></small></h1>
    </div> 
  </div>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Principal</a></li>
    <li class="active">Home</li>
</ol>
@stop

@section('contenido')
	<div class="row">
        <div class="col-lg-3 col-xs-12 col-sm-3">
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
        <div class="col-lg-3 col-xs-12 col-sm-3">
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
        <div class="col-lg-3 col-xs-12 col-sm-3">
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
        <div class="col-lg-3 col-xs-12 col-sm-3">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>Reportes</h3>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
           <a href="{{url('/reportes')}}" class="small-box-footer">Ver Reporte<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      
      <div class="row">
        <div class="col-lg-6">
          
        </div>
        <div class="col-lg-3">
            <div class="info-box bg-red">
            <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Ultimo Ingreso</span>
              <span class="info-box-number">$ 5,200</span> 
               <span class="info-box-number">12/06/2017</span>
            </div>
        </div>
        
        </div>
        <div class="col-lg-3">
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Fondo Actual</span>
              <span class="info-box-number">$ 530.00</span>
            </div>
            <!-- /.info-box-content -->
          </div>
        </div>
      </div>
@stop