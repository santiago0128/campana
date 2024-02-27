@extends('inicio.index')
@section('contenido')
<style>

    :root {
        --blue: #007bff;
        --indigo: #6610f2;
        --purple: #6f42c1;
        --pink: #e83e8c;
        --red: #dc3545;
        --orange: #fd7e14;
        --yellow: #ffc107;
        --green: #28a745;

        --font-family-sans-serif: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        --font-family-monospace: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
    }

    .heading-section {
        font-size: 28px;
        color: #000;
    }
    .table {
        width: 100%;
        -webkit-box-shadow: 0px 5px 12px -12px rgba(0, 0, 0, 0.29);
        -moz-box-shadow: 0px 5px 12px -12px rgba(0, 0, 0, 0.29);
        box-shadow: 0px 5px 12px -12px rgba(0, 0, 0, 0.29);
    }

    .table thead th {
        border: none;
        padding: 30px;
        font-size: 13px;
        font-weight: 500;
        color: gray;
    }

    .table thead tr {
        background: #fff;
        border-bottom: 4px solid #eceffa;
    }

    .table tbody tr {
        margin-bottom: 10px;
        border-bottom: 4px solid #f8f9fd;
    }

    .table tbody tr:last-child {
        border-bottom: 0;
    }

    .table tbody th,
    .table tbody td {
        border: none;
        padding: 5x;
        font-size: 14px;
        background: #fff;
        vertical-align: middle;
    }

    .table tbody td.status span {
        position: relative;
        border-radius: 30px;
        padding: 4px 10px 4px 25px;
    }

    .table tbody td.status span:after {
        position: absolute;
        top: 9px;
        left: 10px;
        width: 10px;
        height: 10px;
        content: '';
        border-radius: 50%;
    }

    .table tbody td.status .active_table {
        background: #cff6dd;
        color: #1fa750;
    }

    .table tbody td.status .active_table:after {
        background: #23bd5a;
    }

    .table tbody td.status .waiting {
        background: #fdf5dd;
        color: #cfa00c;
    }

    .table tbody td.status .waiting:after {
        background: #f2be1d;
    }

    .table tbody td .img {
        width: 50px;
        height: 50px;
        border-radius: 50%;
    }

    .table tbody td .email span {
        display: block;
    }

    .table tbody td .email span:last-child {
        font-size: 12px;
        color: rgba(0, 0, 0, 0.3);
    }

    .table tbody td .close span {
        font-size: 12px;
        color: #dc3545;
    }
</style>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
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
                                    <span class="font700">@{{UsuarioActivos.length}}</span>
                                </div>
                            </div>
                            <div class="progress progress-xs progress-transparent custom-color-blue mb-0 mt-3">
                                <div class="progress-bar" data-transitiongoal="100"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <i class="fa fa-2x fa-tasks text-col-yellow"></i>
                                </div>
                                <div class="number float-right text-right">
                                    <h6>Procesos Pendientes</h6>
                                    <span class="font700">@{{obligaciones_pendientes.length}}</span>
                                </div>
                            </div>
                            <div class="progress progress-xs progress-transparent custom-color-yellow mb-0 mt-3">
                                <div class="progress-bar" data-transitiongoal="28"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <i class="fa fa-2x fa-users text-col-green"></i>
                                </div>
                                <div class="number float-right text-right">
                                    <h6>Procesos Abiertos</h6>
                                    <span class="font700">@{{obligaciones_abierto.length}}</span>
                                </div>
                            </div>
                            <div class="progress progress-xs progress-transparent custom-color-green mb-0 mt-3">
                                <div class="progress-bar" data-transitiongoal="41"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <i class="fa fa-2x fa fa-edit text-col-red"></i>
                                </div>
                                <div class="number float-right text-right">
                                    <h6>Procesos Cerrados</h6>
                                    <span class="font700">@{{obligaciones_cerrado.length}}</span>
                                </div>
                            </div>
                            <div class="progress progress-xs progress-transparent custom-color-red mb-0 mt-3">
                                <div class="progress-bar" data-transitiongoal="75"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-12">
            <div class="card top_report">
                <div class="row">
                    <div class="col-6 col-sm-6 col-md-6 col-lg-8">
                        <div class="container" style="padding-top: 10px; text-align: center;">
                            <h3>Usuario Activos Campaña</h3>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">ID</th>
                                    <th style="text-align: center;">Email</th>
                                    <th style="text-align: center;">Usuario</th>
                                    <th style="text-align: center;">Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(user, index) in UsuarioActivos" class="alert_2" role="alert">
                                    <td style="text-align: center;">@{{index+1}}</td>
                                    <td style="text-align: center;" class=" align-items-center">
                                        <div class="pl-3 email">
                                            <span>@{{user.email}}</span>
                                            <span style="color: gray;">Ingreso Campaña: @{{user.fecha_ingreso_campana}}</span>
                                        </div>
                                    </td>
                                    <td style="text-align: center;">@{{user.name}}</td>
                                    <td style="text-align: center;"class="status">
                                        <span class="active_table">Activo</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" @click="anterior()" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <template v-for="cantidad in cant_pag">
                                    <li class="page-item"><a class="page-link" @click="gopage(cantidad)">@{{cantidad}}</a></li>
                                </template>
                                <li class="page-item">
                                    <a class="page-link" @click="siguiente()" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-6 col-sm-12 col-md-6 col-lg-4">
                        <div class="col-12">
                            <div id="chart2"></div>
                        </div>
                        <div class="col-12">
                            <div id="chart"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
