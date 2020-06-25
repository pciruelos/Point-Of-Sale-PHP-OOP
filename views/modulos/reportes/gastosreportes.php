<?php


          error_reporting(0);

         
          if(isset($_GET["fechaInicial"])){

            $fechaInicial = $_GET["fechaInicial"];
            $fechaFinal = $_GET["fechaFinal"];

          }else{

            $fechaInicial = null;
            $fechaFinal = null;

          }

          $respuesta = ControladorGastos::ctrRangoFechasGastos($fechaInicial, $fechaFinal);

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

  <div class="small-box bg-red">
    
    <div class="inner">
    
      <h3>$<?php echo number_format($sumatotal,2); ?></h3>

      <p>Gastos</p>
    
    </div>
    
    <div class="icon">
    
      <i class="ion ion-ios-cart"></i>
    
    </div>
    
    <a href="categorias" class="small-box-footer">
      
      Más info <i class="fa fa-arrow-circle-right"></i>
    
    </a>

  </div>

</div>