<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Lista de Solicitudes</h4>


                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="row">

                            <?php
                            if ($_SESSION["perfil"] != "Administrador") {
                                echo "<input type='hidden' id='sucursal' class='form-control' value='" . substr($_SESSION["nombre"], 9) . "'>";
                            } else {
                                echo " <div class='col-lg-2 col-md-2  col-sm-2'>
                                <label class=''>Sucursal</label>
                                <select class='form-control' id='sucursal' onchange='cargarSolicitudes(1);'>
                                    <option value=''>Todas</option>
                                    <option value='San Manuel'>San Manuel</option>
                                    <option value='Santiago'>Santiago</option>
                                    <option value='Reforma'>Reforma</option>
                                    <option value='Capu'>Capu</option>
                                    <option value='Las Torres'>Las Torres</option>
                                </select>
                            </div>";
                            }
                            ?>


                            <div class="col-lg-2 col-md-2  col-sm-2">
                                <label class="">Proceso</label>
                                <select class="form-control" id="estatus" onchange="cargarSolicitudes(1);">
                                    <option value="">Todos</option>
                                    <option value="1">Sin ver</option>
                                    <option value="2">Recolección en camino</option>
                                    <option value="3">En proceso</option>
                                    <option value="4">Entrega en camino</option>
                                    <option value="5">Concluido</option>

                                </select>
                            </div>

                            <div class="col-lg-2 col-md-2  col-sm-2">
                                <label class="">Estatus</label>
                                <select class="form-control" id="estado" onchange="cargarSolicitudes(1);">
                                    <option value="">Todos</option>
                                    <option value="1">Vigente</option>
                                    <option value="0">Cancelado</option>
                                </select>
                            </div>
                            <div class="col-lg-2 col-md-2  col-sm-2">
                                <label class="">Tipo</label>
                                <select class="form-control" id="tipo" onchange="cargarSolicitudes(1);">
                                    <option value="">Todos</option>
                                    <option value="1">Recolección</option>
                                    <option value="2">Compra</option>
                                </select>
                            </div>
                            <div class="col-lg-2 col-md-2  col-sm-2">
                                <label class="">Mostrar</label>
                                <select class="form-control" id="per_page" onchange="cargarSolicitudes(1);">
                                    <option>5</option>
                                    <option>10</option>
                                    <option selected="">15</option>
                                    <option>20</option>
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-4  col-sm-4">
                                <div class="row">
                                    <div class="col-lg-9 col-md-9 col-sm-9">
                                        <label class="">Buscar por cliente</label>
                                        <input type="text" class="form-control" id="nombre">
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                        <button type="button" class="btn btn-danger btn-rounded btn-icon" onclick="cargarSolicitudes(1);">
                                            <i class="ti-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4  col-sm-4">
                                <div class="row">
                                    <div class="col-lg-9 col-md-9 col-sm-9">
                                        <button type="button" class="btn btn-primary btn-icon-text btn-rounded" onclick="cargarSolicitudes(1);">
                                            <i class="ti-clipboard btn-icon-prepend"></i>Actualizar
                                        </button>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-title mb-0"></p>
                                <div class="datosSolicitudes">

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
                <h5 class="modal-title">DATOS DEL CLIENTE</h5>

            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Datos cliente</h4>
                                <p class="card-description" id="nombreCliente">

                                </p>
                                <form class="forms-sample">

                                    <div class="form-group">
                                        <label>Taller</label>
                                        <input type="text" class="form-control" id="taller" disabled>
                                    </div>
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



                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Ubicacion Cliente</h4>
                                <div id="datosMapa" class="row">
                                    <div id="map" class="col-lg-8 col-md-12 col-sm-12"></div>

                                    <div class="col-lg-4 col-md-12 col-sm-12">
                                        <div class="box box-info collapsed-box">
                                            <div class="box-header with-border">
                                                <h4>Ver Indicaciones</h4>
                                                <p>Distancia Total: <span id="total"></span></p>
                                                <div class="box-tools pull-right">
                                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                                </div>
                                            </div>
                                            <div class="box-body no-padding">
                                                <div id="right-panel">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="input-group">
                    <input type="hidden" class="form-control input-lg" id="nameSucursal" name="nameSucursal" readonly style="border: none;background: white;">

                </div>

                <div class="input-group">
                    <input type="hidden" class="form-control input-lg" id="latitudCliente" name="latitudCliente" readonly style="border: none;background: white;">
                    <input type="hidden" class="form-control input-lg" id="longitudCliente" name="longitudCliente" readonly style="border: none;background: white;">

                </div>

                <div class="input-group">
                    <input type="hidden" class="form-control input-lg" id="latitudSucursal" name="latitudSucursal" readonly style="border: none;background: white;">
                    <input type="hidden" class="form-control input-lg" id="longitudSucursal" name="longitudSucursal" readonly style="border: none;background: white;">

                </div>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-info" id="salir" data-dismiss="modal">Salir</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Ver Datos Facturacion-->

<div class="modal fade" id="modalVerDatosFacturacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="btn btn-success btn-rounded btn-icon" data-dismiss="modal" aria-label="Close">
                    <i class="ti-close"></i>
                </button>
                <h5 class="modal-title">DATOS DE FACTURACIÓN</h5>

            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Datos cliente</h4>
                                <p class="card-description" id="nombreCliente">

                                </p>
                                <form class="forms-sample">

                                    <div class="form-group">
                                        <label>RFC</label>
                                        <input type="text" class="form-control" id="rfc" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Razón Social:</label>
                                        <input type="text" class="form-control" id="razonSocial" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Dirección Fiscal:</label>
                                        <textarea class="form-control" id="direccionFiscal" rows="4"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Código Postal:</label>
                                        <input type="text" class="form-control" id="codigoPostal" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Correo Electrónico:</label>
                                        <input type="text" class="form-control" id="correo" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Uso Cfdi:</label>
                                        <input type="text" class="form-control" id="usoCfdi" disabled>
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
<div class="modal fade" id="modalVerObservaciones" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="btn btn-success btn-rounded btn-icon" data-dismiss="modal" aria-label="Close">
                    <i class="ti-close"></i>
                </button>
                <h5 class="modal-title"></h5>

            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Observaciones</h4>
                                <p class="card-description" id="nombreCliente">

                                </p>
                                <form class="forms-sample">

                                    <div class="form-group">

                                        <textarea class="form-control" id="observaciones" rows="4"></textarea>
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
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA7Ow27ztKwFY0_CyX5FXXfK6PV87gJsPQ"></script>
<script type="text/javascript">
    function getQueryVariable(variable) {
        //Estoy asumiendo que query es window.location.search.substring(1);
        var urlSolicitud = location.search;
        var query = urlSolicitud;
        var vars = query.split("&");
        for (var i = 0; i < vars.length; i++) {
            var pair = vars[i].split("=");
            if (pair[0] == variable) {
                return pair[1];
            }
        }
        return false;
    }

    var URLactual = window.location;

    if (URLactual == "http://localhost/DEKKERADMIN/solicitud") {

    } else {
        var folio = getQueryVariable("folio");
        var opcion = getQueryVariable("opcion");
        if (folio == "false" && opcion == "false") {} else {
            window.location.href =
                "views/moduls/pdf.php/?folio=" + folio + "&opcion=" + opcion;
            setTimeout(function() {
                window.location.href = "solicitud";

            }, 1000);
        }
    }
</script>