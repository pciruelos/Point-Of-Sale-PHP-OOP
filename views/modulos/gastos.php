<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar ventas
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Gastos</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        

          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarGasto">
            
            Agregar Gasto

          </button>

        

          <button type="button" class="btn btn-default pull-right" id="daterange-btn3">
           
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
           <th>Metodo</th>  
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

          $respuesta = ControladorGastos::ctrRangoFechasGastos($fechaInicial, $fechaFinal);

          foreach ($respuesta as $key => $value) {
            

            echo '<tr>

                    <td>'.($key+1).'</td>';
                    $itemUsuario = "id";
                    $valorUsuario = $value["id_vendedor"];

                    $respuestaUsuario = ControladorUsuarios::ctrMostrarUsuarios($itemUsuario, $valorUsuario);

                    echo '<td>'.$respuestaUsuario["nombre"].'</td>


                    <td>'.$value["descripcion"].'</td>
                    <td>$ '.number_format($value["total"],2).'</td>
                    <td>'.$value["metodo"].'</td>
                    <td>'.$value["fecha"].'</td>
                    <td>

                      <div class="btn-group">
                          
                        <button class="btn btn-warning btnEditarGasto" data-toggle="modal" data-target="#modalEditarGasto" idGasto="'.$value["id"].'"><i class="fa fa-pencil"></i></button>

                        <button class="btn btn-danger btnEliminarGasto" idGasto="'.$value["id"].'"><i class="fa fa-times"></i></button>

                      </div>  

                    </td>

                  </tr>';
          
            }

        ?>
        </tbody>

       </table>
       

      </div>

    </div>

  </section>

</div>


<!--=====================================
MODAL AGREGAR CLIENTE
======================================-->

<div id="modalAgregarGasto" class="modal fade" role="dialog">
  
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

                    <input type="text" class="form-control input-lg" id="nuevoVendedor" value="<?php echo $_SESSION["nombre"]; ?>" readonly>

                    <input type="hidden" name="idVendedor" value="<?php echo $_SESSION["id"]; ?>">

                  </div>

            </div> 

            <!-- ENTRADA PARA LA Descripcion -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span> 

                <input type="text" class="form-control input-lg"  name="DescripcionGasto" placeholder="Ingresar descripcion del gasto" >

              </div>

            </div>

            <!-- ENTRADA PARA PRECIO COMPRA -->

             <div class="form-group">
     
                  <div class="input-group">
                  
                    <span class="input-group-addon"><i class="ion ion-social-usd"></i></span> 

                    <input type="number" class="form-control input-lg" name="PrecioGasto" min="0" step="any" placeholder="Monto Gastado" required>

                </div>

              </div>

                <!--=====================================
                ENTRADA MÉTODO DE PAGO
                ======================================-->

                <div class="form-group" style="margin-top:15px;">
                       
                     <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>
                  
                      <select class="form-control input-lg" name="MetodoGasto" required>
                        <option value="">Seleccione método de pago</option>
                        <option value="Efectivo">Efectivo</option>
                        <option value="TC">Tarjeta Crédito</option>
                        <option value="TD">Tarjeta Débito</option>                  
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

          <button type="submit" class="btn btn-primary">Guardar Gasto</button>

        </div>

      </form>

         <?php

        $crearGasto = new ControladorGastos();
        $crearGasto -> ctrCrearGasto();
         ?>


    </div>

  </div>


</div>

<!--=====================================
MODAL EDITAR CLIENTE
======================================-->

<div id="modalEditarGasto" class="modal fade" role="dialog">
  
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

                    <input type="hidden" id="idGasto" name="idGasto">

                  </div>

            </div> 

            <!-- ENTRADA PARA LA Descripcion -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span> 

                <input type="text" class="form-control input-lg"  id="EditarDescripcionGasto" name="EditarDescripcionGasto">

              </div>

            </div>

            <!-- ENTRADA PARA PRECIO COMPRA -->

             <div class="form-group">
     
                  <div class="input-group">
                  
                    <span class="input-group-addon"><i class="ion ion-social-usd"></i></span> 

                    <input type="number" class="form-control input-lg" id="EditarPrecioGasto" name="EditarPrecioGasto" min="0" step="any"  required>

                  </div>

             </div>

            <!-- ENTRADA MÉTODO DE PAGO -->

             <div class="form-group" style="margin-top:15px;">
                       
                     <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>
                  
                      <select class="form-control input-lg" id="EditarMetodoGasto" name="EditarMetodoGasto"  required>
                        <option value="">Seleccione método de pago</option>
                        <option value="Efectivo">Efectivo</option>
                        <option value="TC">Tarjeta Crédito</option>
                        <option value="TD">Tarjeta Débito</option>                  
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

        $editarGastos = new ControladorGastos();
        $editarGastos -> ctrEditarGasto();

      ?>

    

    </div>

  </div>

</div>



<?php

  $eliminarGasto = new ControladorGastos();
  $eliminarGasto -> ctrEliminarGasto();

?>
      
