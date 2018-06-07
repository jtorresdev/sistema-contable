<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="Preview page of Metronic Admin Theme #1 for statistics, charts, recent events and reports" name="description" />
    <meta content="" name="author" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="{{ url('/assets/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.3.0/paper.css">
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{ url('/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('/assets/global/plugins/morris/morris.css') }}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{{ url('/assets/global/css/components-md.min.css') }}" rel="stylesheet" id="style_components" type="text/css" />
    <link href="{{ url('/assets/global/css/plugins-md.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="{{ url('/assets/layouts/layout/css/layout.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('/assets/layouts/layout/css/themes/darkblue.min.css') }}" rel="stylesheet" type="text/css" id="style_color" />
    <link href="{{ url('/assets/layouts/layout/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- END THEME LAYOUT STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    @yield('css')
    <!-- END PAGE LEVEL STYLES -->
    <link rel="shortcut icon" href="favicon.ico" /> 

</head>
<!-- END HEAD -->
<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white page-md bg-white">
    <div class="page-wrapper">
        <div class="row">
            <div class="col-md-12">
<div id="tabla" style="padding:20px">
    <h3 class=""> Informe del <b><?php
                setlocale(LC_TIME, "Spanish");
                echo strftime(" %A, %d de %B de %Y", strtotime($informe->fecha)); ?></b></h3>

    <div class="pull-left"><p class="lead">Publicaciones para <b>{{ $cliente->nombre }}</b></p></div>
    <div class="pull-right"><p class="lead">Estado: @if($informe->estado == 0) <b><span class="font-red-intense">Sin pagar</span></b> @else <b><span class="font-green-jungle">Pagado</span></b> @endif</p></div>

                
<table class="table table-striped table-bordered table-hover table-checkable order-column">
    <thead class="bg-blue-chambray font-white">
        <tr>
            <th style="text-align: center;">
                Captura
            </th>
            <th style="text-align: center;"> Titulo </th>
            <th style="text-align: center;"> Desde </th>
            <th style="text-align: center;"> Hasta </th>
            <th style="text-align: center;"> Precio </th>
        </tr>
    </thead>
    <tbody>
     @foreach($publicaciones as $pub)
     <tr class="odd gradeX" style="    text-align: center;">
        <td class="center">
            <a href="{{ url('/capturas/' . $pub->imagen. '') }}" target="_blank">
                <img src="/capturas/{{ $pub->imagen }}" style="width: 100%;padding:2px">
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
</div>
<script src="{{ url('assets/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ url('assets/global/plugins/jspdf/jspdf.min.js') }}" type="text/javascript"></script>
<script src="{{ url('assets/global/plugins/html2canvas/html2canvas.min.js') }}" type="text/javascript"></script>
<script src="{{ url('assets/global/plugins/html2pdf/html2pdf.min.js') }}" type="text/javascript"></script>

            <?php
                setlocale(LC_TIME, "Spanish");
                $fecha2 = strftime(" %d de %B de %Y", strtotime($informe->fecha)); 
            ?>

<script type="text/javascript">
    $(document).ready(function(){
        var element = document.getElementById('tabla');
        html2pdf(element, {
            filename:     'Informe {{ $fecha2 }}, {{ $cliente->nombre }}',
            jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' },
            image:        { type: 'jpeg', quality: 0.98 },
            html2canvas:  { dpi: 192, letterRendering: true }
        });
    });
</script>
</body>
</html>
