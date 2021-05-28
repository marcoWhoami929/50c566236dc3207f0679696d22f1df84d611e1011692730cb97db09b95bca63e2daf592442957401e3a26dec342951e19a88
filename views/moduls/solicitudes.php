<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Lista de Solicitudes</h4>
                        <p class="card-description">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group row">
                                <label class="">Sucursal</label>
                                <div class="col-lg-2 col-md-2  col-sm-2">
                                    <select class="form-control" id="sucursal" onchange="cargarSolicitudes(1);">
                                        <option value="">Todas</option>
                                        <option value="San Manuel">San Manuel</option>
                                        <option value="Santiago">Santiago</option>
                                        <option value="Reforma">Reforma</option>
                                        <option value="Capu">Capu</option>
                                        <option value="Las Torres">Las Torres</option>
                                    </select>
                                </div>
                                <label class="">Estatus</label>
                                <div class="col-lg-2 col-md-2  col-sm-2">
                                    <select class="form-control" id="estatus" onchange="cargarSolicitudes(1);">
                                        <option value="">Todos</option>
                                        <option value="1">Sin ver</option>
                                        <option value="2">Recolección en camino</option>
                                        <option value="3">En proceso</option>
                                        <option value="4">Entrega en camino</option>
                                        <option value="5">Concluido</option>

                                    </select>
                                </div>

                                <label class="">Mostrar</label>
                                <div class="col-lg-2 col-md-2  col-sm-2">
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
                                            <input type="text" class="form-control" id="nombre">
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3">
                                            <button type="button" class="btn btn-danger btn-rounded btn-icon" onclick="cargarSolicitudes(1);">
                                                <i class="ti-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        </p>
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
<style>
    #datosMapa {
        display: none;
    }

    #map {

        width: 64%;
        height: 480px;
        box-shadow: 5px 5px 5px #888;
    }

    #right-panel {
        width: 100%;
        height: 50%;
    }
</style>
<!-- Modal -->
<div class="modal fade" id="modalVerDatos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header" style="background:#2667ce; color:white">
                <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="exampleModalLabel">DATOS DEL CLIENTE</h5>

            </div>
            <div class="modal-body">

                <div class="input-group">
                    <span class="input-group-addon" style="font-weight: bold; border:none;">Nombre:</span>
                    <input type="text" class="form-control input-lg" id="nombre" name="nombre" readonly style="border:none; background: white;">
                </div>

                <div class="input-group">
                    <span class="input-group-addon" style="font-weight: bold; border:none;">Taller:</span>
                    <input type="text" class="form-control input-lg" id="taller" name="taller" readonly style="border: none;background: white;">
                </div>

                <div class="input-group">
                    <span class="input-group-addon" style="font-weight: bold; border:none;">Telefono:</span>
                    <input type="text" class="form-control input-lg" id="telefono" name="telefono" readonly style="border: none;background: white;">
                </div>

                <div class="input-group">
                    <span class="input-group-addon" style="font-weight: bold; border:none;">Celular:</span>
                    <input type="text" class="form-control input-lg" id="celular" name="celular" readonly style="border: none;background: white;">
                </div>

                <div class="input-group">
                    <span class="input-group-addon" style="font-weight: bold; border:none;">Dirección:</span>
                    <input type="text" class="form-control input-lg" id="direccion" name="direccion" readonly style="border: none;background: white;">

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

                <div id="datosMapa">
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
                <br>


            </div>


            <div class="modal-footer">
                <button id="mostrarMapa" class="btn btn-success"><i class="fa fa-map-marker" aria-hidden="true"></i> Ver Ruta</button>
                <button type="button" class="btn btn-info" id="salir" data-dismiss="modal">Salir</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Ver Datos Facturacion-->
