(async () => {
  const respuestaRaw = await fetch("ajax/dataCharts.php?grafico=grafico1");

  const respuesta = await respuestaRaw.json();

  const $grafica = document.querySelector("#acumuladoRegistrosPorTienda");

  const etiquetas = respuesta.etiquetas;

  const datosSolicitudesAcumuladas = {
    label: "#",
    data: respuesta.datos,
    backgroundColor: "rgba(255, 99, 132, 0.2)", // Color de fondo
    borderColor: "rgba(255,99,132,1)", // Color del borde

    borderWidth: 1,
    fill: true,
  };
  new Chart($grafica, {
    type: "line",
    data: {
      labels: etiquetas,
      datasets: [datosSolicitudesAcumuladas],
    },
    options: {
      scales: {
        yAxes: [
          {
            ticks: {
              beginAtZero: true,
            },
          },
        ],
      },
    },
  });
})();

(async () => {
  const respuestaRaw = await fetch("ajax/dataCharts.php?grafico=grafico2");

  const respuesta = await respuestaRaw.json();

  const $grafica = document.querySelector("#acumuladoFacturasRegistradas");

  const etiquetas = respuesta.etiquetas;

  const datosSolicitudesAcumuladas = {
    label: "$ ",
    data: respuesta.datos,
    backgroundColor: "rgba(255, 99, 132, 0.2)", // Color de fondo
    borderColor: "rgba(255,99,132,1)", // Color del borde

    borderWidth: 1,
    fill: true,
  };
  new Chart($grafica, {
    type: "line",
    data: {
      labels: etiquetas,
      datasets: [datosSolicitudesAcumuladas],
    },
    options: {
      scales: {
        yAxes: [
          {
            ticks: {
              beginAtZero: true,
            },
          },
        ],
      },
    },
  });
})();

(async () => {
  const respuestaRaw = await fetch("ajax/dataCharts.php?grafico=grafico3");

  const respuesta = await respuestaRaw.json();

  const $grafica = document.querySelector("#acumuladoGanadoresTienda");

  const etiquetas = respuesta.etiquetas;

  const datosSolicitudesAcumuladas = {
    label: "# ",
    data: respuesta.datos,
    backgroundColor: "rgba(255, 99, 132, 0.2)", // Color de fondo
    borderColor: "rgba(255,99,132,1)", // Color del borde

    borderWidth: 1,
    fill: true,
  };
  new Chart($grafica, {
    type: "line",
    data: {
      labels: etiquetas,
      datasets: [datosSolicitudesAcumuladas],
    },
    options: {
      scales: {
        yAxes: [
          {
            ticks: {
              beginAtZero: true,
            },
          },
        ],
      },
    },
  });
})();
(async () => {
  const respuestaRaw = await fetch("ajax/dataCharts.php?grafico=grafico4");

  const respuesta = await respuestaRaw.json();

  const $grafica = document.querySelector("#acumuladoGanadoresTiendaPie");

  const etiquetas = respuesta.etiquetas;

  const datosSolicitudesAcumuladas = {
    label: "# ",
    data: respuesta.datos,
     backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(255, 159, 64, 0.2)'
      ],
    borderColor: [
        'rgba(255,99,132,1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)'
      ],

    borderWidth: 1,
    fill: true,
  };
  new Chart($grafica, {
    type: "pie",
    data: {
      labels: etiquetas,
      datasets: [datosSolicitudesAcumuladas],
    },
    options: {
      responsive: true,
    animation: {
      animateScale: true,
      animateRotate: true
    }
    },
  });
})();