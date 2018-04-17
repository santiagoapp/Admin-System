@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
<h1>
	Sistema de alertas
	<small>Ordenes de trabajo para el día {{ Carbon\Carbon::now()->format('d/m/y') }}</small>
</h1>

@stop

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Ordenes de trabajo</h3>

				<div class="box-tools">
					<div class="input-group input-group-sm" style="width: 150px;">
						<input type="text" name="table_search" class="form-control pull-right" placeholder="Buscar">

						<div class="input-group-btn">
							<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
						</div>
					</div>
				</div>
			</div>
			<!-- /.box-header -->
			<div id="app" class="box-body table-responsive">
				<cargo></cargo>
			</div>
			<!-- /.box-body -->
		</div>
		<!-- /.box -->
	</div>
</div>
@stop

@section('js')

<script src="{{ asset('js/app.js') }}"></script>

@stop