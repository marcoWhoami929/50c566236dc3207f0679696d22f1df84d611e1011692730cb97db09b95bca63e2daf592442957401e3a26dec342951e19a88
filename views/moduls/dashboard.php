<?php
error_reporting(0);
require_once "models/functionsModel.php";
$acumula = new ModelFunctions();

$participantes = $acumula->mdlMostarTotalParticipantes();
$participantesNuevos = $acumula->mdlMostarTotalParticipantesNuevos();
$facturas = $acumula->mdlMostarTotalFacturasRegistradas();
$sinRegistrar = $acumula->mdlMostarTotalFacturasSinRegistrar();
$acumuladoPromociones = $acumula->mdlMostrarAcumuladoPromociones();
$obtenerPremiosGanados = $acumula->mdlObtenerPremiosGanados();


?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="font-weight-bold mb-0">ACUMULA Y GANA</h4>
                    </div>
                    <div>
                        <!--
                        <button type="button" class="btn btn-primary btn-icon-text btn-rounded">
                            <i class="ti-clipboard btn-icon-prepend"></i>Reporte
                        </button>
                        -->
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title text-md-center text-xl-left">Participantes Registrados</p>
                        <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                            <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?php echo $participantes["participantes"] ?></h3>
                            <i class="ti-user icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title text-md-center text-xl-left">Participantes Nuevos</p>
                        <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                            <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?php echo $participantesNuevos["nuevos"] ?></h3>
                            <i class="ti-mobile icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title text-md-center text-xl-left">Facturas Registradas</p>
                        <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                            <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?php echo $facturas["registradas"] ?></h3>
                            <i class="ti-receipt icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title text-md-center text-xl-left">Facturas Pendientes</p>
                        <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                            <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?php echo $sinRegistrar["sinRegistrar"] ?></h3>
                            <i class="ti-receipt icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title text-md-center text-xl-left">Acumulado Total</p>
                        <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                            <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0" style="color:green">$ <?php echo number_format($acumuladoPromociones["premio1"], 2) ?></h3>
                            <i class="ti-money icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title text-md-center text-xl-left">Acumulado Capu</p>
                        <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                            <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0" style="color:blue">$ <?php $acumuladoFacturasElegidas = $acumula->mdlMostrarAcumuladoFacturasElegidas("FACP");
                                                                                                        echo number_format($acumuladoFacturasElegidas["acumulado"], 2) ?></h3>
                            <i class="ti-money icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title text-md-center text-xl-left">Acumulado Reforma</p>
                        <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                            <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0" style="color:blue">$ <?php $acumuladoFacturasElegidas = $acumula->mdlMostrarAcumuladoFacturasElegidas("FARF");
                                                                                                        echo number_format($acumuladoFacturasElegidas["acumulado"], 2) ?></h3>
                            <i class="ti-money icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title text-md-center text-xl-left">Acumulado Santiago</p>
                        <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                            <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0" style="color:blue">$ <?php $acumuladoFacturasElegidas = $acumula->mdlMostrarAcumuladoFacturasElegidas("FASG");
                                                                                                        echo number_format($acumuladoFacturasElegidas["acumulado"], 2) ?></h3>
                            <i class="ti-money icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                        </div>

                    </div>
                </div>
            </div>

        </div>
        <div class="row">

            <div class="col-md-3 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title text-md-center text-xl-left">Acumulado San Manuel</p>
                        <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                            <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0" style="color:blue">$ <?php $acumuladoFacturasElegidas = $acumula->mdlMostrarAcumuladoFacturasElegidas("FASM");
                                                                                                        echo number_format($acumuladoFacturasElegidas["acumulado"], 2) ?></h3>
                            <i class="ti-money icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title text-md-center text-xl-left">Acumulado Las Torres</p>
                        <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                            <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0" style="color:blue">$ <?php $acumuladoFacturasElegidas = $acumula->mdlMostrarAcumuladoFacturasElegidas("FATR");
                                                                                                        echo number_format($acumuladoFacturasElegidas["acumulado"], 2) ?></h3>
                            <i class="ti-money icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title text-md-center text-xl-left">Ganados Premio 1</p>
                        <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                            <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0" style="color:green"><?php echo $obtenerPremiosGanados[0]["ganados"] ?></h3>
                            <i class="ti-money icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                        </div>
                        <p class="mb-0 mt-2 <?php if ($obtenerPremiosGanados[0]["ganados"] == 0) {
                                                echo 'text-success';
                                            } else {
                                                echo 'text-danger';
                                            } ?>">STOCK <span class="text-black ml-1"><small>(<?php echo $obtenerPremiosGanados[0]["stockPremios"] - $obtenerPremiosGanados[0]["ganados"] ?>)</small></span></p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title text-md-center text-xl-left">Ganados Premio 2</p>
                        <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                            <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0" style="color:green"><?php echo $obtenerPremiosGanados[1]["ganados"] ?></h3>
                            <i class="ti-money icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                        </div>
                        <p class="mb-0 mt-2 <?php if ($obtenerPremiosGanados[1]["ganados"] == 0) {
                                                echo 'text-success';
                                            } else {
                                                echo 'text-danger';
                                            } ?>">STOCK <span class="text-black ml-1"><small>(<?php echo $obtenerPremiosGanados[1]["stockPremios"] - $obtenerPremiosGanados[1]["ganados"] ?>)</small></span></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title text-md-center text-xl-left">Ganados Premio 3</p>
                        <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                            <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0" style="color:green"><?php echo $obtenerPremiosGanados[2]["ganados"] ?></h3>
                            <i class="ti-money icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                        </div>
                        <p class="mb-0 mt-2 <?php if ($obtenerPremiosGanados[2]["ganados"] == 0) {
                                                echo 'text-success';
                                            } else {
                                                echo 'text-danger';
                                            } ?>">STOCK <span class="text-black ml-1"><small>(<?php echo $obtenerPremiosGanados[2]["stockPremios"] - $obtenerPremiosGanados[2]["ganados"] ?>)</small></span></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title text-md-center text-xl-left">Ganados Sin Stock Premio 1</p>
                        <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                            <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0" style="color:orange"><?php echo $obtenerPremiosGanados[0]["ganadosSinStock"] ?></h3>
                            <i class="ti-number icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                        </div>
                        <p class="mb-0 mt-2 <?php if ($obtenerPremiosGanados[0]["ganados"] == 0) {
                                                echo 'text-success';
                                            } else {
                                                echo 'text-danger';
                                            } ?>">STOCK <span class="text-black ml-1"><small>(<?php echo $obtenerPremiosGanados[0]["stockPremios"] - $obtenerPremiosGanados[0]["ganados"] ?>)</small></span></p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title text-md-center text-xl-left">Ganados Sin Stock Premio 2</p>
                        <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                            <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0" style="color:orange"><?php echo $obtenerPremiosGanados[1]["ganadosSinStock"] ?></h3>
                            <i class="ti-number icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                        </div>
                        <p class="mb-0 mt-2 <?php if ($obtenerPremiosGanados[1]["ganados"] == 0) {
                                                echo 'text-success';
                                            } else {
                                                echo 'text-danger';
                                            } ?>">STOCK <span class="text-black ml-1"><small>(<?php echo $obtenerPremiosGanados[1]["stockPremios"] - $obtenerPremiosGanados[1]["ganados"] ?>)</small></span></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title text-md-center text-xl-left">Ganados Sin Stock Premio 3</p>
                        <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                            <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0" style="color:orange"><?php echo $obtenerPremiosGanados[2]["ganadosSinStock"] ?></h3>
                            <i class="ti-number icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                        </div>
                        <p class="mb-0 mt-2 <?php if ($obtenerPremiosGanados[2]["ganados"] == 0) {
                                                echo 'text-success';
                                            } else {
                                                echo 'text-danger';
                                            } ?>">STOCK <span class="text-black ml-1"><small>(<?php echo $obtenerPremiosGanados[2]["stockPremios"] - $obtenerPremiosGanados[2]["ganados"] ?>)</small></span></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Facturas Registradas Por tienda</h4>
                        <canvas id="acumuladoRegistrosPorTienda"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Acumulado Facturas Registradas</h4>
                        <canvas id="acumuladoFacturasRegistradas"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Ganadores Por Tienda</h4>
                        <canvas id="acumuladoGanadoresTienda"></canvas>
                    </div>
                </div>
            </div>
           
            <div class="col-lg-6 grid-margin  stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Ganadores Por Tienda</h4>
                  <canvas id="acumuladoGanadoresTiendaPie"></canvas>
                </div>
              </div>
            </div>
        

        </div>
    </div>

</div>