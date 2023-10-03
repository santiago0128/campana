@extends('inicio.index')
@section('contenido')
<div id="main-content">
    <div class="block-header">
        <div class="row container">
            <div class="col-lg-5 col-md-8 col-sm-12">
                <h1>
                    <li class=" fa fa-home"></li>Inicio
                </h1>
            </div>
        </div>
    </div>

    <div class="row clearfix">
        <div class="col-12">
            <div class="card top_report">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <i class="fa fa-2x fa-user text-col-blue"></i>
                                </div>
                                <div class="number float-right text-right">
                                    <h6>Usuarios Activos</h6>
                                    <span class="font700">0</span>
                                </div>
                            </div>
                            <div class="progress progress-xs progress-transparent custom-color-blue mb-0 mt-3">
                                <div class="progress-bar" data-transitiongoal="100"></div>
                            </div>
                            <small class="text-muted">19% compared to last week</small>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <i class="fa fa-2x fa-tasks text-col-green"></i>
                                </div>
                                <div class="number float-right text-right">
                                    <h6>Tareas Pendientes</h6>
                                    <span class="font700">0</span>
                                </div>
                            </div>
                            <div class="progress progress-xs progress-transparent custom-color-green mb-0 mt-3">
                                <div class="progress-bar" data-transitiongoal="28"></div>
                            </div>
                            <small class="text-muted">19% compared to last week</small>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <i class="fa fa-2x fa-users text-col-red"></i>
                                </div>
                                <div class="number float-right text-right">
                                    <h6>Casos Nuevos</h6>
                                    <span class="font700">0</span>
                                </div>
                            </div>
                            <div class="progress progress-xs progress-transparent custom-color-red mb-0 mt-3">
                                <div class="progress-bar" data-transitiongoal="41"></div>
                            </div>
                            <small class="text-muted">19% compared to last week</small>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <i class="fa fa-2x fa fa-edit text-col-yellow"></i>
                                </div>
                                <div class="number float-right text-right">
                                    <h6>Procesos Pendientes</h6>
                                    <span class="font700">0</span>
                                </div>
                            </div>
                            <div class="progress progress-xs progress-transparent custom-color-yellow mb-0 mt-3">
                                <div class="progress-bar" data-transitiongoal="75"></div>
                            </div>
                            <small class="text-muted">19% compared to last week</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- carusel -->
    <div class="col-lg-2 col-md-3 col-sm-6">
        <div id="Summary1" class="carousel slide" data-ride="carousel" data-interval="3200">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="card bg-success text-center">
                        <div class="body">
                            <input type="text" class="knob2" value="82" data-width="69" data-height="69" data-thickness="0.07" data-bgColor="#2e9a4a" data-fgColor="#ffffff" readonly>
                            <h4 class="font-22 text-col-white mt-4">
                                <small class="font-12 d-block mb-1"><i class="fa fa-caret-up"></i> 15%</small>
                                Lead
                                <span class="d-block font-13 mt-1">Last Week</span>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="card bg-warning text-center">
                        <div class="body">
                            <input type="text" class="knob2" value="67" data-width="69" data-height="69" data-thickness="0.07" data-bgColor="#e8a70c" data-fgColor="#ffffff" readonly>
                            <h4 class="font-22 text-col-white mt-4">
                                <small class="font-12 d-block mb-1"><i class="fa fa-caret-up"></i> $95 M</small>
                                Ballance
                                <span class="d-block font-13 mt-1">Last Month</span>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection