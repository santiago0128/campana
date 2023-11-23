    <div class="block-header">
        <div class="row">
            <div class="col-lg-5 col-md-8 col-sm-12" style="padding-left: 50px;">
                <h2>
                    <li class=" fa fa-tasks"></li>&nbsp;Tareas
                </h2>
            </div>
            <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                <ul class="breadcrumb justify-content-end">
                    <li class="breadcrumb-item"><a href="index.php"><i class="icon-home"></i></a></li>
                    <li class="breadcrumb-item active">Gestion</li>
                    <li class="breadcrumb-item">Tareas</li>
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
            <div class="header">
                <div class="col-lg-5 col-md-8 col-sm-12" style="padding-left: 10px;">
                    <h4>
                        <li class=" fa fa-retweet"></li>&nbsp;Filtros
                    </h4>
                </div>
            </div>
            <div class="body">
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
                                <option>en proceso</option>
                            </select>
                        </div>
                        &nbsp;
                        <div class="col-3 col-sm-3 col-md-12 col-lg-12">
                            <label for="">Usuario</label>
                            <select name="usuarios" id="usuarios" class="form-control">
                                <option>usuairos</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="col-3 col-sm-3 col-md-12 col-lg-12">
                            <label for="">Fecha Limite</label>
                            <div class="row">
                                <div class="col">
                                    <input type="date" class="form-control" name="fecha_limite_desde" id="fecha_limite_desde">
                                </div>
                                <div class="col">
                                    <input type="date" class="form-control" name="fecha_limite_hasta" id="fecha_limite_hasta">
                                </div>
                            </div>
                        </div>
                        &nbsp;
                        <div class="col-3 col-sm-3 col-md-12 col-lg-12">
                            <label for="">Fecha Finalizacion</label>
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
                                <th>Proceso</th>
                                <th>Flujo/Etapa</th>
                                <th>Titulo</th>
                                <th>Usuarios</th>
                                <th>Creacion</th>
                                <th>Limite</th>
                                <th>Finalizada</th>
                                <th>Estado</th>
                                <th>Acciones</th>
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