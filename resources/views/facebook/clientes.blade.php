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
		<h1 class="page-title">Publicaciones de Facebook</h1>
		<!-- END PAGE TITLE-->
		<!-- END PAGE HEADER-->

		<div class="row">
			<div class="col-md-12">
				<div class="mt-element-list">
					<div class="mt-list-head list-simple font-white bg-blue">
						<div class="list-head-title-container">
							<h3 class="list-title">Clientes</h3>
						</div>
					</div>
					<div class="mt-list-container list-simple">
						<ul>
							@foreach($clientes as $cl)
							<li class="mt-list-item">
								<div class="list-icon-container done">
									<i class="icon-check"></i>
								</div>
								<div class="list-datetime"> <span class="label label-sm bg-blue font-white">{{ $cl['publicaciones'] }}</span></div>
								<div class="list-item-content">
									<h3 class="uppercase">
										<a href="{{ url('facebook/publicaciones/'.$cl['id'].'') }}">{{ $cl['nombre'] }}</a>
									</h3>
								</div>
							</li>
							@endforeach
						</ul>
					</div>
				</div>
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


	$("#sample_1_2").dataTable({
		language: {
			aria: {
				sortAscending: ": activate to sort column ascending",
				sortDescending: ": activate to sort column descending"
			},
			emptyTable: "No data available in table",
			info: "Showing _START_ to _END_ of _TOTAL_ records",
			infoEmpty: "No records found",
			infoFiltered: "(filtered1 from _MAX_ total records)",
			lengthMenu: "Show _MENU_",
			search: "Search:",
			zeroRecords: "No matching records found",
			paginate: {
				previous: "Prev",
				next: "Next",
				last: "Last",
				first: "First"
			}
		},
		bStateSave: !1,
		lengthMenu: [
		[5, 15, 20, -1],
		[5, 15, 20, "All"]
		],
		pageLength: 5,
		pagingType: "bootstrap_full_number",
		columnDefs: [{
			orderable: !1,
			targets: [0]
		}, {
			searchable: !1,
			targets: [0]
		}, {
			className: "dt-right"
		}],
		order: [
		[1, "asc"]
		],
		initComplete: function() {
			this.api().column(1).every(function() {
				var e = this,
				t = $('<select class="form-control input-sm"><option value="">Select</option></select>').appendTo($(e.footer()).empty()).on("change", function() {
					var t = $.fn.dataTable.util.escapeRegex($(this).val());
					e.search(t ? "^" + t + "$" : "", !0, !1).draw()
				});
				e.data().unique().sort().each(function(e, a) {
					t.append('<option value="' + e + '">' + e + "</option>")
				})
			})
		}
	});

	function printDiv(nombreDiv) {
		var contenido= document.getElementById(nombreDiv).innerHTML;
		var contenidoOriginal= document.body.innerHTML;

		document.body.innerHTML = contenido;

		window.print();

		document.body.innerHTML = contenidoOriginal;
	}
</script>
@endsection