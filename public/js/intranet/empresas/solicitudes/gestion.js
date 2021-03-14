$(document).ready(function() {


    $(".tabla-data").on('submit', '.form-eliminar', function() {
        event.preventDefault();
        const form = $(this);
        swal({
            title: '¿Está seguro que desea desvincular el responsable?',
            text: "Esta acción no se puede deshacer!",
            icon: 'warning',
            buttons: {
                cancel: "Cancelar",
                confirm: "Aceptar"
            },
        }).then((value) => {
            if (value) {
                ajaxRequest(form);
            }
        });
    });

    function ajaxRequest(form) {
        $.ajax({
            url: form.attr('action'),
            type: 'POST',
            data: form.serialize(),
            success: function(respuesta) {
                if (respuesta.mensaje == "ok") {
                    form.parents('.responsable_fila').remove();
                    Sistema.notificaciones('El registro fue eliminado correctamente', 'Sistema', 'success');
                } else {
                    Sistema.notificaciones('El registro no pudo ser eliminado, hay recursos usandolo', 'Sistema', 'error');
                }
            },
            error: function() {

            }
        });
    }
    //=======================================================================================================================
    $('#estado_solicitud').on('change', function(event) {
        const url_t = $(this).attr('data_url');
        const valor_sel = $(this).val();
        const data_id = $(this).attr('data_id');
        var data = {
            "valor_sel": valor_sel,
            "data_id": data_id,
        };
        $.ajax({
            url: url_t,
            type: 'GET',
            data: data,
            success: function(respuesta) {
                if (respuesta.mensaje == "ok") {
                    Sistema.notificaciones('Cambio el estado de la solicitud a: ' + valor_sel, 'Sistema', 'success');
                } else {
                    Sistema.notificaciones('No se pudo cambiar el estado de la solicitud', 'Sistema', 'error');
                }
            },
            error: function() {

            }
        });
    });
    //=======================================================================================================================
    $('#boton_cerrar').click(function() {
        const url_t = $(this).attr('data_url');
        const data_id = $(this).attr('data_id');
        event.preventDefault();
        swal({
            title: '¿Está seguro que desea cerrar la solicitud?',
            text: "Esta acción no se puede deshacer!",
            icon: 'warning',
            buttons: {
                cancel: "Cancelar",
                confirm: "Aceptar"
            },
        }).then((value) => {
            if (value) {
                cerrar_solicitud(url_t, data_id);
            }
        });
    });

    function cerrar_solicitud(url_t_2, data_id_2) {
        const url_t = url_t_2;
        const data_id = data_id_2;
        var data = {
            "data_id": data_id,
        };
        $.ajax({
            url: url_t,
            type: 'GET',
            data: data,
            success: function(respuesta) {
                if (respuesta.mensaje == "ok") {
                    $('#estado_solicitud_actual').html('Cerrada');
                    $('#estado_solicitud_2').html('Estado: Cerrada');

                    $('.linea_boton_cerrar').remove();
                    $('.boton_agregar_historial').remove();

                    Sistema.notificaciones('Se cerro la solicitud de manera correcta', 'Sistema', 'success');
                } else {
                    Sistema.notificaciones('No se pudo cambiar el estado de la solicitud', 'Sistema', 'error');
                }
            },
            error: function() {

            }
        });
    }
    //=======================================================================================================================


});