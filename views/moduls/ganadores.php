<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin">
                <div class="card">
                    <div class="card-body">

                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="row">
                                <div class="col-lg-2 col-md-2  col-sm-2">
                                    <label class="">Serie Tienda</label>
                                    <select class="form-control" id="serie" onchange="cargarGanadores(1);">
                                        <option value="">Todas</option>
                                        <option value="FASM">FASM</option>
                                        <option value="FACP">FACP</option>
                                        <option value="FASG">FASG</option>
                                        <option value="FARF">FARF</option>
                                        <option value="FATR">FATR</option>

                                    </select>
                                </div>
                                <div class="col-lg-2 col-md-2  col-sm-2">
                                    <label class="">Ganadores</label>
                                    <select class="form-control" id="ganadores" onchange="cargarGanadores(1);">
                                        <option value="">Todas</option>
                                        <option value="1">GANADORES CON STOCK</option>
                                        <option value="0">GANADORES SIN STOCK</option>

                                    </select>
                                </div>
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