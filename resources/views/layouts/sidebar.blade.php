 @section('sidebar')
 <!-- BEGIN CONTAINER -->
            <div class="page-container">
                <!-- BEGIN SIDEBAR -->
                <div class="page-sidebar-wrapper">
                    <!-- BEGIN SIDEBAR -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <div class="page-sidebar navbar-collapse collapse">
                        <!-- BEGIN SIDEBAR MENU -->
                        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                            <li class="sidebar-toggler-wrapper hide">
                                <div class="sidebar-toggler">
                                    <span></span>
                                </div>
                            </li>
                            <!-- END SIDEBAR TOGGLER BUTTON -->
                            <li class="nav-item start {{ (Request::path()=='home' ? 'active' : '') }}">
                                <a href="{{ url('home') }}" class="nav-link nav-toggle">
                                    <i class="icon-home"></i>
                                    <span class="title">Inicio</span>
                                    <span class="selected"></span>
                                </a>
                            </li>
                            <li class="heading">
                                <h3 class="uppercase">Funciones</h3>
                            </li>

                            <li class="nav-item {{ (strpos(Request::path(), 'ingresos')!==false ? 'active' : '') }}">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                        <i class="fa fa-plus"></i>
                                    <span class="title">Ingresos</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item  {{ (Request::path()=='ingresos' ? 'active' : '') }}">
                                        <a href="{{ url('ingresos') }}" class="nav-link ">
                                            <span class="title">Ingresos</span>
                                        </a>
                                    </li>
                                    <li class="nav-item  {{ (Request::path()=='ingresos/recurrentes' ? 'active' : '') }}">
                                        <a href="{{ url('ingresos/recurrentes') }}" class="nav-link ">
                                            <span class="title">Ingresos recurrentes</span>
                                        </a>
                                    </li>
                                    <li class="nav-item  {{ (Request::path()=='ingresos/nuevo' ? 'active' : '') }}">
                                        <a href="{{ url('ingresos/nuevo') }}" class="nav-link ">
                                            <span class="title">Nuevo ingreso</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item  {{ (strpos(Request::path(), 'egresos')!==false ? 'active' : '') }}">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                        <i class="fa fa-minus"></i>
                                    <span class="title">Egresos</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item  {{ (Request::path()=='egresos' ? 'active' : '') }}">
                                        <a href="{{ url('egresos') }}" class="nav-link ">
                                            <span class="title">Egresos</span>
                                        </a>
                                    </li>
                                    <li class="nav-item  {{ (Request::path()=='egresos/recurrentes' ? 'active' : '') }}">
                                        <a href="{{ url('egresos/recurrentes') }}" class="nav-link ">
                                            <span class="title">Egresos recurrentes</span>
                                        </a>
                                    </li>
                                    <li class="nav-item  {{ (Request::path()=='egresos/nuevo' ? 'active' : '') }}">
                                        <a href="{{ url('egresos/nuevo') }}" class="nav-link ">
                                            <span class="title">Nuevo egreso</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                                  <li class="nav-item  {{ (strpos(Request::path(), 'objetivos')!==false ? 'active' : '') }}">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                        <i class="fa fa-bullseye"></i>
                                    <span class="title">Objetivos</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item  {{ (Request::path()=='objetivos' ? 'active' : '') }}">
                                        <a href="{{ url('objetivos') }}" class="nav-link ">
                                            <span class="title">Objetivos</span>
                                        </a>
                                    </li>
                                    <li class="nav-item  {{ (Request::path()=='objetivos/nuevo' ? 'active' : '') }}">
                                        <a href="{{ url('objetivos/nuevo') }}" class="nav-link ">
                                            <span class="title">Nuevo objetivo</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                             <li class="nav-item  {{ (strpos(Request::path(), 'facebook')!==false ? 'active' : '') }}">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="fa fa-facebook-square"></i>
                                    <span class="title">Facebook</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item  {{ (Request::path()=='facebook/clientes' ? 'active' : '') }}">
                                        <a href="{{ url('facebook/clientes') }}" class="nav-link ">
                                            <span class="title">Clientes</span>
                                        </a>
                                    </li>
                                     <li class="nav-item  {{ (Request::path()=='facebook/clientes/agregar' ? 'active' : '') }}">
                                        <a href="{{ url('facebook/clientes/agregar') }}" class="nav-link ">
                                            <span class="title">Agregar cliente</span>
                                        </a>
                                    </li>
                                    <li class="nav-item  {{ (Request::path()=='facebook/agregar' ? 'active' : '') }}">
                                        <a href="{{ url('facebook/agregar') }}" class="nav-link ">
                                            <span class="title">Agregar publicación</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                  
                        </ul>
                        <!-- END SIDEBAR MENU -->
                        <!-- END SIDEBAR MENU -->
                    </div>
                    <!-- END SIDEBAR -->
                </div>
                <!-- END SIDEBAR -->
@endsection