@extends('inicio.index')
@section('contenido')
<div id="app">
    <div id="main-content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-5 col-md-8 col-sm-12" style="padding-left: 50px;">
                    <h2>
                        <li class=" fa fa-tasks"></li>&nbsp;Procesos
                    </h2>
                </div>
                <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                    <ul class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item"><a href="index.php"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active">Gestion</li>
                        <li class="breadcrumb-item">Procesos</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="header">
                    <div class="col-lg-5 col-md-8 col-sm-12" style="padding-left: 10px;">
                        <h4>
                            <li class=" fa fa-retweet"></li>&nbsp;Filtros
                        </h4>
                    </div>
                </div>
                <div class="body">
                    <form method="POST" id="form_buscar_procesos">
                        <div class="row">
                            <div class="col">
                                <div class="col-3 col-sm-3 col-md-12 col-lg-12">
                                    <label for="">Nombre</label>
                                    <input type="text" class="form-control" name="nombre" id="nombre">
                                </div>
                                &nbsp;
                                <div class="col-3 col-sm-3 col-md-12 col-lg-12">
                                    <label for="">Estado</label>
                                    <select name="estado" id="estado" class="form-control">
                                        <option value="0">Ninguno</option>
                                        <option value="1">Activo</option>
                                        <option value="2">Inactivo</option>
                                    </select>
                                </div>
                                &nbsp;

                            </div>
                            <div class="col">
                                <div class="col-3 col-sm-3 col-md-12 col-lg-12">
                                    <label for="">Identificacion</label>
                                    <input type="number" class="form-control" name="identificacion" id="identificacion">
                                </div>
                                &nbsp;
                                <div class="col-3 col-sm-3 col-md-12 col-lg-12">
                                    <label for="">Fecha Ingreso</label>
                                    <div class="row">
                                        <div class="col">
                                            <input type="date" class="form-control" name="fecha_limite_desde" id="fecha_limite_desde">
                                        </div>
                                        <div class="col">
                                            <input type="date" class="form-control" name="fecha_limite_hasta" id="fecha_limite_hasta">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" d-flex justify-content-end" style="padding-right: 22px;">
                            <div class="row">
                                <button class="btn btn-primary" v-on:click="getData()" type="button"> Buscar</button>
                                &nbsp;
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="body">
                    <div class="table-responsive">
                        <table id="table_procesos" class="table">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">Id Proceso</th>
                                    <th style="text-align: center;">Identificacion Demandado</th>
                                    <th style="text-align: center;">Nombre Demandado</th>
                                    <th style="text-align: center;">Nombre Demandante</th>
                                    <th style="text-align: center;">Ciudad</th>
                                    <th style="text-align: center;">Estado Cartera</th>
                                    <th style="text-align: center;">Abogado Externo</th>
                                    <th style="text-align: center;">Casa Cobranza</th>
                                    <th style="text-align: center;">Estado</th>
                                    <th style="text-align: center;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>

<!-- Tu código de Vue.js -->
<script>
    var app = new Vue({
        el: '#app',
        data: {
            accion: {},
            accion_admin: {},
            actividad: {},
            etapa: {},
        },
        mounted() {
            this.getData()
        },
        methods: {
            binding(data) {
                this.accion = data.accion
                this.accion_admin = data.accion_admin
                this.actividad = data.actividad

            },
            async getData() {
                const response = await fetch("/getAdminGestion");
                const data = await response.json();
                this.binding(data);
            },
            async deshabilitaretapa(id) {
                const response = await fetch("/deshabilitar", {
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify(id),
                });
                console.log(response);
                const data = await response.json();
                this.binding(data);
            },

        }
    });
</script>
@endsection