@extends('inicio.index')
@section('contenido')
<link href="https://cdn.jsdelivr.net/npm/choices.js@10.2.0/public/assets/styles/choices.min.css" rel="stylesheet">

<div id="app">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-5 col-md-8 col-sm-12" style="padding-left: 50px;">
                <h2>
                    <i class='bx bx-bar-chart-alt-2'></i>&nbsp;Reportes
                </h2>
            </div>
            <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                <ul class="breadcrumb justify-content-end">
                    <li class="breadcrumb-item"><a href="index.php"><i class="icon-home"></i></a></li>
                    <li class="breadcrumb-item active">Reportes</li>
                    <li class="breadcrumb-item">Inicio</li>
                </ul>
            </div>
        </div>
    </div>

    <div class=" top_report">
        <div class="body">
            <div class="row">
                <template v-for=" item in data">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-lg-3 card" style="width: 320px;" @click="asignar_reporte(item.nombre_reporte)" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <div class="body">
                            <div class="clearfix row">
                                <div class="float-left col-2" style="display: flex;">
                                    <i class="fa fa-2x fa-bar-chart" style="color: #1a4d3e;"></i>
                                </div>
                                <div class="number float-right text-right col-6">
                                    <h6>@{{item.nombre_reporte}}</h6>
                                </div>
                            </div>
                            <div class="progress progress-xs progress-transparent mb-0 mt-3" style="background-color: #1a4d3e;">
                                <div class="progress-bar" data-transitiongoal="100"></div>
                            </div>
                        </div>
                    </div>
                    &nbsp;
                    &nbsp;
                </template>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Fechas Reporte</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="">Fecha Inicio</label>
                    <input type="date" class="form-control" v-model="fecha_inicio">
                    <label for="">Fecha Final</label>
                    <input type="date" class="form-control" v-model="fecha_fin">
                </div>
                <div class="modal-footer">
                    <button type="button" @click="mountedReport(report)" class="btn btn-primary">Descargar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/choices.js@10.2.0/public/assets/scripts/choices.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
<script>
    var app = new Vue({
        el: '#app',
        data: {
            procesos: {},
            nombre_report: {},
            keys: {},
            data: {},
            inicio: 0,
            fecha_inicio: '',
            fecha_fin: '',
            report : '',

        },
        mounted() {
            this.getData()
        },
        methods: {
            binding(data) {
                this.data = data.reportes
            },
            async getData() {
                const response = await fetch("/getReportes");
                const data = await response.json();
                this.binding(data);
            },
            async asignar_reporte(report){
                this.report = report
            },
            async mountedReport(nombre_reporte) {

                json = {
                    'fecha_inicio': this.fecha_inicio,
                    'fecha_fin': this.fecha_fin,
                    'tipo_reporte': nombre_reporte
                }

                const response = await fetch("/mountedReport",{
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify(json)
                });
                const data = await response.json();            
            }
        }
    });
</script>
@endsection