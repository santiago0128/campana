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

    <div class="col-md-12">
        <div class="card">
            <div class="body">
                <div class="input-group">
                    <div class="col-4 col-sm-4 col-md-4 col-md-6 col-lg-6">

                        <div class="body">
                            <div class="row">
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <select id="multiselect1" name="multiselect1" multiple class="form-control">
                                        @foreach ($shema as $data)
                                        <option value="{{$data->columnas}}">{{$data->columnas}}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary btn-small" onclick="tabla()" id="btnagrupadores" type="button">
                                            Buscar <i class="icon-search"></i>
                                        </button>
                                        &nbsp;
                                        &nbsp;
                                        <button class="btn btn-success"  id="btnreporte" type="button">
                                            Descargar Reporte <i class="icon-search"></i>
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
    <div class="col-12">
        <div class="card">
            <div class="body">
                <div class="table-responsive">
                    <table id="tablas" class="table">
                        <thead>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addProceso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content " style="background-color: #343a40;">
                <div class="modal-body">
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card">
                                <div class="header">
                                    <h1>Nuevo Proceso</h1>
                                </div>
                                <div class="body wizard_validation">
                                    <form id="wizard_with_validation" method="POST">

                                        <h3>Datos del Proceso</h3>
                                        <fieldset style="width: 100%;">
                                            <div class="row clearfix">
                                                <div class="col-4 col-sm-4 col-md-4 col-md-12 col-lg-12" style="padding-top: 5px;">
                                                    <label for="">Titulo</label>
                                                    <input type="text" class="form-control" placeholder="Buscar Proceso" aria-label="Text input with segmented dropdown button">
                                                </div>
                                                <div class="col-12 col-sm-12 col-md-12 col-lg-12" style="padding-top: 5px;">
                                                    <label for=""> Numero de Radicado</label>
                                                    <div class="row">
                                                        <div class="col-3 col-sm-3 col-md-3 col-lg-3">
                                                            <select name="" id="" class="form-control">
                                                                <option> Numero de Radicado</option>
                                                                <option> NIT</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-2 col-sm-2 col-md-9 col-lg-9">
                                                            <input type="text" name="radicado" id="radicado" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-12 col-md-11 col-lg-11" style="padding-top: 5px;">
                                                    <label for=""> Juzgado</label>
                                                    <input type="text" name="radicado" id="radicado" class="form-control">
                                                </div>
                                                <div class="input-group-append" style="padding-top: 30px;">
                                                    <button class="btn btn-secondary btn-small" id="generator_link" type="button">
                                                        <i class="icon-globe"></i>
                                                    </button>
                                                </div>
                                                <div class="col-12 col-12 col-md-12 col-lg-12" style="padding-top: 5px;">
                                                    <label for=""> Jurisdiccion</label>
                                                    <input type="text" name="radicado" id="radicado" class="form-control">
                                                </div>
                                                <div class="col-12 col-12 col-md-12 col-lg-12" style="padding-top: 5px;">
                                                    <label for=""> Materia</label>
                                                    <input type="text" name="radicado" id="radicado" class="form-control">
                                                </div>
                                                <div class="col-12 col-12 col-md-12 col-lg-12" style="padding-top: 5px;">
                                                    <label for=""> Detalle De Materia</label>
                                                    <input type="text" name="radicado" id="radicado" class="form-control">
                                                </div>
                                                <div class="col-12 col-12 col-md-12 col-lg-12" style="padding-top: 5px;">
                                                    <label for=""> Estado</label>
                                                    <select name="estado" id="estado" class="form-control">
                                                        <option></option>
                                                    </select>
                                                </div>
                                                <div class="col-12 col-12 col-md-12 col-lg-12" style="padding-top: 5px;">
                                                    <label for=""> Ubicación Del Expediente</label>
                                                    <input type="text" name="radicado" id="radicado" class="form-control">
                                                </div>

                                            </div>
                                        </fieldset>
                                        <br>
                                        <h3>Datos Adicionales</h3>
                                        <fieldset style="width: 100%;">
                                            <div class="row clearfix">

                                                <div class="col-4 col-sm-4 col-md-4 col-md-11 col-lg-11" style="padding-top: 10px;">
                                                    <input type="checkbox" name="Cofidencial" id="Cofidencial">
                                                    <label for=""> Cofidencial</label>
                                                </div>
                                                <div class="col-4 col-sm-4 col-md-4 col-md-11 col-lg-11" style="padding-top: 5px;">
                                                    <label for="">Cliente</label>
                                                    <select name="cliente" id="cliente" class="form-control">
                                                        <option></option>
                                                    </select>
                                                </div>
                                                <div class="input-group-append" style="padding-top: 35px;">
                                                    <button class="btn btn-secondary btn-small" id="generator_link" type="button">
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                                </div>
                                                <div class="col-4 col-sm-4 col-md-4 col-md-11 col-lg-11" style="padding-top: 5px;">
                                                    <label for="">Asunto</label>
                                                    <select name="asunto" id="asunto" class="form-control">
                                                        <option></option>
                                                    </select>
                                                </div>
                                                <div class="input-group-append" style="padding-top: 35px;">
                                                    <button class="btn btn-secondary btn-small" id="generator_link" type="button">
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                                </div>
                                                <div class="col-12 col-12 col-md-12 col-lg-12" style="padding-top: 5px;">
                                                    <label for=""> Flujo de Trabajo</label>
                                                    <select name="flujo_trabajo" id="flujo_trabajo" class="form-control">
                                                        <option></option>
                                                    </select>
                                                </div>
                                                <div class="col-12 col-12 col-md-12 col-lg-12" style="padding-top: 5px;">
                                                    <label for=""> Etapa</label>
                                                    <select name="etapa" id="etapa" class="form-control">
                                                        <option></option>
                                                    </select>
                                                </div>
                                                <div class="col-12 col-12 col-md-12 col-lg-12" style="padding-top: 10px;">
                                                    <label for=""> Usuarios Involucrados</label>
                                                    <a class="btn btn-success">
                                                        <li class="fa fa-user"></li>
                                                    </a>
                                                    <a class="btn btn-primary">
                                                        <li class="fa fa-plus"></li>&nbsp;Usuarios
                                                    </a>

                                                </div>
                                            </div>
                                        </fieldset>
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