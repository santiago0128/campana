    <div class="block-header">
        <div class="row">
            <div class="col-lg-5 col-md-8 col-sm-12" style="padding-left: 50px;">
                <h2>
                    <li class=" fa fa-retweet"></li>&nbsp;Movimientos
                </h2>
            </div>
            <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                <ul class="breadcrumb justify-content-end">
                    <li class="breadcrumb-item"><a href="index.php"><i class="icon-home"></i></a></li>
                    <li class="breadcrumb-item active">Portafolio</li>
                    <li class="breadcrumb-item">Movmientos</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="body">
                <div class="input-group">
                    <div class="col-4 col-sm-4 col-md-4 col-md-6 col-lg-6">

                        <input type="text" class="form-control" placeholder="Buscar Proceso" aria-label="Text input with segmented dropdown button">
                    </div>
                    <div class="input-group-append">
                        <button type="button" class="btn btn-primary">
                            <li class="fa fa-search"></li> &nbsp;Buscar
                        </button>
                        <button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split" onclick="form_buscar()"></button>
                    </div>

                </div>
            </div>
            @include('formularios/nuevo_procesos')
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="body">
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <label for="">Solo mis procesos</label>
                                <input name="mis_procesos" id="mis_procesos" type="checkbox">
                            </div>
                            &nbsp;
                            <div class="col-12 col-sm-12 col-md-6 col-lg-12">
                                <label for=""> Fecha Oficial</label>
                                <input type="date" name="fecha_oficial_desde" id="fecha_oficial_desde" class="form-control">
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-12">
                                <label for=""> Fecha Creacion</label>
                                <input type="date" class="form-control" name="fecha_creacion_desde" id="fecha_creacion_desde" placeholder="Desde">
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-12">
                                <label for=""> Fecha Actualizacion</label>
                                <input type="date" class="form-control" name="fecha_creacion_desde" id="fecha_creacion_desde" placeholder="Desde">
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-12">
                                <label for="">Cuaderno</label>
                                <select name="cuaderno" id="cuaderno" class="form-control">
                                    <option value="0">Ninguno</option>
                                </select>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-12">
                                <label for="">Que contenga</label>
                                <input type="text" class="form-control" name="que_contenga" id="que_contenga">
                            </div>

                        </div>
                        <div class="col">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-12" style="padding-top: 45px;">
                                <label for="">&nbsp;</label>
                                <input type="date" class="form-control" name="fecha_oficial_hasta" id="fecha_oficial_hasta" value="<?php echo date('Y-m-d') ?>" placeholder="Desde">
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-12">
                                <label for="">&nbsp;</label>
                                <input type="date" class="form-control" name="fecha_creacion_hasta" id="fecha_creacion_hasta">
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-12">
                                <label for="">&nbsp;</label>
                                <input type="date" class="form-control" name="fecha_actualizacion_hasta" id="fecha_actualizacion_hasta">
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-12">
                                <label for="">Clasificacion</label>
                                <input type="text" class="form-control" name="clasificacion" id="clasificacion" placeholder="">
                            </div>

                        </div>
                    </div>
                </div>
                <div class=" d-flex justify-content-end">
                    <div class="row">
                        <button class="btn btn-success" type="button"> Buscar</button>
                        &nbsp;
                        <button class="btn btn-primary" type="button"> Descargar Excel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="body">
                <div class="table-responsive">
                    <table id="example" class="table">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>Codigo</th>
                                <th>Cliente Asunto</th>
                                <th>Estado</th>
                                <th>Bitacora</th>
                                <th>Juzgado</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php if (!empty($ArrayCliente)) {

                            ?>
                                <tr class="<?php echo $bgcolor; ?>">
                                    <td><?php echo $ArrayCliente['campana']; ?></td>
                                    <td><?php echo $ArrayCliente['subcampana']; ?></td>
                                    <td><?php echo $ArrayCliente['identificacion']; ?></td>
                                    <td><?php echo $ArrayCliente['nombrecompleto']; ?></td>
                                    <td><?php echo $ArrayCliente['apellido']; ?></td>
                                    <td><?php echo $ArrayCliente['ciudad']; ?></td>

                                </tr>

                            <?php } else { ?>
                                <tr>
                                    <td colspan="8">No hay resultados</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>