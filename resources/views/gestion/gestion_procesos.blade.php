@extends('inicio.index')
@section('contenido')

<style>
    .bg-custom {
        color: red;
    }
</style>
<div id="app">
    <div class="col-12">
        <div class="card">
            <div class="header">
                <div class="row">
                    <h4>
                        <li class=" fa fa-bars"></li>&nbsp;Gestion Procesos
                    </h4>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="header" :style="{ 'border': (obligaciones[0].estado === 'Cerrado') ? '3px solid red' : '3px solid green' }">
                <div class="row">
                    <h4>
                        <li class="fa fa-bars"></li>&nbsp;Estado Proceso: @{{obligaciones[0].estado}}
                    </h4>
                </div>
            </div>
            <div v-if="modulos_activos.includes('Etapas')" class="body">
                <div id="etapa_proceso">
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated " role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: <?php //echo $progreso ?>"></div>
                    </div>
                </div>
                <div>
                    <div class="row">
                        <div class="col">
                            <p class="text-center">' . //$etapas->nombre . '</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="header">
                <h4>
                    <li class=" fa fa-bars"></li>&nbsp;Datos Proceso
                </h4>
            </div>
            <div class="row" style="padding: 20px;">
                <template v-for="item in procesos">
                    <template v-for="item2 in keys">
                        <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                            <label for="">@{{item2}}</label>
                            <input type="text" class="form-control" v-model="item[item2]" readonly>
                        </div>
                    </template>
                </template>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="body">
                <div class="form-row">
                    <h5 class="col-12 col-sm-12 col-md-4 col-lg-4"><i class="fa fa-edit"></i> Nueva Gestión</h5>
                </div>
                &nbsp;
                <div class="form-group">
                    <form method="POST" id="formGestion">
                        <div class="form-group col-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <label>Tiempo de Gestión</label>
                                <input type="text" name="horas" id="horas" class="form-control noFilt" readonly value="00" style="width: 10%; display: inline-block;">&nbsp;:&nbsp;
                                <input type="text" name="minutos" id="minutos" class="form-control noFilt" readonly value="00" style="width: 10%; display: inline-block;">&nbsp;:&nbsp;
                                <input type="text" name="segundos" id="segundos" class="form-control noFilt" readonly value="00" style="width: 10%; display: inline-block;">&nbsp;&nbsp;
                                <template v-if="modulos_activos.includes('Email')">
                                    <a class="btn btn-success text-white" data-toggle="modal" data-target="#modalemail"><i class="fas fa-scroll"></i>&nbsp; Enviar Email</a>
                                </template>
                            </div>
                        </div>

                        <div class="row">
                            &nbsp;
                            <div class="form-group col-12 col-sm-12 col-md-12 col-lg-12">
                                <textarea class="form-control" rows="5" cols="30" id="textSpeach" placeholder="Nueva Gestion de LLamadas" required name="gestion"></textarea>
                            </div>
                            &nbsp;
                            <template v-if="modulos_activos.includes('Acciones')">
                                <div class="form-group col-3 col-sm-3 col-md-3 col-lg-3" id="contenedor1">
                                    <label for="accion">Accion:</label>
                                    <select v-model="accion_selected" name="accion" id="accion" class="form-control" @change="activarContacto()" required>
                                        <option value="" selected>Seleccione</option>
                                        <template v-for="accion in accion">
                                            <option :value="accion.id">@{{accion.nombre}}</option>
                                        </template>
                                    </select>
                                </div>
                            </template>
                            <template v-if="modulos_activos.includes('Contacto')">
                                <div class="form-group col-3 col-sm-3 col-md-3 col-lg-3" style="display: none;" id="contacto">
                                    <label for="tipocontacto">Contacto:</label>
                                    <select v-model="contacto_selected" @change="activarPerfil()" class="form-control" require>
                                        <option value="" selected>Seleccione</option>
                                        <template v-for="contacto_seleccionado in contacto_seleccionado">
                                            <option :value="contacto_seleccionado.id">@{{contacto_seleccionado.nombre}}</option>
                                        </template>
                                    </select>
                                </div>
                            </template>
                            <template v-if="modulos_activos.includes('Perfiles')">
                                <div class="form-group col-3 col-sm-3 col-md-3 col-lg-3" style="display: none;" id="perfil">
                                    <label for="tipocontacto">Perfil:</label>
                                    <select v-model="perfil_selected" class="form-control" require>
                                        <option value="" selected>Seleccione</option>
                                        <template v-for="perfil_seleccionado in perfil_seleccionado">
                                            <option :value="perfil_seleccionado.id">@{{perfil_seleccionado.nombre}}</option>
                                        </template>
                                    </select>
                                </div>
                            </template>
                            <div class="col-lg-3 col-md-3 col-sm-12 col-12 " id="contenedor7">
                                <div class="form-group">
                                    <label for="fecha_agendado">Fecha Agendado:</label>
                                    <input type="datetime-local" autocomplete="off" name="fecha_agendado" id="fecha_agendado" class="form-control">
                                </div>
                            </div>
                        </div>
                        &nbsp;
                        <div class="form-group col-12 text-right">
                            <a class="btn btn-primary text-white" v-on:click="guardarGestion()" id="btnGuardarGestion"><i class="fa fa-edit"></i>&nbsp;Guardar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card">
            <div class="header">
                <div class="col-lg-5 col-md-8 col-sm-12" style="padding-left: 10px;">
                    <h4>
                        <li class=" fa fa-bars"></li>&nbsp;Historico
                    </h4>
                </div>
            </div>
            <div class="body">
                <div id="historico" role="tabpanel" aria-labelledby="historico-tab">
                    <!-- <div class="col-12"> -->
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-sm js-basic-example dataTable" id="table-historico" style="font-size: 10px; width: 100%">
                            <thead class="thead-info">
                                <tr class="text-center">
                                    <th>FECHA / HORA</th>
                                    <th>USUARIO</th>
                                    <th v-if="modulos_activos.includes('Acciones')">ACCIÓN</th>
                                    <th v-if="modulos_activos.includes('Contacto')">CONTACTO</th>
                                    <th v-if="modulos_activos.includes('Etapas')">ETAPA</th>
                                    <th v-if="modulos_activos.includes('Perfiles')">PERFIL</th>
                                    <th>GESTIÓN</th>
                                    <th>TIEMPO GESTIÓN</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <template v-for="historico in historico">
                                    <tr>
                                        <td><b>@{{historico.fechagestion}}</b></td>
                                        <td><b>@{{historico.login}}</b></td>
                                        <td v-if="modulos_activos.includes('Acciones')"><b>@{{historico.accion}}</b></td>
                                        <td v-if="modulos_activos.includes('Contacto')"><b>@{{historico.contacto}}</b></td>
                                        <td v-if="modulos_activos.includes('Etapas')"><b>@{{historico.etapa}}</b></td>
                                        <td v-if="modulos_activos.includes('Perfiles')"><b>@{{historico.perfil}}</b></td>
                                        <td style="max-width: 200px;"><b>@{{historico.gestion}}</b></td>
                                        <td><b>@{{historico.tiempogestion}}</b></td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- </div> -->
            </div>
        </div>
        <div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Observaciones</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
            <div class="modal fade bd-example-modal-lg" id="modalemail" tabindex="-1" role="dialog" aria-labelledby="modalemail" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Envio Email</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="body">
                                            <form>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="To">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Subject">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="CC">
                                                </div>
                                            </form>
                                            <hr>
                                            <textarea name="content" id="textarea_id">

                                     </textarea>
                                            <div class="m-t-30">
                                                <button type="button" class="btn btn-success">Send Message</button>
                                                <button type="button" class="btn btn-secondary">Cargar Archivos</button>
                                                <a href="app-inbox.html" class="btn btn-outline-secondary">Cancel</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script>
    id = <?php echo $_GET['id'] ?>;
    identificacion = <?php echo $_GET['identificacion'] ?>;


    var tiempo = {
        hora: '00',
        minuto: '00',
        segundo: '00',
        segundos: '00'
    };

    tiempo_corriendo = setInterval(function() {
        // Segundos
        tiempo.segundos++;
        tiempo.segundo++;
        if (tiempo.segundo >= 60) {
            tiempo.segundo = '00';
            tiempo.minuto++;
        }

        // Minutos
        if (tiempo.minuto >= 60) {
            tiempo.minuto = '00';
            tiempo.hora++;
        }

        $("#horas").val(tiempo.hora);
        $("#minutos").val(tiempo.minuto);
        $("#segundos").val(tiempo.segundo);
        $("#segundostotales").val(tiempo.segundos);
    }, 1000);


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
            historico: {},
            accion: {},
            actividad: {},
            tipocontacto: {},
            etapa: {},
            modulo_gestion: {},
            mtvonopago: {},
            perfil: {},
            modulos_activos: [],
            accion_selected: '',
            contacto_seleccionado: {},
            contacto_selected: '',
            perfil_seleccionado: {},
            perfil_selected: '',
            obligaciones: {}
        },
        mounted() {
            this.getData()
        },
        methods: {
            binding(data) {
                this.procesos = data.procesos
                this.historico = data.historico
                this.accion = data.accion
                this.actividad = data.actividad
                this.tipocontacto = data.tipocontacto
                this.etapa = data.etapa
                this.modulo_gestion = data.modulo_gestion
                this.mtvonopago = data.mtvonopago
                this.perfil = data.procesos
                this.obligaciones = data.obligaciones
            },
            async getData() {

                json = {
                    'id': id,
                    'identificacion': identificacion
                }

                const response = await fetch("/getdataproceso", {
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify(json),
                });

                const data = await response.json();

                this.getKey(data.procesos);
                this.getModulesActivos(data)
                this.binding(data);
            },

            getModulesActivos(data) {
                let modulos = []
                for (let index = 0; index < data.modulo_gestion.length; index++) {
                    if (data.modulo_gestion[index]['idestatus'] == 1) {
                        modulos.push(data.modulo_gestion[index]['modulo'])
                    }
                }
                this.modulos_activos = modulos
            },
            getKey(data) {

                let llaves = [];
                for (let index = 0; index < data.length; index++) {
                    llaves = Object.keys(data[0]);
                }
                this.keys = llaves;

            },
            async activarContacto() {

                const response = await fetch("/activarcontacto", {
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify(this.accion_selected),
                });
                const data = await response.json();
                this.contacto_seleccionado = data.contacto;
                document.getElementById('contacto').style.display = 'block'

            },
            async activarPerfil() {

                const response = await fetch("/activarperfil", {
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify(this.contacto_selected),
                });
                const data = await response.json();
                this.perfil_seleccionado = data.perfil;
                document.getElementById('perfil').style.display = 'block'

            },
            async guardarGestion() {
                hora = document.getElementById('horas').value
                minuto = document.getElementById('minutos').value
                segundos = document.getElementById('segundos').value
                texto = document.getElementById('textSpeach').value
                fecha_agendado = document.getElementById('fecha_agendado').value


                data = {
                    'id': id,
                    'hora': hora,
                    'minuto': minuto,
                    'segundos': segundos,
                    'texto': texto,
                    'accion': this.accion_selected,
                    'contacto': this.contacto_selected,
                    'perfil': this.perfil_selected,
                    'identificacion': this.procesos[0].identificacion,
                    'obligacion': this.procesos[0].obligacion,
                    'fecha_agendado': fecha_agendado,
                }
                const response = await fetch("/saveGestion", {
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify(data),
                });

                $('#formGestion .form-control:visible:not(.noFilt)').each(function() {
                    if ($(this).val() == '') {
                        $(this).removeClass('is-valid');
                        $(this).addClass('is-invalid');
                        a++;
                    } else {
                        $(this).removeClass('is-invalid');
                        $(this).addClass('is-valid');
                    }
                });
                this.getData();
                this.resetForm();

            },
            resetForm() {
                this.accion_selected = ''
                this.contacto_selected = ''
                this.perfil_selected = ''
                document.getElementById('textSpeach').value = ''
                document.getElementById('fecha_agendado').value = ''
                tiempo.segundo = '00';
                tiempo.minuto = '00';
                tiempo.hora = '00';
                document.getElementById('contacto').style.display = 'none'
                document.getElementById('perfil').style.display = 'none'
            }


        }
    });
</script>
@endsection