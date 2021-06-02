<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin">
                <div class="card">
                    <div class="card-body">

                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="row">

                                <?php
                                if ($_SESSION["perfil"] != "Administrador") {
                                    echo "<input type='hidden' id='sucursal' class='form-control' value='" . substr($_SESSION["nombre"], 9) . "'>";
                                } else {
                                    echo " <div class='col-lg-2 col-md-2  col-sm-2'>
                                <label class=''>Sucursal</label>
                                <select class='form-control' id='sucursal' onchange='cargarGanadores(1);'>
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
                                    <label class="">Mostrar</label>
                                    <select class="form-control" id="per_page" onchange="cargarGanadores(1);">
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
                                            <button type="button" class="btn btn-danger btn-rounded btn-icon" onclick="cargarGanadores(1);">
                                                <i class="ti-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <p class="card-title mb-0"></p>
                                            <div class="datosGanadores">

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