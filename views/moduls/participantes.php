<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Lista de Participantes</h4>


                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="row">
                                <div class="col-lg-2 col-md-2  col-sm-2">
                                    <label class="">Facturas Registradas</label>
                                    <select class="form-control" id="estatus" onchange="cargarParticipantes(1);">
                                        <option value="">Todos</option>
                                        <option value="1">Con Facturas Registradas</option>
                                        <option value="0">Sin Facturas Registradas</option>

                                    </select>
                                </div>
                                <div class="col-lg-2 col-md-2  col-sm-2">
                                    <label class="">Mostrar</label>
                                    <select class="form-control" id="per_page" onchange="cargarParticipantes(1);">
                                        <option>5</option>
                                        <option>10</option>
                                        <option selected="">15</option>
                                        <option>20</option>
                                    </select>
                                </div>
                                <div class="col-lg-4 col-md-4  col-sm-4">
                                    <div class="row">
                                        <div class="col-lg-9 col-md-9 col-sm-9">
                                            <label class="">Buscar por Nombre</label>
                                            <input type="text" class="form-control" id="nombre">
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3">
                                            <button type="button" class="btn btn-danger btn-rounded btn-icon" onclick="cargarParticipantes(1);">
                                                <i class="ti-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <p class="card-title mb-0"></p>
                                            <div class="datosParticipantes">

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
    </div>
</div>
<!--=====================================
MODAL MOSTRAR DATOS DEL CLIENTE
======================================-->

<!-- Modal -->
<div class="modal fade" id="modalVerDatos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="btn btn-success btn-rounded btn-icon" data-dismiss="modal" aria-label="Close">
                    <i class="ti-close"></i>
                </button>
                <h5 class="modal-title">DATOS DEL PARTICIPANTE</h5>

            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Datos</h4>
                                <p class="card-description" id="nombreParticipante">

                                </p>
                                <form class="forms-sample">
                                    <div class="form-group">
                                        <label>Telefono</label>
                                        <input type="text" class="form-control" id="telefono" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Celular</label>
                                        <input type="text" class="form-control" id="celular" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Direccion</label>
                                        <textarea class="form-control" id="direccion" rows="4"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Codigo postal</label>
                                        <input type="text" class="form-control" id="cp" disabled>
                                    </div>


                                </form>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-info" id="salir" data-dismiss="modal">Salir</button>
            </div>
        </div>
    </div>
</div>