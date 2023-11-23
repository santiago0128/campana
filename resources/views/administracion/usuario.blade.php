    <div class="block-header">
        <div class="row">
            <div class="col-lg-5 col-md-8 col-sm-12" style="padding-left: 50px;">
                <h1>
                    <li class=" fa fa-users"></li>&nbsp;Usuarios
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
    <div class="col-12">
        <div class="card top_report">
            <div class="body">
                <button type="button" data-toggle="modal" data-target="#addUsuario" id="addusuarios" class="btn btn-success">
                    <li class="fa fa-plus"></li> &nbsp; Agregar Usuario
                </button>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="body">
                <div class="card">
                    <div class="body">
                        <ul class="nav nav-tabs">
                            <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Home">Usuarios</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Profile">Equipo de Trabajo</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Contact">Categoria de Usuario</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane show active" id="Home">
                                <table class="table" id="table_user">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Identificacion</th>
                                            <th>Usuario</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($usuarios as $data)
                                        <tr>
                                            <td>{{$data->nomusu}}</td>
                                            <td>{{$data->apeusu}}</td>
                                            <td>{{$data->documento}}</td>
                                            <td>{{$data->logusu}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                   
                                </table>
                             
                            </div>
                            <div class="tab-pane" id="Profile">
                                <h6>Profile</h6>
                                <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel fixie.</p>
                            </div>
                            <div class="tab-pane" id="Contact">
                                <table>
                                    <thead>
                                        <tr>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="categories">
                                        <tr>
                                            <td>
                                                <strong class="name">
                                                    Super Administrador
                                                </strong>
                                            </td>
                                            <td>
                                                <span title="Puede ver los detalles del plan actual y contratar un plan distinto">
                                                    Ver planes,
                                                </span>
                                                <span title="Puede cambiar las configuraciones globales del sistema">
                                                    Editar configuraciones,
                                                </span>
                                                <span title="Puede descargar los respaldos diarios de la base de datos">
                                                    Descargar respaldos,
                                                </span>
                                                <span title="Puede editar los usuarios del sistema y crear equipos de trabajo">
                                                    Administrar usuarios,
                                                </span>
                                                <span title="Puede editar los listados de clientes, asuntos, jurisdicciones, estados, juzgados, etc...">
                                                    Administrar datos,
                                                </span>
                                                <span title="Puede editar los flujos de trabajo para definir tareas tipo">
                                                    Administrar flujos de trabajo,
                                                </span>
                                                <span title="Puede revisar y reenviar los correos diarios">
                                                    Administrar correos,
                                                </span>
                                                <span title="Puede acceder a los procesos confidenciales en los que no está involucrado">
                                                    Ver procesos confidenciales,
                                                </span>
                                                <span title="Puede acceder a los procesos no-confidenciales en los que no está involucrado">
                                                    Ver procesos públicos,
                                                </span>
                                                <span title="Puede crear nuevos procesos">
                                                    Crear procesos,
                                                </span>
                                                <span title="Puede crear nuevas actuaciones en un proceso">
                                                    Crear actuaciones,
                                                </span>
                                                <span title="Puede ver y modificar datos de cuantía, gastos, recaudaciones, etc...">
                                                    Editar datos económicos,
                                                </span>
                                                <span title="Puede crear y editar las tareas de un proceso">
                                                    Crear tareas,
                                                </span>
                                                <span title="Puede ver y participar en las tareas de un proceso">
                                                    Ver tareas,
                                                </span>
                                                <span title="Puede agregar comentarios, adjuntos y eventos a una actuación">
                                                    Ingresar comentarios,
                                                </span>
                                                <span title="Puede ejecutar acciones masivas sobre conjuntos de procesos">
                                                    Acciones masivas,
                                                </span>
                                                <span title="Puede descargar listados en excel de procesos, clientes, etc...">
                                                    Descargar Excel,
                                                </span>
                                                <span title="Puede ver reportes sobre los procesos">
                                                    Ver reportes,
                                                </span>
                                                <span title="Puede eliminar un proceso creado por él mismo (o cualquiera si puede ver procesos confidenciales)">
                                                    Eliminar procesos,
                                                </span>
                                                <span title="Puede ver los detalles de los movimientos en un proceso">
                                                    Ver movimientos,
                                                </span>
                                                <span title="Puede modificar los datos de un proceso existente">
                                                    Editar procesos,
                                                </span>
                                                <span title="Puede activar y desactivar un proceso existente">
                                                    Activar/desactivar procesos,
                                                </span>
                                            </td>
                                            <td class="actions">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong class="name">
                                                    Administrador
                                                </strong>
                                            </td>
                                            <td>
                                                <span title="Puede editar los usuarios del sistema y crear equipos de trabajo">
                                                    Administrar usuarios,
                                                </span>
                                                <span title="Puede editar los listados de clientes, asuntos, jurisdicciones, estados, juzgados, etc...">
                                                    Administrar datos,
                                                </span>
                                                <span title="Puede editar los flujos de trabajo para definir tareas tipo">
                                                    Administrar flujos de trabajo,
                                                </span>
                                                <span title="Puede revisar y reenviar los correos diarios">
                                                    Administrar correos,
                                                </span>
                                                <span title="Puede acceder a los procesos confidenciales en los que no está involucrado">
                                                    Ver procesos confidenciales,
                                                </span>
                                                <span title="Puede acceder a los procesos no-confidenciales en los que no está involucrado">
                                                    Ver procesos públicos,
                                                </span>
                                                <span title="Puede crear nuevos procesos">
                                                    Crear procesos,
                                                </span>
                                                <span title="Puede crear nuevas actuaciones en un proceso">
                                                    Crear actuaciones,
                                                </span>
                                                <span title="Puede ver y modificar datos de cuantía, gastos, recaudaciones, etc...">
                                                    Editar datos económicos,
                                                </span>
                                                <span title="Puede crear y editar las tareas de un proceso">
                                                    Crear tareas,
                                                </span>
                                                <span title="Puede ver y participar en las tareas de un proceso">
                                                    Ver tareas,
                                                </span>
                                                <span title="Puede agregar comentarios, adjuntos y eventos a una actuación">
                                                    Ingresar comentarios,
                                                </span>
                                                <span title="Puede ejecutar acciones masivas sobre conjuntos de procesos">
                                                    Acciones masivas,
                                                </span>
                                                <span title="Puede descargar listados en excel de procesos, clientes, etc...">
                                                    Descargar Excel,
                                                </span>
                                                <span title="Puede ver reportes sobre los procesos">
                                                    Ver reportes,
                                                </span>
                                                <span title="Puede eliminar un proceso creado por él mismo (o cualquiera si puede ver procesos confidenciales)">
                                                    Eliminar procesos,
                                                </span>
                                                <span title="Puede ver los detalles de los movimientos en un proceso">
                                                    Ver movimientos,
                                                </span>
                                                <span title="Puede modificar los datos de un proceso existente">
                                                    Editar procesos,
                                                </span>
                                                <span title="Puede activar y desactivar un proceso existente">
                                                    Activar/desactivar procesos,
                                                </span>
                                            </td>

                                            <td class="actions">
                                                <div class="btn-group">
                                                    <button class="btn btn-outline-default btn-rounded btn-small dropdown-toggle" data-toggle="dropdown">
                                                        <i class="btn-icon icon icon-caret-down"></i>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a class="edit">
                                                                Editar
                                                            </a>
                                                        </li>
                                                        <li class="divider"></li>
                                                        <li>
                                                            <a class="delete text-danger">
                                                                Eliminar
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <strong class="name">
                                                    Abogado
                                                </strong>
                                            </td>
                                            <td>
                                                <span title="Puede acceder a los procesos no-confidenciales en los que no está involucrado">
                                                    Ver procesos públicos,
                                                </span>
                                                <span title="Puede crear nuevos procesos">
                                                    Crear procesos,
                                                </span>
                                                <span title="Puede crear nuevas actuaciones en un proceso">
                                                    Crear actuaciones,
                                                </span>
                                                <span title="Puede ver y modificar datos de cuantía, gastos, recaudaciones, etc...">
                                                    Editar datos económicos,
                                                </span>
                                                <span title="Puede crear y editar las tareas de un proceso">
                                                    Crear tareas,
                                                </span>
                                                <span title="Puede ver y participar en las tareas de un proceso">
                                                    Ver tareas,
                                                </span>
                                                <span title="Puede agregar comentarios, adjuntos y eventos a una actuación">
                                                    Ingresar comentarios,
                                                </span>
                                                <span title="Puede ver reportes sobre los procesos">
                                                    Ver reportes,
                                                </span>
                                                <span title="Puede eliminar un proceso creado por él mismo (o cualquiera si puede ver procesos confidenciales)">
                                                    Eliminar procesos,
                                                </span>
                                                <span title="Puede ver los detalles de los movimientos en un proceso">
                                                    Ver movimientos,
                                                </span>
                                                <span title="Puede modificar los datos de un proceso existente">
                                                    Editar procesos,
                                                </span>
                                                <span title="Puede activar y desactivar un proceso existente">
                                                    Activar/desactivar procesos,
                                                </span>
                                            </td>
                                            <td class="actions">
                                                <div class="btn-group">
                                                    <button class="btn btn-outline-default btn-rounded btn-small dropdown-toggle" data-toggle="dropdown">
                                                        <i class="btn-icon icon icon-caret-down"></i>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a class="edit">
                                                                Editar
                                                            </a>
                                                        </li>
                                                        <li class="divider"></li>
                                                        <li>
                                                            <a class="delete text-danger">
                                                                Eliminar
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong class="name">
                                                    Procurador
                                                </strong>
                                            </td>
                                            <td>
                                                <span title="Puede crear nuevos procesos">
                                                    Crear procesos,
                                                </span>
                                                <span title="Puede crear nuevas actuaciones en un proceso">
                                                    Crear actuaciones,
                                                </span>
                                                <span title="Puede crear y editar las tareas de un proceso">
                                                    Crear tareas,
                                                </span>
                                                <span title="Puede ver y participar en las tareas de un proceso">
                                                    Ver tareas,
                                                </span>
                                                <span title="Puede agregar comentarios, adjuntos y eventos a una actuación">
                                                    Ingresar comentarios,
                                                </span>
                                                <span title="Puede eliminar un proceso creado por él mismo (o cualquiera si puede ver procesos confidenciales)">
                                                    Eliminar procesos,
                                                </span>
                                                <span title="Puede ver los detalles de los movimientos en un proceso">
                                                    Ver movimientos,
                                                </span>
                                                <span title="Puede modificar los datos de un proceso existente">
                                                    Editar procesos,
                                                </span>
                                                <span title="Puede activar y desactivar un proceso existente">
                                                    Activar/desactivar procesos,
                                                </span>
                                            </td>
                                            <td class="actions">
                                                <div class="btn-group">
                                                    <button class="btn btn-outline-default btn-rounded btn-small dropdown-toggle" data-toggle="dropdown">
                                                        <i class="btn-icon icon icon-caret-down"></i>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a class="edit">
                                                                Editar
                                                            </a>
                                                        </li>
                                                        <li class="divider"></li>
                                                        <li>
                                                            <a class="delete text-danger">
                                                                Eliminar
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong class="name">
                                                    Invitado
                                                </strong>
                                            </td>
                                            <td>
                                                <span title="Puede agregar comentarios, adjuntos y eventos a una actuación">
                                                    Ingresar comentarios,
                                                </span>
                                                <span title="Puede ver los detalles de los movimientos en un proceso">
                                                    Ver movimientos,
                                                </span>
                                            </td>
                                            <td class="actions">
                                                <div class="btn-group">
                                                    <button class="btn btn-outline-default btn-rounded btn-small dropdown-toggle" data-toggle="dropdown">
                                                        <i class="btn-icon icon icon-caret-down"></i>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a class="edit">
                                                                Editar
                                                            </a>
                                                        </li>
                                                        <li class="divider"></li>
                                                        <li>
                                                            <a class="delete text-danger">
                                                                Eliminar
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card">
                                <div class="modal-header">
                                    <h2>Agregar Usuario</h2>
                                </div>
                                <div class="body" style="width: 100%;">
                                    <form id="form_cliente" enctype="multipart/form-data" method="post">
                                        @csrf
                                        <div class="col-4 col-sm-4 col-md-4 col-md-12 col-lg-12" style="padding-top: 5px;">
                                            <label for="">Nombre </label>
                                            <input type="text" class="form-control" name="nombre" id="nombre">
                                        </div>
                                        <div class="col-4 col-sm-4 col-md-4 col-md-12 col-lg-12" style="padding-top: 5px;">
                                            <label for="">Apeliido </label>
                                            <input type="text" class="form-control" name="apellido" id="apellido">
                                        </div>
                                        <div class="col-4 col-sm-4 col-md-4 col-md-12 col-lg-12" style="padding-top: 5px;">
                                            <label for="">Identificacion</label>
                                            <input type="number" class="form-control" name="identificacion" id="identificacion">
                                        </div>
                                        <div class="col-4 col-sm-4 col-md-4 col-md-12 col-lg-12" style="padding-top: 5px;">
                                            <label for="">Correo</label>
                                            <input type="email" class="form-control" name="correo" id="correo">
                                        </div>
                                        <div class="col-4 col-sm-4 col-md-4 col-md-12 col-lg-12" style="padding-top: 5px;">
                                            <label for="">Telefono</label>
                                            <input type="number" class="form-control" name="telefono" id="telefono">
                                        </div>
                                        <div class="col-4 col-sm-4 col-md-4 col-md-12 col-lg-12" style="padding-top: 5px;">
                                            <label for="">celular</label>
                                            <input type="number" class="form-control" name="celular" id="celular">
                                        </div>
                                        <div class="col-4 col-sm-4 col-md-4 col-md-12 col-lg-12" style="padding-top: 5px;">
                                            <label for="">Rol</label>
                                            <select name="rol" id="rol" class="form-control">
                                                @foreach($rol as $item)
                                                <option value='{{$item->id}}'>{{$item->nombre}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-4 col-sm-4 col-md-4 col-md-12 col-lg-12" style="padding-top: 5px;">
                                            <label for="">Usuarios</label>
                                            <input type="text" class="form-control" name="usuario" id="usuario">
                                        </div>
                                        <div class="col-4 col-sm-4 col-md-4 col-md-12 col-lg-12" style="padding-top: 5px;">
                                            <label for="">Contraseña</label>
                                            <input type="password" class="form-control" name="contrasena" id="contrasena">
                                        </div>
                                        &nbsp;
                                        <div class="col-4 col-sm-4 col-md-4 col-md-12 col-lg-12" style="padding-top: 5px;">
                                            <button type="button" id="btnGuardarUsuario" onclick="guardarUsuarios()" class="btn btn-success">Guardar</button>
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
</div>
