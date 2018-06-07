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
		<h1 class="page-title">Objetivos</h1>
		<!-- END PAGE TITLE-->
		<!-- END PAGE HEADER-->

		<div class="row">
			<div class="col-md-12">
				<!-- BEGIN EXAMPLE TABLE PORTLET-->
				<div class="portlet light bordered">
					<div class="portlet-title">
						<div class="caption font-blue">
							<i class="fa fa-plus font-blue"></i>
							<?php 
							setlocale(LC_TIME, "Spanish");
                			$fecha2 = strftime("%B", strtotime(date('Y-m-d'))); 
                			?>
							<span class="caption-subject bold uppercase">Objetivos</span>
						</div>
						<div class="actions">
							<a class="btn blue" href="{{ url('objetivos/nuevo') }}"><i class="fa fa-plus"></i> Nuevo objetivo</a>
						</div>
					</div>
						<div class="portlet-body">
							<div class="table-toolbar">
							</div>
							<div id="tabla1">
								<table class="table table-bordered table-striped table-condensed flip-content" id="sample_1_2">
									<thead>
										<tr>
											<th> Concepto </th>
											<th> Egreso mensual </th>
											<th> Monto total </th>
											<th> Dia </th>
											<th> Progreso </th>
											<th> Acciones </th>
										</tr>
									</thead>
									<tbody>
										@foreach($objetivos as $obj)
										<tr class="odd gradeX">
											<td class="center">
												{{ $obj->concepto }}
											</td>
											<td class="center">
												Bs. {{ $obj->monto }}
											</td>
											<td class="center">
												Bs. {{ $obj->total }}
											</td>
											<td class="center"> 
												{{ $obj->dia }}
											</td>
											<td>
												<div class="progress" style="margin-bottom: 0">
                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="{{ $obj->progreso }}" aria-valuemin="0" aria-valuemax="{{ $obj->total }}" style="width: {{ $obj->progreso / $obj->total * 100 }}%">
                                                
                                            </div>

                                        </div>
                                        <center><h6> Bs. {{ $obj->progreso }} de Bs. {{ $obj->total }} </h6></center>
											</td>
											<td>
												<center>
												<div class="btn-group">
													<button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Acciones
														<i class="fa fa-angle-down"></i>
													</button>
													<ul class="dropdown-menu pull-left" role="menu">
														<li>
															<a href="{{ url('objetivos/editar/'. $obj->id .'') }}">
																<i class="fa fa-edit"></i> Editar </a>
															</li>
															<li>
																<a href="{{ url('objetivos/eliminar/'. $obj->id .'') }}">
																	<i class="fa fa-trash"></i> Eliminar </a>
															</li>
															</ul>
														</div>
													</td>
												</center>
												</tr>
												@endforeach
											</tbody>
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