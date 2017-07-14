@extends('master')

@section('titulo')
<h1>
    Formulario
    <small>general</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Formulario</a></li>
    <li class="active">General</li>
</ol>
@stop

@section('contenido')
<div class="box box-primary">
    <div class="box-header with-border">
    	<form role="form">
            <div class="box-body">
            	<div class="form-group">
                  <label for="Nombre">Nombre:</label>
                  <input type="text" class="form-control" id="nombre" placeholder="Teclea tu nombre">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Correo electrónico:</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Teclea correo electrónico">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Contraseña</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Teclea Contraseña">
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox"> Recordar
                  </label>
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Enviar</button>
                <a href="{{url('')}}" class="btn btn-danger">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@stop