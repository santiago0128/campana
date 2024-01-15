@extends('inicio.index')
@section('contenido')
<div id="app">
    <div class="block-header">
        <div class="row container">
            <div class="col-lg-5 col-md-8 col-sm-12">
                <h1>
                    <li class="fa fa-home"></li>Inicio
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
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
<!-- Tu código de Vue.js -->
<script>
    // var app = new Vue({
    //     el: '#procesos',
    //     data: {
    //         data: {},
    //     },
    //     mounted() {
    //         this.getData()
    //     },
    //     methods: {
    //         binding(data) {
    //             this.data = data
    //             this.procesos = data.slice(this.inicio, this.fin)
    //             this.cant_pag = Math.ceil(data.length / this.fin);
    //         },
    //         async getData() {

    //             let obligacion = document.getElementById('obligacion').value
    //             let estado = document.getElementById('estado').value
    //             let identificacion = document.getElementById('identificacion').value
    //             let fecha_limite_desde = document.getElementById('fecha_limite_desde').value
    //             let fecha_limite_hasta = document.getElementById('fecha_limite_hasta').value

    //             let json = {
    //                 'obligacion': obligacion,
    //                 'estado': estado,
    //                 'identificacion': identificacion,
    //                 'fecha_limite_desde': fecha_limite_desde,
    //                 'fecha_limite_hasta': fecha_limite_hasta,
    //             }

    //             const response = await fetch("/filtroProceso", {
    //                 method: "POST",
    //                 headers: {
    //                     'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
    //                     "Content-Type": "application/json",
    //                 },
    //                 body: JSON.stringify(json),
    //             });
    //             const data = await response.json();
    //             this.getKey(data);
    //             this.binding(data);
    //         },

    //     }
    // });
</script>
@endsection