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
 
    case "participantes":
      cargarParticipantes(1);
      break;
    case "facturas":
      cargarFacturasRegistradas(1);
      break;
    case "ganadores":
      cargarGanadores(1);
      break;

  }
});

/*FUNCIONES TABLAS */

function cargarParticipantes(page) {
  var query = $("#nombre").val();
  var estatus = $("#estatus").val();
  var per_page = $("#per_page").val();
  var parametros = {
    action: "participantes",
    page: page,
    query: query,
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
      $(".datosParticipantes").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
function cargarFacturasRegistradas(page) {
  var query = $("#nombre").val();
  var estatus = $("#estatus").val();
  var serie = $("#serie").val();
  var per_page = $("#per_page").val();
  var parametros = {
    action: "facturas",
    page: page,
    query: query,
    estatus: estatus,
    serie: serie,
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
      $(".datosFacturas").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
function cargarGanadores(page) {
  var query = $("#nombre").val();
  var serie = $("#serie").val();
  var ganadores = $("#ganadores").val();
  var per_page = $("#per_page").val();
  var parametros = {
    action: "ganadores",
    page: page,
    query: query,
    serie: serie,
    ganadores: ganadores,
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
      $(".datosGanadores").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
