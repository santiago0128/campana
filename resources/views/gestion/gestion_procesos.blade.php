@foreach ($procesos as $data)
<?php

if (!empty($data->fecha_entrega_degarantias_abogado)) {
    $fecha_entrega_degarantias_abogado = $data->fecha_entrega_degarantias_abogado;
}


if (!empty($ultimaetapa)) {
    foreach ($ultimaetapa as $key) {
        $estado = $key->nombre;
        $bg = $key->bg;
        $progreso = $key->progreso;
    }
} else {
    $estado = $data->etapa_presencial;
    $bg = "bg-warning";
    $progreso = "45";
}


?>
<style>
    .bg-custom {
        color: red;
    }
</style>


<div id="main-content">
    <div class="col-12">
        <div class="card">
            <div class="header">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6" style="padding-left: 10px;">
                        <h4>
                            <li class=" fa fa-bars"></li>&nbsp;Gestion Procesos
                        </h4>
                    </div>
                </div>
            </div>
            <div class="body">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="text-center">
                        <h5><strong>Datos Cliente</strong></h5>
                    </div>
                </div>
                <div style="overflow-x:auto;">
                    <table class="table" id="table_gestion">
                        <thead>
                            <tr>
                                <th>Nombre Completo</th>
                                <th>Identificaion</th>
                             
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clientes as $cliente)
                            <tr>
                                <td>{{$cliente->nombre}}</td>
                                <td>{{$cliente->identificacion}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="header">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6" style="padding-left: 10px;">
                        <h4>
                            <li class=" fa fa-bars"></li>&nbsp;Estado Proceso
                        </h4>
                    </div>
                </div>
            </div>
            <div class="body">
                <div id="etapa_proceso">
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated " role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $progreso ?>%; background-color: <?php echo $bg ?>"></div>
                    </div>
                   
                </div>
                <div>
                    <div class="row">
                        @foreach($etapa as $etapas)
                        <?php
                        echo '
                                        <div class="col">
                                           <p class="text-center">' . $etapas->nombre . '</p>
                                        </div>
                                 ';
                        ?>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="header">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6" style="padding-left: 10px;">
                        <h4>
                            <li class=" fa fa-bars"></li>&nbsp;Datos Proceso
                        </h4>
                    </div>
                </div>
            </div>

            <!-- <div class="body">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="text-center">
                        <h5><strong>Proceso # {{$data -> id_proceso}}</strong></h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <label for="">Identificacion Demandado</label>
                            <input type="text" class="form-control" value="{{$data -> identificacion_demandado}}" disabled>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <label for=""> Nombre Demandado</label>
                            <input type="text" class="form-control" value="{{$data->nombre_demandado}}" disabled>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <label for="">Obligaciones </label>
                            <input type="text" class="form-control" value="{{$data -> obligaciones}}" disabled>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <label for=""> Estado Cartera</label>
                            <input type="text" class="form-control" value="{{$data -> estado_cartera}}" disabled>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <label for=""> Regional</label>
                            <input type="text" class="form-control" value="{{$data -> regional}}" disabled>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <label for=""> Tipo Proceso</label>
                            <input type="text" class="form-control" value="{{$data -> tipo_proceso}}" disabled>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <label for=""> Meididas Efectivas</label>
                            <input type="text" class="form-control" value="{{$data ->medidas_efectivas}}" disabled>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <label for=""> Asigando a</label>
                            <input type="text" class="form-control" value="{{$data -> asigando_a}}" disabled>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <label for=""> Tipo Juzgado</label>
                            <input type="text" class="form-control" value="{{$data -> tipo_juzgado}}" disabled>
                        </div>

                    </div>
                    <div class="col">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <label for=""> Division Responsable</label>
                            <input type="text" class="form-control" value="{{$data -> division_reponsable}}" disabled>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <label for=""> Banca</label>
                            <input type="text" class="form-control" value="{{$data ->banca}}" disabled>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <label for="">Capital </label>
                            <input type="text" class="form-control" value="{{$data -> capital}}" disabled>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <label for=""> Abogado Externo</label>
                            <input type="text" class="form-control" value="{{$data->abogado_externo}}" disabled>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <label for="">Medida Solicitada</label>
                            <input type="text" class="form-control" value="{{$data -> medida_solicitada}}" disabled>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <label for=""> SubTipo Proceso</label>
                            <input type="text" class="form-control" value="{{$data -> subtipo_proceso}}" disabled>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <label for=""> Numero de Radicado</label>
                            <input type="text" class="form-control" value="{{$data->numero_radicado}}" disabled>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <label for=""> Estado Procesal</label>
                            <input type="text" class="form-control" value="{{$data->estado_procesal}}" disabled>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <label for=""> Ciudad Juzgado</label>
                            <input type="text" class="form-control" value="{{$data -> ciudad_juzgado}}" disabled>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
  

    @endforeach
    <div class="col-12">
        <div class="card">
            <div class="body">
                <div class="form-row">
                    <h5 class="col-12 col-sm-12 col-md-4 col-lg-4"><i class="fa fa-edit"></i> Nueva Gestión</h5>
                </div>
                &nbsp;
                <div class="form-group">
                    <div class="form-group col-12 col-sm-12 col-md-12 col-lg-12">
                        <!-- <label>Tiempo de Gestión</label>
                        <input type="text" name="horas" id="horas" class="form-control noFilt" readonly value="00" style="width: 10%; display: inline-block;">&nbsp;:&nbsp;
                        <input type="text" name="minutos" id="minutos" class="form-control noFilt" readonly value="00" style="width: 10%; display: inline-block;">&nbsp;:&nbsp;
                     <input type="text" name="segundos" id="segundos" class="form-control noFilt" readonly value="00" style="width: 10%; display: inline-block;">&nbsp;&nbsp;
                         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#demograficos"><i class="fas fa-digital-tachograph"></i>&nbsp;Demograficos</button>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#pagos"> <i class="fas fa-money-bill-wave"></i>&nbsp;Pagos</button>
                        <a class="btn btn-primary gestionnumero disabled text-white" title="Remarcar" id="btn-remarcar" data-numero="" data-id=""><i class="fas fa-phone-volume"></i>&nbsp;Remarcar</a>
                        <a class="btn btn-info text-white" data-toggle="modal" data-target="#modalSpeach"><i class="fas fa-scroll"></i>&nbsp;Speach</a> -->
                        <a class="btn btn-success text-white" data-toggle="modal" data-target="#modalemail"><i class="fas fa-scroll"></i>&nbsp; Enviar Email</a>
                    </div>
                    <form method="POST" id="formGestion">
                        <input type="hidden" class="form-control" name="segundostotales" id="segundostotales">
                        <input type="hidden" name="codllamada" id="codllamada" value="">
                        <div class="row">
                            <div class="form-group col-12 col-sm-12 col-md-12 col-lg-12">
                                <textarea class="form-control" rows="5" cols="30" id="textSpeach" placeholder="Nueva Gestion de LLamadas" required name="gestion"></textarea>
                            </div>
                            <div class="form-group col-3 col-sm-3 col-md-3 col-lg-3" id="contenedor1">
                                <label for="accion">Accion:</label>
                                <select type="text" name="accion" id="accion" class="form-control" onchange="activarContacto(this.value)" required>
                                    <option value="">Seleccione</option>
                                    @foreach($accion as $data)
                                    <option value="{{$data->id}}">{{$data->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-3 col-sm-3 col-md-3 col-lg-3" style="display: none;" id="contenedor5">
                                <label for="tipocontacto">Etapa:</label>
                                <select name="etapa" id="etapa" onchange="activarPerfil(this.value)" class="form-control" require>
                                    <option value="">Seleccion</option>
                                    @foreach($etapa as $data)
                                    <option value="{{$data->id}}">{{$data->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- <div class="form-group col-12 col-sm-12 col-md-3 col-lg-3" id="contenedor3">
                                <label for="telefono_gestion">Teléfono:</label>
                                <input type="text" name="telefono" id="telefono" class="form-control">
                            </div> -->
                            <div class="col-lg-3 col-md-3 col-sm-12 col-12 " id="contenedor7">
                                <div class="form-group">
                                    <label for="fecha_agendado">Fecha Agendado:</label>
                                    <input type="date" autocomplete="off" name="fecha_agendado" id="fecha_agendado" class="form-control datetimepicker noFilt" placeholder="yyyy-mm-dd hh:mm">
                                </div>
                            </div>

                            <div class="form-group col-12 col-sm-12 col-md-12 col-lg-12" style="display: none;" id="contenedorAcuerdoCuentas">
                                <table class="table table-hover" id="tabla-obligaciones-gestion">
                                    <thead class="thead-info">
                                        <tr>
                                            <th colspan="3">
                                                <h5><i class="fas fa-money-check-alt"></i>&nbsp;Obligacion</h5>
                                            </th>
                                            <th colspan="3" class="text-center">
                                                <a class="btn btn-danger text-white" onclick="agregarFila();"><i class="fas fa-plus-circle"></i></a>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>Cuenta</th>
                                            <th>Valor:</th>
                                            <th>Fecha Inicial:</th>
                                            <th>Cuotas:</th>
                                            <th>Eliminar:</th>
                                        </tr>
                                    </thead>
                                    @foreach ($procesos as $data)
                                    <?php $obligacion = $data->obligaciones  ?>
                                    @endforeach
                                    <tbody id="newsRows">
                                        <tr class="filas" data-cont="0">
                                            <td>
                                                <select name="cuenta[]" id="cuenta" class="form-control">
                                                    <option value="">Seleccione</option>
                                                    <option value='<?php echo $obligacion ?>|<?php echo 0 ?>'>
                                                        <?php echo $obligacion ?>|<?php echo 0 ?></option>

                                                </select>
                                            </td>
                                            <td>
                                                <input type="number" min="1" name="valorpromesa[]" id="valorpromesa" class="form-control promesaClass">
                                            </td>
                                            <td>
                                                <input type="date" name="fechapromesa2[]" id="fecha_promesa_inicio" class="form-control">
                                            </td>
                                            <td>
                                                <input type="number" min="1" max="36" name="cuota[]" id="cuotaAcuerdo" class="form-control">
                                            </td>
                                            <td>&nbsp;</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="form-group col-12 text-right">
                            <a class="btn btn-success text-white disabled" id="audioBuzon" onclick="transferencua('transMess');"><i class="fa fa-play-circle"></i>&nbsp;Buzon</a>
                            <a class="btn btn-secondary cancelargestion text-white" data-src="Campaign"><i class="fa fa-ban"></i>&nbsp;Cancelar</a>
                            <a class="btn btn-primary text-white" onclick="guardarGestion()" id="btnGuardarGestion"><i class="fa fa-edit"></i>&nbsp;Guardar</a>
                        </div>
                        <!-- @foreach ($clientes as $data)

                        <?php //$identificacion = $data->identificacion  ?>
                        @endforeach
                        @foreach ($procesos as $data)
                        <?php //$obligacion = $data->obligaciones  ?>
                        @endforeach -->
                        <input type="hidden" name="identificacion" id="identificacion" value="<?php //echo $identificacion ?>">
                        <input type="hidden" name="obligacion" value="<?php //echo $obligacion ?>">
                        <input type="hidden" name="type" value="gestion">
                        <input type="hidden" name="tiempogestion" id="tiempogestion">
                        <input type="hidden" id="dst" name="dst" value="">

                        <?php //echo $inputVirtual; 
                        ?>
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
                <div class="tab-pane fade show active" id="historico" role="tabpanel" aria-labelledby="historico-tab">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered table-sm js-basic-example dataTable" id="table-historico" style="font-size: 10px; width: 100%">
                                <thead class="thead-info">
                                    <tr class="text-center">
                                        <th>FECHA / HORA</th>
                                        <th>USUARIO</th>
                                        <th>ACCIÓN</th>
                                        <th>ETAPA</th>
                                        <!-- <th>TELÉFONO</th> -->
                                        <th>GESTIÓN</th>
                                        <th>TIEMPO GESTIÓN</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($historico as $data)
                                    <tr>
                                        <td>{{$data->fechagestion}}</td>
                                        <td>{{$data->accion}}</td>
                                        <td>{{$data->etapa}}</td>
                                        <td>{{$data->gestion}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
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
                    @foreach ($procesos as $data)
                    <p>{{$data -> observaciones}}</p>

                    @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                </div>
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
                                    <textarea name="content" id="textarea_id" sty>

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
    <script>
        $(document).ready(function() {
            table2 = $('#table-historico').DataTable({
                order: [
                    [0, 'desc']
                ]
            });
            $("#fecha_entrega_garantias").datepicker();
            $("#fecha_sentencia").datepicker();
            $("#fecha_presentacion_demanda").datepicker();
            $("#fecha_liquidacion_credito").datepicker();
            $("#fecha_admision").datepicker();
            $("#fecha_terminacion").datepicker();
            $("#fecha_notificacion").datepicker();
            $("#fecha_ultima_actualizacion").datepicker();
        });
    </script>
    <script type="text/javascript">
        CKEDITOR.replace('textarea_id');
    </script>


</div>