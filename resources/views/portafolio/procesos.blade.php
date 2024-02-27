@extends('inicio.index')
@section('contenido')
<link href="https://cdn.jsdelivr.net/npm/choices.js@10.2.0/public/assets/styles/choices.min.css" rel="stylesheet">

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
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
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
                            <div class="col-4">
                                <span>Cantidad de Paginas: @{{cant_pag}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <div>
                            <h4>Filtros</h4>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <select id="SelectFiltro" @change="AgregarFiltros($event)" multiple>
                                    <template v-for="item in keys">
                                        <option>@{{item}}</option>
                                    </template>
                                </select>
                            </div>
                            <div class="col-4">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Aplicar Filtros</button>
                            </div>
                        </div>
                        &nbsp;
                        <div>
                            <h4>Usuario Disponibles</h4>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <select id="SelectUsuario" @change="AplicarUsuarios($event)" multiple>
                                    <option v-for="item in usuarios">@{{item.email}}</option>
                                </select>
                            </div>
                            <div class="col-4">
                                <button type="button" class="btn btn-primary" @click="AgregarUsuario()">Aplicar Usuario</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Aplicar Filtros</h5>
                    <button type="button" style="border-color: #fff;" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="color: #000;">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div style="padding: 20px;" v-if="campos_db_filtro == ''">
                        <span>No hay filtros Aplicados</span><br>
                    </div>
                    <template style="padding: 10px;" v-for="(campos_db_filtro, index) in campos_db_filtro">
                        <label :for="campos_db_filtro">@{{ campos_db_filtro }}</label>
                        <select class="form-control" @change="mandarFiltros($event,campos_db_filtro )" id="select_campos">
                            <option>Selecione</option>
                            <template v-for="(item, index2) in campos_distinct">
                                <option v-if="item2[campos_db_filtro] != null" v-for="item2 in item">@{{item2[campos_db_filtro]}}</option>
                            </template>
                        </select>
                    </template>
                    <div v-if="campos_db_filtro != ''" style="padding-top: 10px;">
                        <button type="button" class="btn btn-success" @click="AplicarFiltros()">Aplicar Filtros</button>
                    </div>
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
            keys: {},
            data: {},
            inicio: 0,
            fin: 10,
            cant_pag: 0,
            pag: 0,
            pagina_actual: 1,
            campos_db_filtro: [],
            filtro_campos: {},
            campos_distinct: {},
            usuarios: {},
            select: {},
            usuarios_filtro: {},
            filtros_tabla: [],
        },
        mounted() {
            this.getData()
            this.filtros_asignacion()
        },
        methods: {
            binding(data) {
                this.data = data.procesos
                this.usuarios = data.usuario
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
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify(id),
                });
                const data = await response.json();

            },
            filtros_asignacion() {
                setTimeout(function() {
                    var miSelect = new Choices('#SelectFiltro', {
                        removeItemButton: true,
                    })
                    var miSelect2 = new Choices('#SelectUsuario', {
                        removeItemButton: true,
                    })
                }, 500);
            },
            async AgregarFiltros(event) {
                this.campos_db_filtro = []
                this.filtros_tabla = []
                Array.from(event.target.children).forEach(element => {
                    const value = element.value;
                    const index = this.campos_db_filtro.indexOf(value);
                    if (index !== -1) {
                        this.campos_db_filtro[index] = value;
                    } else {
                        this.campos_db_filtro.push(value);
                    }
                });

                response = await fetch("/getCamposFiltro", {
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify(this.campos_db_filtro),
                });
                const data = await response.json();
                this.campos_distinct = data.campo
            },
            async mandarFiltros(event, tabla) {

                valor = event.target.value
                validation = 'false'
                if (this.campos_db_filtro.includes(tabla)) {
                    validation = 'true'
                }
                if (validation == 'true') {
                    nuevoObjeto = {
                        value: valor,
                        tabla: tabla
                    }
                    let objetoExistente = this.filtros_tabla.find(obj => obj.tabla === tabla);
                    if (objetoExistente) {
                        Object.assign(objetoExistente, nuevoObjeto);
                    } else {
                        this.filtros_tabla.push(nuevoObjeto);
                    }
                }
            },
            async AplicarFiltros() {
                response = await fetch("/aplicarFiltro", {
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify(this.filtros_tabla),
                });
                const data = await response.json();
                this.binding(data)
            },
            async AplicarUsuarios(event) {
                this.usuarios_filtro = [];
                Array.from(event.target.children).forEach(element => {
                    const value = element.value;
                    const index = this.usuarios_filtro.indexOf(value);
                    if (index !== -1) {
                        this.usuarios_filtro[index] = value;
                    } else {
                        this.usuarios_filtro.push(value);
                    }
                });
            },
            async AgregarUsuario() {

                if (this.usuarios_filtro.length > this.data.length) {
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Cantidad de casos tiene que ser igual o mayor a la cantidad de usuario seleccionados",
                    });
                    return;
                }
                response = await fetch("/agregarUsuariosProcesos", {
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify({
                        'usuario': this.usuarios_filtro,
                        'procesos': this.data,
                    }),
                });
                if (response.status == 200) {
                    Swal.fire({
                        icon: "success",
                        title: "Bien hecho!!",
                        text: "Los usuarios se asignaron de manera correcta!",
                    });
                } else {
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Algo salio mal!",
                    });
                }
            }
        }
    });
</script>
@endsection