

var i = 1
function siguiente_cliente() {
    i++;
    if (i == 1) {
        index = i
    }
    else {
        index = i
    }
    console.log(index)
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/buscarclientes",
        data: {
            data: 'body',
            index
        },
        dataType: "json",
        method: "POST",
        success: function (response) {
            result = response;
            campos2 = "";
            $('#table_clientes tbody').empty();
            result = response;
            for (let index2 = 0; index2 < result.length; index2++) {
                campos2 += '<tr>';
                campos2 += '<td style="text-center"><strong>' + result[index2]['id'] + '</strong></td>';
                campos2 += '<td style="text-center">' + result[index2]['identificacion'] + '</td>';
                campos2 += '<td style="text-center">' + result[index2]['nombrecompleto'] + '</td>';
                campos2 += '<td style="text-center">' + result[index2]['idcliente'] + '</td>';
                campos2 += '<td style="text-center">' + result[index2]['motvnopago'] + '</td>';
                campos2 += '<td><button class="btn btn-success" type="button" onclick="verProceso(' + result[index2]['identificacion'] + ')">Ver</button></td>';
                campos2 += '</tr>';
            }
            $('#table_clientes tbody').append(campos2);
        }
    });
}

function anterior_cliente () {
    i--;
    if (i == 0) {
        index = i
    } else {
        index = i
    }
    console.log(index);
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/buscarclientes",
        data: {
            data: 'body',
            index
        },
        dataType: "json",
        method: "POST",
        success: function (response) {
            result = response;
            campos2 = "";
            $('#table_clientes tbody').empty();
            result = response;
            for (let index2 = 0; index2 < result.length; index2++) {
                campos2 += '<tr>';
                campos2 += '<td style="text-center"><strong>' + result[index2]['id'] + '</strong></td>';
                campos2 += '<td style="text-center">' + result[index2]['identificacion'] + '</td>';
                campos2 += '<td style="text-center">' + result[index2]['nombrecompleto'] + '</td>';
                campos2 += '<td style="text-center">' + result[index2]['idcliente'] + '</td>';
                campos2 += '<td style="text-center">' + result[index2]['motvnopago'] + '</td>';
                campos2 += '<td><button class="btn btn-success" type="button" onclick="verProceso(' + result[index2]['identificacion'] + ')">Ver</button></td>';
                campos2 += '</tr>';
            }
            $('#table_clientes tbody').append(campos2);
        }
    });
}


function filtro_cliente(value) {

    data = value;
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/buscarclientesfiltro",
        data: {
            reporte: 'filtro',
            data
        },
        method: "POST",
        success: function (response) {
            result = response;
            campos2 = "";
            $('#table_clientes tbody').empty();
            result = response;
            for (let index2 = 0; index2 < result.length; index2++) {
                campos2 += '<tr>';
                campos2 += '<td style="text-center"><strong>' + result[index2]['id'] + '</strong></td>';
                campos2 += '<td style="text-center">' + result[index2]['identificacion'] + '</td>';
                campos2 += '<td style="text-center">' + result[index2]['nombrecompleto'] + '</td>';
                campos2 += '<td style="text-center">' + result[index2]['idcliente'] + '</td>';
                campos2 += '<td style="text-center">' + result[index2]['motvnopago'] + '</td>';
                campos2 += '<td><button class="btn btn-success" type="button" onclick="verProceso(' + result[index2]['identificacion'] + ')">Ver</button></td>';
                campos2 += '</tr>';
            }
            $('#table_clientes tbody').append(campos2);

        }
    });

}
