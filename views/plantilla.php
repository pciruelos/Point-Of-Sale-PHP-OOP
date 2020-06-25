<?php

session_start();

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Administracion De Stock y Venta</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="icon"  type="image/png" href="views/img/plantilla/icon.png">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="views/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="views/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="views/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="views/dist/css/AdminLTE.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="views/dist/css/skins/_all-skins.min.css">
<!-- DataTables -->
  <link rel="stylesheet" href="views/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="views/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">
   <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="views/plugins/iCheck/all.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="views/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="views/bower_components/morris.js/morris.css">


  <!-- jQuery 3 -->
  <script src="views/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="views/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- SlimScroll -->
  <script src="views/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="views/bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="views/dist/js/adminlte.min.js"></script>
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!-- DataTables -->
<script src="views/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="views/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="views/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
  <script src="views/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>
<!-- sweetalert2 -->
<script src="views/plugins/sweetalert2/sweetalert2.all.js"></script>
<!-- iCheck 1.0.1 -->
<script src="views/plugins/iCheck/icheck.min.js"></script>
<!-- InputMask -->
<script src="views/plugins/input-mask/jquery.inputmask.js"></script>
<script src="views/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="views/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- jquery number -->
<script src="views/plugins/jqueryNumber/jquerynumber.min.js"></script>
<!-- daterangepicker http://www.daterangepicker.com/-->
  <script src="views/bower_components/moment/min/moment.min.js"></script>
  <script src="views/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- Morris.js charts http://morrisjs.github.io/morris.js/-->
  <script src="views/bower_components/raphael/raphael.min.js"></script>
  <script src="views/bower_components/morris.js/morris.min.js"></script>

  <!-- ChartJS http://www.chartjs.org/-->
  <script src="views/bower_components/chart.js/Chart.js"></script>


</head>
<body class="hold-transition skin-blue sidebar-mini login-page">
<!-- Site wrapper -->


<?php 

if(isset($_SESSION["iniciarSesion"]) || $_SESSION["iniciarSesion"] == "ok")
{

echo '<div class="wrapper">';

include "modulos/cabezote.php";

include "modulos/menu.php";


if(isset($_GET["ruta"])){
  if($_GET["ruta"] == "inicio" ||
  $_GET["ruta"] == "usuarios" ||
  $_GET["ruta"] == "categorias" ||
  $_GET["ruta"] == "productos" ||
  $_GET["ruta"] == "clientes" ||
  $_GET["ruta"] == "ventas" ||
  $_GET["ruta"] == "editar-venta" ||
  $_GET["ruta"] == "crear-venta" ||
  $_GET["ruta"] == "reportes" ||
  $_GET["ruta"] == "gastos" ||
  $_GET["ruta"] == "reporte-gasto" ||
  $_GET["ruta"] == "ingreso-tarjeta" ||
  $_GET["ruta"] == "salir"){

    include "modulos/".$_GET["ruta"].".php";
  }else{
    include "modulos/404.php";
  }
}else{
  include "modulos/inicio.php";
}


include "modulos/footer.php";

echo '</div>';
}else{
  include "modulos/login.php";
}
?>


<script src="views/js/plantilla.js">    </script>
<script src="views/js/usuarios.js">    </script>
<script src="views/js/categorias.js">    </script>
<script src="views/js/productos.js">    </script>
<script src="views/js/clientes.js">    </script>
<script src="views/js/ventas.js">    </script>
<script src="views/js/reportes.js">    </script>
<script src="views/js/gastos.js">    </script>
<script src="views/js/ingresotarjeta.js">    </script>

</body>
</html>
