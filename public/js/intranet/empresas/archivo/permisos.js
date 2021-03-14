$(document).ready(function() {
    $('.opcionmenu').change(function() {
        const url_t = $(this).attr('data_url');
        var data = {
            hv_empleado_id: $(this).attr('data_empl'),
            opcionarchivo_id: $(this).val(),
            _token: $('input[name=_token]').val()
        };
        if ($(this).is(':checked')) {
            data.estado = 1
        } else {
            data.estado = 0
        }
        $.ajax({
            url: url_t,
            type: 'POST',
            data: data,
            success: function(respuesta) {
                console.log(respuesta);
                Sistema.notificaciones(respuesta.respuesta, 'Sistema', 'success');
            },
            error: function() {}
        });
    });
});