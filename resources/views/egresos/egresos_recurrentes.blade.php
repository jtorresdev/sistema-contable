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
		<h1 class="page-title">Egresos recurrentes</h1>
		<!-- END PAGE TITLE-->
		<!-- END PAGE HEADER-->

		<div class="row">
			<div class="col-md-12">
				<!-- BEGIN EXAMPLE TABLE PORTLET-->
				<div class="portlet light bordered">
					<div class="portlet-title">
						<div class="caption font-red-intense">
							<i class="fa fa-refresh font-red-intense"></i>
							<span class="caption-subject bold uppercase">egresos recurrentes</span>
						</div>
						<div class="actions">
							<a class="btn red-intense" href="{{ url('egresos/recurrentes/nuevo') }}"><i class="fa fa-refresh"></i> Nuevo egreso recurrente</a>
						</div>
					</div>
						<div class="portlet-body">
							<form action="{{ url('ingresos') }}" method="POST" id="formu">
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
										@foreach($egresos as $egr)
										<tr class="odd gradeX">
											<td class="center">
												{{ $egr->concepto }}
											</td>
											<td class="center">
												Bs. {{ $egr->monto }}
											</td>
											<td>
												{{ $egr->dia }}
											</td>
											<td class="center">
												@if($egr->efectivo == 1)
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
															<a href="{{ url('egresos/recurrentes/editar/'. $egr->id .'') }}">
																<i class="fa fa-edit"></i> Editar </a>
															</li>
															<li>
																<a href="{{ url('egresos/recurrentes/eliminar/'. $egr->id .'') }}">
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