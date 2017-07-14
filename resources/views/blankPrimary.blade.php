@extends('master')

@section('titulo')
<h1>
    Página en blanco
    <small>Default</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> En blanco</a></li>
    <li class="active">default</li>
</ol>
@stop

@section('contenido')
<div class="box box-primary">
    <div class="box-header with-border">
    	CONTENIDO CON BORDE DEFAULT
    </div>
</div>
@stop