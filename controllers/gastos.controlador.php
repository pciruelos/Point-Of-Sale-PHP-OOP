<?php

class ControladorGastos{

	/*=============================================
	MOSTRAR gastos
	=============================================*/

	static public function ctrMostrarGastos($item, $valor){

		$tabla = "gastos";

		$respuesta = ModeloGastos::mdlMostrarGastos($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	CREAR VENTA
	=============================================*/

	static public function ctrCrearGasto(){

		if(isset($_POST["DescripcionGasto"])){

			
			/*=============================================
			GUARDAR LA COMPRA
			=============================================*/	

			$tabla = "gastos";

			$datos = array(
						   "id_vendedor"=>$_POST["idVendedor"],						   
						   "descripcion"=>$_POST["DescripcionGasto"],
						   "total"=>$_POST["PrecioGasto"],
						   "metodo"=>$_POST["MetodoGasto"]);

			$respuesta = ModeloGastos::mdlIngresarGasto($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

			

				swal({
					  type: "success",
					  title: "La venta ha sido guardada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then((result) => {
								if (result.value) {

								window.location = "gastos";

								}
							})

				</script>';

			}
			else{

				echo'<script>

					swal({
						  type: "error",
						  title: "error",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "clientes";

							}
						})

			  	</script>';



			}

		}

	}

	/*=============================================
	EDITAR CLIENTE
	=============================================*/

	static public function ctrEditarGasto(){

		if(isset($_POST["EditarDescripcionGasto"])){


			   	$tabla = "gastos";

			   	$datos = array("id"=>$_POST["idGasto"],
			   				   "descripcion"=>$_POST["EditarDescripcionGasto"],
					           "total"=>$_POST["EditarPrecioGasto"],
					           "metodo"=>$_POST["EditarMetodoGasto"]);

			   	$respuesta = ModeloGastos::mdlEditarGasto($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El cliente ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "gastos";

									}
								})

					</script>';

				}

			else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El cliente no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "gastos";

							}
						})

			  	</script>';



			}

		}

	}

	/*=============================================
	ELIMINAR CLIENTE
	=============================================*/

	static public function ctrEliminarGasto(){

		if(isset($_GET["idGasto"])){

			$tabla ="gastos";
			$datos = $_GET["idGasto"];

			$respuesta = ModeloGastos::mdlEliminarGasto($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El gasto ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "gastos";

								}
							})

				</script>';

			}		

		}

	}

	/*=============================================
	RANGO FECHAS
	=============================================*/	

	static public function ctrRangoFechasGastos($fechaInicial, $fechaFinal){

		$tabla = "gastos";

		$respuesta = ModeloGastos::mdlRangoFechasGastos($tabla, $fechaInicial, $fechaFinal);

		return $respuesta;
		
	}

	/*=============================================
	SUMA TOTAL VENTAS
	=============================================*/

	public function ctrSumaTotalGastos(){

		$tabla = "gastos";

		$respuesta = ModeloGastos::mdlSumaTotalGastos($tabla);

		return $respuesta;

	}

	
}