<div class="content-wrapper">
    <section class="content-header">

      <h1>
        Detalles Jugueteria
        <small>Panel de Control</small>
      </h1>

      <ol class="breadcrumb">

        <li>
        	<a href="#"><i class="fa fa-dashboard"></i> Inicio</a>
        </li>
      
        <li class="active">Tablero</li>

      </ol>

    </section>

    <div class="row">

      <div class="col-md-6 col-md-offset-5">

     <button type="button" class="btn btn-default" id="daterange-btn5">
           
            <span>
              <i class="fa fa-calendar"></i> Rango de fecha
            </span>

            <i class="fa fa-caret-down"></i>

     </button>

     </div>

    </div> 

  <section class="content">

    <div class="row">
      
    <?php

    

      include "inicio/cajas-superiores.php";

      include "cajas/ingresosmercadopago.php";

    

    ?>

    </div> 



     <div class="row">
       
        <div class="col-lg-12">

          <?php

         
          
           include "reportes/grafico-ventas.php";

          

          ?>

        </div>

        <div class="col-lg-6">

          <?php

       
          
           include "reportes/productos-mas-vendidos.php";

         
          ?>

        </div>

         <div class="col-lg-6">

          <?php

         
          
           include "inicio/productos-recientes.php";

         

          ?>

        </div>

         <div class="col-lg-12">
           
          <?php

          if($_SESSION["perfil"] =="Especial" || $_SESSION["perfil"] =="Vendedor"){

             echo '<div class="box box-success">

             <div class="box-header">

             <h1>Bienvenid@ ' .$_SESSION["nombre"].'</h1>

             </div>

             </div>';

          }

          ?>

         </div>

     </div>

  </section>
 
</div>
