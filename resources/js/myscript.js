function tabla() {
  var selected = [];
  for (var option of document.getElementById('multiselect1').options) {
    if (option.selected) {
      selected.push(option.value);
    }
  }
  var campos = '';
  $('#table_reporte thead').empty();
  campos += '<tr>';
  for (let index = 0; index < selected.length; index++) {
    campos += '<th style="text-center">' + selected[index] + '</th>';
  }
  campos += '</tr>';
  $('#table_reporte thead').append(campos);

}



$('#btnprocesos').click(function () {
  $('#demo').empty();
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {

      document.getElementById('demo').innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "/portafolio?procesos", true);
  xhttp.send();
});

$('#btnmovimientos').click(function () {
  $('#demo').empty();
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {

      document.getElementById('demo').innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "/portafolio?movimientos", true);
  xhttp.send();
});

$('#btnnovedades').click(function () {
  $('#demo').empty();
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {

      document.getElementById('demo').innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "/portafolio?novedades", true);
  xhttp.send();
});
$('#btnreportes').click(function () {
  $('#demo').empty();
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {

      document.getElementById('demo').innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "/portafolio?reportes", true);
  xhttp.send();
});
$('#btntareas').click(function () {
  $('#demo').empty();
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {

      document.getElementById('demo').innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "/gestion?tareas", true);
  xhttp.send();
});
$('#btncalendario').click(function () {
  $('#demo').empty();
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {

      document.getElementById('demo').innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "/gestion?calendario", true);
  xhttp.send();
});

function form_buscar() {

  formulario = document.getElementById('form_buscar');
  if (formulario.style.display === "none") {
    formulario.style.display = "block";
  } else {
    formulario.style.display = "none";
  }
}




