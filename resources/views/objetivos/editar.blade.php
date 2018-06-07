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
		<h1 class="page-title">Editar objetivo</h1>
		<!-- END PAGE TITLE-->
		<!-- END PAGE HEADER-->

		<div class="row">
			<div class="col-md-12">
				<!-- BEGIN SAMPLE FORM PORTLET-->
				<div class="portlet light bordered">
					<div class="portlet-title">
						<div class="caption font-blue">
							<i class="fa fa-bullseye font-blue"></i>
							<span class="caption-subject bold uppercase"> Información del objetivo</span>
						</div>
					</div>
					<div class="portlet-body form">
						<form role="form" method="POST" action="{{ url('objetivos/update') }}" enctype="multipart/form-data">
							{{ csrf_field() }}

							<input type="hidden" name="id" value="{{ $objetivo->id }}">

							<div class="form-body">

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Egreso mensual</label>
											<div class="input-group">
												<div class="input-group-addon">
													Bs.
												</div> 
												<input type="text" class="form-control" placeholder="100" name="monto">
											</div>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>Monto total a alcanzar</label>
											<div class="input-group">
												<div class="input-group-addon">
													Bs.
												</div> 
												<input type="text" class="form-control" placeholder="1000" name="total">
											</div>
										</div>
									</div>
								</div>

								<div class="form-group">
									<label>Concepto</label>
									<input type="text" class="form-control"  value="{{ $objetivo->concepto }}" name="concepto">
								</div>

								<div class="form-group">
									<label>Dia del mes</label>
									<div class="row">
										<div class="col-md-4">
											<div class="input-group">
												<input type="text" class="form-control" value="{{ $objetivo->dia }}" name="dia"> 
												<div class="input-group-addon">
													<span class="fa fa-calendar"></span>
												</div>
											</div>
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
	function select_client(id) {
		var cliente = $("#clientes option[value='" + id +"']").text();
		$("#cliente").val(cliente);
	}
</script>
@endsection