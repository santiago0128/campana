<div id="main-content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-5 col-md-8 col-sm-12" style="padding-left: 50px;">
                <h2>
                    <li class=" fa fa-bullhorn"></li>&nbsp;Novedades
                </h2>
            </div>
            <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                <ul class="breadcrumb justify-content-end">
                    <li class="breadcrumb-item"><a href=""></a><i class="icon-home"></i></a></li>
                    <li class="breadcrumb-item active">Portafolio</li>
                    <li class="breadcrumb-item">Novedades</li>
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
        <div class="col-12">
            <div class="card">
                <div class="body">
                    <div class="form-group">
                        <div class="row g-3">
                            <div class=" col ">
                                <label for="">Solo mis procesos</label>
                                <input name="mis_procesos" id="mis_procesos" type="checkbox">
                            </div>
                            <div class=" col ">
                                <label for="">Solo mis procesos</label>
                                <input name="mis_procesos" id="mis_procesos" type="checkbox">
                            </div>
                            <div class=" col ">
                                <label for="">Solo mis procesos</label>
                                <input name="mis_procesos" id="mis_procesos" type="checkbox">
                            </div>
                        </div>
                        &nbsp;
                        <div class="row">
                            <div class="col">

                                <div class="col-6 col-sm-4 col-md-12 col-lg-12">
                                    <label for=""> Rango de Fechas</label>
                                    <input name="rango_fechas" id="rango_fechas" type="date" class="form-control">
                                </div>
                            </div>
                            <div class="col">
                                <div class="col-6 col-sm-6 col-md-12 col-lg-12">
                                    <label for="">&nbsp;</label>
                                    <input name="rango_fechas" id="rango_fechas" type="date" class="form-control">
                                </div>
                            </div>
                        </div>
                        &nbsp;
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
                                    <th>Proceso/Juzagado</th>
                                    <th>Fecha</th>
                                    <th> Actuaciones y comentarios</th>

                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php if (!empty($ArrayCliente)) {

                                ?>
                                    <tr class="<?php echo $bgcolor; ?>">
                                        <td><?php echo $ArrayCliente['campana']; ?></td>
                                        <td><?php echo $ArrayCliente['subcampana']; ?></td>
                                        <td><?php echo $ArrayCliente['identificacion']; ?></td>
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
</div>