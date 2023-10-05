@extends('inicio.index')
@section('contenido')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
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
                    <form id="form_buscar_procesos">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="col-3 col-sm-3 col-md-12 col-lg-12">
                                    <label for="">Obligacion</label>
                                    <input type="text" class="form-control" name="obligacion" id="obligacion">
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
                        <table id="miTabla" class="table">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">id</th>
                                    @foreach ($schema as $schema)
                                    <th style="text-align: center;">{{$schema->nombre}}</th>
                                    @endforeach
                                    <th style="text-align: center;">Accion</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <template v-for="item in procesos">
                                    <tr>
                                        <template v-for="item2 in keys">
                                            <td>@{{item[item2]}}</td>
                                        </template>
                                        <td><a :href="'/verProceso?id=' + item.id"  class="btn btn-primary">Ver</a></td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<!-- Tu código de Vue.js -->
<script>
    $(document).ready(function() {
        $('#miTabla').DataTable({
            "info": false,
            "lengthChange": false,
        });
    });
    var app = new Vue({
        el: '#app',
        data: {
            procesos: {},
            keys: {},
        },
        mounted() {
            this.getData()
        
        },
        methods: {
            binding(data) {
                this.procesos = data
            },
            async getData() {

                let obligacion = document.getElementById('obligacion').value
                let estado = document.getElementById('estado').value
                let identificacion = document.getElementById('identificacion').value
                let fecha_limite_desde = document.getElementById('fecha_limite_desde').value
                let fecha_limite_hasta = document.getElementById('fecha_limite_hasta').value

                let json = {
                    'obligacion': obligacion,
                    'estado': estado,
                    'identificacion': identificacion,
                    'fecha_limite_desde': fecha_limite_desde,
                    'fecha_limite_hasta': fecha_limite_hasta,
                }

                const response = await fetch("/filtroProceso", {
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify(json),
                });
                const data = await response.json();
                this.getKey(data);
                this.binding(data);
            },
            getKey(data) {

                let llaves = [];
                for (let index = 0; index < data.length; index++) {
                    llaves = Object.keys(data[0]);
                }
                this.keys = llaves;

            },
            async verproceso(id){
                await fetch("/verProceso", {
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
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