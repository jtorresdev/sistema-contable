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
		<h1 class="page-title">Agregar publicación de Facebook</h1>
		<!-- END PAGE TITLE-->
		<!-- END PAGE HEADER-->

		<div class="row">
			<div class="col-md-12">
				<!-- BEGIN SAMPLE FORM PORTLET-->
				<div class="portlet light bordered">
					<div class="portlet-title">
						<div class="caption font-blue-sharp">
							<i class="fa fa-facebook-square font-blue-sharp"></i>
							<span class="caption-subject bold uppercase"> Información de la publicación</span>
						</div>
					</div>
					<div class="portlet-body form">
						<form role="form" method="POST" action="{{ url('facebook/store') }}" enctype="multipart/form-data">
							{{ csrf_field() }}

								<div class="form-group">
									<label>Lista de clientes</label>
									<select name="cliente" class="form-control" onchange="select_client(value)" id="clientes">
										<option></option>
										@foreach($clientes as $cl)
										<option value="{{ $cl->id }}" >{{ $cl->nombre }}</option>
										@endforeach
									</select>
								</div>

							<div class="form-body">
								<div class="form-group">
									<label>Nombre del cliente</label>
									@if($cliente)
									<input type="text" class="form-control" placeholder="Nombre del cliente" name="cliente" id="cliente" value="{{ $cliente->nombre }}"> 
									@else
									<input type="text" class="form-control" placeholder="Nombre del cliente" name="cliente" id="cliente">
									@endif
								</div>

								<div class="form-group">
									<label>Titulo</label>
									<input type="text" class="form-control" placeholder="Titulo de la publiación" name="titulo"> 
								</div>


								<div class="form-group">
                                    <label>Precio</label>
                                       	<div class="input-group">
                                       			<div class="input-group-addon">
													Bs.
												</div> 
											<input type="text" class="form-control" placeholder="" name="precio">
										</div>
                                </div>

								<div class="form-group">
									<label>Fecha</label>
									<div class="row">
										<div class="col-md-6">
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
										<div class="col-md-6">
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
									</div>
								</div>
							
								<div class="form-group">
                                    <label>Captura</label>
                                        <input type="file" name="imagen">
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
	$('#desde').datepicker({
		format: "yyyy-mm-dd"
	});
	$('#hasta').datepicker({
		format: "yyyy-mm-dd"
	});

	function select_client(id) {
		var cliente = $("#clientes option[value='" + id +"']").text();
		$("#cliente").val(cliente);
	}
</script>
@endsection