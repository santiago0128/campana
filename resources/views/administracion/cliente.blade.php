    <div class="block-header">
        <div class="row">
            <div class="col-lg-5 col-md-8 col-sm-12" style="padding-left: 50px;">
                <h1>
                    <li class=" fa fa-users"></li>&nbsp;Clientes
                </h1>
            </div>
            <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                <ul class="breadcrumb justify-content-end">
                    <li class="breadcrumb-item"><a href="index.php"><i class="icon-home"></i></a></li>
                    <li class="breadcrumb-item active">Administracion</li>
                    <li class="breadcrumb-item">Clientes</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="body">
                <div class="col-4 col-sm-4 col-md-4 col-lg-4">
                    <form method="POST" id="filtro_busqueda">
                        <div class="row">
                            <div class="col">
                                <input type="text" id="buscar_cliente" type="text" class="form-control" placeholder="Buscar">
                            </div>
                            <div class="col">
                                <button class="btn btn-primary" type="button" onclick="filtro_cliente($('#buscar_cliente').val())">
                                    <li class="fa fa-search"></li>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                &nbsp;
                <table class="table" id="table_clientes">
                    <thead>
                        <tr>
                            <th>identificacion</th>
                            <th>Nombre Completo</th>
                            <th>Id Cliente</th>
                            <th>Motivo no Pago</th>
                            <th>Ver Proceso</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cliente as $data)
                        <tr>
                           
                            <td>{{$data->identificacion}}</td>
                            <td>{{$data->nombrecompleto}}</td>
                            <td>{{$data->idcliente}}</td>
                            <td>{{$data->motvnopago}}</td>
                            <td><button class="btn btn-success" type="button" onclick="verProceso('{{$data->identificacion}}')">Ver</button></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <div class="col">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" onclick="anterior_cliente()" id="button">Anterior</a></li>
                                <li class="page-item"><a class="page-link" onclick="siguiente_cliente()" id="button2">Siguiente</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col">
                        @foreach ($cantidad as $data)
                        <label style="padding-top: 10px;">
                            Numero de CLientes : {{$data->cantidad}}
                        </label>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>