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
                            <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?php echo rand(1, 50) ?></h3>
                            <i class="ti-mobile icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                        </div>
                        <p class="mb-0 mt-2 text-success">0.12% <span class="text-black ml-1"><small>(30 days)</small></span></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title text-md-center text-xl-left">Recolecciones</p>
                        <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                            <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?php echo rand(1, 50) ?></h3>
                            <i class="ti-pin icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                        </div>
                        <p class="mb-0 mt-2 text-danger">0.47% <span class="text-black ml-1"><small>(30 days)</small></span></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title text-md-center text-xl-left">Compras</p>
                        <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                            <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?php echo rand(1, 50) ?></h3>
                            <i class="ti-shopping-cart-full icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                        </div>
                        <p class="mb-0 mt-2 text-success">64.00%<span class="text-black ml-1"><small>(30 days)</small></span></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title text-md-center text-xl-left">Acumulado</p>
                        <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                            <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?php echo rand(1, 10000) ?></h3>
                            <i class="ti-money icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                        </div>
                        <p class="mb-0 mt-2 text-success">23.00%<span class="text-black ml-1"><small>(30 days)</small></span></p>
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
                                    <h1>50</h1>
                                    <h3 class="font-weight-light mb-xl-4">Solicitudes</h3>
                                    <p class="text-muted mb-2 mb-xl-0">Total de solicitudes registradas</p>
                                </div>
                            </div>
                            <div class="col-md-12 col-xl-9">
                                <div class="row">
                                    <div class="col-md-6 mt-3 col-xl-5">
                                        <canvas id="solicitudes"></canvas>
                                        <div id="solicitudes-legend"></div>
                                    </div>
                                    <div class="col-md-6 col-xl-7">
                                        <div class="table-responsive mb-3 mb-md-0">
                                            <table class="table table-borderless report-table">
                                                <tr>
                                                    <td class="text-muted">Marco Lopez</td>
                                                    <td class="w-100 px-0">
                                                        <div class="progress progress-md mx-4">
                                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 70%" aria-valuenow="43" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <h5 class="font-weight-bold mb-0">12</h5>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-muted">Elsa Martinez</td>
                                                    <td class="w-100 px-0">
                                                        <div class="progress progress-md mx-4">
                                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 70%" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <h5 class="font-weight-bold mb-0">16</h5>
                                                    </td>
                                                </tr>
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
                                    <tr>
                                        <td>05971P</td>
                                        <td>3M COMPUESTO PULIDOR ECONOPACK 225 ML</td>
                                        <td class="text-danger"><i class="ti-money"></i>162</td>
                                        <td><label class="badge badge-danger">3M</label></td>
                                        <td>3</td>
                                    </tr>
                                    <tr>
                                        <td>06005.41</td>
                                        <td>3M CERA LIQUIDA PREMIUM</td>
                                        <td class="text-danger"><i class="ti-money"></i>382.99</td>
                                        <td><label class="badge badge-danger">3M</label></td>
                                        <td>5</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body" style="max-height:500px;overflow:scroll">
                        <p class="card-title mb-0">Lista Clientes Registrados</p>
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
                                        <th style="border:none">Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Francisco de los santos</td>
                                        <td class="text-danger">Frank</td>
                                        <td>2227362657</td>
                                        <td>2227362657</td>
                                        <td>1</td>
                                        <td>$ 1200</td>
                                        <td><label class="badge badge-danger">Registrado Recientemente</label></td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Carlos de los santos</td>
                                        <td class="text-danger">Frank</td>
                                        <td>2227362657</td>
                                        <td>2227362657</td>
                                        <td>1</td>
                                        <td>$ 1200</td>
                                        <td><label class="badge badge-warning">Registrado Anteriormente</label></td>
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