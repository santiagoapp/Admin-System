@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<h1>
	Ofimática
	<small>Ordenes de trabajo e información relacionada</small>
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
			<div class="box-body table-responsive">
				<table class="table table-hover table-bordered">
					<tbody>
						<tr>
							<th width="5%">ID</th>
							<th width="15%">Cliente</th>
							<th width="20%">Vendedor</th>
							<th width="35%">Observaciones</th>
							<th width="10%">Fecha</th>
							<th width="10%">Acciones</th>
						</tr>
						@foreach($result as $ot)
						<tr>
							<td>{{$ot->ID}}</td>
							<td>{{$ot->CLIENTE}}</td>
							<td>{{$ot->VENDEDOR}}</td>
							<td>{{$ot->OBSERVACIONES}}</td>
							<td><span class="label label-success">{{$ot->FECHA}}</span></td>
							<td>
								<div class="btn-group">
									<a href="#" class="btn btn-success"><span class="fa fa-check"></span></a>
									<a href="#" class="btn btn-danger"><span class="fa fa-close"></span></a>
								</div>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<!-- /.box-body -->
		</div>
		<!-- /.box -->
	</div>
</div>
@stop