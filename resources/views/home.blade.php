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
        <h1 class="page-title"></h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 green-jungle" href="#">
                <div class="visual">
                    <i class="fa fa-line-chart"></i>
                </div>
                <div class="details">

                    <div class="number">
                        Bs. <span data-counter="counterup" data-value="{{ $ingresos_mes }}">{{ $ingresos_mes }}</span>
                    </div>
                    <div class="desc"> Ingresos <span class="small">({{ date('M') }})</span> </div>

                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 red-haze" href="#">
                <div class="visual">
                    <i class="fa fa-bar-chart"></i>
                </div>
                <div class="details">
                    <div class="number">
                        Bs. <span data-counter="counterup" data-value="{{ $egresos_mes }}">{{ $egresos_mes }}</span>
                    </div>
                    <div class="desc"> Egresos <span class="small">({{ date('M') }})</span> </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 green-meadow" href="#">
                <div class="visual">
                    <i class="fa fa-line-chart"></i>
                </div>
                <div class="details">
                    <div class="number">
                        Bs.  <span data-counter="counterup" data-value="{{ $ingresos_hoy }}">{{ $ingresos_hoy }}</span>
                    </div>
                    <div class="desc">Ingresos <span class="small">(Hoy)</span> </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 red-intense" href="#">
                <div class="visual">
                    <i class="fa fa-bar-chart"></i>
                </div>
                <div class="details">
                    <div class="number">
                        Bs. <span data-counter="counterup" data-value="{{ $egresos_hoy }}">{{ $egresos_hoy }}</span>
                    </div>
                    <div class="desc">Egresos <span class="small">(Hoy)</span> </div>
                </div>
            </a>
        </div>


        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
                <div class="visual">
                    <i class="fa fa-dollar"></i>
                </div>
                <div class="details">
                    <div class="number">
                        Bs. <span data-counter="counterup" data-value="{{ $monto_total }}">{{ $monto_total }}</span>
                    </div>
                    <div class="desc">Saldo <span class="small">(total)</span> </div>
                </div>
            </a>
        </div>

        <div class="col-lg-9 col-md-9 col-sm-6 col-xs-12">
            <table class="table table-striped table-bordered table-advance table-hover">
                <thead>
                    <th> Concepto </th>
                    <th> Monto </th>
                    <th> Fecha </th>
                    <th> Recurrente </th>
                    <th> Efectivo </th>
                    <th> Acciones </th>
                </thead>
                <tbody>
                    @foreach($todo as $t)
                    <tr class="odd gradeX">
                        <td class="center highlight">
                           @if($t['tipo'] == 1)
                           <div class="danger"> </div>   
                           @elseif($t['tipo'] == 3)
                           <div class="warning"> </div>  
                           @else
                           <div class="success"> </div>  
                           @endif
                           &nbsp;&nbsp; {{ $t['concepto'] }}
                       </td>
                       <td class="center">
                        Bs. {{ $t['monto'] }}
                    </td>
                    <td class="center"> 
                        {{ $t['dia'] }}-{{ $t['mes'] }}-{{ $t['anio'] }}
                    </td>
                    <td class="center">
                        @if($t['recurrente'] == 1)
                        <span class="font-green-jungle">Recurrente</span>
                        @else
                        <span class="font-red-intense">No recurrente</span>
                        @endif
                    </td>
                    <td class="center">
                        @if($t['efectivo'] == 1)
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
                                    <a href="@if($t['tipo'] == 2) {{ url('ingresos/editar/'. $t['id'] .'') }} @else {{ url('egresos/editar/'. $t['id'] .'') }} @endif">
                                        <i class="fa fa-edit"></i> Editar </a>
                                    </li>
                                    <li>
                                        <a href="@if($t['tipo'] == 2) {{ url('ingresos/eliminar/'. $t['id'] .'') }} @else {{ url('egresos/eliminar/'. $t['id'] .'') }} @endif">
                                            <i class="fa fa-trash"></i> Eliminar </a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="portlet light bordered" style="margin-bottom:5px ">
                    <div class="portlet-body row">
                        <div class="col-md-4">
                            <div style="background: #ed6b75;width: 2px;height: 20px;float: left;"> </div>&nbsp;&nbsp; Egreso
                        </div>
                        <div class="col-md-4">
                            <div style="background: #f1c40f;width: 2px;height: 20px;float: left;"> </div>&nbsp;&nbsp; Egreso para objetivo
                        </div>
                        <div class="col-md-4">
                            <div style="background: #36c6d3;width: 2px;height: 20px;float: left;"> </div>&nbsp;&nbsp; Ingreso
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
    </br>
</br>
</br>
</div>

<!-- END CONTAINER -->
@endsection