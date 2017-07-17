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
            <a type="button"  class="small-box-footer"data-toggle="modal" data-target="#modal-default">More info <i class="fa fa-arrow-circle-right"  ></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <h3 class="text-center" style="background: rgba(120,47,85,0.6);">GENERAL</h3>
      <div class="row">
        <div class="col-lg-6">
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Proximos Pagos</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>ID</th>
                  <th>Total</th>
                  <th>Date</th>
                  <th>Prioridad</th>
                  <th>Concepto</th>
                </tr>
                <tr>
                  <td>183</td>
                  <td>$500</td>
                  <td>11-7-2014</td>
                  <td><span class="label label-success">Medio</span></td>
                  <td>Carro mensualidad</td>
                </tr>
                <tr>
                  <td>183</td>
                  <td>$500</td>
                  <td>11-7-2014</td>
                  <td><span class="label label-danger">Alta</span></td>
                  <td>Casa</td>
                </tr>
                 <tr>
                  <td>183</td>
                  <td>$500</td>
                  <td>11-7-2014</td>
                  <td><span class="label label-danger">Alta</span></td>
                  <td>Luz</td>
                </tr>
                 <tr>
                  <td>183</td>
                  <td>$500</td>
                  <td>11-7-2014</td>
                  <td><span class="label label-primary">Baja</span></td>
                  <td>Agua</td>
                </tr>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <div class="col-lg-3">
          
            <div class="info-box-content">
              <span class="info-box-text">Inventory</span>
              <span class="info-box-number">5,200</span>

              <div class="progress">
                <div class="progress-bar" style="width: 50%"></div>
              </div>
              <span class="progress-description">
                    50% Increase in 30 Days
                  </span>
            </div>
        </div>
      </div>
        <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Default Modal</h4>
              </div>
              <div class="modal-body">
                <p>One fine body&hellip;</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
@stop