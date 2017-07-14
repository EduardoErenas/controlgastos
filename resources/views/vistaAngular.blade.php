@extends('master')

@push('scripts')
	<script src="{{ asset("app/controllers/ejemploController.js") }}"></script>
@endpush

@section('titulo')
<h1>
    Vista con Angular
    <small>Datos</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Vista angular</a></li>
    <li class="active">Datos</li>
</ol>
@stop

@section('contenido')
<div class="box box-primary" ng-controller="ejemploController" ng-init="cargaInicial()">
<input type="text" placeholder="Buscar" ng-model="buscar">
<select ng-model="sexo" id="">
	<option value="0">Femenino</option>
	<option value="1">Masculino</option>
</select>
    <table class="table table-striped ng-cloak">
    	<thead>
    		<tr>
    			<th>ID</th>
    			<th>Nombre</th>
    			<th>Num control</th>
    		</tr>
    	</thead>
    	<tbody>
    		<tr ng-repeat="a in alumnos | filter:buscar">
    			<td><% a.id %></td>
    			<td><% a.nombre %></td>
    			<td><% a.numero_control %></td>
    		</tr>
    	</tbody>
    </table>
</div>
@stop







