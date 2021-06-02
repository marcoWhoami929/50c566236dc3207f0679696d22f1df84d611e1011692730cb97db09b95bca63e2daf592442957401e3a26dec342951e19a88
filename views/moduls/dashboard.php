<?php
require_once "models/functionsModel.php";
$solicitudes = new ModelFunctions();

$realizadas = $solicitudes->mdlMostarTotalSolicitudes(1, 2);
$recolecciones = $solicitudes->mdlMostarTotalSolicitudes(1, 1);
$compras = $solicitudes->mdlMostarTotalSolicitudes(2, 2);

$acumulado = $solicitudes->mdlMostrarAcumuladoCompras();

$compradores = $solicitudes->mdlMostrarListaCompradores();



?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="font-weight-bold mb-0">DEKKERAPP 2021</h4>
                    </div>
                    <div>
                        <button type="button" class="btn btn-primary btn-icon-text btn-rounded">
                            <i class="ti-clipboard btn-icon-prepend"></i>Reporte
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title text-md-center text-xl-left">Solicitudes Realizadas</p>
                        <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                            <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?php echo $realizadas["total"] ?></h3>
                            <i class="ti-mobile icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title text-md-center text-xl-left">Recolecciones</p>
                        <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                            <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?php echo $recolecciones["total"] ?></h3>
                            <i class="ti-pin icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title text-md-center text-xl-left">Compras</p>
                        <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                            <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?php echo $compras["total"] ?></h3>
                            <i class="ti-shopping-cart-full icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title text-md-center text-xl-left">Acumulado</p>
                        <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                            <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">$ <?php echo number_format($acumulado["acumulado"], 2) ?></h3>
                            <i class="ti-money icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Recolecciones Acumuladas</h4>
                        <canvas id="recolecciones"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Compras Acumuladas</h4>
                        <canvas id="compras"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Monto de Compras</h4>
                        <canvas id="montoCompras"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-md-12 grid-margin stretch-card">
                <div class="card position-relative">
                    <div class="card-body">
                        <p class="card-title">Total de Solicitudes</p>
                        <div class="row">
                            <div class="col-md-12 col-xl-3 d-flex flex-column justify-content-center">
                                <div class="ml-xl-4">
                                    <h1><?php echo $realizadas["total"] ?></h1>
                                    <h3 class="font-weight-light mb-xl-4">Solicitudes</h3>
                                    <p class="text-muted mb-2 mb-xl-0">Total de solicitudes registradas</p>
                                </div>
                            </div>
                            <div class="col-md-12 col-xl-9">
                                <div class="row">
                                    <div class="col-md-6 mt-3 col-xl-5">

                                    </div>
                                    <div class="col-md-6 col-xl-7">
                                        <div class="table-responsive mb-3 mb-md-0">
                                            <table class="table table-borderless report-table">
                                                <?php

                                                foreach ($compradores as $value) {

                                                    echo "<tr>
                                                    <td class='text-muted'>" . $value['cliente'] . "</td>
                                                    <td class='w-100 px-0'>
                                                        <div class='progress progress-md mx-4'>
                                                            <div class='progress-bar bg-primary' role='progressbar' style='width: " . ($value['total'] / $realizadas["total"] * 100) . "%' aria-valuenow='43' aria-valuemin='0' aria-valuemax='100'></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <h5 class='font-weight-bold mb-0'>" . $value['total'] . "</h5>
                                                    </td>
                                                </tr>";
                                                }
                                                ?>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body" style="max-height:500px;overflow:scroll">
                        <p class="card-title mb-0">Productos Mas Solicitados</p>
                        <div class="table-responsive">
                            <table class="table table-hover  table-striped dt-responsive tableProductosSolicitados">
                                <thead>
                                    <tr>
                                        <th style="border:none">Codigo</th>
                                        <th style="border:none">Descripcion</th>
                                        <th style="border:none">Precio</th>
                                        <th style="border:none">Marca</th>
                                        <th style="border:none">#Ventas</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body" style="max-height:500px;overflow:scroll">
                        <p class="card-title mb-0">Lista Clientes Con Compras</p>
                        <div class="table-responsive">
                            <table class="table  table-hover  table-striped dt-responsive tableClientesRegistrados">
                                <thead>
                                    <tr>
                                        <th style="border:none">Id</th>
                                        <th style="border:none">Nombre</th>
                                        <th style="border:none">Taller</th>
                                        <th style="border:none">Telefono</th>
                                        <th style="border:none">Celular</th>
                                        <th style="border:none"># Compras</th>
                                        <th style="border:none">$ Compra Acumulada</th>

                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>