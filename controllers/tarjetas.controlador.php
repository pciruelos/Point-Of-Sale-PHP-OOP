<?php

class ControladorTarjetas{

	/*=============================================
	MOSTRAR gastos
	=============================================*/

	static public function ctrMostrarIngreTarjetas($item, $valor){

		$tabla = "tarjeta";

		$respuesta = ModeloTarjetas::mdlMostrarIngreTarjetas($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	CREAR VENTA
	=============================================*/

	static public function ctrCrearIngreso(){

		if(isset($_POST["DescripcionIngreso"])){

			
			/*=============================================
			GUARDAR LA COMPRA
			=============================================*/	

			$tabla = "tarjeta";

			$datos = array(
						   "id_vendedor"=>$_POST["idVendedor"],						   
						   "descripcion"=>$_POST["DescripcionIngreso"],
						   "total"=>$_POST["PrecioIngreso"],
						   "banco"=>$_POST["IngresoBanco"]);

			$respuesta = ModeloTarjetas::mdlIngresarTarjeta($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

			

				swal({
					  type: "success",
					  title: "La venta ha sido guardada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then((result) => {
								if (result.value) {

								window.location = "ingreso-tarjeta";

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

	static public function ctrEditarIngreso(){

		if(isset($_POST["EditarDescripcionIngreso"])){


			   	$tabla = "tarjeta";

			   	$datos = array("id"=>$_POST["idIngreso"],
			   				   "descripcion"=>$_POST["EditarDescripcionIngreso"],
					           "total"=>$_POST["EditarPrecioIngreso"],
					           "banco"=>$_POST["EditarMetodoIngreso"]);

			   	$respuesta = ModeloTarjetas::mdlEditarIngreso($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El cliente ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "ingreso-tarjeta";

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

							window.location = "ingreso-tarjeta";

							}
						})

			  	</script>';



			}

		}

	}

	/*=============================================
	ELIMINAR CLIENTE
	=============================================*/

	static public function ctrEliminarIngreso(){

		if(isset($_GET["idIngreso"])){

			$tabla ="tarjeta";
			$datos = $_GET["idIngreso"];

			$respuesta = ModeloTarjetas::mdlEliminarIngreso($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El gasto ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "ingreso-tarjeta";

								}
							})

				</script>';

			}		

		}

	}

	/*=============================================
	RANGO FECHAS
	=============================================*/	

	static public function ctrRangoFechasIngresos($fechaInicial, $fechaFinal){

		$tabla = "tarjeta";

		$respuesta = ModeloTarjetas::mdlRangoFechasIngresos($tabla, $fechaInicial, $fechaFinal);

		return $respuesta;
		
	}

	/*=============================================
	SUMA TOTAL VENTAS
	=============================================*/

	public function ctrSumaTotalIngresos(){

		$tabla = "tarjeta";

		$respuesta = ModeloTarjetas::mdlSumaTotalIngresos($tabla);

		return $respuesta;

	}

	/*=============================================
	RANGO FECHAS
	=============================================*/	

	static public function ctrRangoFechasIngresosMercadopago($fechaInicial, $fechaFinal){

		$tabla = "tarjeta";

		$respuesta = ModeloTarjetas::mdlRangoFechasIngresosMercadopago($tabla, $fechaInicial, $fechaFinal);

		return $respuesta;
		
	}


}