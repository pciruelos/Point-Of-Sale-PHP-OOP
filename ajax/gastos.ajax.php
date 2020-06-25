<?php

require_once "../controllers/gastos.controlador.php";
require_once "../models/gastos.modelos.php";

class AjaxGastos{

	/*=============================================
	EDITAR CLIENTE
	=============================================*/	

	public $idGasto;

	public function ajaxEditarGasto(){

		$item = "id";
		$valor = $this->idGasto;

		$respuesta = ControladorGastos::ctrMostrarGastos($item, $valor);

		echo json_encode($respuesta);


	}

}

/*=============================================
EDITAR Gastos
=============================================*/	

if(isset($_POST["idGasto"])){

	$gasto = new AjaxGastos();
	$gasto -> idGasto = $_POST["idGasto"];
	$gasto -> ajaxEditarGasto();

}