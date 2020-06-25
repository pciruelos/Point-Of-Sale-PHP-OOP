/*=============================================
EDITAR CLIENTE
=============================================*/
$(".tablas").on("click", ".btnEditarGasto", function(){

	var idGasto = $(this).attr("idGasto");

	var datos = new FormData();
    datos.append("idGasto", idGasto);

    $.ajax({

      url:"ajax/gastos.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){
      

      
      	 $("#idGasto").val(respuesta["id"]);
	       $("#EditarDescripcionGasto").val(respuesta["descripcion"]);
	       $("#EditarPrecioGasto").val(respuesta["total"]);
	       $("#EditarMetodoGasto").val(respuesta["metodo"]);
	  }
      
  	})

})

/*=============================================
ELIMINAR CLIENTE
=============================================*/
$(".tablas").on("click", ".btnEliminarGasto", function(){

	var idGasto = $(this).attr("idGasto");
  console.log("idGasto", idGasto);
	
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
          
            window.location = "index.php?ruta=gastos&idGasto="+idGasto;
        }

  })

})
/*=============================================
variable local storage
=============================================*/

if(localStorage.getItem("capturarRango3") != null){

  $("#daterange-btn3 span").html(localStorage.getItem("capturarRango3"));


}else{

  $("#daterange-btn3 span").html('<i class="fa fa-calendar"></i> Rango de fecha')

}

/*=============================================
RANGO DE FECHAS
=============================================*/
$('#daterange-btn3').click(function(){
 
 $(".daterangepicker.opensleft").addClass("opengastos");
 
});


