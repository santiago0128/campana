
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <div class="block-header">
        <div class="row">
            <div class="col-lg-5 col-md-8 col-sm-12" style="padding-left: 50px;">
                <h2>
                    <li class=" fa fa-list-alt"></li>&nbsp;Reporte Avanzado
                </h2>
            </div>
            <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                <ul class="breadcrumb justify-content-end">
                    <li class="breadcrumb-item"><a><i class="icon-home"></i></a></li>
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
                <div class="row clearfix">
                    <div class="col-lg-12">
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
                                    <div class="col-5 col-sm-5 col-md-10 col-lg-10">
                                        <select id="multiselect1" name="multiselect1" multiple class="form-control">
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                            <option value="4">Four</option>
                                            <option value="5">Five</option>
                                        </select>

                                    </div>
                                    <div class="col-1 col-sm-1 col-md-2 col-lg-2">
                                        <div class="input-group-append">
                                            <button class="btn btn-secondary btn-small" onclick="tabla()" id="btnagrupadores" type="button">
                                                <i class="icon-refresh"></i>
                                            </button>
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

    <div class="col-12">
        <div class="card">
            <div class="body">
                <div class="table-responsive">
                    <table id="tablas" class="table">
                        <thead>

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
<script>
    $(document).ready(function() {
        $('.multiselect1').select2({
            placeholder:"select country",
            tags : true,
            tokenSeparators:[',']
        });
    });
</script>