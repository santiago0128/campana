@extends('inicio.index')
@section('contenido')
<div id="app">
    <div id="main-content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-5 col-md-8 col-sm-12" style="padding-left: 50px;">
                    <h1>
                        <li class=" fa fa-users"></li>&nbsp;Administracion
                    </h1>
                </div>
                <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                    <ul class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item"><a href="index.php"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active">Administracion</li>
                        <li class="breadcrumb-item">Usuarios</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="body">

                    <div class="body">
                        <button type="button" data-toggle="modal" data-target="#modulos" id="addusuarios" class="btn btn-success">
                            &nbsp; Modulos Gestion
                        </button>
                        <br>
                        <br>
                        <ul class="nav nav-tabs" id="modulos_activos">
                            <template v-for="item in modulos_activos">
                                <li class="nav-item"><a class="nav-link " data-toggle="tab" :href="'#'+item.href">@{{item.modulo}}</a></li>
                            </template>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane show active" id="etapas">
                                <div class="">
                                    <div class="card">

                                        <button type="button" data-toggle="modal" data-target="#addEtapa" id="addusuarios" class="btn btn-success">
                                            <li class="fa fa-plus"></li> &nbsp; Agregar Etapa
                                        </button>
                                        <button type="button" data-toggle="modal" data-target="#editEtapa" id="addusuarios" class="btn btn-primary">
                                            <li class="fa fa-pencil-square-o"></li> &nbsp; Editar Etapa
                                        </button>
                                    </div>
                                </div>

                                <table class="table" id="table_admin_etapas">
                                    <thead>
                                        <th class="">Nombre</th>
                                        <th class="">Estado</th>
                                        <th class="">Accion</th>
                                    </thead>
                                    <tbody>
                                        <template v-for="item in etapa">
                                            <tr>
                                                <td>@{{item.nombre}}</td>
                                                <td>
                                                    <div class="circle" v-if="item.idestatus == 1 " style="background-color: #28a745;"></div>
                                                    <div class="circle" v-else style="background-color: #dc3545;"></div>
                                                </td>
                                                <td id="boton_estado">
                                                    <button v-if="item.idestatus == 1 " type='button' class='btn btn-danger' v-on:click='deshabilitaretapa(item.id)'>Deshabilitar</button>
                                                    <button v-else type='button' class='btn btn-success' v-on:click='habilitaretapa(item.id)'>Habilitar</button>
                                                </td>
                                            </tr>
                                        </template>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane" id="acciones">
                                <div class="">
                                    <div class="card ">
                                        <button type="button" data-toggle="modal" data-target="#addAccion" id="addusuarios" class="btn btn-success">
                                            <li class="fa fa-plus"></li> &nbsp; Agregar Accion
                                        </button>
                                        <button type="button" data-toggle="modal" data-target="#editAccion" id="addusuarios" class="btn btn-primary">
                                            <li class="fa fa-pencil-square-o"></li> &nbsp; Editar Accion
                                        </button>
                                    </div>
                                </div>

                                <table class="table" id="table_admin_accion">
                                    <thead>
                                        <th class="">Nombre</th>
                                        <th class="">Estado</th>
                                        <th class="">Accion</th>
                                    </thead>
                                    <tbody>
                                        <template v-for="item in accion_admin">
                                            <tr>
                                                <td class="">@{{item.nombre}}</td>
                                                <td class="" id="color_estado">
                                                    <div class="circle" v-if="item.idestatus == 1 " style="background-color: #28a745;"></div>
                                                    <div class="circle" v-else style="background-color: #dc3545;"></div>
                                                </td>
                                                <td class="" id="boton_estado">
                                                    <button v-if="item.idestatus == 1 " type='button' class='btn btn-danger' v-on:click='deshabilitaraccion(item.id)'>Deshabilitar</button>
                                                    <button v-else type='button' class='btn btn-success' v-on:click='habilitaraccion(item.id)'>Habilitar</button>
                                                </td>
                                            </tr>
                                        </template>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane" id="perfil">
                                <div class="">
                                    <div class="card ">
                                        <button type="button" data-toggle="modal" data-target="#addPerfil" id="addusuarios" class="btn btn-success">
                                            <li class="fa fa-plus"></li> &nbsp; Agregar Perfil
                                        </button>
                                        <button type="button" data-toggle="modal" data-target="#editPerfil" id="addusuarios" class="btn btn-primary">
                                            <li class="fa fa-pencil-square-o"></li> &nbsp; Editar Perfil
                                        </button>
                                    </div>
                                </div>
                                <table class="table" id="table_admin_perfil">
                                    <thead>
                                        <th class="">Nombre</th>
                                        <th class="">Estado</th>
                                        <th class="">Accion</th>
                                    </thead>
                                    <tbody>
                                        <template v-for="item in perfil_admin">
                                            <tr>
                                                <td class="">@{{item.nombre}}</td>
                                                <td class="" id="color_estado">
                                                    <div class="circle" v-if="item.idestatus == 1 " style="background-color: #28a745;"></div>
                                                    <div class="circle" v-else style="background-color: #dc3545;"></div>
                                                </td>
                                                <td v-if="item.id != 43" class="" id="boton_estado">
                                                    <button v-if="item.idestatus == 1 " type='button' class='btn btn-danger' v-on:click='deshabilitarperfil(item.id)'>Deshabilitar</button>
                                                    <button v-else type='button' class='btn btn-success' v-on:click='habilitarperfil(item.id)'>Habilitar</button>
                                                </td>
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
        <div class="modal fade" id="addEtapa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="modal-header">
                                        <h2>Agregar Etapa</h2>
                                    </div>
                                    <div class="body" style="width: 100%;">
                                        <form id="form_etapas" enctype="multipart/form-data" method="post">
                                            @csrf
                                            <div class="col-4 col-sm-4 col-md-4 col-md-12 col-lg-12" style="padding-top: 5px;">
                                                <label for="">Nombre </label>
                                                <input type="text" class="form-control" name="nombre_etapa" id="nombre_etapa">
                                            </div>
                                            &nbsp;
                                            <div class="col-4 col-sm-4 col-md-4 col-md-12 col-lg-12" style="padding-top: 5px;">
                                                <button type="button" id="btnGuardarUsuario" v-on:click="guardarEtapa()" class="btn btn-success">Guardar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="editEtapa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="modal-header">
                                        <h2>Editar Etapa</h2>
                                    </div>
                                    <div class="body" style="width: 100%;">
                                        <form method="POST" id="form_edit_etapas">
                                            <table class="table" id="table_edit_etapas">
                                                <thead>
                                                    <th class="text-center">Nombre</th>
                                                    <th class="text-center">Orden</th>
                                                    <th class="text-center">Color</th>
                                                    <th class="text-center">Accion</th>
                                                </thead>
                                                <tbody>
                                                    <template v-for="item in etapa">
                                                        <tr>
                                                            <td class="text-center">@{{item.nombre}}</td>
                                                            <td class="text-center"><input type="number" v-model="item.orden" name="orden[]" id="orden[]" class="form-control"></td>
                                                            <td class="text-center"><input type="color" name="color[]" id="color" v-model="item.bg" class="form-control"></td>
                                                            <td class="text-center">
                                                                <button type='button' v-on:click='eliminar_etapa(item.id)' class='btn btn-danger'>Eliminar</button>
                                                            </td>
                                                            <input type="hidden" v-model="item.id" name="id[]" id="id[]">
                                                        </tr>
                                                    </template>
                                                </tbody>
                                            </table>
                                            <button type="button" v-on:click="actualizar_etapas()" class="btn btn-success">Guardar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="editAccion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="modal-header">
                                        <h2>Editar Accion</h2>
                                    </div>
                                    <div class="body" style="width: 100%;">
                                        <form id="form_editar_acciones" enctype="multipart/form-data" method="post">
                                            <table class="table" id="table_admin_accion_edicion">
                                                <thead>
                                                    <th class="text-center">Nombre</th>
                                                    <th class="text-center">Accion</th>
                                                </thead>
                                                <tbody>
                                                    <template v-for="item in accion_admin">
                                                        <tr>
                                                            <td class="text-center"><input name="nombre_accion" id="nombre_accion" v-model="item.nombre" class="form-control"></td>
                                                            <td class="text-center" id="boton_estado"><button type="button" v-on:click="eliminaraccion(item.id)" class="btn btn-danger">Eliminar</button>
                                                        </tr>
                                                    </template>
                                                </tbody>
                                            </table>
                                            <button type="button" v-on:click="editaraccion()" class="btn btn-success">Guardar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modulos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="modal-header">
                                        <h2> Modulos Gestion</h2>
                                    </div>
                                    <div class="body" style="width: 100%;">
                                        <form method="POST" id="form_edit_etapas">
                                            <table class="table" id="table_modulos">
                                                <thead>
                                                    <th class="text-center">Nombre</th>
                                                    <th class="text-center">Estado</th>
                                                    <th class="text-center">Accion</th>
                                                </thead>
                                                <tbody>
                                                    <template v-for="item in modulos">

                                                        <tr>
                                                            <td class="text-center">@{{item.modulo}}</td>
                                                            <td class="text-center" id="color_estado">
                                                                <div class="circle" v-if="item.idestatus == 1 " style="background-color: #28a745;"></div>
                                                                <div class="circle" v-else style="background-color: #dc3545;"></div>
                                                            </td>
                                                            <td class="text-center" id="boton_estado">
                                                                <button v-if="item.idestatus == 1 " type='button' class='btn btn-danger' v-on:click='deshabilitarmodulo(item.id)'>Deshabilitar</button>
                                                                <button v-else type='button' class='btn btn-success' v-on:click='habilitarmodulo(item.id)'>Habilitar</button>
                                                            </td>
                                                        </tr>
                                                    </template>

                                                </tbody>
                                            </table>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="addAccion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="modal-header">
                                        <h2> Agregar Accion</h2>
                                    </div>
                                    <div class="body" style="width: 100%;">
                                        <form id="form_editar_acciones" enctype="multipart/form-data" method="post">
                                            @csrf
                                            <div class="col-4 col-sm-4 col-md-4 col-md-12 col-lg-12" style="padding-top: 5px;">
                                                <label for="">Nombre </label>
                                                <input type="text" class="form-control" name="nombre_accion_add" id="nombre_accion_add">
                                            </div>
                                            &nbsp;
                                            <div class="col-4 col-sm-4 col-md-4 col-md-12 col-lg-12" style="padding-top: 5px;">
                                                <button type="button" id="btnGuardarUsuario" v-on:click="guardarAccion()" class="btn btn-success">Guardar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="addPerfil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="modal-header">
                                        <h2> Agregar Perfil</h2>
                                    </div>
                                    <div class="body" style="width: 100%;">
                                        <form id="form_editar_acciones" enctype="multipart/form-data" method="post">
                                            @csrf
                                            <div class="col-4 col-sm-4 col-md-4 col-md-12 col-lg-12" style="padding-top: 5px;">
                                                <label for="">Nombre </label>
                                                <input type="text" class="form-control" name="nombre_perfil_add" id="nombre_perfil_add">
                                            </div>
                                            &nbsp;
                                            <div class="col-4 col-sm-4 col-md-4 col-md-12 col-lg-12" style="padding-top: 5px;">
                                                <button type="button" id="btnGuardarUsuario" v-on:click="guardarPerfil()" class="btn btn-success">Guardar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="editPerfil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="modal-header">
                                        <h2> Editar Perfil</h2>
                                    </div>
                                    <div class="body" style="width: 100%;">
                                        <form id="form_editar_acciones" enctype="multipart/form-data" method="post">
                                            <table class="table" id="table_edit_perfil">
                                                <thead>
                                                    <th class="text-center">Nombre</th>
                                                    <th class="text-center">Peso</th>
                                                    <th class="text-center">Accion</th>
                                                </thead>
                                                <tbody>
                                                    <template v-for="item in perfil_admin_edit">
                                                        <tr>
                                                            <td class="text-center"><input class="form-control" type="text" name="nombre_perfil_edit" id="nombre_perfil_edit" v-model="item.nombre"></td>
                                                            <td class="text-center"><input class="form-control" type="number" name="peso_perfil_edit" id="peso_perfil_edit" v-model="item.peso"></td>
                                                            <td class="text-center"><button v-if="item.id != 43" class="btn btn-danger" type="button" v-on:click="eliminar_perfil(item.id)">Eliminar</button></td>
                                                        </tr>
                                                    </template>
                                                </tbody>
                                            </table>
                                        </form>
                                    </div>
                                </div>
                            </div>
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
    var app = new Vue({
        el: '#app',
        data: {
            accion: {},
            accion_admin: {},
            actividad: {},
            etapa: {},
            modulos: {},
            modulos_activos: {},
            mtvonopago: {},
            perfil: {},
            perfil_admin: {},
            perfil_admin_edit: {},
            tipocontacto: {},
            
        },
        mounted() {
            this.getData()
        },
        methods: {
            binding(data) {
                this.accion = data.accion
                this.accion_admin = data.accion_admin
                this.actividad = data.actividad
                this.etapa = data.etapa
                this.modulos = data.modulos
                this.modulos_activos = data.modulos_activos
                this.mtvonopago = data.mtvonopago
                this.perfil = data.perfil
                this.perfil_admin = data.perfil_admin
                this.perfil_admin_edit = data.perfil_admin_edit
                this.tipocontacto = data.tipocontacto
            },
            async getData() {
                const response = await fetch("/getAdminGestion");
                const data = await response.json();
                this.binding(data);
            },
            async deshabilitaretapa(id){
                const response = await fetch("/deshabilitar",{
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
            async habilitaretapa(id){
                
                const response = await fetch("/habilitar",{
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify(id),
                });
                const data = await response.json();
                this.binding(data);
            },
            async deshabilitaraccion(id){
                
                const response = await fetch("/deshabilitaraccion",{
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify(id),
                });
                const data = await response.json();
                this.binding(data);
            },
            async habilitaraccion(id){
                
                const response = await fetch("/habilitaraccion",{
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify(id),
                });
                const data = await response.json();
                this.binding(data);
            },
            async deshabilitarperfil(id){
                
                const response = await fetch("/deshabilitarperfil",{
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify(id),
                });
                const data = await response.json();
                this.binding(data);
            },
            async habilitarperfil(id){
                
                const response = await fetch("/habilitarperfil",{
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify(id),
                });
                const data = await response.json();
                this.binding(data);
            },
            async guardarEtapa(){
                
                nombre_etapa = document.getElementById('nombre_etapa').value

                const response = await fetch("/insertaretapa",{
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify(nombre_etapa),
                });
                const data = await response.json();
                this.binding(data);
            },
            async actualizar_etapas(){
                const response = await fetch("/actualizaretapa",{
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify(this.etapa),
                });
                const data = await response.json();
                this.binding(data);
            },
            async editaraccion(){
                const response = await fetch("/editaraccion",{
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify(this.accion_admin),
                });
                const data = await response.json();
                this.binding(data);
            },
            async eliminar_etapa(){
                const response = await fetch("/eliminar_etapa",{
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify(this.etapa),
                });
                const data = await response.json();
                this.binding(data);
            },
            async eliminaraccion(id){
                const response = await fetch("/eliminaraccion",{
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify(id),
                });
                const data = await response.json();
                this.binding(data);
            },
            async deshabilitarmodulo(id){
                const response = await fetch("/deshabilitarmodulos",{
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify(id),
                });
                const data = await response.json();
                this.binding(data);
            },
            async habilitarmodulo(id){
                const response = await fetch("/habilitarmodulos",{
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify(id),
                });
                const data = await response.json();
                this.binding(data);
            },
            async guardarAccion(){
                
                nombre_accion = document.getElementById('nombre_accion_add').value

                const response = await fetch("/insertaraccion",{
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify(nombre_accion),
                });
                const data = await response.json();
                this.binding(data);
            },
            async guardarPerfil(){
                
                nombre_perfil = document.getElementById('nombre_perfil_add').value

                const response = await fetch("/insertarperfil",{
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify(nombre_perfil),
                });
                const data = await response.json();
                this.binding(data);
            },
            async eliminar_perfil(id){
                const response = await fetch("/eliminar_perfil",{
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify(id),
                });
                const data = await response.json();
                this.binding(data);
            },

        }
    });
</script>
@endsection