$(document).ready(function() {
    // ===========================================================================
    $('#pais').on('change', function(event) {
        const id = $(this).val();
        console.log(id);
        if (id != 44) {
            $('#caja_departamento').addClass('d-none');
        } else {
            $('#caja_departamento').removeClass('d-none');
        }
    });
    //==========================================================================
    $('.departamentos').on('change', function(event) {
        const url_t = $(this).attr('data_url');
        const id = $(this).val();

        var data = {
            "id": id,
        };
        $.ajax({
            url: url_t,
            type: 'GET',
            data: data,
            success: function(respuesta) {
                console.log(respuesta);
                respuesta_html = '';
                $.each(respuesta, function(index, item) {
                    respuesta_html += '<option value="' + item['id'] + '">' + item['municipio'] + '</option>';
                });
                $('#municipio_id').html(respuesta_html);
            },
            error: function() {

            }
        });

    });
    //==========================================================================

    $('input[type=radio][name=discapasidad]').on('change', function() {
        switch ($(this).val()) {
            case 'si':
                $('#tipodiscapacidadcaja').removeClass('d-none');
                break;
            case 'no':
                $('#tipodiscapacidadcaja').addClass('d-none');
                break;
        }
    });


});