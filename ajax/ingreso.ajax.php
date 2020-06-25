<?php

require_once "../controllers/tarjetas.controlador.php";
require_once "../models/tarjetas.modelos.php";

class AjaxIngresos{

	/*=============================================
	EDITAR CLIENTE
	=============================================*/	

	public $idIngreso;

	public function ajaxEditarIngreso(){

		$item = "id";
		$valor = $this->idIngreso;

		$respuesta = ControladorTarjetas::ctrMostrarIngreTarjetas($item, $valor);

		echo json_encode($respuesta);


	}

}

/*=============================================
EDITAR Gastos
=============================================*/	

if(isset($_POST["idIngreso"])){

	$ingreso = new AjaxIngresos();
	$ingreso -> idIngreso = $_POST["idIngreso"];
	$ingreso -> ajaxEditarIngreso();

}