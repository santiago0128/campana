@extends('inicio.index')
@section('contenido')
<?php 
use App\Models\ModelUsuario;
$usuario = ModelUsuario::getUsuariosId(session('idUsuario'));
$usuario_email = $usuario[0]->email;
?>
<div id="procesos">
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
                                    <option value="Pendiente">Pendiente</option>
                                    <option value="Abierto">Abiertos</option>
                                    <option value="Cerrado">Cerrados</option>
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
                                <th style="text-align: center;">Estado</th>
                                <th style="text-align: center;">Usuario Asignado</th>
                                <th style="text-align: center;">Accion</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <template v-for="item in procesos">
                                <tr>
                                    <template v-for="item2 in keys" v-if="">
                                        <td>@{{item[item2]}}</td>
                                    </template>
                                    <td><a :href="'/verProceso?id=' + item.id + '&identificacion=' + item.identificacion +'&obligacion='+ item.obligacion" class="btn btn-primary">Ver</a></td>
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
                            <template v-for="(cantidad, index) in cant_pag">
                                <li :class="{ 'page-item active': cantidad == pagina_actual }">
                                    <a class="page-link" @click="gopage(cantidad)">@{{index + 1}}</a>
                                </li>
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
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
<!-- Tu código de Vue.js -->
<script>
    var idUsuario = <?php echo json_encode($usuario_email) ?>


    var app = new Vue({
        el: '#procesos',
        data: {
            procesos: {},
            keys: {},
            data: {},
            inicio: 0,
            fin: 10,
            pagina_actual: 1,
            cant_pag: 0,
            index: 1,
        },
        mounted() {
            this.getData()
        },
        methods: {
            binding(data) {
                this.data = data.procesos
                this.procesos = data.procesos.slice(this.inicio, this.fin)
                this.cant_pag = Math.ceil(data.procesos.length / this.fin);
            },
            siguiente() {
                this.pagina_actual = this.pagina_actual + 1
                this.fin = this.fin + 10
                this.inicio = this.inicio + 10
                this.procesos = this.data.slice(this.inicio, this.fin)
            },
            anterior() {
                this.pagina_actual = this.pagina_actual - 1
                this.fin = this.fin - 10
                this.inicio = this.inicio - 10
                console.log(this.inicio, this.fin);
                this.procesos = this.data.slice(this.inicio, this.fin)
            },
            gopage(page) {
                const itemsPerPage = 10;
                this.pagina_actual = page
                this.inicio = (page - 1) * itemsPerPage;
                this.fin = this.inicio + itemsPerPage;
                this.procesos = this.data.slice(this.inicio, this.fin)
            },

            async getData() {

                let obligacion = document.getElementById('obligacion').value
                let estado = document.getElementById('estado').value
                let identificacion = document.getElementById('identificacion').value
                let fecha_limite_desde = document.getElementById('fecha_limite_desde').value
                let fecha_limite_hasta = document.getElementById('fecha_limite_hasta').value
                let usuario_session = idUsuario;

                let json = {
                    'obligacion': obligacion,
                    'estado': estado,
                    'identificacion': identificacion,
                    'fecha_limite_desde': fecha_limite_desde,
                    'fecha_limite_hasta': fecha_limite_hasta,
                    'usuario': usuario_session,
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
                this.getKey(data.procesos);
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