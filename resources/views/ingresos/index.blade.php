@extends('layouts.app')

@extends('layouts.header')

@extends('layouts.sidebar')

@section('content')
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<!-- BEGIN CONTENT BODY -->
	<div class="page-content">
		<!-- BEGIN PAGE HEADER-->
		<!-- BEGIN PAGE TITLE-->
		<h1 class="page-title">Ingresos</h1>
		<!-- END PAGE TITLE-->
		<!-- END PAGE HEADER-->

		<div class="row">
			<div class="col-md-12">
				<!-- BEGIN EXAMPLE TABLE PORTLET-->
				<div class="portlet light bordered">
					<div class="portlet-title">
						<div class="caption font-green-jungle">
							<i class="fa fa-plus font-green-jungle"></i>
							<?php 
							setlocale(LC_TIME, "Spanish");
                			$fecha2 = strftime("%B", strtotime(date('Y-m-d'))); 
                			?>
							<span class="caption-subject bold uppercase">Ingresos</span>
						</div>
						<div class="actions">
							<a class="btn green-jungle" href="{{ url('ingresos/nuevo') }}"><i class="fa fa-plus"></i> Nuevo ingreso</a>
						</div>
					</div>
						<div class="portlet-body">
							<form action="{{ url('ingresos') }}" method="POST" id="formu">
							{{ csrf_field() }}
							<div class="table-toolbar">
								<div class="row">
									<div class="col-md-2">
										<div class="form-group">
											<label>Mes</label>
                                                <select class="form-control" name="mes" onchange="enviar()">
                                                        <option value="1" @if(date('m') == '1') selected @endif>Enero</option>
                                                        <option value="2" @if(date('m') == '2') selected @endif>Febrero</option>
                                                        <option value="3" @if(date('m') == '3') selected @endif>Marzo</option>
                                                        <option value="4" @if(date('m') == '4') selected @endif>Abril</option>
                                                        <option value="5" @if(date('m') == '5') selected @endif>Mayo</option>
                                                        <option value="6" @if(date('m') == '6') selected @endif>Junio</option>
                                                        <option value="7" @if(date('m') == '7') selected @endif>Julio</option>
                                                        <option value="8" @if(date('m') == '8') selected @endif>Agosto</option>
                                                        <option value="9" @if(date('m') == '9') selected @endif>Septiembre</option>
                                                        <option value="10" @if(date('m') == '10') selected @endif>Octubre</option>
                                                        <option value="11" @if(date('m') == '11') selected @endif>Noviembre</option>
                                                        <option value="12" @if(date('m') == '12') selected @endif>Diciembre</option>
                                                </select>
                                        </div>
									</div>
									<div class="col-md-2" style="padding-top: 30px;">
										<label class="mt-checkbox mt-checkbox-outline">
											<input type="checkbox" name="efectivo" value="1" onclick="enviar()"> Efectivo
											<span></span>
										</label>
									</div>
									<div class="col-md-2" style="padding-top: 30px;">
										<label class="mt-checkbox mt-checkbox-outline">
											<input type="checkbox" name="recurrente" onclick="enviar()"> Recurrente
											<span></span>
										</label>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
									<label>Rango de fecha</label>
									<div class="row">
										<div class="col-md-4">
											<div class="input-group">
												<span class="input-group-addon">
													Desde:
												</span>
												<input type="text" class="form-control" placeholder="{{ date('Y-m-d') }}" name="desde" id="desde"> 
												<div class="input-group-addon">
													<span class="fa fa-calendar"></span>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="input-group">
												<span class="input-group-addon">
													Hasta:
												</span>
												<input type="text" class="form-control" placeholder="{{ date('Y-m-d') }}" name="hasta" id="hasta">
												<div class="input-group-addon">
													<span class="fa fa-calendar"></span>
												</div> 
											</div>
										</div>
										<button type="submit" class="btn blue">Filtrar</button>
									</div>
								</div>
								</div>
							</div>
							</form>
							<div id="tabla1">
								<table class="table table-bordered table-striped table-condensed flip-content" id="sample_1_2">
									<thead>
										<tr>
											<th> Concepto </th>
											<th> Monto </th>
											<th> Fecha </th>
											<th> Recurrente </th>
											<th> Efectivo </th>
											<th> Acciones </th>
										</tr>
									</thead>
									<tbody>
										@foreach($ingresos as $ing)
										<tr class="odd gradeX">
											<td class="center">
												{{ $ing->concepto }}
											</td>
											<td class="center">
												Bs. {{ $ing->monto }}
											</td>
											<td class="center"> 
												{{ $ing->dia }}-{{ $ing->mes }}-{{ $ing->anio }}
											</td>
											<td class="center">
												@if($ing->recurrente == 1)
													<span class="font-green-jungle">Recurrente</span>
												@else
													<span class="font-red-intense">No recurrente</span>
												@endif
											</td>
											<td class="center">
												@if($ing->efectivo == 1)
													<span class="font-green-jungle">Efectivo</span>
												@else
													<span class="font-red-intense">No efectivo</span>
												@endif
											</td>
											<td>
												<div class="btn-group">
													<button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Acciones
														<i class="fa fa-angle-down"></i>
													</button>
													<ul class="dropdown-menu pull-left" role="menu">
														<li>
															<a href="{{ url('ingresos/editar/'. $ing->id .'') }}">
																<i class="fa fa-edit"></i> Editar </a>
															</li>
															<li>
																<a href="{{ url('ingresos/eliminar/'. $ing->id .'') }}">
																	<i class="fa fa-trash"></i> Eliminar </a>
															</li>
															</ul>
														</div>
													</td>
												</tr>
												@endforeach
											</tbody>
											<tfoot>
												<th></th>
												<th><span class="font-green-jungle">Bs. {{ $ingresos_sum }}</span></th>
												<th></th>
												<th></th>
												<th></th>
												<th></th>
											</tfoot>
										</table>
									</div>
								</div>
						</div>
						<!-- END EXAMPLE TABLE PORTLET-->
					</div>
				</div>
			</div>
			<!-- END CONTENT BODY -->
		</div>
		<!-- END CONTENT -->
	</div>
	<!-- END CONTAINER -->
	@endsection

	@section('scripts')
	<script type="text/javascript">

	$('#desde').datepicker({
		format: "yyyy-mm-dd"
	});
	$('#hasta').datepicker({
		format: "yyyy-mm-dd"
	});

		function enviar() {
			$("#formu").submit();
		}

		$('#fecha').datepicker({
			format: "yyyy-mm-dd"
		});

		function select_client(id) {
			var cliente = $("#clientes option[value='" + id +"']").text();
			$("#cliente").val(cliente);
		}


	</script>
	@endsection