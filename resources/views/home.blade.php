@extends('master')

@section('titulo')
<h1>
    Sistema Administrativo
    <small>Principal</small>
</h1>
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
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      
@stop