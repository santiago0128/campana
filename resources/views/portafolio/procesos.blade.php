@extends('inicio.index')
@section('contenido')
<div id="app">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-5 col-md-8 col-sm-12" style="padding-left: 50px;">
                <h2>
                    <li class="fa fa-edit"></li>&nbsp;Procesos
                </h2>
            </div>
            <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                <ul class="breadcrumb justify-content-end">
                    <li class="breadcrumb-item"><a href="index.php"><i class="icon-home"></i></a></li>
                    <li class="breadcrumb-item active">Portafolio</li>
                    <li class="breadcrumb-item">Procesos</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card top_report">
            <div class="body">
                <button type="button" data-toggle="modal" data-target="#addProceso" class="btn btn-success">
                    <li class="fa fa-plus"></li> &nbsp; Agregar Proceso
                </button>
                <button type="button" onclick="procesos()" class="btn btn-success">
                    <li class="fa fa-file-excel-o"></li> &nbsp; Agregar Proceso Excel
                </button>
            </div>
        </div>
    </div>

    <div class="block-header">
        <div class="row">
            <div class="col-lg-5 col-md-8 col-sm-12" style="padding-left: 50px;">
                <h2>
                    <li class="fa fa-edit"></li>&nbsp;Asignacion Procesos
                </h2>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card top_report">
            <div class="body">
                <div class="row">
                    <div class="col-sm-12 col-md-8 col-lg-8">
                        <div>
                            <h4>Tabla Procesos</h4>
                        </div>
                        <div class="table-responsive">
                            <div class="table-responsive">
                                <table id="miTabla" class="table">
                                    <thead>
                                        <tr>
                                            <template v-for="item in keys">
                                                <th>@{{item}}</th>
                                            </template>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <template v-for="item in procesos">
                                            <tr>
                                                <template v-for="item2 in keys">
                                                    <td>@{{item[item2]}}</td>
                                                </template>
                                            </tr>
                                        </template>
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
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <div>
                            <h4>Usuario Disponibles</h4>
                        </div>
                        <select name="" id="">
                            <option value="">1</option>
                            <option value="">2</option>
                            <option value="">3</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
<script>
    var app = new Vue({
        el: '#app',
        data: {
            procesos: {},
            keys: {},
            data: {},
            inicio: 0,
            fin: 5,
            cant_pag: 0,
            index: 1,
        },
        mounted() {
            this.getData()
        },
        methods: {
            binding(data) {
                this.data = data
                this.procesos = data.slice(this.inicio, this.fin)
                this.cant_pag = Math.ceil(data.length / this.fin);
            },
            siguiente() {
                this.fin = this.fin + 6
                this.inicio = this.inicio + 6
                this.procesos = this.data.slice(this.inicio, this.fin)
            },
            anterior() {
                this.fin = this.fin - 6
                this.inicio = this.inicio - 6
                this.procesos = this.data.slice(this.inicio, this.fin)
            },
            gopage(page) {
                const itemsPerPage = 5;
                this.inicio = (page - 1) * itemsPerPage;
                this.fin = this.inicio + itemsPerPage;
                this.procesos = this.data.slice(this.inicio, this.fin)
            },

            async getData() {

                // let obligacion = document.getElementById('obligacion').value
                // let estado = document.getElementById('estado').value
                // let identificacion = document.getElementById('identificacion').value
                // let fecha_limite_desde = document.getElementById('fecha_limite_desde').value
                // let fecha_limite_hasta = document.getElementById('fecha_limite_hasta').value

                let json = {
                    'obligacion': '',
                    'estado': '',
                    'identificacion': '',
                    'fecha_limite_desde': '',
                    'fecha_limite_hasta': '',
                }

                const response = await fetch("/filtroProceso", {
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify(json),
                });
                const data = await response.json();
                this.getKey(data);
                console.log(data);
                this.binding(data);
            },
            getKey(data) {

                let llaves = [];
                for (let index = 0; index < data.length; index++) {
                    llaves = Object.keys(data[0]);
                }
                this.keys = llaves;

            },
            async verproceso(id) {
                await fetch("/verProceso", {
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify(id),
                });
                const data = await response.json();

            },

        }
    });
</script>
@endsection