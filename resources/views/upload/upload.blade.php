<div id="main-content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-5 col-md-8 col-sm-12" style="padding-left: 50px;">
                <h1>
                    <li class=" fa fa-file-excel-o"></li>&nbsp;Subir Proceso Excel
                </h1>
            </div>
        </div>
    </div>
    &nbsp;
    &nbsp;
    <div class="body">
        <div id="alert"></div>
    </div>
    &nbsp;
    &nbsp;
    <div class="col-md-12">
        <div class="card">
            <div class="body">
                <div class="body">
                    <form method="POST" id="formUploadCsv" enctype="multipart/form-data">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="row">

                                <div>
                                    <small>Seleccione Cargue</small><br>
                                    <select name="tipo_cargue" id="tipo_cargue" class="form-control">
                                        <option value="0">Ninguno</option>
                                        <option value="estructura">estructura</option>
                                        <option value="procesos">procesos</option>
                                    </select>
                                </div>

                                <div class="form-group text-center col-2">
                                    <small>Cargue archivo en formato .csv</small><br>
                                    <label for="csv" id="labelCargarArchivo" class="cont-file btn btn-primary">
                                        <i class="fa fa-upload"></i>&nbsp;&nbsp;&nbsp;Cargar Archivo
                                        <input type="file" accept=".txt, .csv" name="csv" id="csv" class="form-control" required>
                                    </label><br>
                                    <small class="previewName"></small>
                                </div>


                                <div class="form-group text-center m-t-20 col-4">
                                    <input type="hidden" name="type" value="checkArchivo">
                                    <a class="btn btn-primary text-white " onclick="copyfile()" style="height: 42px; line-height: 30px;"><i class="fa fa-paper-plane"></i>&nbsp;Enviar</a>
                                    <a class="btn btn-danger text-white " id="btn-cancelar" style="height: 42px; line-height: 30px;"><i class="fa fa-ban"></i>&nbsp;Cancelar</a>
                                </div>

                                <div class="form-group col-2">
                                    <div class="progress m-t-25">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                                    </div>
                                </div>

                                <div class="form-group text-center col-2">
                                    <small>La estructura de los archivos.</small><br>
                                    <a class="btn btn-info text-white" id="btnEstructura" style="height: 42px; line-height: 30px;" data-toggle="modal" data-target="#modalEstructura">Estructura</a>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="row" id="previewcsv">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" tabindex="-1" role="dialog" id="modalEstructura">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-file-csv"></i> Estructuras</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row mb-3">
                            <div class="col-12 text-center">
                                <?php $dir = "/filesDownload"; ?>
                                <a href=" <?php echo $dir ?>/estructuraProcesos.csv" download="estructuraProcesos.csv" class="btn btn-success"><i class="fas fa-file-csv"></i>&nbsp;Procesos</a>
                                <a href=" <?php echo $dir ?>/plantillaProcesos.csv" download="plantillaProcesos.csv" class="btn btn-success"><i class="fas fa-file-csv"></i>&nbsp;Estructura</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>