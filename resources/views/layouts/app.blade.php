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
    <link href="{{ url('/assets/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('/assets/global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('/assets/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}" rel="stylesheet" type="text/css" />
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
<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white page-md">
    <div class="page-wrapper">
        @yield('header')
            <!-- BEGIN HEADER & CONTENT DIVIDER -->
            <div class="clearfix"> </div>
            <!-- END HEADER & CONTENT DIVIDER -->
        @yield('sidebar')

        @yield('content')

    </div>
</div>
        <!--[if lt IE 9]>
<script src="{{ url('assets/global/plugins/respond.min.js') }}"></script>
<script src="{{ url('assets/global/plugins/excanvas.min.js') }}"></script> 
<script src="{{ url('assets/global/plugins/ie8.fix.min.js') }}"></script> 
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="{{ url('assets/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ url('assets/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ url('assets/global/plugins/js.cookie.min.js') }}" type="text/javascript"></script>
<script src="{{ url('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
<script src="{{ url('assets/global/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
<script src="{{ url('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{ url('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>
<script src="{{ url('assets/global/scripts/datatable.js') }}" type="text/javascript"></script>
<script src="{{ url('assets/global/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
<script src="{{ url('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script>
<script src="{{ url('assets/global/plugins/moment.min.js') }}" type="text/javascript"></script>
<script src="{{ url('assets/global/plugins/morris/morris.min.js') }}" type="text/javascript"></script>
<script src="{{ url('assets/global/plugins/morris/raphael-min.js') }}" type="text/javascript"></script>
<script src="{{ url('assets/global/plugins/counterup/jquery.waypoints.min.js') }}" type="text/javascript"></script>
<script src="{{ url('assets/global/plugins/counterup/jquery.counterup.min.js') }}" type="text/javascript"></script>
<script src="{{ url('assets/global/plugins/jquery.sparkline.min.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="{{ url('assets/global/scripts/app.min.js') }}" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ url('assets/pages/scripts/dashboard.min.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="{{ url('assets/layouts/layout/scripts/layout.min.js') }}" type="text/javascript"></script>
<script src="{{ url('assets/layouts/layout/scripts/demo.min.js') }}" type="text/javascript"></script>
<script src="{{ url('assets/layouts/global/scripts/quick-sidebar.min.js') }}" type="text/javascript"></script>
<script src="{{ url('assets/layouts/global/scripts/quick-nav.min.js') }}" type="text/javascript"></script>
<script src="{{ url('assets/global/plugins/jspdf/jspdf.min.js') }}" type="text/javascript"></script>
<script src="{{ url('assets/global/plugins/html2canvas/html2canvas.min.js') }}" type="text/javascript"></script>
<script src="{{ url('assets/global/plugins/html2pdf/html2pdf.min.js') }}" type="text/javascript"></script>
<!-- END THEME LAYOUT SCRIPTS -->
<script>
    $(document).ready(function()
    {
        $('#clickmewow').click(function()
        {
            $('#radio1003').attr('checked', 'checked');
        });
    })
</script>
@yield('scripts')
</body>

</html>