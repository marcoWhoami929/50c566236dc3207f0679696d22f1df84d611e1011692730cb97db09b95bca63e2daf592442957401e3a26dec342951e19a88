<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DEKKERAPP</title>
    <!--ARCHIVOS CSS-->
    <!-- plugins:css -->
    <link rel="stylesheet" href="views/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="views/vendors/base/vendor.bundle.base.css">
    <link rel="stylesheet" href="views/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="views/images/logo.ico" />
    <!-- datatables -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" />
    <!--ARCHIVOS JS-->
    <!-- plugins:js -->
    <script src="views/vendors/base/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <script src="views/vendors/chart.js/Chart.min.js"></script>
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="views/js/off-canvas.js"></script>
    <script src="views/js/hoverable-collapse.js"></script>
    <script src="views/js/template.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="views/js/dashboard.js"></script>
    <!-- End custom js for this page-->
    <!-- Sweet Alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="views/js/chart.js"></script>
    <!-- End custom js for this page-->
    <!-- datatables -->
    <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    



</head>

<body>
    <?php
    if (isset($_SESSION["validarSesionBackend"]) && $_SESSION["validarSesionBackend"] === "ok") {
        echo '<div class="class="container-scroller">';

        include "moduls/header.php";

        include "moduls/sidebar.php";

        if (isset($_GET["ruta"])) {
            $carpeta = "views/moduls/";
            $class = $carpeta . $_GET["ruta"] . '.php';

            if (!file_exists($class)) {
                include "moduls/404.php";
            } else {
                include $class;
            }
        } else {

            include "moduls/dashboard.php";
        }
    } else {
        include "moduls/login.php";
    }
    echo '</div>';
    ?>
    <!-- JS PERSONALIZADO -->
    <script src="views/js/acciones.js"></script>
</body>

</html>