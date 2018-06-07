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
		<h1 class="page-title">Publicaciones de Facebook para <b>{{ $cliente }}</b> <a href="{{ url('facebook/cliente/'. $cliente_id. '/eliminar') }}" class="label label-sm label-danger">Eliminar</a></h1>
		<!-- END PAGE TITLE-->
		<!-- END PAGE HEADER-->

       <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-blue-sharp">
                        <i class="fa fa-facebook-square font-blue-sharp"></i>
                        <span class="caption-subject bold uppercase"> Publicaciones</span>
                    </div>
                </div>
                <form action="{{ url('facebook/publicaciones/informe') }}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="cliente" value="{{ $cliente_id }}">
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <a href="{{ url('facebook/agregar/'.$cliente_id.'') }}" class="btn sbold green"> Agregar nueva publicación
                                            <i class="fa fa-plus"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="btn-group pull-right">
                                       <button class="btn green-meadow" type="submit">Generar informe <i class="fa fa-file-text-o"></i></button>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div id="tabla1">
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1_2">
                            <thead>
                                <tr>
                                   <th>
                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                        <input type="checkbox" class="group-checkable" data-set="#sample_1_2 .checkboxes" />
                                        <span></span>
                                    </label>
                                </th>
                                <th>
                                    Captura
                                </th>
                                <th> Titulo </th>
                                <th> Desde </th>
                                <th> Hasta </th>
                                <th> Precio </th>
                                <th> Actions </th>
                            </tr>
                        </thead>
                        <tbody>
                         @foreach($publicaciones as $pub)
                         <tr class="odd gradeX">
                            <td>
                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                    <input type="checkbox" class="checkboxes" value="{{ $pub->id }}" name="publicaciones_ar[]"/>
                                    <span></span>
                                </label>
                            </td>
                            <td class="center">
                                <a href="{{ url('/capturas/' . $pub->imagen. '') }}" target="_blank">
                                    <img src="/capturas/{{ $pub->imagen }}" style="width: 100px;padding:2px">
                                </a>
                            </td>
                            <td class="center">
                                {{ $pub->titulo }}
                            </td>
                            <td class="center">
                               {{ $pub->hasta }}
                           </td>
                           <td class="center"> 
                             {{ $pub->desde }}
                         </td>
                         <td class="center">
                             Bs. {{ $pub->precio }}
                         </td>
                         <td>
                            <div class="btn-group">
                                <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Acciones
                                    <i class="fa fa-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu pull-left" role="menu">
                                    <li>
                                        <a href="{{ url('facebook/publicaciones/editar/'. $pub->id .'') }}">
                                            <i class="fa fa-edit"></i> Editar </a>
                                        </li>
                                        <li>
                                            <a href="{{ url('facebook/publicaciones/eliminar/'. $pub->id .'') }}">
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
        </form>
    </div>
    <!-- END EXAMPLE TABLE PORTLET-->
</div>







@if($informes == 0)

<spam class="font-red" style="text-align: center"><h1>Sin informes</h1></span>

@else


@foreach($informes as $informe)

<div class="col-md-12">
    <!-- BEGIN EXAMPLE TABLE PORTLET-->
    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption font-red">
                <span class="caption-subject bold uppercase"> Informe del <b><?php
                setlocale(LC_TIME, "Spanish");
                echo strftime(" %A, %d de %B de %Y", strtotime($informe['fecha'])); ?></b></span>
            </div>
        </div>
            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pull-left">
                                <a href="{{ url('facebook/publicaciones/informe/' . $informe['id'] . '/eliminar') }}" class="btn red-intense"><i class="fa fa-trash"></i></a>
                                @if($informe['estado'] == 0)
                                <a href="{{ url('facebook/publicaciones/informe/' . $informe['id'] . '/pagado') }}" class="btn green-jungle">Marcar como pagado <i class="fa fa-check"></i></a>
                                @else
                                <span class="font-green-jungle">Pagado <i class="fa fa-check"></i></span>
                                @endif
                            </div>

                            <div class="pull-right">
                                <a class="btn blue-chambray" href="{{ url('facebook/publicaciones/informe/' . $informe['id'] . '') }}" target="_blank">Descargar PDF <i class="fa fa-file-pdf-o"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tabla-{{ $informe['id'] }}">
                    <table class="table table-striped table-bordered table-hover table-checkable order-column display">
                        <thead>
                            <tr>
                                <th>
                                    Captura
                                </th>
                                <th> Titulo </th>
                                <th> Desde </th>
                                <th> Hasta </th>
                                <th> Precio </th>
                            </tr>
                        </thead>
                        <tbody>
                         @foreach($informe['publicaciones'] as $pub)

                         <?php 
                         $path = public_path("capturas") . '/' . $pub->imagen;
                         $type = pathinfo($path, PATHINFO_EXTENSION);
                         $data = file_get_contents($path);
                         $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                         ?>

                         <tr class="odd gradeX">
                            <td class="center">
                                <a href="{{ url('/capturas/' . $pub->imagen. '') }}" target="_blank">
                                    <img src="{{ $base64 }}" style="width: 100px;padding:2px">
                                </a>
                            </td>
                            <td class="center">
                                {{ $pub->titulo }}
                            </td>
                            <td class="center">
                               {{ $pub->hasta }}
                           </td>
                           <td class="center"> 
                             {{ $pub->desde }}
                         </td>
                         <td class="center">
                             Bs. {{ $pub->precio }}
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

@endforeach

@endif



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
            info: "Mostrando de _START_ a _END_ de _TOTAL_ publicaciones",
            infoEmpty: "No records found",
            infoFiltered: "(filtered1 from _MAX_ total records)",
            lengthMenu: "Show _MENU_",
            search: "Search:",
            zeroRecords: "No matching records found",
            paginate: {
                previous: "Ant",
                next: "Sig",
                last: "Ultima",
                first: "Primera"
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
            targets: [0,1,6]
        }, {
            searchable: !1,
            targets: [0,1,6]
        }, {
            className: "dt-right"
        }],
        order: [
        [3, "desc"]
        ]
    });

    $("#sample_1_2").find(".group-checkable").change(function() {
        var e = jQuery(this).attr("data-set"),
        t = jQuery(this).is(":checked");
        jQuery(e).each(function() {
            t ? ($(this).prop("checked", !0), $(this).parents("tr").addClass("active")) : ($(this).prop("checked", !1), $(this).parents("tr").removeClass("active"))
        })
    }), e.on("change", "tbody tr .checkboxes", function() {
        $(this).parents("tr").toggleClass("active")
    });
</script>
@endsection