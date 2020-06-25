<div class="content-wrapper">
    <section class="content-header">

      <h1>
        Detalles Jugueteria
        <small>Panel de Control</small>
      </h1>

      <ol class="breadcrumb">

        <li>
        	<a href="#"><i class="fa fa-dashboard"></i> Reporte</a>
        </li>
      
        <li class="active">Tablero</li>

      </ol>

    </section>

  <section class="content">

    <div class="box-header with-border">    

          <button type="button" class="btn btn-default pull-right" id="daterange-btn4">
           
            <span>
              <i class="fa fa-calendar"></i> Rango de fecha
            </span>

            <i class="fa fa-caret-down"></i>

         </button>

    </div>

<div class="row">
      <?php


          error_reporting(0);

         
          if(isset($_GET["fechaInicial"])){

            $fechaInicial = $_GET["fechaInicial"];
            $fechaFinal = $_GET["fechaFinal"];

          }else{

            $fechaInicial = null;
            $fechaFinal = null;

          }

          $respuesta = ControladorVentas::ctrRangoFechasVentas($fechaInicial, $fechaFinal);

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

    <div class="small-box bg-green">
    
      <div class="inner">
      
      <h3>$<?php echo number_format($sumatotal,2); ?></h3>

      <p>Ventas  ( Neto )</p>
    
      </div>
    
      <div class="icon">
      
      <i class="ion ion-social-usd"></i>
    
      </div>
    
    <a href="ventas" class="small-box-footer">
      
      Más info <i class="fa fa-arrow-circle-right"></i>
    
    </a>

  </div>

  </div>

 <?php 
  include "reportes/gastosreportes.php"
   ?>    

</div>

  </section>
 
</div>
