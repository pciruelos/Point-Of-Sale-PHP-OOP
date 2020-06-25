<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Ingreso Tarjeta
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Ingresos Tarjetas</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        

          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarTarjeta">
            
            Agregar Ingreso

          </button>

        

          <button type="button" class="btn btn-default pull-right" id="daterange-btn6">
           
            <span>
              <i class="fa fa-calendar"></i> Rango de fecha
            </span>

            <i class="fa fa-caret-down"></i>

         </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Vendedor</th>
           <th>Descripcion</th>
           <th>Total</th>
           <th>Banco/Financiera</th>  
           <th>Fecha</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

  <?php

         
          if(isset($_GET["fechaInicial"])){

            $fechaInicial = $_GET["fechaInicial"];
            $fechaFinal = $_GET["fechaFinal"];

          }else{

            $fechaInicial = null;
            $fechaFinal = null;

          }

          $respuesta = ControladorTarjetas::ctrRangoFechasIngresos($fechaInicial, $fechaFinal);

          foreach ($respuesta as $key => $value) {
            

            echo '<tr>

                    <td>'.($key+1).'</td>';
                    $itemUsuario = "id";
                    $valorUsuario = $value["id_vendedor"];

                    $respuestaUsuario = ControladorUsuarios::ctrMostrarUsuarios($itemUsuario, $valorUsuario);

                    echo '<td>'.$respuestaUsuario["nombre"].'</td>


                    <td>'.$value["descripcion"].'</td>
                    <td>$ '.number_format($value["total"],2).'</td>
                    <td>'.$value["banco"].'</td>
                    <td>'.$value["fecha"].'</td>
                    <td>

                      <div class="btn-group">
                          
                        <button class="btn btn-warning btnEditarIngreso" data-toggle="modal" data-target="#modalEditarIngreso" idIngreso="'.$value["id"].'"><i class="fa fa-pencil"></i></button>

                        <button class="btn btn-danger btnEliminarIngreso" idIngreso="'.$value["id"].'"><i class="fa fa-times"></i></button>

                      </div>  

                    </td>

                  </tr>';
          
            }

        ?>
        </tbody>

       </table>
        <?php

        $ventas = ControladorTarjetas::ctrSumaTotalIngresos(); ?>


        <?php
         // echo $ventas;
         // var_dump($ventas);
         // echo number_format($ventas["total"],2);

    

      include "cajas/mercado.php";
      include "cajas/ingresosmercadopago.php";
      include "cajas/1.php";



    

    ?>

      </div>

    </div>

  </section>

</div>


<!--=====================================
MODAL AGREGAR CLIENTE
======================================-->

<div id="modalAgregarTarjeta" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Ingreso</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
                
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                    <input type="text" class="form-control input-lg" id="nuevoVendedor" value="<?php echo $_SESSION["nombre"]; ?>" readonly>

                    <input type="hidden" name="idVendedor" value="<?php echo $_SESSION["id"]; ?>">

                  </div>

            </div> 

            <!-- ENTRADA PARA LA Descripcion -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span> 

                <input type="text" class="form-control input-lg"  name="DescripcionIngreso" placeholder="Ingresar descripcion del Ingreso" >

              </div>

            </div>

            <!-- ENTRADA PARA PRECIO COMPRA -->

             <div class="form-group">
     
                  <div class="input-group">
                  
                    <span class="input-group-addon"><i class="ion ion-social-usd"></i></span> 

                    <input type="number" class="form-control input-lg" name="PrecioIngreso" min="0" step="any" placeholder="Ingrese Monto" required>

                </div>

              </div>

                <!--=====================================
                ENTRADA MÉTODO DE PAGO
                ======================================-->

                <div class="form-group" style="margin-top:15px;">
                       
                     <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>
                  
                      <select class="form-control input-lg" name="IngresoBanco" required>
                        <option value="">Seleccione Banco / Financiera</option>
                        <option value="Banco Patagonia">Banco 1</option>
                        <option value="Banco Superville">Banco 2</option>
                        <option value="MercadoPago">Financiera 1</option>                  
                      </select>    

                    </div>

                </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Ingreso</button>

        </div>

      </form>

         <?php

        $crearIngreso = new ControladorTarjetas();
        $crearIngreso -> ctrCrearIngreso();
         ?>


    </div>

  </div>


</div>

<!--=====================================
MODAL EDITAR CLIENTE
======================================-->

<div id="modalEditarIngreso" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">
        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Gasto</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
                
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                    <input type="text" class="form-control input-lg" value="<?php echo $_SESSION["nombre"]; ?>" readonly>

                    <input type="hidden" id="idIngreso" name="idIngreso">

                  </div>

            </div> 

            <!-- ENTRADA PARA LA Descripcion -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span> 

                <input type="text" class="form-control input-lg"  id="EditarDescripcionIngreso" name="EditarDescripcionIngreso">

              </div>

            </div>

            <!-- ENTRADA PARA PRECIO COMPRA -->

             <div class="form-group">
     
                  <div class="input-group">
                  
                    <span class="input-group-addon"><i class="ion ion-social-usd"></i></span> 

                    <input type="number" class="form-control input-lg" id="EditarPrecioIngreso" name="EditarPrecioIngreso" min="0" step="any"  required>

                  </div>

             </div>

            <!-- ENTRADA MÉTODO DE PAGO -->

             <div class="form-group" style="margin-top:15px;">
                       
                     <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>
                  
                      <select class="form-control input-lg" id="EditarMetodoIngreso" name="EditarMetodoIngreso"  required>
                        <option value="">Seleccione</option>
                        <option value="Banco Patagonia">Banco 1</option>
                        <option value="Banco Superville">Banco 2</option>
                        <option value="MercadoPago">Financiera 1</option>                  
                      </select>    

                    </div>

              </div>

              <!-- ENd -->

          </div>

        </div>
             

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cambios</button>

        </div>

      </form>

       <?php

        $editarGastos = new ControladorTarjetas();
        $editarGastos -> ctrEditarIngreso();

      ?>

    

    </div>

  </div>

</div>



<?php

  $eliminarIngreso = new ControladorTarjetas();
  $eliminarIngreso -> ctrEliminarIngreso();

?>
      
