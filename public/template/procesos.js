
function buscarprocesos() {

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/buscarfiltroProceso",
        data: $('#form_buscar_procesos').serialize(),
        dataType: "json",
        method: "POST",
        success: function (response) {
            campos2 = '';
            $('#table_procesos tbody').empty();
            result = response;
            console.log(result);
            for (let index2 = 0; index2 < result.length; index2++) {
                campos2 += '<tr>';
                campos2 += '<td style="text-center">' + result[index2]['id_proceso'] + '</td>';
                campos2 += '<td style="text-center">' + result[index2]['identificacion_demandado'] + '</td>';
                campos2 += '<td style="text-center">' + result[index2]['nombre_demandado'] + '</td>';
                campos2 += '<td style="text-center">' + result[index2]['entidad_proceso'] + '</td>';
                campos2 += '<td style="text-center">' + result[index2]['numero_juzgado'] +"-"+ result[index2]['tipo_juzgado']+"-"+result[index2]['ciudad_juzgado']+ '</td>';
                campos2 += '<td style="text-center">' + result[index2]['estado_cartera'] + '</td>';
                campos2 += '<td style="text-center">' + result[index2]['abogado_externo'] + '</td>';
                campos2 += '<td style="text-center">' + result[index2]['casa_cobranza'] + '</td>';
                if (result[index2]['idestatus'] == 1) {
                    campos2 += '<td style="text-center">ACTIVO</td>';
                } else {
                    campos2 += '<td style="text-center">INACTIVO</td>';
                }
                campos2 += '<td style="text-center"><button class="btn btn-primary" type="button" onclick="verProceso('+ result[index2]['identificacion_demandado']+')">Ver</button></td>';
                campos2 += '</tr>';
            }
            $('#table_procesos tbody').append(campos2); 
            $('#table_procesos').DataTable();
        },
    });
   
}


function verProceso(value){

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/verProceso",
        data: {
            reporte: 'verproceso',
            value
        },
        method: "POST",
        success: function(response){
            $('#demo').empty();
            $('#demo').html(response);

        }
    });
}
