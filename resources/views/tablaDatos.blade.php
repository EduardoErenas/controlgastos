@extends('master')

@push('scripts')
    
@endpush

@section('titulo')
<h1>
    Tabla con datos
    <small>General</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Tabla Datos</a></li>
    <li class="active">general</li>
</ol>
@stop

@section('contenido')
<div class="box box-primary">
    <div class="box-header with-border">
    	<div class="table-responsive">
    	<table class="table table-hover">
    		<thead>
    			<th class="text-center">ID</th>
    			<th class="text-center">Nombre</th>
    			<th class="text-center">Sexo</th>
    			<th class="text-center">Edad</th>
    			<th class="text-center">Profesión</th>
    			<th class="text-center">Opciones</th>
    		</thead>
    		<tbody>
	    		<tr>
	    			<td class="text-center">004</td>
	    			<td class="text-center">Luis Carlos</td>
	    			<td class="text-center">M</td>
	    			<td class="text-center">31</td>
	    			<td class="text-center">Lic. Informática</td>
	    			<td class="text-center">
	    				<a href="#" class="btn btn-primary btn-xs">
	    					<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
	    				</a>
	    				<a href="#" class="btn btn-danger btn-xs">
	    					<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
	    				</a>
	    			</td>
	    		</tr>
	    		<tr>
	    			<td class="text-center">006</td>
	    			<td class="text-center">Gerardo</td>
	    			<td class="text-center">M</td>
	    			<td class="text-center">23</td>
	    			<td class="text-center">Ing. Sistemas Comp.</td>
	    			<td class="text-center">
	    				<a href="#" class="btn btn-primary btn-xs">
	    					<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
	    				</a>
	    				<a href="#" class="btn btn-danger btn-xs">
	    					<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
	    				</a>
	    			</td>
	    		</tr>
	    		<tr>
	    			<td class="text-center">009</td>
	    			<td class="text-center">Priscila</td>
	    			<td class="text-center">F</td>
	    			<td class="text-center">23</td>
	    			<td class="text-center">Ing. Sistemas Comp.</td>
	    			<td class="text-center">
	    				<a href="#" class="btn btn-primary btn-xs">
	    					<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
	    				</a>
	    				<a href="#" class="btn btn-danger btn-xs">
	    					<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
	    				</a>
	    			</td>
	    		</tr>
    		</tbody>
    	</table>
    	</div>
    </div>
</div>
@stop