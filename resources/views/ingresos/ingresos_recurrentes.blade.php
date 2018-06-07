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
		<h1 class="page-title">Ingresos recurrentes</h1>
		<!-- END PAGE TITLE-->
		<!-- END PAGE HEADER-->

		<div class="row">
			<div class="col-md-12">
				<!-- BEGIN EXAMPLE TABLE PORTLET-->
				<div class="portlet light bordered">
					<div class="portlet-title">
						<div class="caption font-green-jungle">
							<i class="fa fa-refresh font-green-jungle"></i>
							<?php 
							setlocale(LC_TIME, "Spanish");
                			$fecha2 = strftime("%B", strtotime(date('Y-m-d'))); 
                			?>
							<span class="caption-subject bold uppercase">Ingresos recurrentes</span>
						</div>
						<div class="actions">
							<a class="btn green-jungle" href="{{ url('ingresos/recurrentes/nuevo') }}"><i class="fa fa-refresh"></i> Nuevo ingreso recurrente</a>
						</div>
					</div>
						<div class="portlet-body">
							<form action="{{ url('ingresos') }}" method="POST" id="formu">
							{{ csrf_field() }}
							<div class="table-toolbar">

							</div>
							</form>
							<div id="tabla1">
								<table class="table table-bordered table-striped table-condensed flip-content" id="sample_1_2">
									<thead>
										<tr>
											<th> Concepto </th>
											<th> Monto </th>
											<th> Dia </th>
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
											<td>
												{{ $ing->dia }}
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
															<a href="{{ url('ingresos/recurrentes/editar/'. $ing->id .'') }}">
																<i class="fa fa-edit"></i> Editar </a>
															</li>
															<li>
																<a href="{{ url('ingresos/recurrentes/eliminar/'. $ing->id .'') }}">
																	<i class="fa fa-trash"></i> Eliminar </a>
															</li>
															</ul>
														</div>
													</td>
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