<?php

require_once "../../controllers/ventas.controlador.php";
require_once "../../models/ventas.modelos.php";
require_once "../../controllers/clientes.controlador.php";
require_once "../../models/clientes.modelos.php";
require_once "../../controllers/usuarios.controlador.php";
require_once "../../models/usuarios.modelos.php";

$reporte = new ControladorVentas();
$reporte -> ctrDescargarReporte();