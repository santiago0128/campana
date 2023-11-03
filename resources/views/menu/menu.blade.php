
<?php 
use App\Models\ModelUsuario;
$usuario = ModelUsuario::getUsuariosId(session('idUsuario'));
?>
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
                        <img src="{{ asset('img/logo.png')}}" alt="Mplify Logo"  class="img-responsive logo">
                        <span class="name" style="padding-left: 25px ;  color: #24c6dc; font-size: 25px;">vexa</span>
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
                                                    <h4><?= $usuario[0]->name ?></h4>
                                                    <p class="user-name"><?= $usuario[0]->email ?></p>
                                                </div>
                                            </div>
                                            <div class="m-t-10 p-3 drop-list">
                                                <ul class="list-unstyled">
                                                    <li><a href="page-login.html"><i class="icon-power"></i>Salir</a></li>
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
                                <li><a type="button" id="btnreportes">Reportes</a></li>
                            </ul>
                        </li>
                        <li class="middle">
                            <a href="#uiElements" class="has-arrow"><i class=" icon-briefcase "></i><span>Gestión</span></a>
                            <ul>
                                <li><a type="button" href="{{url('/gestion?tareas')}}" >Procesos</a></li>
                                <li><a type="button" href="{{url('/gestion?calendario')}}">Agenda</a></li>
                                <!-- <li><a href="ui-tabs.html">Flujos de Trabajo</a></li> -->
                            </ul>
                        </li>
                        <?php if ($usuario[0]->rol == 1){ ?>
                        <li class="middle">
                            <a href="#uiElements" class="has-arrow"><i class=" icon-briefcase "></i><span>Administración</span></a>
                            <ul>
                                <li><a type="button" href="{{url('/administracion?gestion')}}">Gestion</a></li>
                            </ul>
                        </li>
                        <?php } ?>
                    </ul>
                </nav>
            </div>
        </div>