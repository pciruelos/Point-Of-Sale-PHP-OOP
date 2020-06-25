/*=============================================
EDITAR CLIENTE
=============================================*/
$(".tablas").on("click", ".btnEditarIngreso", function(){

	var idIngreso = $(this).attr("idIngreso");

	var datos = new FormData();
    datos.append("idIngreso", idIngreso);

    $.ajax({

      url:"ajax/ingreso.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){
      

      
      	 $("#idIngreso").val(respuesta["id"]);
	       $("#EditarDescripcionIngreso").val(respuesta["descripcion"]);
	       $("#EditarPrecioIngreso").val(respuesta["total"]);
	       $("#EditarMetodoIngreso").val(respuesta["banco"]);
	  }
      
  	})

})

/*=============================================
ELIMINAR CLIENTE
=============================================*/
$(".tablas").on("click", ".btnEliminarIngreso", function(){

	var idIngreso = $(this).attr("idIngreso");
  console.log("idIngreso", idIngreso);
	
	swal({
        title: '¿Está seguro de borrar el gasto?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar gasto!'
      }).then(function(result){

        if (result.value) {
          
            window.location = "index.php?ruta=ingreso-tarjeta&idIngreso="+idIngreso;
        }

  })

})