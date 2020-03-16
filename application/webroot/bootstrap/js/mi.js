//JQuery
//declarar variables
var reserva = new Array();//array con los datos de la reserva
$(document).ready(function(){
//  alert("Hola");
  $(".formulario").css('visibility', 'hidden');//ocultar el formulario
});
/*$("#mod").on("click", function() {
  $("#formulario").show();
});*/
function mod(id_modificar)
{
  //guardar los datos de la fila para luego comparar con los del form
  for (var i = 0; i < 7; i++) {
    reserva.push($("#"+id_modificar+" td:eq("+i+")").text());
    }
console.log("reserva: " + reserva);
  $(".formulario").css('visibility', 'visible');//mostrar formulario
  //rellenar el formulario con los datos del tr
  $("#nombre").val($("#"+id_modificar+" td:eq(2)").text());//nombre cliente
  $("#correo").val($("#"+id_modificar+" td:eq(3)").text());//correo cliente
  $("#fecha").val($("#"+id_modificar+" td:eq(5)").text());//fecha reserva
  $("#telefono").val($("#"+id_modificar+" td:eq(4)").text());//teléfono cliente
  $("#comensales").val($("#"+id_modificar+" td:eq(6)").text());//comensales
}//fin función mod
/* cuando se presiona el btn modificar del formulario */
function modificar_reserva(){
window.location.href = "admin/login";
console.log("id_reserva" + reserva[0]);
  //comprobar si se han hecho modificaciones
  if (reserva[2] != $("#nombre").val() || reserva[3] != $("#correo").val() ||
    reserva[5] != $("#fecha").val() || reserva[4] != $("#telefono").val() ||
    reserva[6] != $("#comensales").val()){
      //se han hecho modificaciones, update bd (ajax)
//      alert("Hola");
      var modificacion = [];
      modificacion[0] = reserva[0];
      modificacion[1] = reserva[1];
      modificacion[2] = $("#nombre").val();//necesitamos el id_cliente
      modificacion[3] = $("#fecha").val();
      modificacion[4] = $("#telefono").val();
      modificacion[5] = $("#comensales").val();
      console.log("modificacion: " + modificacion);
    $.ajax({
            type: 'POST',
            url: 'ajax',
            data: modificacion,
            dataType: "dataString",
            success: function(resp){
              alert("Respuesta ajax");
              console.log(resp);
            }
        });
        /*
        $.ajax({
                type: 'POST',
                url: base_url + 'ajax/crearBoton',
                data: modificacion,
                dataType: "dataString",
                success: function(resp){
                  $("#respuesta-ajax").append(resp.html);
                }
            });
        */
  }
}
function cancelar(){
  $(".formulario").css('visibility', 'hidden');//ocultar el formulario
}

function delete_author(id){
  console.log("--------------------------------------------------------");
  reserva.forEach(miFuncion);
  function miFuncion(elemento, indice) {
    console.log( "Indice: " + indice + " Valor: " + elemento );
}
console.log("--------------------------------------------------------");
/*  $("#"+id+"").hide();
  var id_td = $("#"+id+"").text();
  console.log("Contenido del td: " + id_td);
*/
//  console.log("idt: " + idt);
  var id_td = $("#"+id+"").text();
  for (var i = 0; i < 7; i++) {
    console.log("para "+i+": " + $("#"+id+" td:eq("+i+")").text());
  }
//  var obj = JSON.parse(id_td);
//  console.log("obj_parse: " + obj);
  $(this).data("val", $("#tr_val").val());
  let t = $("#id").text();
//  console.log("obj: " + t[0]);

  var td = $("#"+id+" td:eq(0)").text();
  var td1 = $("#"+id+"").attr("td");
  var td2 = $("#"+id+" td:eq(1)").text();
  //
  var td3 = $("tr#"+id+"").text();

  var td4 = $("#"+id+"").find("td").text();
  var td5 = $("#"+id+":first-child").text();
  console.log("Var id: " + id);
  console.log("var td: " + td);
  console.log("var td1: " + td1);
  console.log("var td2: td:eq(1): " + td2);
  console.log("var td3: " + td3);
  console.log("var td4: " + td4);
  console.log("var td5: " + td5);
}
