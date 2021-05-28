(function ($) {
  "use strict";
  $(function () {
    var body = $("body");
    var contentWrapper = $(".content-wrapper");
    var scroller = $(".container-scroller");
    var footer = $(".footer");
    var sidebar = $(".sidebar");

    //Add active class to nav-link based on url dynamically
    //Active class can be hard coded directly in html file also as required

    function addActiveClass(element) {
      if (current === "") {
        //for root url
        if (element.attr("href").indexOf("index.html") !== -1) {
          element.parents(".nav-item").last().addClass("active");
          if (element.parents(".sub-menu").length) {
            element.closest(".collapse").addClass("show");
            element.addClass("active");
          }
        }
      } else {
        //for other url
        if (element.attr("href").indexOf(current) !== -1) {
          element.parents(".nav-item").last().addClass("active");
          if (element.parents(".sub-menu").length) {
            element.closest(".collapse").addClass("show");
            element.addClass("active");
          }
          if (element.parents(".submenu-item").length) {
            element.addClass("active");
          }
        }
      }
    }

    var current = location.pathname
      .split("/")
      .slice(-1)[0]
      .replace(/^\/|\/$/g, "");
    $(".nav li a", sidebar).each(function () {
      var $this = $(this);
      addActiveClass($this);
    });

    //Close other submenu in sidebar on opening any

    sidebar.on("show.bs.collapse", ".collapse", function () {
      sidebar.find(".collapse.show").collapse("hide");
    });

    //Change sidebar
    $('[data-toggle="minimize"]').on("click", function () {
      body.toggleClass("sidebar-icon-only");
    });
    /*=============================================
    CORRECCIÓN BOTONERAS OCULTAS BACKEND  
    =============================================*/

    if (window.matchMedia("(max-width:767px)").matches) {
      $("body").removeClass("sidebar-icon-only");
    } else {
      $("body").addClass("sidebar-icon-only");
    }

    //checkbox and radios
    $(".form-check label,.form-radio label").append(
      '<i class="input-helper"></i>'
    );
  });

  // focus input when clicking on search icon
  $("#navbar-search-icon").click(function () {
    $("#navbar-search-input").focus();
  });

  if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  }
})(jQuery);
$(function () {
  var url = window.location.pathname;
  var ruta = url.split("/");

  switch (ruta[2]) {
    case "dashboard":
      cargarProductosSolicitados();
      cargarClientesRegistrados();
      break;
    case "":
      cargarProductosSolicitados();
      cargarClientesRegistrados();
      break;
    case "solicitudes":
      cargarSolicitudes(1);
      break;
  }
});
/*FUNCIONES TABLAS */
function cargarProductosSolicitados() {
  $(".tableProductosSolicitados").DataTable({
    deferRender: true,
    retrieve: true,
    processing: true,
    fixedHeader: true,
    iDisplayLength: 10,
    order: [[0, "desc"]],
    /*"scrollX": true,*/
    lengthMenu: [
      [10, 25, 50, 100, 150, 200, 300, -1],
      [10, 25, 50, 100, 150, 200, 300, "All"],
    ],
    language: {
      sProcessing: "Procesando...",
      sLengthMenu: "Mostrar _MENU_ registros",
      sZeroRecords: "No se encontraron resultados",
      sEmptyTable: "Ningún dato disponible en esta tabla",
      sInfo: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
      sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0",
      sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
      sInfoPostFix: "",
      sSearch: "Buscar:",
      sUrl: "",
      sInfoThousands: ",",
      sLoadingRecords: "Cargando...",
      oPaginate: {
        sFirst: "Primero",
        sLast: "Último",
        sNext: "Siguiente",
        sPrevious: "Anterior",
      },
      oAria: {
        sSortAscending:
          ": Activar para ordenar la columna de manera ascendente",
        sSortDescending:
          ": Activar para ordenar la columna de manera descendente",
      },
    },
  });
}
function cargarClientesRegistrados() {
  $(".tableClientesRegistrados").DataTable({
    deferRender: true,
    retrieve: true,
    processing: true,
    fixedHeader: true,
    iDisplayLength: 10,
    order: [[0, "desc"]],
    /*"scrollX": true,*/
    lengthMenu: [
      [10, 25, 50, 100, 150, 200, 300, -1],
      [10, 25, 50, 100, 150, 200, 300, "All"],
    ],
    language: {
      sProcessing: "Procesando...",
      sLengthMenu: "Mostrar _MENU_ registros",
      sZeroRecords: "No se encontraron resultados",
      sEmptyTable: "Ningún dato disponible en esta tabla",
      sInfo: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
      sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0",
      sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
      sInfoPostFix: "",
      sSearch: "Buscar:",
      sUrl: "",
      sInfoThousands: ",",
      sLoadingRecords: "Cargando...",
      oPaginate: {
        sFirst: "Primero",
        sLast: "Último",
        sNext: "Siguiente",
        sPrevious: "Anterior",
      },
      oAria: {
        sSortAscending:
          ": Activar para ordenar la columna de manera ascendente",
        sSortDescending:
          ": Activar para ordenar la columna de manera descendente",
      },
    },
  });
}
function cargarSolicitudes(page) {
  var query = $("#nombre").val();
  var estatus = $("#estatus").val();
  var sucursal = $("#sucursal").val();
  var per_page = $("#per_page").val();
  var parametros = {
    action: "solicitudes",
    page: page,
    query: query,
    sucursal: sucursal,
    estatus: estatus,
    per_page: per_page,
  };
  $("#loader").fadeIn("slow");
  $.ajax({
    url: "ajax/functions.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Cargando...");
    },
    success: function (data) {
      $(".datosSolicitudes").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}