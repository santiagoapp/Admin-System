@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
<h1>
	Sistema de roles y permisos
	<small>Asigna, edita o elimina roles y permisos a los usuarios</small>
</h1>

@stop

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Roles</h3>
			</div>
			<!-- /.box-header -->
			<div id="app" class="box-body">
				<roles></roles>
			</div>
			<!-- /.box-body -->
		</div>
		<!-- /.box -->
	</div>
</div>
@stop
@section('css')

<link rel="stylesheet" href="{{asset('css/app.css')}}">

@stop
@section('js')

<script src="{{ asset('js/app.js') }}"></script>

@stop