<script>
    let idcampana = <?php echo env('IDCAMPANA') ?>

    var app = new Vue({
        el: '#app',
        data: {
            data: {},
            inicio: 0,
            fin: 5,
            cant_pag: 0,
            UsuarioActivos: [],
            UsuarioTabla: [],
            obligaciones_pendientes: [],
            obligaciones_abierto: [],
            obligaciones_cerrado: [],
        },
        mounted() {
            this.getData()
        },
        methods: {
            binding(data) {
                this.data = data
            },
            async getData() {
                const response = await fetch("/getDataIndex");
                const data = await response.json();
                this.binding(data)
                this.getUsuarioActivos(data.usuarios)
                this.getobligaciones(data.obligaciones)
                this.getGrafica(data)
            },
            async getUsuarioActivos(data) {
                data.forEach(element => {
                    if (element.campana_activa != null) {
                        this.UsuarioActivos.push(element)
                    }
                });
                this.cant_pag = Math.ceil(this.UsuarioActivos.length / this.fin);
                this.UsuarioTabla = this.UsuarioActivos.slice(this.inicio, this.fin)
            },
            async getobligaciones(data) {
                data.forEach(element => {
                    if (element.estado == 'Pendiente') {
                        this.obligaciones_pendientes.push(element)
                    }
                    if (element.estado == 'Abierto') {
                        this.obligaciones_abierto.push(element)
                    }
                    if (element.estado == 'Cerrado') {
                        this.obligaciones_cerrado.push(element)
                    }
                });
            },
            async getGrafica() {
                options = {
                    chart: {
                        type: 'bar'
                    },
                    series: [{
                        data: [{
                            x: 'category A',
                            y: 10
                        }, {
                            x: 'category B',
                            y: 18
                        }, {
                            x: 'category C',
                            y: 13
                        }]
                    }]
                }
                var chart = new ApexCharts(document.querySelector("#chart"), options);
                chart.render();
                var options2 = {
                    chart: {
                        type: 'donut'
                    },
                    series: [this.obligaciones_pendientes.length, this.obligaciones_abierto.length, this.obligaciones_cerrado.length],
                    labels: ['Pendientes', 'Abierto', 'Cerrado']
                }
                var chart = new ApexCharts(document.querySelector("#chart2"), options2);
                chart.render();
            },
            siguiente() {
                this.fin = this.fin + 6
                this.inicio = this.inicio + 6
                this.UsuarioTabla = this.UsuarioActivos.slice(this.inicio, this.fin)
            },
            anterior() {
                this.fin = this.fin - 6
                this.inicio = this.inicio - 6
                this.UsuarioTabla = this.UsuarioActivos.slice(this.inicio, this.fin)
            },
            gopage(page) {
                const itemsPerPage = 5;
                this.inicio = (page - 1) * itemsPerPage;
                this.fin = this.inicio + itemsPerPage;
                this.UsuarioTabla = this.UsuarioActivos.slice(this.inicio, this.fin)
            },

        }
    });
</script>
@endsection