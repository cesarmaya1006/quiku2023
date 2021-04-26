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
    //========================================================================================
    //==========================================================================
    $('#municipio_id').on('change', function(event) {
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
                    respuesta_html += '<option value="' + item['id'] + '">' + item['nombre'] + '</option>';
                });
                $('#sede_id').html(respuesta_html);
            },
            error: function() {

            }
        });

    });
    //========================================================================================
    $('#motivo_pqr').on('change', function(event) {
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
                respuesta_html = '';
                $.each(respuesta, function(index, item) {
                    respuesta_html += '<option value="' + item['id'] + '">' + item['sub_motivo'] + '</option>';
                });
                $('#motivo_sub_id').html(respuesta_html);
            },
            error: function() {

            }
        });

    });
    //========================================================================================
    $('#tipo').on('change', function(event) {
        $('.grupo_producto').toggleClass('d-none');
        $('.grupo_servicio').toggleClass('d-none');


    });

    //========================================================================================
    var popover = new bootstrap.Popover(document.querySelector('.popover-dismiss'), {
        trigger: 'focus'
    })
    $(function() {
        $('[data-toggle="popover-hover"]').popover({
            trigger: 'hover',
        })
    })

});