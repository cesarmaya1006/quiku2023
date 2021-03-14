$(document).ready(function() {
    $('#nivel_id').on('change', function(event) {
        const url_t = $(this).attr('data_url');
        const nivel_id = $(this).val();
        var data = {
            "nivel_id": nivel_id,
        };
        $.ajax({
            url: url_t,
            type: 'GET',
            data: data,
            success: function(respuesta) {
                if (nivel_id != '') {
                    console.log(respuesta);
                    respuesta_html = '';
                    respuesta_html += '<option value="">Elija un área</option>';
                    $.each(respuesta, function(index, item) {
                        respuesta_html += '<option value="' + item['id'] + '">' + item['area'] + '</option>';
                    });
                    $('#area_id').html(respuesta_html);
                    $('#hv_cargo_id').html('<option value="">Seleccione primero un área</option>');
                } else {
                    respuesta_html = '';
                    respuesta_html += '<option value="">Seleccione un nivel</option>';
                    $('#hv_cargo_id').html('<option value="">Seleccione un primero área</option>');
                    $('#area_id').html(respuesta_html);
                }
            },
            error: function() {

            }
        });

    });
    //==========================================================================
    $('#area_id').on('change', function(event) {
        const url_t = $(this).attr('data_url');
        const area_id = $(this).val();
        var data = {
            "area_id": area_id,
        };
        $.ajax({
            url: url_t,
            type: 'GET',
            data: data,
            success: function(respuesta) {
                if (area_id != '') {
                    console.log(respuesta);
                    respuesta_html = '';
                    respuesta_html += '<option value="">Elija un cargo</option>';
                    $.each(respuesta, function(index, item) {
                        respuesta_html += '<option value="' + item['id'] + '">' + item['cargo'] + '</option>';
                    });
                    $('#hv_cargo_id').html(respuesta_html);
                } else {
                    respuesta_html = '';
                    respuesta_html += '<option value="">Seleccione un primero área</option>';
                    $('#hv_cargo_id').html(respuesta_html);
                }
            },
            error: function() {

            }
        });

    });
    //==========================================================================
});