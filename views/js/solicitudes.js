function solicitudVista(idVisto, visto, sucursal) {
  var datos = new FormData();
  datos.append("statusVisto", visto);
  datos.append("activarIdVisto", idVisto);
  datos.append("activarSucursal", sucursal);

  $.ajax({
    url: "ajax/solicitudes.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    success: function (respuesta) {
      cargarSolicitudes(1);
    },
  });
}
function recoleccionEnCamino(id, estado) {
  var datos = new FormData();
  datos.append("status3", estado);
  datos.append("activarId3", id);
  $.ajax({
    url: "ajax/solicitudes.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    success: function (respuesta) {
      cargarSolicitudes(1);
    },
  });
}
function enProceso(id, estado) {
  var datos = new FormData();
  datos.append("status5", estado);
  datos.append("activarId5", id);
  $.ajax({
    url: "ajax/solicitudes.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    success: function (respuesta) {
      cargarSolicitudes(1);
    },
  });
}
function entregaEnCamino(id, estado) {
  var datos = new FormData();
  datos.append("status7", estado);
  datos.append("activarId7", id);
  $.ajax({
    url: "ajax/solicitudes.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    success: function (respuesta) {
      cargarSolicitudes(1);
    },
  });
}
function concluido(id, estado) {
  var datos = new FormData();
  datos.append("status8", estado);
  datos.append("activarId8", id);
  $.ajax({
    url: "ajax/solicitudes.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    success: function (respuesta) {
      cargarSolicitudes(1);
    },
  });
}
/*=============================================
MOSTRAR DATOS DEL CLIENTE EN SOLICITUD
=============================================*/
function verDatosCliente(id, sucursal) {
  var datos = new FormData();
  datos.append("idDatosCliente", id);

  $.ajax({
    url: "ajax/solicitudesAcciones.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      $("#idDatosCliente").val(respuesta["id"]);

      $("#nombreCliente").html(respuesta["nombre"]);
      $("#taller").val(respuesta["taller"]);
      $("#telefono").val(respuesta["telefono"]);
      $("#celular").val(respuesta["celular"]);
      $("#direccion").val(respuesta["direccion"]);

      $("#latitudCliente").val(respuesta["latitud"]);
      $("#longitudCliente").val(respuesta["longitud"]);
      var latCliente = respuesta["latitud"];
      var lngCliente = respuesta["longitud"];

      var datos = new FormData();
      datos.append("nameSucursal", sucursal);
      $.ajax({
        url: "ajax/solicitudesAcciones.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
          $("#nameSucursal").val(respuesta["sucursal"]);
          $("#latitudSucursal").val(respuesta["latitud"]);
          $("#longitudSucursal").val(respuesta["longitud"]);
        },
      });
      setTimeout(function () {
        initMap();
      }, 1000);
    },
  });
}

function initMap() {
  var map = new google.maps.Map(document.getElementById("map"), {
    zoom: 18,
    scrollwheel: true,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    center: { lat: 19.012329, lng: -98.202981 },
  });

  var directionsService = new google.maps.DirectionsService();
  var directionsRenderer = new google.maps.DirectionsRenderer({
    draggable: false,
    map: map,
    panel: document.getElementById("right-panel"),
  });

  directionsRenderer.addListener("directions_changed", function () {
    computeTotalDistance(directionsRenderer.getDirections());
  });
  var latitudCliente = $("#latitudCliente").val();
  var longitudCliente = $("#longitudCliente").val();
  var direccionesCliente = "" + latitudCliente + "," + longitudCliente + "";

  var latitudSucursal = $("#latitudSucursal").val();
  var longitudSucursal = $("#longitudSucursal").val();
  var coordenadaSucursal = "" + latitudSucursal + "," + longitudSucursal + "";

  displayRoute(
    "" + coordenadaSucursal + "",
    "" + direccionesCliente + "",
    directionsService,
    directionsRenderer
  );
}

function displayRoute(origin, destination, service, display) {
  document.getElementById("right-panel").innerHTML = "";
  service.route(
    {
      origin: origin,
      destination: destination,

      travelMode: "DRIVING",
      avoidTolls: true,
    },
    function (response, status) {
      if (status === "OK") {
        display.setDirections(response);
      } else {
        console.log("Could not display directions due to: " + status);
      }
    }
  );
}

function computeTotalDistance(result) {
  var total = 0;
  var myroute = result.routes[0];
  for (var i = 0; i < myroute.legs.length; i++) {
    total += myroute.legs[i].distance.value;
  }
  total = total / 1000;
  document.getElementById("total").innerHTML = total + " km";
}