<div class="modal fade" id="modalVerDatosFacturacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="width: 50%">
        <div class="modal-content">
            <div class="modal-header" style="background:#2667ce; color:white">
                <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="exampleModalLabel">DATOS DEL FACTURACIÓN</h5>

            </div>
            <div class="modal-body">

                <div class="input-group">
                    <span class="input-group-addon" style="font-weight: bold; border:none;color: #2667ce">RFC:</span>

                    <input type="text" class="form-control input-lg" id="rfc" name="rfc" readonly style="border:none; background: white;font-size:11px">
                </div>

                <div class="input-group">
                    <span class="input-group-addon" style="font-weight: bold; border:none;color: #2667ce">Razón Social:</span>

                    <input type="text" class="form-control input-lg" id="razonSocial" name="razonSocial" readonly style="border: none;background: white;font-size:11px">
                </div>

                <div class="input-group">
                    <span class="input-group-addon" style="font-weight: bold; border:none;color: #2667ce">Dirección Fiscal:</span>

                    <input type="text" class="form-control input-lg" id="direccionFiscal" name="direccionFiscal" readonly style="border: none;background: white;font-size:11px">
                </div>

                <div class="input-group">
                    <span class="input-group-addon" style="font-weight: bold; border:none;color: #2667ce">Código Postal:</span>

                    <input type="text" class="form-control input-lg" id="codigoPostal" name="codigoPostal" readonly style="border: none;background: white;font-size:11px">
                </div>

                <div class="input-group">
                    <span class="input-group-addon" style="font-weight: bold; border:none;color: #2667ce">Correo:</span>

                    <input type="text" class="form-control input-lg" id="correo" name="correo" readonly style="border: none;background: white;font-size:11px">

                </div>

                <div class="input-group">
                    <span class="input-group-addon" style="font-weight: bold; border:none;color: #2667ce">Uso Cfdi:</span>

                    <input type="text" class="form-control input-lg" id="usoCfdi" name="usoCfdi" readonly style="border: none;background: white;font-size:11px">

                </div>

                <br>


            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-info" id="salir" data-dismiss="modal">Salir</button>
            </div>
        </div>
    </div>
</div>
<script>
    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 18,
            scrollwheel: true,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            center: {
                lat: 19.012329,
                lng: -98.202981
            }
        });

        var directionsService = new google.maps.DirectionsService;
        var directionsRenderer = new google.maps.DirectionsRenderer({
            draggable: false,
            map: map,
            panel: document.getElementById('right-panel')
        });

        directionsRenderer.addListener('directions_changed', function() {
            computeTotalDistance(directionsRenderer.getDirections());


        });
        var latitudCliente = $("#latitudCliente").val();
        var longitudCliente = $("#longitudCliente").val();
        var direccionesCliente = '' + latitudCliente + ',' + longitudCliente + '';



        var latitudSucursal = $("#latitudSucursal").val();
        var longitudSucursal = $("#longitudSucursal").val();
        var coordenadaSucursal = '' + latitudSucursal + ',' + longitudSucursal + '';

        displayRoute('' + coordenadaSucursal + '', '' + direccionesCliente + '', directionsService,
            directionsRenderer);
    }

    function displayRoute(origin, destination, service, display) {
        document.getElementById('right-panel').innerHTML = "";
        service.route({
            origin: origin,
            destination: destination,

            travelMode: 'DRIVING',
            avoidTolls: true
        }, function(response, status) {
            if (status === 'OK') {
                display.setDirections(response);
            } else {
                console.log('Could not display directions due to: ' + status);
            }
        });
    }

    function computeTotalDistance(result) {
        var total = 0;
        var myroute = result.routes[0];
        for (var i = 0; i < myroute.legs.length; i++) {
            total += myroute.legs[i].distance.value;
        }
        total = total / 1000;
        document.getElementById('total').innerHTML = total + ' km';
    }

    $('#mostrarMapa').click(function() {
        initMap();
        $('#datosMapa').toggle(1000);

    });

    $('#close').click(function() {
        initMap();
        $('#datosMapa').toggle(1000);

    });
    $('#salir').click(function() {
        initMap();
        $('#datosMapa').toggle(1000);

    });
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA_dlGznsov-uJDQUmmsHIR_vsA103iiLc&callback=initMap"></script>