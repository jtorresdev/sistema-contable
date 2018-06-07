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
		<h1 class="page-title">Editar ingreso</h1>
		<!-- END PAGE TITLE-->
		<!-- END PAGE HEADER-->

		<div class="row">
			<div class="col-md-12">
				<!-- BEGIN SAMPLE FORM PORTLET-->
				<div class="portlet light bordered">
					<div class="portlet-title">
						<div class="caption font-green-jungle">
							<i class="fa fa-plus font-green-jungle"></i>
							<span class="caption-subject bold uppercase"> Información del ingreso</span>
						</div>
					</div>
					<div class="portlet-body form">
						<form role="form" method="POST" action="{{ url('ingresos/update') }}" enctype="multipart/form-data">
							{{ csrf_field() }}

							<input type="hidden" value="{{ $ingreso->id }}" name="id">

							<div class="form-body">

								<div class="form-group">
									<label>Monto</label>
									<div class="input-group">
										<div class="input-group-addon">
											Bs.
										</div> 
										<input type="text" class="form-control" value="{{ $ingreso->monto }}" name="monto">
									</div>
								</div>


								<div class="form-group">
									<label>Concepto</label>
									<input type="text" class="form-control" value="{{ $ingreso->concepto }}" name="concepto">
								</div>

								<div class="form-group">
									<label>Fecha</label>
									<div class="row">
										<div class="col-md-4">
											<div class="input-group">
												<input type="text" class="form-control" value="{{ $ingreso->dia }}-{{ $ingreso->mes }}-{{ $ingreso->anio }}" name="fecha" id="fecha"> 
												<div class="input-group-addon">
													<span class="fa fa-calendar"></span>
												</div>
											</div>
										</div>
										<div class="col-md-8" style="padding-top: 5px;">
											<label class="mt-checkbox mt-checkbox-outline" style="padding-right: 20px;">
												<input type="checkbox" name="recurrente" value="1" @if($ingreso->recurrente == '1') checked @endif> Ingreso recurrente 
												<span></span>
											</label>
											<label class="mt-checkbox mt-checkbox-outline">
												<input type="checkbox" name="efectivo" value="1" @if($ingreso->efectivo == '1') checked @endif> Efectivo
												<span></span>
											</label>
										</div>
									</div>
								</div>
							</div>

							<div class="form-actions">
								<button type="submit" class="btn blue">Enviar</button>
							</div>
						</form>
					</div>
				</div>
				<!-- END SAMPLE FORM PORTLET-->       
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
	$('#fecha').datepicker({
		format: "dd-mm-yyyy"
	});

	function select_client(id) {
		var cliente = $("#clientes option[value='" + id +"']").text();
		$("#cliente").val(cliente);
	}
</script>
@endsection