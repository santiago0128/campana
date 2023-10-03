


<body class="theme-blue">
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30"><img src="assets/images/thumbnail.png" width="48" height="48" alt="Mplify"></div>
            <p>Please wait...</p>
        </div>
    </div>
    <div class="overlay" style="display: none;"></div>

    <div id="wrapper">
        <nav class="navbar navbar-fixed-top">
            <div class="container-fluid">

                <div class="navbar-brand">
                    <a href="index.html">
                        <img src="{{ asset('img/user.png')}}" alt="Mplify Logo" class="img-responsive logo">
                        <span class="name">mplify</span>
                    </a>
                </div>

                <div class="navbar-right">
                    <ul class="list-unstyled clearfix mb-0">
                        <li>
                            <div class="navbar-btn btn-toggle-show">
                                <button type="button" class="btn-toggle-offcanvas"><i class="lnr lnr-menu fa fa-bars"></i></button>
                            </div>
                            <a href="javascript:void(0);" class="btn-toggle-fullwidth btn-toggle-hide"><i class="fa fa-bars"></i></a>
                        </li>
                        <li>
                            <form id="navbar-search" class="navbar-form search-form">
                                <input value="" class="form-control" placeholder="Search here..." type="text">
                                <button type="button" class="btn btn-default"><i class="icon-magnifier"></i></button>
                            </form>
                        </li>
                        <li>
                            <div id="navbar-menu">
                                <ul class="nav navbar-nav">
                                    <li class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                                            <img class="rounded-circle" src="{{ asset('img/user.png')}}" width="30" alt="">
                                        </a>
                                        <div class="dropdown-menu animated flipInY user-profile">
                                            <div class="d-flex p-3 align-items-center">
                                                <div class="drop-left m-r-10">
                                                    <img src="assets/images/user-small.png" class="rounded" width="50" alt="">
                                                </div>
                                                <div class="drop-right">
                                                    <h4>Samuel Morriss</h4>
                                                    <p class="user-name">samuelmorris@info.com</p>
                                                </div>
                                            </div>
                                            <div class="m-t-10 p-3 drop-list">
                                                <ul class="list-unstyled">
                                                    <li><a href="page-profile.html"><i class="icon-user"></i>Mi Perfil</a></li>
                                                    <li><a href="app-inbox.html"><i class="icon-envelope-open"></i>Mi Cuenta</a></li>
                                                    <li class="divider"></li>
                                                    <li><a href="javascript:void(0);"><i class="icon-settings"></i>Incio</a></li>
                                                    <li><a href="javascript:void(0);"><i class="icon-settings"></i>Ayuda</a></li>
                                                    <li><a href="javascript:void(0);"><i class="icon-settings"></i>Contacto</a></li>
                                                    <li><a href="javascript:void(0);"><i class="icon-settings"></i>Settings</a></li>
                                                    <li><a href="page-login.html"><i class="icon-power"></i>Cerrar Session</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div id="leftsidebar" class="sidebar">
            <div class="sidebar-scroll">
                <nav id="leftsidebar-nav" class="sidebar-nav">
                    <ul id="main-menu" class="metismenu">
                        <li class="heading">Main</li>
                        <li class="active"><a href="index.php" ><i class="icon-home"></i><span>Inicio</span></a></li>
                        <li class="heading">App</li>

                        <li class="middle">
                            <a href="#uiElements" class="has-arrow"><i class=" icon-briefcase "></i><span>Informacion</span></a>
                            <ul>
                                <li><a type="button" id="btnprocesos">Procesos</a></li>
                                <!-- <li><a type="button" id="btnmovimientos">Movimientos</a></li>
                                <li><a type="button" id="btnnovedades" >Novedades</a></li> -->
                                <li><a type="button" id="btnreportes">Reportes</a></li>
                            </ul>
                        </li>
                        <li class="middle">
                            <a href="#uiElements" class="has-arrow"><i class=" icon-briefcase "></i><span>Gestión</span></a>
                            <ul>
                                <li><a type="button" href="{{url('/gestion?tareas')}}" >Procesos</a></li>
                                <!-- <li><a type="button" id="btncalendario">Calendario</a></li>
                                <li><a href="ui-tabs.html">Flujos de Trabajo</a></li> -->
                            </ul>
                        </li>
                        <li class="middle">
                            <a href="#uiElements" class="has-arrow"><i class=" icon-briefcase "></i><span>Administración</span></a>
                            <ul>
                                <!-- <li><a type="button" id="btnclientes">Clientes</a></li>
                                <li><a type="button" id="btnusuarios">Usuarios</a></li> -->
                                <!-- <li><a type="button" id="btnadmgestion">Gestion</a></li> -->
                                <li><a type="button" href="{{url('/administracion?gestion')}}">Gestion</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>