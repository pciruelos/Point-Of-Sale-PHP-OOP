<!-- <?php
          // error_reporting(0);

         
          if(isset($_GET["fechaInicial"])){

            $fechaInicial = $_GET["fechaInicial"];
            $fechaFinal = $_GET["fechaFinal"];

          }else{

            $fechaInicial = null;
            $fechaFinal = null;

          }

          $respuesta = ControladorTarjetas::ctrRangoFechasIngresos($fechaInicial, $fechaFinal);

          $arrayFechas = array();
          $arrayVentas = array();
          $sumaPagos = array();
          $bancos = array();
          array_push($bancos, $value["banco"]);
          var_dump($bancos);

          foreach ($respuesta as $key => $value1) {

             foreach ($respuesta as $key => $value2) {

              if($value2["banco"] == $value1["fecha"]) {

                

          //       $arrayVentas($value2["banco"] => $value1["total"]);
          // }
          // var_dump($arrayVentas);

          // foreach ($arrayVentas as $key => $value) {

          //  $sumaTotalBancos[$key] += $value;

          }
        }
      }

          // #Evitamos repetir nombre
          // $noRepetirNombres = array_unique($sumaTotalBancos);

                              
          ?> -->

<?php
          error_reporting(0);

         
          if(isset($_GET["fechaInicial"])){

            $fechaInicial = $_GET["fechaInicial"];
            $fechaFinal = $_GET["fechaFinal"];

          }else{

            $fechaInicial = null;
            $fechaFinal = null;

          }

          $respuesta = ControladorTarjetas::ctrRangoFechasIngresosMercadopago($fechaInicial, $fechaFinal);

          $arrayFechas = array();
          $arrayVentas = array();
          $sumaPagos = array();  

          

          foreach ($respuesta as $key => $value) {

          #Capturamos sólo el año y el mes y dia
          $fecha = substr($value["fecha"],0,10);

          #Introducir las fechas en arrayFechas
          array_push($arrayFechas, $fecha);

          #Capturamos las ventas
          $arrayVentas = array($fecha => $value["total"]);

          #Sumamos los pagos que ocurrieron el mismo dia
          foreach ($arrayVentas as $key => $value) {
    
          $sumaPagos[$key] += $value;

          $sumatotal = array_sum($sumaPagos);

                      }
                    } 
                      // var_dump($sumaPagos);
                      // var_dump($sumatotal);
?>



<div class="col-lg-3 col-xs-6">

    <div class="small-box bg-aqua">
    
      <div class="inner">
      
        <p>Ingresos Total MercadoPago:</p>

        <h3>$<?php echo number_format($sumatotal,2); ?></h3>

      </div>
    
      <div class="icon">
      
        <i class="ion ion-social-usd"></i>
    
      </div>
    
    <!-- <a href="ventas" class="small-box-footer">
      
      Más info <i class="fa fa-arrow-circle-right"></i>
    
    </a> -->

   </div>
   
</div> 