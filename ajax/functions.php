<?php
include('../classes/data.php');
$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != NULL) ? $_REQUEST['action'] : '';
if ($action == 'participantes') {
    $database = new data();
    $query = strip_tags($_REQUEST['query']);
    $estatus = strip_tags($_REQUEST['estatus']);
    $per_page = intval($_REQUEST['per_page']);
    $tabla = "participantes";
    $campos = "*";
    $page = (isset($_REQUEST["page"]) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents = 4;
    $offset = ($page - 1) * $per_page;

    $search = array("query" => $query, "estatus" => $estatus, "per_page" => $per_page, "offset" => $offset);

    $datos = $database->getParticipantes($tabla, $campos, $search);

    $countAll = $database->getCounter();
    $row = $countAll;

    if ($row > 0) {
        $numrows = $countAll;;
    } else {
        $numrows = 0;
    }
    $total_pages = ceil($numrows / $per_page);


    //Recorrer los datos recuperados

    if ($numrows > 0) {
?>
        <div class="table-responsive">
            <table class="table  table-hover  table-striped dt-responsive tableListaSolicitudes">
                <thead>
                    <tr>
                        <th style="border:none">Id</th>
                        <th style="border:none"></th>
                        <th style="border:none">Nombre Completo</th>
                        <th style="border:none">Facturas Registradas</th>
                        <th style="border:none">Acumulado Facturas</th>
                        <th style="border:none">Acumulado Premios</th>
                        <th style="border:none">Correo</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $finales = 0;
                    foreach ($datos as $key => $row) {
                        if ($row['facturasRegistradas'] == 0) {
                            $clase = 'table-warning';
                        } else {
                            $clase = 'table-success';
                        }

                        $datos = "<button type='button' class='btn btn-inverse-info btn-icon btnVerDatos' onclick='verDatosParticipante(" . $row["id"] . ")'  data-toggle='modal' data-target='#modalVerDatos'>
                        <i class='ti-info'></i>
                    </button>";
                        $acumuladoFacturas =  "<strong style='color:orange'>$ " . number_format($row["montoAcumuladoFacturas"], 2) . "</strong>";
                        $acumuladoPremios =  "<strong style='color:green'>$ " . number_format($row["premio1"], 2) . "</strong>";

                    ?>
                        <tr class="<?php echo $clase ?>">
                            <td><?= $row['id'] ?></td>
                            <td><?= $datos ?></td>
                            <td><strong><?= $row['nombre'] . " " . $row['apellidoPaterno'] . " " . $row['apellidoMaterno'] ?></strong></td>

                            <td><?= $row['facturasRegistradas'] ?></td>
                            <td><?= $acumuladoFacturas ?></td>
                            <td><?= $acumuladoPremios ?></td>
                            <td><?= $row['correo'] ?></td>
                        </tr>
                    <?php
                        $finales++;
                    }
                    ?>

                </tbody>
            </table>

            <div class="clearfix">
                <?php
                $inicios = $offset + 1;
                $finales += $inicios - 1;
                echo '<div class="hint-text">Mostrando ' . $inicios . ' al ' . $finales . ' de ' . $numrows . ' registros</div>';


                include '../classes/pagination.php'; //include pagination class
                $pagination = new Pagination($page, $total_pages, $adjacents);
                echo $pagination->paginateParticipantes();

                ?>
            </div>
        <?php
    }
}
/*
FACTURAS REGISTRADAS
*/
if ($action == 'facturas') {
    $database = new data();
    $query = strip_tags($_REQUEST['query']);
    $estatus = strip_tags($_REQUEST['estatus']);
    $serie = strip_tags($_REQUEST['serie']);
    $per_page = intval($_REQUEST['per_page']);
    $tabla = "facturasacumula";
    $campos = "fac.*,part.nombre as participante";
    $page = (isset($_REQUEST["page"]) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents = 4;
    $offset = ($page - 1) * $per_page;

    $search = array("query" => $query, "estatus" => $estatus, "serie" => $serie, "per_page" => $per_page, "offset" => $offset);

    $datos = $database->getFacturasRegistradas($tabla, $campos, $search);

    $countAll = $database->getCounter();
    $row = $countAll;

    if ($row > 0) {
        $numrows = $countAll;;
    } else {
        $numrows = 0;
    }
    $total_pages = ceil($numrows / $per_page);


    //Recorrer los datos recuperados

    if ($numrows > 0) {
        ?>
            <div class="table-responsive">
                <table class="table  table-hover  table-striped dt-responsive tableListaSolicitudes">
                    <thead>
                        <tr>
                            <th style="border:none">Id</th>
                            <th style="border:none">Nombre Cliente</th>
                            <th style="border:none">serie</th>
                            <th style="border:none">Folio</th>
                            <th style="border:none">Total Factura</th>
                            <th style="border:none">Participacion</th>
                            <th style="border:none">Diferencia</th>
                            <th style="border:none">Fecha</th>
                            <th style="border:none">Participante</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $finales = 0;
                        foreach ($datos as $key => $row) {
                            if ($row['cancelado'] == 0) {
                                $clase = 'table-success';
                            } else {
                                $clase = 'table-warning';
                            }


                            $totalAcumulado = $row["clasificacion1"] + $row["clasificacion2"] + $row["clasificacion3"] + $row["clasificacion4"];
                            $diferencia = $row['total'] - $totalAcumulado;
                            $participacion = "<strong style='color:green'>$ " . number_format($totalAcumulado, 2) . "</strong>";

                        ?>
                            <tr class="<?php echo $clase ?>">
                                <td><?= $row['id'] ?></td>
                                <td><?= $row['cliente'] ?></td>
                                <td><strong><?= $row['serie']  ?></strong></td>
                                <td><?= $row['folio'] ?></td>
                                <td>$ <?= number_format($row['total'], 2); ?></td>
                                <td><?= $participacion; ?></td>
                                <td>$ <?= number_format($diferencia, 2); ?></td>
                                <td><?= $row['fechaFactura'] ?></td>
                                <td><?= $row['participante'] ?></td>
                            </tr>
                        <?php
                            $finales++;
                        }
                        ?>

                    </tbody>
                </table>

                <div class="clearfix">
                    <?php
                    $inicios = $offset + 1;
                    $finales += $inicios - 1;
                    echo '<div class="hint-text">Mostrando ' . $inicios . ' al ' . $finales . ' de ' . $numrows . ' registros</div>';


                    include '../classes/pagination.php'; //include pagination class
                    $pagination = new Pagination($page, $total_pages, $adjacents);
                    echo $pagination->paginateFacturasRegistradas();

                    ?>
                </div>
            <?php
        }
    }
    /*
GANADORES
 */
    if ($action == 'ganadores') {
        $database = new data();
        $query = strip_tags($_REQUEST['query']);
        $serie = strip_tags($_REQUEST['serie']);
        $ganadores = strip_tags($_REQUEST['ganadores']);
        $per_page = intval($_REQUEST['per_page']);
        $tabla = "ganadores";
        $campos = "gan.id,part.nombre as participante,fac.serie,fac.folio,prem.promocion as premio,gan.fecha,gan.ganado";
        $page = (isset($_REQUEST["page"]) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
        $adjacents = 4;
        $offset = ($page - 1) * $per_page;

        $search = array("query" => $query, "serie" => $serie, "ganadores" => $ganadores, "per_page" => $per_page, "offset" => $offset);

        $datos = $database->getGanadores($tabla, $campos, $search);

        $countAll = $database->getCounter();
        $row = $countAll;

        if ($row > 0) {
            $numrows = $countAll;;
        } else {
            $numrows = 0;
        }
        $total_pages = ceil($numrows / $per_page);


        //Recorrer los datos recuperados

        if ($numrows > 0) {
            ?>
                <div class="table-responsive">
                    <table class="table  table-hover  table-striped dt-responsive tableListaCompras">
                        <thead>
                            <tr>
                                <th style="border:none">Id</th>
                                <th style="border:none">Participante</th>
                                <th style="border:none">Serie y Folio</th>
                                <th style="border:none">Premio</th>
                                <th style="border:none">Detalle</th>
                                <th style="border:none">Fecha</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $finales = 0;
                            foreach ($datos as $key => $row) {
                                if ($row['ganado'] == 1) {
                                    $detalle = "<strong style='color:green'>Ganó su premio exitosamente</strong>";
                                } else {
                                    $detalle = "<strong style='color:red'>Ganó pero ya no habia stock del premio</strong>";
                                }

                            ?>

                                <tr>
                                    <td><?= $row['id']; ?></td>
                                    <td><?= $row['participante']; ?></td>
                                    <td><strong><?= $row['serie'] . " " . $row['folio'] ?></strong></td>
                                    <td><?= $row['premio']; ?></td>
                                    <td><?= $detalle; ?></td>
                                    <td> <?= $row['fecha']; ?></td>
                                </tr>
                            <?php
                                $finales++;
                            }
                            ?>

                        </tbody>
                    </table>

                    <div class="clearfix">
                        <?php
                        $inicios = $offset + 1;
                        $finales += $inicios - 1;
                        echo '<div class="hint-text">Mostrando ' . $inicios . ' al ' . $finales . ' de ' . $numrows . ' registros</div>';


                        include '../classes/pagination.php'; //include pagination class
                        $pagination = new Pagination($page, $total_pages, $adjacents);
                        echo $pagination->paginateGanadores();

                        ?>
                    </div>
            <?php
        }
    }
