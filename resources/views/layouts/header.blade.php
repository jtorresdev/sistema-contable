 @section('header')

 <!-- BEGIN HEADER -->
            <div class="page-header navbar navbar-fixed-top">
                <!-- BEGIN HEADER INNER -->
                <div class="page-header-inner ">
                    <!-- BEGIN LOGO -->
                    <div class="page-logo">
                           Contable
                        <div class="menu-toggler sidebar-toggler">
                            <span></span>
                        </div>
                    </div>
                    <!-- END LOGO -->
                    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                    <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                        <span></span>
                    </a>
                    <!-- END RESPONSIVE MENU TOGGLER -->
                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
                            <li class="dropdown dropdown-user">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <i class="fa fa-user"></i>
                                    <span class="username username-hide-on-mobile"> {{ Auth::user()->name }} </span>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                                    <li>
                                        <a href="{{ url('ingresos') }}">
                                            <i class="fa fa-plus"></i> Ingresos </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('egresos') }}">
                                            <i class="fa fa-minus"></i> Egresos </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('objetivos') }}">
                                            <i class="fa fa-bullseye"></i> Objetivos
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('facebook/clientes') }}">
                                            <i class="fa fa-facebook-square"></i> Facebook
                                        </a>
                                    </li>
                                    <li class="divider"> </li>
                                    <li>
                                            <a href="{{ url('logout') }}"><i class="icon-key"></i> Cerrar sesión </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- END USER LOGIN DROPDOWN -->
                        </ul>
                    </div>
                    <!-- END TOP NAVIGATION MENU -->
                </div>
                <!-- END HEADER INNER -->
            </div>
            <!-- END HEADER -->

 @endsection