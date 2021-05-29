<?php ob_start(); ?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        .logo {
            width: 200px;
        }

        .address {
            display: inline;
            width: 100px;
            padding: 0px;
            margin: 0px;
            padding-left: 20px;
            border: 1px solid red;
        }

        .titulo {
            font-size: 17px;
            font-weight: bold;
            text-align: left;
            font-family: Helvetica, Sans-Serif;

        }

        .cotizacion {
            font-size: 15px;
            font-weight: bold;
            text-align: right;
            font-family: Helvetica, Sans-Serif;
            color: #30AB4F;
            margin-right: 28px;

        }

        .statusCotizacion {
            font-size: 15px;
            font-weight: bold;
            text-align: right;
            font-family: Helvetica, Sans-Serif;
            color: #30AB4F;
            margin-right: -100px;
            margin-left: -100px;

        }

        .rfc {
            color: #0362CE;
            font-family: Helvetica, Sans-Serif;
            font-weight: lighter;
            font-size: 12px;
            text-align: left;
            margin-left: -70px;
        }

        .dir1 {
            color: #0362CE;
            font-family: Helvetica, Sans-Serif;
            font-weight: lighter;
            font-size: 12px;
            margin-left: -70px;
        }

        .matriz {
            color: #0362CE;
            font-family: Helvetica, Sans-Serif;
            font-weight: lighter;
            font-size: 12px;
            margin-left: -70px;
        }

        .matriz1 {
            color: #000000;
            font-family: Helvetica, Sans-Serif;
            font-weight: lighter;
            font-size: 12px;
            margin-left: 10px;
        }

        .direccion {
            color: #000000;
            font-family: Helvetica, Sans-Serif;
            font-weight: lighter;
            font-size: 12px;
            margin-left: -70px;

        }

        .direccion1 {
            color: #000000;
            font-family: Helvetica, Sans-Serif;
            font-weight: lighter;
            font-size: 12px;
            margin-left: -70px;

        }

        .direccion2 {
            color: #000000;
            font-family: Helvetica, Sans-Serif;
            font-weight: lighter;
            font-size: 12px;
            margin-left: -70px;

        }

        .nroPedido {
            color: #0362CE;
            font-family: Helvetica, Sans-Serif;
            font-weight: lighter;
            font-size: 12px;
            margin-left: 200px;
        }

        .pedido {
            color: #0362CE;
            font-family: Helvetica, Sans-Serif;
            font-weight: lighter;
            font-size: 12px;
            margin-left: 50px;
        }

        .numFolio {
            color: black;
            font-family: Helvetica, Sans-Serif;
            font-weight: lighter;
            font-size: 12px;
        }

        .expedicion {
            color: black;
            font-family: Helvetica, Sans-Serif;
            font-weight: lighter;
            font-size: 8px;
        }

        .fechaExpedicion {
            color: black;
            font-family: Helvetica, Sans-Serif;
            font-weight: lighter;
            font-size: 8px;
        }

        .fecha-exp {
            color: black;
            font-family: Helvetica, Sans-Serif;
            font-weight: lighter;
            font-size: 9px;
        }

        .table th,
        .table td {
            border: none;
        }

        .table tbody td {
            height: 40px;
            text-align: left;
        }

        .vl {
            border-left: 2px solid;
            height: 78px;
            z-index: 101;
            color: #ABABAB;
            margin-top: -38px;
            margin-left: 500px;
        }

        .v2 {
            border-left: 1px solid;
            width: 100%;
            height: 0.5px;
            z-index: 101;
            color: #ABABAB;
            margin-top: -40px;
            margin-left: 0px;
        }

        hr {
            border-style: solid;
            border-width: 1px;
            color: #ABABAB;
        }

        hr.style-one {
            border: 0;
            height: 1px;
            background: #ABABAB;

        }
    </style>

</head>