$('#daterange-btn3').daterangepicker(
  {
    ranges   : {
      'Hoy'       : [moment(), moment()],
      'Ayer'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
      'Últimos 7 días' : [moment().subtract(6, 'days'), moment()],
      'Últimos 30 días': [moment().subtract(29, 'days'), moment()],
      'Este mes'  : [moment().startOf('month'), moment().endOf('month')],
      'Último mes'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    },
    startDate: moment(),
    endDate  : moment()
  },
  function (start, end) {
    $('#daterange-btn3 span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));

    var fechaInicial = start.format('YYYY-MM-DD');

    var fechaFinal = end.format('YYYY-MM-DD');

    var capturarRango = $("#daterange-btn3 span").html();
   
    localStorage.setItem("capturarRango3", capturarRango);

    $('#daterange-btn3').attr("boton3","tablauno3");

    // $(".daterangepicker.opensleft .ranges li").attr("boton3","tablauno3");

    window.location = "index.php?ruta=gastos&fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;

  }

)

/*=============================================
CANCELAR RANGO DE FECHAS
=============================================*/
$(document).on("click",".opengastos .range_inputs .cancelBtn", function(){
// $(".daterangepicker.opensleft .range_inputs .cancelBtn").on("click", function(){

  localStorage.removeItem("capturarRango3");
  localStorage.clear();
 
  window.location = "gastos";

})

/*=============================================
CAPTURAR HOY
=============================================*/

$(document).on("click",".opengastos .ranges li", function(){

  var textoHoy = $(this).attr("data-range-key");

  if(textoHoy == "Hoy"){

    var d = new Date();
    
    var dia = d.getDate();
    var mes = d.getMonth()+1;
    var año = d.getFullYear();

     if(mes < 10 && dia < 10){

      var fechaInicial = año+"-0"+mes+"-0"+dia;
      var fechaFinal = año+"-0"+mes+"-0"+dia;

    }else if(mes < 10){

      var fechaInicial = año+"-0"+mes+"-"+dia;
      var fechaFinal = año+"-0"+mes+"-"+dia;

    }else if(dia < 10){

      var fechaInicial = año+"-"+mes+"-0"+dia;
      var fechaFinal = año+"-"+mes+"-0"+dia;

    

    }else{

      var fechaInicial = año+"-"+mes+"-"+dia;
        var fechaFinal = año+"-"+mes+"-"+dia;

    } 

      localStorage.setItem("capturarRango3", "Hoy");


      window.location = "index.php?ruta=gastos&fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;
    
  }

})
/*=============================================
variable local storage
=============================================*/

if(localStorage.getItem("capturarRango4") != null){

  $("#daterange-btn4 span").html(localStorage.getItem("capturarRango4"));


}else{

  $("#daterange-btn4 span").html('<i class="fa fa-calendar"></i> Rango de fecha')

}

/*=============================================
RANGO DE FECHAS
=============================================*/
$('#daterange-btn4').click(function(){
 
 $(".daterangepicker.opensleft").addClass("openRepoGast");
 
});


$('#daterange-btn4').daterangepicker(
  {
    ranges   : {
      'Hoy'       : [moment(), moment()],
      'Ayer'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
      'Últimos 7 días' : [moment().subtract(6, 'days'), moment()],
      'Últimos 30 días': [moment().subtract(29, 'days'), moment()],
      'Este mes'  : [moment().startOf('month'), moment().endOf('month')],
      'Último mes'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    },
    startDate: moment(),
    endDate  : moment()
  },
  function (start, end) {
    $('#daterange-btn4 span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));

    var fechaInicial = start.format('YYYY-MM-DD');

    var fechaFinal = end.format('YYYY-MM-DD');

    var capturarRango = $("#daterange-btn4 span").html();
   
    localStorage.setItem("capturarRango4", capturarRango);


    window.location = "index.php?ruta=reporte-gasto&fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;

  }

)

/*=============================================
CANCELAR RANGO DE FECHAS
=============================================*/
$(document).on("click",".openRepoGast .range_inputs .cancelBtn", function(){

// $(".daterangepicker.opensleft .range_inputs .cancelBtn").on("click", function(){

  localStorage.removeItem("capturarRango4");
  localStorage.clear();
  window.location = "reporte-gasto";

})

/*=============================================
CAPTURAR HOY
=============================================*/
$(document).on("click",".openRepoGast .ranges li", function(){
// $(".daterangepicker.opensleft .ranges li").on("click", function(){

  var textoHoy = $(this).attr("data-range-key");

  if(textoHoy == "Hoy"){

    var d = new Date();
    
    var dia = d.getDate();
    var mes = d.getMonth()+1;
    var año = d.getFullYear();

     if(mes < 10 && dia < 10){

      var fechaInicial = año+"-0"+mes+"-0"+dia;
      var fechaFinal = año+"-0"+mes+"-0"+dia;

    }else if(mes < 10){

      var fechaInicial = año+"-0"+mes+"-"+dia;
      var fechaFinal = año+"-0"+mes+"-"+dia;

    }else if(dia < 10){

      var fechaInicial = año+"-"+mes+"-0"+dia;
      var fechaFinal = año+"-"+mes+"-0"+dia;

    

    }else{

      var fechaInicial = año+"-"+mes+"-"+dia;
        var fechaFinal = año+"-"+mes+"-"+dia;

    } 

      localStorage.setItem("capturarRango4", "Hoy");

      window.location = "index.php?ruta=reporte-gasto&fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;

  }

})
/*=============================================
variable local storage
=============================================*/

if(localStorage.getItem("capturarRango5") != null){

  $("#daterange-btn5 span").html(localStorage.getItem("capturarRango5"));


}else{

  $("#daterange-btn5 span").html('<i class="fa fa-calendar"></i> Rango de fecha')

}

/*=============================================
RANGO DE FECHAS
=============================================*/
$('#daterange-btn5').click(function(){
 
 $(".daterangepicker.opensright").addClass("openInicio");
 
});

$('#daterange-btn5').daterangepicker(
  {
    ranges   : {
      'Hoy'       : [moment(), moment()],
      'Ayer'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
      'Últimos 7 días' : [moment().subtract(6, 'days'), moment()],
      'Últimos 30 días': [moment().subtract(29, 'days'), moment()],
      'Este mes'  : [moment().startOf('month'), moment().endOf('month')],
      'Último mes'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    },
    startDate: moment(),
    endDate  : moment()
  },
  function (start, end) {
    $('#daterange-btn5 span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));

    var fechaInicial = start.format('YYYY-MM-DD');

    var fechaFinal = end.format('YYYY-MM-DD');

    var capturarRango = $("#daterange-btn5 span").html();
   
    localStorage.setItem("capturarRango5", capturarRango);


    window.location = "index.php?ruta=inicio&fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;

  }

)

/*=============================================
CANCELAR RANGO DE FECHAS
=============================================*/
$(document).on("click",".openInicio .range_inputs .cancelBtn", function(){

  // $(".daterangepicker .range_inputs .cancelBtn").on("click", function(){

  localStorage.removeItem("capturarRango5");
  localStorage.clear();
  window.location = "inicio";

})

/*=============================================
CAPTURAR HOY
=============================================*/
$(document).on("click",".openInicio .ranges li", function(){
// $(".daterangepicker .ranges li").on("click", function(){

  var textoHoy = $(this).attr("data-range-key");

  if(textoHoy == "Hoy"){

    var d = new Date();
    
    var dia = d.getDate();
    var mes = d.getMonth()+1;
    var año = d.getFullYear();

     if(mes < 10 && dia < 10){

      var fechaInicial = año+"-0"+mes+"-0"+dia;
      var fechaFinal = año+"-0"+mes+"-0"+dia;

    }else if(mes < 10){

      var fechaInicial = año+"-0"+mes+"-"+dia;
      var fechaFinal = año+"-0"+mes+"-"+dia;

    }else if(dia < 10){

      var fechaInicial = año+"-"+mes+"-0"+dia;
      var fechaFinal = año+"-"+mes+"-0"+dia;

    

    }else{

      var fechaInicial = año+"-"+mes+"-"+dia;
        var fechaFinal = año+"-"+mes+"-"+dia;

    } 

      localStorage.setItem("capturarRango5", "Hoy");


      window.location = "index.php?ruta=inicio&fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;
    

  }

})
/*=============================================
variable local storage
=============================================*/

if(localStorage.getItem("capturarRango6") != null){

  $("#daterange-btn6 span").html(localStorage.getItem("capturarRango6"));


}else{

  $("#daterange-btn6 span").html('<i class="fa fa-calendar"></i> Rango de fecha')

}

/*=============================================
RANGO DE FECHAS
=============================================*/
$('#daterange-btn6').click(function(){
 
 $(".daterangepicker.opensleft").addClass("openIngreso");
 
});

$('#daterange-btn6').daterangepicker(
  {
    ranges   : {
      'Hoy'       : [moment(), moment()],
      'Ayer'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
      'Últimos 7 días' : [moment().subtract(6, 'days'), moment()],
      'Últimos 30 días': [moment().subtract(29, 'days'), moment()],
      'Este mes'  : [moment().startOf('month'), moment().endOf('month')],
      'Último mes'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    },
    startDate: moment(),
    endDate  : moment()
  },
  function (start, end) {
    $('#daterange-btn6 span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));

    var fechaInicial = start.format('YYYY-MM-DD');

    var fechaFinal = end.format('YYYY-MM-DD');

    var capturarRango = $("#daterange-btn6 span").html();
   
    localStorage.setItem("capturarRango6", capturarRango);


    window.location = "index.php?ruta=ingreso-tarjeta&fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;

  }

)

/*=============================================
CANCELAR RANGO DE FECHAS
=============================================*/
$(document).on("click",".openIngreso .range_inputs .cancelBtn", function(){

  // $(".daterangepicker .range_inputs .cancelBtn").on("click", function(){

  localStorage.removeItem("capturarRango6");
  localStorage.clear();
  window.location = "ingreso-tarjeta";

})

/*=============================================
CAPTURAR HOY
=============================================*/
$(document).on("click",".openIngreso .ranges li", function(){
// $(".daterangepicker .ranges li").on("click", function(){

  var textoHoy = $(this).attr("data-range-key");

  if(textoHoy == "Hoy"){

    var d = new Date();
    
    var dia = d.getDate();
    var mes = d.getMonth()+1;
    var año = d.getFullYear();

     if(mes < 10 && dia < 10){

      var fechaInicial = año+"-0"+mes+"-0"+dia;
      var fechaFinal = año+"-0"+mes+"-0"+dia;

    }else if(mes < 10){

      var fechaInicial = año+"-0"+mes+"-"+dia;
      var fechaFinal = año+"-0"+mes+"-"+dia;

    }else if(dia < 10){

      var fechaInicial = año+"-"+mes+"-0"+dia;
      var fechaFinal = año+"-"+mes+"-0"+dia;

    

    }else{

      var fechaInicial = año+"-"+mes+"-"+dia;
        var fechaFinal = año+"-"+mes+"-"+dia;

    } 

      localStorage.setItem("capturarRango6", "Hoy");


      window.location = "index.php?ruta=ingreso-tarjeta&fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;
    

  }

})