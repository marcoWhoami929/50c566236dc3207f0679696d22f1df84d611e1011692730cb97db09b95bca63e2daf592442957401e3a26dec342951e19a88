
function verDatosParticipante(id) {
    var datos = new FormData();
    datos.append("idParticipante", id);
  
    $.ajax({
      url: "ajax/solicitudesAcciones.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function (respuesta) {
  
        $("#nombreParticipante").html(respuesta["nombre"]+" "+respuesta["apellidoPaterno"]+" "+respuesta["apellidoMaterno"]);
        $("#telefono").val(respuesta["telefono"]);
        $("#celular").val(respuesta["celular"]);
        $("#direccion").val(respuesta["calle"]+" ,"+respuesta["numeroInterior"]+ " ,"+respuesta["numeroExterior"]+" "+respuesta["colonia"]+" ,"+respuesta["municipio"]+" ,"+respuesta["estado"]+" ,"+respuesta["ciudad"]+" "+respuesta["pais"]);
        $("#cp").val(respuesta["cp"]);
      },
    });
  }