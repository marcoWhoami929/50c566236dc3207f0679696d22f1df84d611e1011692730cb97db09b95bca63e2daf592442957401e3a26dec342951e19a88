<?php
include('../classes/data.php');
$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != NULL) ? $_REQUEST['action'] : '';
if ($action == 'solicitudes') {
    $database = new data();
    $query = strip_tags($_REQUEST['query']);
    $estatus = strip_tags($_REQUEST['estatus']);
    $sucursal = strip_tags($_REQUEST['sucursal']);
    $per_page = intval($_REQUEST['per_page']);
    $tabla = "solicitudes";
    $campos = "*";
    $page = (isset($_REQUEST["page"]) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents = 4;
    $offset = ($page - 1) * $per_page;

    $search = array("query" => $query, "estatus" => $estatus, "sucursal" => $sucursal, "per_page" => $per_page, "offset" => $offset);

    $datos = $database->getSolicitudes($tabla, $campos, $search);

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
                        <th style="border:none">Folio</th>
                        <th style="border:none">Cliente</th>
                        <th style="border:none">Hora</th>
                        <th style="border:none">Forma Pago</th>
                        <th style="border:none">Visto</th>
                        <th style="border:none">En camino</th>
                        <th style="border:none">En Proceso</th>
                        <th style="border:none">En entrega</th>
                        <th style="border:none">Concluido</th>
                        <th style="border:none">Pdf</th>
                        <th style="border:none">Facturar</th>
                        <th style="border:none">Obs Recoleccion</th>
                        <th style="border:none">Obs Productos</th>
                        <th style="border:none">Hora Concluido</th>
                        <th style="border:none">Tiempo</th>
                        <th style="border:none">Estatus</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $finales = 0;
                    foreach ($datos as $key => $row) {
                        $sucursal = $row["sucursal"];
                        if ($row["tiempoProceso"] == "") {
                        } else {
                            $hora = $row["tiempoProceso"];
                            list($horas, $minutos, $segundos) = explode(':', $hora);
                            $hora_en_segundos = ($horas * 3600) + ($minutos * 60) + $segundos;
                        }

                        if ($row["motoEnCamino"] != 0) {

                            $motoEnCamino = "<button type='button' class='btn btn-success btn-rounded btn-icon btnHabilitar3' disabled>
                            <i class='ti-truck'></i>
                        </button>";
                        } else {

                            $motoEnCamino = "<button type='button' class='btn btn-warning btn-rounded btn-icon btnHabilitar3' onclick='recoleccionEnCamino(" . $row["id"] . ",1)'>
                            <i class='ti-truck'></i>
                        </button>";
                        }


                        if ($row["enProceso"] != 0) {

                            $enProceso = "<button type='button' class='btn btn-success btn-rounded btn-icon btnHabilitar5' disabled>
                            <i class='ti-paint-bucket'></i>
                        </button>";
                        } else {

                            $enProceso = "<button type='button' class='btn btn-warning btn-rounded btn-icon btnHabilitar5' onclick='enProceso(" . $row["id"] . ",1)'>
                            <i class='ti-paint-bucket'></i>
                        </button>";
                        }


                        if ($row["motoEnCaminoRegreso"] != 0) {

                            $motoEnCaminoRegreso = "<button type='button' class='btn btn-success btn-rounded btn-icon btnHabilitar7'  disabled>
                            <i class='ti-map-alt'></i>
                        </button>";
                        } else {

                            $motoEnCaminoRegreso = "<button type='button' class='btn btn-warning btn-rounded btn-icon btnHabilitar7' onclick='entregaEnCamino(" . $row["id"] . ",1)'>
                            <i class='ti-map-alt'></i>
                        </button>";
                        }

                        if ($row["concluido"] != 0) {

                            $concluido = "<button type='button' class='btn btn-success btn-rounded btn-icon btnHabilitar8' disabled>
                            <i class='ti-time'></i>
                        </button>";
                        } else {
                            if ($row["motoEnCamino"] == 1 and $row["enProceso"] == 1 and  $row["motoEnCaminoRegreso"] == 1 and $row["concluido"] == 0) {

                                $concluido = "<button type='button' class='btn btn-warning btn-rounded btn-icon btnHabilitar8' onclick='concluido(" . $row["id"] . ",1)' >
                                <i class='ti-time'></i>
                            </button>";
                            } else {

                                $concluido = "<button type='button' class='btn btn-warning btn-rounded btn-icon btnHabilitar8'  disabled>
                                <i class='ti-time'></i>
                            </button>";
                            }
                        }

                        if ($row["tiempoProceso"] == "") {

                            $tiempoProceso = "Sin datos";
                        } else {

                            $tiempoProceso = $database->seg_a_dhms($hora_en_segundos);
                        }

                        if ($row["visto"] == 0) {

                            $estatus = "<label class='badge badge-danger'>Sin ver</label>";
                        }
                        if ($row["visto"] == 1 and $row["motoEnCamino"] == 1) {

                            $estatus = "<label class='badge badge-warning'>Recolección en Camino</label>";
                        }
                        if ($row["visto"] == 1 and $row["motoEnCamino"] == 1 and $row["enProceso"] == 1) {

                            $estatus = "<label class='badge badge-info'>En Proceso</label>";
                        }
                        if ($row["visto"] == 1 and $row["motoEnCamino"] == 1 and $row["enProceso"] == 1 and $row["motoEnCaminoRegreso"] == 1) {

                            $estatus = "<label class='badge badge-primary'>Entrega en Camino</label>";
                        }
                        if ($row["visto"] == 1 and $row["motoEnCamino"] == 1 and $row["enProceso"] == 1 and $row["motoEnCaminoRegreso"] == 1 and $row["concluido"] == 1) {

                            $estatus = "<label class='badge badge-success'>Concluido</label>";
                        }
                        if ($row["listaProductos"] == "[{}]") {

                            $pdf  = "";
                        } else {

                            $pdf = "<button type='button' class='btn btn-inverse-danger btn-icon btnDescargarSolicitud' onclick='descargarSolicitud(" . $row["id"] . ")'>
                            <i class='ti-clipboard'></i>
                        </button>";
                        }
                        /******VALIDAR SI LA SOLICITUD HA SIDO VISTA POR EL AGENTE DE VENTA ****/
                        if ($row["visto"] != 0) {

                            $visto = "<button type='button' class='btn btn-success btn-rounded btn-icon btnVisto' disabled>
                            <i class='ti-eye'></i>
                        </button>";
                        } else {

                            $visto = "<button type='button' class='btn btn-warning btn-rounded btn-icon btnVisto' onclick='solicitudVista(" . $row['id'] . ",1," . '"' . $sucursal . '"' . ")' >
                            <i class='ti-eye'></i>
                        </button>";
                        }
                        /***********VALIDAR SI EL CLIENTE HA RECIBIDO UN REGALO POR SUS CANTIDAD DE SOLICITUDES******/
                        if ($row["ganadorRifa"] == 0) {

                            $ganador = "";
                        } else if ($row["ganadorRifa"] == 1) {

                            $ganador = "<i class='fa fa-gift fa-2x' aria-hidden='true'></i>";
                        } else if ($row["ganadorRifa"] == 2) {

                            $ganador = "<i class='fa fa-gift fa-2x' aria-hidden='true'></i><i class='fa fa-gift fa-2x' aria-hidden='true'></i>";
                        } else if ($row["ganadorRifa"] == 3) {

                            $ganador = "<i class='fa fa-gift fa-2x' aria-hidden='true'></i><i class='fa fa-gift fa-2x' aria-hidden='true'></i>";
                        }


                        if ($row["requiereFactura"]) {

                            $requiereFactura = "<button type='button' class='btn btn-inverse-success btn-icon btnVerDatosFacturacion' idCliente='" . $row["idCliente"] . "' data-toggle='modal' data-target='#modalVerDatosFacturacion'>
                            <i class='ti-check-box'></i>
                        </button>";
                        } else {

                            $requiereFactura = "";
                        }
                        $datos = "<button type='button' class='btn btn-inverse-info btn-icon btnVerDatos' onclick='verDatosCliente(" . $row["idCliente"] . ", " . '"' . $sucursal . '"' . ")'  data-toggle='modal' data-target='#modalVerDatos'>
                        <i class='ti-info'></i>
                    </button";

                    ?>
                        <tr>
                            <td><?= $row['id']; ?></td>
                            <td><?= $row['cliente'] . '<br>' . $datos ?></td>
                            <td><?= $row['horaSolicitud']; ?></td>
                            <td><?= $row['formaPago']; ?></td>
                            <td><?= $visto ?></td>
                            <td> <?= $motoEnCamino ?></td>
                            <td> <?= $enProceso ?></td>
                            <td> <?= $motoEnCaminoRegreso ?></td>
                            <td> <?= $concluido ?></td>
                            <td> <?= $pdf ?></td>
                            <td> <?= $requiereFactura ?></td>
                            <td> <?= trim($row["observaciones"]) ?></td>
                            <td> <?= trim($row["observacionesProductos"]) ?></td>
                            <td> <?= $row["horaConcluido"] ?></td>
                            <td> <?= $tiempoProceso ?></td>
                            <td> <?= $estatus ?></td>


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
                echo $pagination->paginateSolicitudes();

                ?>
            </div>
    <?php
    }
}