<body>
    <?php
    session_start();
    require_once __DIR__ . "../../../controllers/functionsController.php";
    require_once __DIR__ . "../../../models/functionsModel.php";

    if (isset($_GET["folio"])) {
        $folio = $_GET["folio"];
    } else {
        $folio = $_GET["folio"];
    }


    $item = "id";
    $valor = $folio;
    $mostrar = new ControllerFunctions();
    $controlMuestras = $mostrar->ctrMostrarMuestrasPdf($item, $valor);

    foreach ($controlMuestras as $key => $value) {
        $observaciones = $value["observaciones"];
        $observacionesProductos = $value["observacionesProductos"];
        $formaPago = $value["formaPago"];
        $fechaElaboracion = $value["horaSolicitud"];
        $item = "id";
        /*****OBETENER LOS DATOS DEL CLIENTE*/
        $idCliente =  $value["idCliente"];
        $valor = $idCliente;
        $mostrar = new ControllerFunctions();
        $mostrarDatosCliente = $mostrar->ctrMostrarDatosCliente($item, $valor);

        foreach ($mostrarDatosCliente as $datos) {

            $nombreCliente = $datos["nombreCompleto"];
            $domicilioCompleto = $datos["direccion"];
            $separadoDomicilio = explode(",", $domicilioCompleto);
            $domicilio = $separadoDomicilio[0] . " " . $separadoDomicilio[1];
            $colonia = $separadoDomicilio[2];
            $municipio = $separadoDomicilio[3];
            $estado = $separadoDomicilio[4];
            $cp = $separadoDomicilio[5];
            $ciudad = "Puebla";
            $pais = "México";
            $telefono = $datos["celular"];
            $taller = $datos["taller"];
        }
    }


    ?>
    <table style="width: 100%;">
        <thead>
            <tr>
                <th>
                    <b class="titulo">PINTURAS Y COMPLEMENTOS DE PUEBLA S.A. DE C.V.</b>
                </th>
                <th>
                    <b class="cotizacion">SOLICITUD</b>
                </th>


            </tr>
        </thead>
    </table>
    <table style="width: 100%;">
        <thead>
            <tr>
                <th>
                    <img class="logo" src="../images/logo.png" />
                </th>
                <th>
                    <b class="rfc">PCP970822467</b> <b class="nroPedido">Serie:<b class="numFolio">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SOLM</b></b>
                    <br>
                    <b class="dir1">Régimen General de Ley Personas Morales</b> <b class="pedido">Folio: <b class="numFolio">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $folio ?></b></b>
                    <br>
                    <b class="matriz">Matriz:</b><b class="matriz1">Libertad 5973</b>
                    <br>
                    <b class="direccion"><strong class="direccion" style="font-weight: bold;">Col.</strong>San Baltazar Campeche <strong>C.P</strong> 72550 <strong>Localidad</strong> Puebla</b>
                    <br>
                    <b class="direccion1">(Heroica Puebla) <strong>Municipio</strong> Puebla</b>
                    <br>
                    <b class="direccion2"><strong class="direccion2" style="font-weight: bold;">Estado</strong> Puebla <strong>País</strong> México</b>
                    <br>
                </th>


            </tr>
        </thead>
    </table>
    <br>
    <table style="width: 100%">

        <thead>
            <tr>
                <th>
                    <b class="expedicion"><strong class="expedicion" style="font-weight: bold;color: #0362CE;">Lugar de Expedición:</strong> Ejido No. 5970 Int No. A,B,C. <strong>Col.</strong> San Baltazar Linda Vista. <strong>C.P.</strong> 72550 <strong>Localidad</strong> Puebla(Heroica</b>
                    <br>
                    <b class="expedicion">Puebla) <strong>Municipio</strong> Puebla <strong>Estado</strong> Puebla <strong>País</strong> México <strong>Tels.</strong> 248 86 04 - 245 53 65 - 264 50 94 - 244 29 33 - 245 04 27</b>
                </th>

                <th>
                    <b class="fechaExpedicion" style="font-weight: bold;color: #0362CE;"><strong> Fecha y Hora de Expedición:</strong> <b class="fecha-exp"><?php echo $fechaElaboracion; ?></b></b>
                </th>
            </tr>
        </thead>
    </table>
    <hr>
    <table style="width: 100%">
        <thead>
            <tr>
                <th>
                    <b style="color: #0362CE;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;">Cliente:</b> <b style="color: #000000;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;text-transform: uppercase;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $nombreCliente ?></b>
                    <br>
                    <b style="color: #0362CE;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;">Domicilio:</b>
                    <b style="color: #000000;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;text-transform: uppercase;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo str_replace("Ñ", "&Ntilde;", $domicilio) ?></b>
                    <br>
                    <b style="color: #0362CE;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;">Colonia:</b> <b style="color: #000000;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;text-transform: uppercase;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <?php echo $colonia  ?>
                    </b>
                </th>
                <th>
                    <b style="color: #0362CE;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;margin-left:-120px;">Taller:</b> <b style="color: #000000;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;text-transform: uppercase;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $taller ?>
                    </b>
                    <br>
                    <b style="color: #0362CE;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;margin-left:-120px;">Tels:</b> <b style="color: #000000;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;text-transform: uppercase;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <?php echo $telefono ?>
                    </b>
                    <br>
                    <b style="color: #0362CE;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;margin-left:-120px;">C.P.</b> <b style="color: #000000;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;text-transform: uppercase;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <?php echo $cp ?>
                    </b>
                </th>
            </tr>
        </thead>
    </table>
    <hr>
    <table style="width: 100%">
        <thead>
            <tr>
                <th>
                    <b style="color: #0362CE;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;">Municipio:</b> <b style="color: #000000;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;text-transform: uppercase;"><?php echo $municipio  ?></b>
                </th>

                <th>
                    <b style="color: #0362CE;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;margin-left: -50px;">Ciudad:</b> <b style="color: #000000;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;text-transform: uppercase;"><?php echo $ciudad  ?></b>
                </th>

                <th>
                    <b style="color: #0362CE;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;margin-left: -50px;">Estado:</b> <b style="color: #000000;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;text-transform: uppercase;"><?php echo $estado  ?></b>
                </th>
                <th>
                    <b style="color: #0362CE;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;margin-left: -50px;">País:</b> <b style="color: #000000;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;text-transform: uppercase;"><?php echo $pais  ?></b>
                </th>
            </tr>
        </thead>
    </table>
    <hr>

    <table style="width: 100%">
        <thead>
            <tr>
                <th width="33%">
                    <b style="color: #0362CE;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;">Observaciones: </b> <b style="color: #000000;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;text-transform: uppercase;"><?php echo $observaciones  ?></b>
                </th>
                <th width="33%">
                    <b style="color: #0362CE;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;">Observaciones Productos: </b> <b style="color: #000000;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;text-transform: uppercase;"><?php echo $observacionesProductos  ?></b>
                </th>
                <th width="33%">
                    <b style="color: #0362CE;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;">Forma de Pago: </b> <b style="color: #000000;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;text-transform: uppercase;"><?php echo $formaPago  ?></b>
                </th>

            </tr>
        </thead>
    </table>

    <hr>
    <table class="table" style="width: 100%" cellspacing="0">
        <thead>
            <tr class="row datos" style="background: #D9D4D4">
                <th style="color: #0362CE;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;height: 45px">Cantidad</th>
                <th style="color: #0362CE;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;">Descripción</th>
                <th style="color: #0362CE;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;height: 45px">Unidad</th>
                <th style="color: #0362CE;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;text-align: right;">Precio Unitario</th>
                <th style="color: #0362CE;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;text-align: right;">Importe</th>
                <th style="color: #0362CE;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;text-align: right;">%Descto.</th>
                <th style="color: #0362CE;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;text-align: right;">Descto.</th>
                <th style="color: #0362CE;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;text-align: right;">%Descto2.</th>
                <th style="color: #0362CE;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;text-align: right;">Descto2.</th>
                <th style="color: #0362CE;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;text-align: right;">Importe Total</th>
            </tr>
        </thead>

        <tbody style="color: #000000;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 10px;text-transform: uppercase;">
            <?php
            require_once __DIR__ . '../../../views/moduls/conversor.php';


            if (isset($_GET["folio"])) {

                $folio = $_GET["folio"];
            }


            $item2 = "id";
            $valor2 = $folio;
            $mostrar = new ControllerFunctions();
            $productos =  $mostrar->ctrMostrarMuestrasPdf($item2, $valor2);



            foreach ($productos as $key => $producto) {

                $lista = $producto["listaProductos"];

                $listaProductos = json_decode($lista, true);

                $totalNetos = 0;
                $totalIva = 0;
                $totalDescuento = 0;
                $totalProductos = 0;

                foreach ($listaProductos as $value) {

                    $descuento = $value["precioDescuento"] * $value['cantidad'];
                    $netoProducto = $value['precioProducto'] * $value['cantidad'] - $descuento;
                    $neto = $value['precioProducto'] * $value['cantidad'];
                    $totalNetos = $totalNetos + $netoProducto;
                    $ivaProducto = ($netoProducto * 0.16);
                    $totalIva =  $totalIva + $ivaProducto;
                    $total = $netoProducto - $ivaProducto;


                    $totalP = $netoProducto;
                    $totalProductos = $totalProductos + $totalP + $descuento;
                    $totalDescuento = $totalDescuento + $descuento;
                    $codigoProducto = $value["codigoProducto"];
                    $item = "codigoProducto";
                    $valor = $codigoProducto;
                    $mostrar = new ControllerFunctions();
                    $producto = $mostrar->ctrMostrarDatosProducto($item, $valor);
                    $descripcion = $producto["descripcion"];

                    if ($value['unidadMedida'] == 'L1') {

                        $valorUnidad = "1 LT";
                    } else if ($value['unidadMedida'] == '106') {

                        $valorUnidad = "106.6 MT";
                    } else if ($value['unidadMedida'] == 'L12') {

                        $valorUnidad = "12 LT";
                    } else if ($value['unidadMedida'] == '121') {

                        $valorUnidad = "121.9 MT";
                    } else if ($value['unidadMedida'] == 'L51') {

                        $valorUnidad = "15.14 MT";
                    } else if ($value['unidadMedida'] == 'L52') {

                        $valorUnidad = "15.2 LT";
                    } else if ($value['unidadMedida'] == 'L16') {

                        $valorUnidad = "16 LT";
                    } else if ($value['unidadMedida'] == 'L68') {

                        $valorUnidad = "16.85 LT";
                    } else if ($value['unidadMedida'] == 'L74') {

                        $valorUnidad = "17.44 LT";
                    } else if ($value['unidadMedida'] == 'L18') {

                        $valorUnidad = "18 LT";
                    } else if ($value['unidadMedida'] == 'L82') {

                        $valorUnidad = "18.2 LT";
                    } else if ($value['unidadMedida'] == '18') {

                        $valorUnidad = "18.3 MT";
                    } else if ($value['unidadMedida'] == 'L84') {

                        $valorUnidad = "18.48 LT";
                    } else if ($value['unidadMedida'] == 'L89') {

                        $valorUnidad = "18.925 LT";
                    } else if ($value['unidadMedida'] == 'L94') {

                        $valorUnidad = "18.94 LT";
                    } else if ($value['unidadMedida'] == 'L9') {

                        $valorUnidad = "19 LT";
                    } else if ($value['unidadMedida'] == 'L92') {

                        $valorUnidad = "19.2 LT";
                    } else if ($value['unidadMedida'] == 'L95') {

                        $valorUnidad = "19.5 LT";
                    } else if ($value['unidadMedida'] == 'L99') {

                        $valorUnidad = "19.94 LT";
                    } else if ($value['unidadMedida'] == 'T96') {

                        $valorUnidad = "196 LT";
                    } else if ($value['unidadMedida'] == 'K20') {

                        $valorUnidad = "20 KG";
                    } else if ($value['unidadMedida'] == 'L20') {

                        $valorUnidad = "20 LT";
                    } else if ($value['unidadMedida'] == 'TB') {

                        $valorUnidad = "200 LT";
                    } else if ($value['unidadMedida'] == '200') {

                        $valorUnidad = "200 MT";
                    } else if ($value['unidadMedida'] == 'TB8') {

                        $valorUnidad = "208 LT";
                    } else if ($value['unidadMedida'] == 'M22') {

                        $valorUnidad = "225 ML";
                    } else if ($value['unidadMedida'] == '228') {

                        $valorUnidad = "228.6";
                    } else if ($value['unidadMedida'] == 'M23') {

                        $valorUnidad = "235 ML";
                    } else if ($value['unidadMedida'] == 'M27') {

                        $valorUnidad = "237 ML";
                    } else if ($value['unidadMedida'] == 'M25') {

                        $valorUnidad = "250 ML";
                    } else if ($value['unidadMedida'] == 'L3') {

                        $valorUnidad = "3 LT";
                    } else if ($value['unidadMedida'] == 'L32') {

                        $valorUnidad = "3.2 LT";
                    } else if ($value['unidadMedida'] == 'L34') {

                        $valorUnidad = "3.42 LT";
                    } else if ($value['unidadMedida'] == 'L36') {

                        $valorUnidad = "3.69 LT";
                    } else if ($value['unidadMedida'] == 'L37') {

                        $valorUnidad = "3.785 LT";
                    } else if ($value['unidadMedida'] == 'L38') {

                        $valorUnidad = "3.8 LT";
                    } else if ($value['unidadMedida'] == 'K4') {

                        $valorUnidad = "4 KG";
                    } else if ($value['unidadMedida'] == 'L4') {

                        $valorUnidad = "4 LT";
                    } else if ($value['unidadMedida'] == 'M47') {

                        $valorUnidad = "473 ML";
                    } else if ($value['unidadMedida'] == 'G50') {

                        $valorUnidad = "500 GR";
                    } else if ($value['unidadMedida'] == 'M5') {

                        $valorUnidad = "500 ML";
                    } else if ($value['unidadMedida'] == 'M56') {

                        $valorUnidad = "561 ML";
                    } else if ($value['unidadMedida'] == 'L6') {

                        $valorUnidad = "6 LT";
                    } else if ($value['unidadMedida'] == '66') {

                        $valorUnidad = "66 MT";
                    } else if ($value['unidadMedida'] == 'M75') {

                        $valorUnidad = "750 ML";
                    } else if ($value['unidadMedida'] == 'M80') {

                        $valorUnidad = "800 ML";
                    } else if ($value['unidadMedida'] == 'M90') {

                        $valorUnidad = "900 ML";
                    } else if ($value['unidadMedida'] == 'M94') {

                        $valorUnidad = "946 ML";
                    } else if ($value['unidadMedida'] == 'M96') {

                        $valorUnidad = "960 ML";
                    } else if ($value['unidadMedida'] == 'GR') {

                        $valorUnidad = "GR";
                    } else if ($value['unidadMedida'] == 'KG') {

                        $valorUnidad = "KG";
                    } else if ($value['unidadMedida'] == 'LT') {

                        $valorUnidad = "LT";
                    } else if ($value['unidadMedida'] == 'ML') {

                        $valorUnidad = "ML";
                    } else if ($value['unidadMedida'] == 'MT') {

                        $valorUnidad = "MT";
                    } else if ($value['unidadMedida'] == 'PZ') {

                        $valorUnidad = "PZ";
                    } else if ($value['unidadMedida'] == 'R19') {

                        $valorUnidad = "ROLLO 19 PZ";
                    } else if ($value['unidadMedida'] == 'R29') {

                        $valorUnidad = "ROLLO 29 PZ";
                    } else if ($value['unidadMedida'] == 'R60') {

                        $valorUnidad = "ROLLO 60 PZ";
                    } else if ($value['unidadMedida'] == 'SRV') {

                        $valorUnidad = "SERVICIO";
                    } else {

                        $valorUnidad = $producto["unidad"];
                    }



                    echo "<tr>
                                        
                                        <td style='height:10px'>" . $value['cantidad'] . "</td>
                                        <td style='height:10px'>" . $descripcion . "</td>
                                        <td style='height:10px'>" . $valorUnidad . "</td>
                                        <td style='text-align:right;height:10px;'>" . number_format($value['precioProducto'], 4) . "</td>
                                        <td style='text-align:right;height:10px;'>" . number_format($neto, 4) . "</td>
                                        <td style='text-align:right;height:10px;'>" . number_format($value['descuento'], 4) . " %</td>
                                        <td style='text-align:right;height:10px;'>" . number_format($value['precioDescuento'], 4) . "</td>
                                        <td style='text-align:right;height:10px;'>0 %</td>
                                        <td style='text-align:right;height:10px;'>0.0000</td>
                                        <td style='text-align:right;height:10px;'>" . number_format($totalP, 4) . "</td>
                                        </tr>";
                    echo "<tr>
                                        <td style='height:0.20px'><hr class='style-one'></td>
                                        <td style='height:0.20px'><hr class='style-one'></td>
                                        <td style='height:0.20px'><hr class='style-one'></td>
                                        <td style='height:0.20px'><hr class='style-one'></td>
                                        <td style='height:0.20px'><hr class='style-one'></td>
                                        <td style='height:0.20px'><hr class='style-one'></td>
                                        <td style='height:0.20px'><hr class='style-one'></td>
                                        <td style='height:0.20px'><hr class='style-one'></td>
                                        <td style='height:0.20px'><hr class='style-one'></td>
                                        <td style='height:0.20px'><hr class='style-one'></td>


                                        </tr>";
                }
                $subtotal = number_format($totalProductos, 2);

                $totalDescuentos = number_format($totalDescuento, 2);
                $totalImpuestos = number_format($totalIva, 2);
                $totalGeneral = number_format($totalNetos, 2);

                $numero = $totalGeneral;
                $resultado = convertir($numero);
            }


            ?>
        </tbody>

    </table>


    <hr>
    <hr>

    <table style="width: 100%">
        <thead>
            <tr>
                <th>
                    <strong style="color: #0362CE;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 12px;"><b>Importe Total en Letra: </b></strong><br>
                    <strong style="color: #000000;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 12px;text-transform: uppercase;">
                        <b><?php echo $resultado ?></b><strong>
                            <div class="vl"></div>
                </th>
                <th>
                    <strong id="Strong1" style="color: #000000;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 12px;"><b>Subtotal: </b></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong style="color: #000000;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 12px;"><b>$</b></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b style="color: #000000;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 12px;margin-top: -15px;"><?php echo $subtotal  ?></b><br>
                    <hr style="margin-left: -3px; margin-top: 0px;z-index: 101; width: 97%;margin-bottom: -10px">
                    <strong style="color: #000000;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 12px;margin-right: 150px;margin-top: -15px;"><b>Descuentos: </b></strong>&nbsp;&nbsp;&nbsp;<strong style="color: #000000;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 12px;"><b>$</b></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b style="color: #000000;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 12px;"><?php echo $totalDescuentos  ?></b><br>
                    <hr style="margin-left: -3px; margin-top: 0px;z-index: 101; width: 97%;margin-bottom: -10px">
                    <strong style="color: #000000;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 12px;margin-right: 150px;margin-top: -15px;"><b>IVA 16%: </b></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong style="color: #000000;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 12px;"><b>$</b></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b style="color: #000000;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 12px;"><?php echo $totalImpuestos  ?></b><br>
                    <hr style="margin-left: -3px; margin-top: 0px;z-index: 101; width: 97%;margin-bottom: -10px">
                    <strong style="color: #000000;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 12px;margin-right: 150px;margin-top: -15px;"><b>Total: </b></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong style="color: #000000;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 12px;"><b>$</b></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b style="color: #000000;font-family: Helvetica, Sans-Serif;font-weight: lighter;font-size: 12px;"><?php echo $totalGeneral  ?></b><br>


                </th>
            </tr>
        </thead>
    </table>
    <hr style="z-index:101;width: 100%;margin-top: -1px">
    <!--======================
        |   HECHO POR DIEGO-PC  |
        ======================-->
    <table style="width: 100%">
        <thead>
            <tr>
                <th align="center">
                    <b style="font-size: 15px">NO SE ACEPTAN DEVOLUCIONES</b>
                </th>
            </tr>
            <tr>
                <th align="center">
                    <b style="color: #0362CE; font-size: 12px">SUJETO A DISPONIBILIDAD</b>
                </th>
            </tr>
        </thead>
    </table>
    <br>
    <br>
    <br>
    <br>
    <br>
    <table style="width: 100%">
        <thead>
            <tr>
                <th align="left">

                    <b style="font-size: 15px;margin-left: 25px">Recepción de Solicitud</b>
                </th>

                <th align="right">

                    <b style="font-size: 15px">Entrega de Solicitud</b>
                </th>

                <th>

                    <hr style="width: 200px;float: left;margin-top: -10px;margin-left: -680px">
                </th>

                <th>

                    <hr style="width: 200px;float: right;margin-top: -10px;margin-left: -190px">
                </th>
            </tr>

        </thead>
    </table>

    <!--=====================
        | ******************** |
        ======================-->

</body>

</html>
<?php
require_once __DIR__ . '../../../extensiones/dompdf/autoload.inc.php';

use Dompdf\Dompdf;


$opcion = $_GET["opcion"];
if ($opcion == 1) {
    //Donde guardar el documento
    $rutaGuardado = '../../solicitudes/';
    $dompdf = new Dompdf();
    $dompdf->load_html(ob_get_clean());
    $filename = "SOLICITUD-" . $folio . "" . ".pdf";
    //Renderiza el archivo primero
    $dompdf->render();
    //Guardalo en una variable
    $pdf = $dompdf->output();
    file_put_contents($rutaGuardado . $filename, $pdf);
    file_put_contents($filename, $pdf);
    $dompdf->stream($filename);
    unlink($filename);
} else if ($opcion == 2) {
    $dompdf = new Dompdf();
    $dompdf->load_html(ob_get_clean());
    $dompdf->render();
    $pdf = $dompdf->output();
    $filename = "SOLICITUD-'" . $folio . "'";
    //file_put_contents($filename, $pdf);
    $dompdf->stream($filename, array('Attachment' => 0));
}

?>