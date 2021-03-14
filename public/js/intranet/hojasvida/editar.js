$(document).ready(function() {
    $('#fecha_inicio').on('change', function(event) {
        var fechaini = new Date($(this).val());
        var fechafin = sumarDias(fechaini, 2)
        var fechahoy = new Date();
        $('#fecha_termino').attr('min', formatDate(fechafin));
        $('#fecha_termino').attr('value', formatDate(fechahoy));
    });
    // ===========================================================================
    $('#pais_residencia').on('change', function(event) {
        const id = $(this).val();

        if (id == 'COLOMBIA') {
            $('#departamento_residencia').prop('disabled', false);
            $('#municipio_residencia').prop('disabled', false);
        } else {
            $("#departamento_residencia").val($("#target option:first").val());
            $("#municipio_residencia").val($("#target option:first").val());
            $('#departamento_residencia').prop('disabled', 'disabled');
            $('#municipio_residencia').prop('disabled', 'disabled');
        }
    });
    //==========================================================================
    $('#departamento_residencia').on('change', function(event) {
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
                    respuesta_html += '<option value="' + item['municipio'] + '">' + item['municipio'] + '</option>';
                });
                $('#municipio_residencia').html(respuesta_html);
            },
            error: function() {

            }
        });

    });
    //==========================================================================
    $(".tabla-data").on('submit', '.form-eliminar', function() {
        event.preventDefault();
        const form = $(this);
        swal({
            title: '¿Está seguro que desea eliminar el registro?',
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
                    form.parents('tr').remove();
                    actualizarTiempo();
                    Sistema.notificaciones('El registro fue eliminado correctamente', 'Sistema', 'success');
                } else {
                    Sistema.notificaciones('El registro no pudo ser eliminado, hay recursos usandolo', 'Sistema', 'error');
                }
            },
            error: function() {

            }
        });
    }
    // ===========================================================================
    actualizarTiempo()
});

function actualizarTiempo() {

    const url_t = $('#empleado_id').attr('data_url');
    $.ajax({
        url: url_t,
        type: 'GET',
        success: function(respuesta) {
            console.log(respuesta);
            $('#secPubAnnos_f').html(respuesta['secPubAnnos_f']);
            $('#secPubMeses_f').html(respuesta['secPubMeses_f']);
            $('#secPubDias_f').html(respuesta['secPubDias_f']);
            $('#secPrivAnnos_f').html(respuesta['secPrivAnnos_f']);
            $('#secPrivMeses_f').html(respuesta['secPrivMeses_f']);
            $('#secPrivDias_f').html(respuesta['secPrivDias_f']);
            $('#secIndpAnnos_f').html(respuesta['secIndpAnnos_f']);
            $('#secIndpMeses_f').html(respuesta['secIndpMeses_f']);
            $('#secIndpDias_f').html(respuesta['secIndpDias_f']);
            $('#annos_total_f').html('<strong>' + respuesta['annos_total_f'] + ' Años</strong>');
            $('#meses_total_f').html('<strong>' + respuesta['meses_total_f'] + ' Meses</strong>');
            $('#dias_total_f').html('<strong>' + respuesta['dias_total_f'] + ' Dias</strong>');

        },
        error: function() {

        }
    });
}

function sumarDias(fecha, dias) {
    fecha.setDate(fecha.getDate() + dias);
    return fecha;
}

function formatDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2)
        month = '0' + month;
    if (day.length < 2)
        day = '0' + day;

    return [year, month, day].join('-');
}
