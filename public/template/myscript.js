
$( function() {
  $( "#datepicker" ).datepicker();
} );


function procesos() {
  $('#demo').empty();

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {

      document.getElementById('demo').innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "/agregarprocesos?procesouploadfile", true);
  xhttp.send();
}


$('#btnusuarios').click(function () {
  $('#demo').empty();
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {

      document.getElementById('demo').innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "/administracion?usuarios", true);
  xhttp.send();
});

$('#btnclientes').click(function () {
  $('#demo').empty();
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {

      document.getElementById('demo').innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "/administracion?clientes", true);
  xhttp.send();
});

function guardarUsuarios() {

  $.ajax({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    url: "/save",
    data: $('#form_cliente').serialize(),
    dataType: "json",
    method: "POST",
    success: function (response) {
      alert("Guardado")
    }

  });
}

async function tabla() {

  var selected = [];
  var body = [];
  var result = [];

  for (var option of document.getElementById('multiselect1').options) {
    if (option.selected) {
      selected.push(option.value);
    }
  }
  var campos = '';
  var campos2 = '';
  $('#tablas thead').empty();
  campos += '<tr>';
  for (let index = 0; index < selected.length; index++) {
    campos += '<th style="text-center">' + selected[index] + '</th>';
    body.push(selected[index]);
  }
  campos += '</tr>';

  var json = JSON.stringify(body);

  result = await $.ajax({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    url: "/reporteProceso",
    data: {
      data: 'body',
      json
    },
    method: "POST",
    success: function (response) {

      $('#tablas tbody').empty();
      result = response;
      for (let index2 = 0; index2 < result.length; index2++) {
        campos2 += '<tr>';
        for (let index = 0; index < result[index2].length; index++) {
          campos2 += '<td style="text-center">' + result[index2][index] + '</td>';
        }
        campos2 += '</tr>';
      }
      $('#tablas tbody').append(campos2);
    }
  });

  $('#tablas thead').append(campos);
  var table = $('#tablas').DataTable();

  $('#btnreporte').click(function () {

    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: "/descargarProceso",
      data: {
        reporte: 'descargar_reporte',
        json
      },
      method: "POST",
    });
  });
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

$('#btnadmgestion').click(function () {
  $('#demo').empty();
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {

      document.getElementById('demo').innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "/administracion?gestion", true);
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


function copyfile() {

  // alert("buenas");
  var datos = new FormData($('#formUploadCsv')[0]);
  $.ajax({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    url: '/upload',
    type: "POST",
    data: datos,
    contentType: false, 
    processData: false,
    async: true,
    timeout: 1000000000,
    success: function (result) {
      console.log(result);
      $('#previewcsv').empty();
      $('#previewcsv').append(result);
    },
  });
}

function sendData() {

  $.ajax({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    url: "/uploadfile",
    data: $('#formUploadFile').serialize(),
    dataType: "json",
    method: "POST",
    success: function (response) {

      $('#alert').html(response);

    }, error: function (response) {

      $('#alert').html(response.responseText);

    }

  });

}

var tiempo = {
  hora: 00,
  minuto: 00,
  segundo: 00,
  segundos: 00
};
tiempo_corriendo = setInterval(function () {
  // Segundos
  tiempo.segundos++;
  tiempo.segundo++;
  if (tiempo.segundo >= 60) {
    tiempo.segundo = 00;
    tiempo.minuto++;
  }

  // Minutos
  if (tiempo.minuto >= 60) {
    tiempo.minuto = 00;
    tiempo.hora++;
  }

  $("#horas").val(tiempo.hora);
  $("#minutos").val(tiempo.minuto);
  $("#segundos").val(tiempo.segundo);
  $("#segundostotales").val(tiempo.segundos);
}, 1000);












