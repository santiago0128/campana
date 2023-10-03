



function resetForm(form) {
    $('form#' + form + ' .form-control').each(function () {
        $(this).val('');
    });
}

function guardarGestion() {
    $('#formGestion .form-control:visible:not(.noFilt)').each(function () {
        if ($(this).val() == '') {
            $(this).removeClass('is-valid');
            $(this).addClass('is-invalid');
            a++;
        } else {
            $(this).removeClass('is-invalid');
            $(this).addClass('is-valid');
        }
    });
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/saveGestion",
        data: $('#formGestion').serialize(),
        dataType: "json",
        method: "POST",
        success: function (response) {
           var id_proceso = response[0]['id']
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/savefechas_proceso",
                data: {
                    fecha_entrega_garantias : $('#fecha_entrega_garantias').val(),
                    fecha_sentencia : $('#fecha_sentencia').val(),
                    fecha_presentacion_demanda : $('#fecha_presentacion_demanda').val(),
                    fecha_liquidacion_credito : $('#fecha_liquidacion_credito').val(),
                    fecha_admision : $('#fecha_admision').val(),
                    fecha_terminacion : $('#fecha_terminacion').val(),
                    fecha_notificacion : $('#fecha_notificacion').val(),
                    fecha_ultima_actualizacion : $('#fecha_ultima_actualizacion').val(),
                    id: id_proceso
                },
                dataType: "json",
                method: "POST",
                success: function (e) {
                    if (e == 1) {

                        Swal.fire({
                            title: 'Gestion Guardada Correctamente',
                            icon: 'success',
                            showCancelButton: false,
                            confirmButtonColor: '#16CE46',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $.ajax({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    url: 'buscarhistorico',
                                    type: 'POST',
                                    data: {
                                        type: 'buscar_historico',
                                        identificacion: $('#identificacion').val()
                                    },
                                    dataType: "html",
                                    success: function (f) {
                                        campos = "";

                                        $('#table-historico tbody').empty();
                                        var objJson = jQuery.parseJSON(f);
                                        if (response != 2) {
                                            for (var a = 0; a < objJson.length; a++) {
                                                campos += '<tr>';
                                                campos += '<td>' + objJson[a]['fechagestion'] + ' ' + objJson[a]['hora'] + '</td>';
                                                campos += '<td>' + objJson[a]['login'] + '</td>';
                                                campos += '<td>' + objJson[a]['accion'] + '</td>';
                                                campos += '<td>' + objJson[a]['etapa'] + '</td>';
                                                // campos += '<td>' + objJson[a]['numeromarcado'] + '</td>';
                                                campos += '<td>' + objJson[a]['gestion'] + '</td>';
                                                campos += '<td>' + objJson[a]['tiempogestion'] + '</td>';
                                                campos += '</tr>';
                                            }
                                        } else {
                                            campos += '<tr><td colspan="10">No hay resultados</td></tr>'
                                        }
                                        $('#table-historico tbody').append(campos);
                                        $('#formGestion')[0].reset();

                                    }
                                });
                                $.ajax({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    url: 'buscaretapa',
                                    type: 'POST',
                                    data: {
                                        type: 'buscaretapa',
                                        identificacion: $('#identificacion').val()
                                    },
                                    dataType: "html",
                                    success: function (e) {
                                        campos2 = "";
                                        var objJson = jQuery.parseJSON(e);
                                        $('#etapa_proceso').empty();
                                        for (var a = 0; a < objJson.length; a++) {
                                            console.log(objJson);
                                            campos2 += '<div class="progress">';
                                            campos2 += '<div class="progress-bar progress-bar-striped progress-bar-animated ' + objJson[a]['bg'] + ' role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:' + objJson[a]['progreso'] + '%"></div>';
                                            campos2 += '</div>';
                                           
                                        }
                                        $('#etapa_proceso').append(campos2);
                                    }
                                });
                            }
                        })
                    }
                }
            })
        }
    });
}