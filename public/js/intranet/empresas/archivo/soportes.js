$(document).ready(function() {
    $(".tabla-data").on('submit', '.form-eliminar', function() {
        event.preventDefault();
        const form = $(this);
        swal({
            title: '¿Está seguro que desea eliminar el documento?',
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
                    Sistema.notificaciones('El documento fue eliminado correctamente', 'Sistema', 'success');
                } else {
                    Sistema.notificaciones('El documento no pudo ser eliminado, hay recursos usandolo', 'Sistema', 'error');
                }
            },
            error: function() {

            }
        });
    }
    //==============================================================================================================
    $('#apellido').keyup(function() {
        const url_t = $(this).attr('data_url');
        var ruta_editar_tem = $(this).attr('ruta_editar');
        var n = ruta_editar_tem.search("/1/");
        ruta_editar_tem = ruta_editar_tem.substr(0, n);
        ruta_editar_tem = ruta_editar_tem + '/ ';
        ruta_editar_tem = ruta_editar_tem.trim();
        const ruta_editar = ruta_editar_tem;
        const apellido = $(this).val();

        var data = {
            "apellido": apellido,
        };
        $.ajax({
            url: url_t,
            type: 'GET',
            data: data,
            success: function(respuesta) {
                console.log(respuesta);
                respuesta_html = '';
                $('#contenido_tabla').html(respuesta_html);
                $.each(respuesta, function(key, item) {
                    respuesta_html += '<tr>';
                    respuesta_html += '<td>' + item['primer_nombre'] + ' ' + item['segundo_nombre'] + ' ' + item['primer_apellido'] + ' ' + item['segundo_apellido'] + '</td>';
                    respuesta_html += '<td class="text-center"><a href="' + ruta_editar + item['id'] + '/editar" class="btn-accion-tabla eliminar tooltipsC"><i class="fas fa-folder-open text-info"></i></a></td>';
                    respuesta_html += '</tr>';
                });
                $('#contenido_tabla').html(respuesta_html);

            },
            error: function() {

            }
        });
    });
    //===============================================================================================
    $('#tipo_hist').on('change', function(event) {
        const opcion_s = $(this).val();
        var respuesta_html = '';
        if (opcion_s == 'examen') {
            respuesta_html += '<option value="his_clin-exa-ingreso">Ingreso</option>';
            respuesta_html += '<option value="his_clin-exa-periodico">Periodico</option>';
            respuesta_html += '<option value="his_clin-exa-retiro">Retiro</option>';

        } else if (opcion_s == 'accidente') {
            respuesta_html += '<option value="his_clin-acc-informe">Informe</option>';
            respuesta_html += '<option value="his_clin-acc-furat">FURAT</option>';
            respuesta_html += '<option value="his_clin-acc-otros">Otros</option>';
        } else {
            respuesta_html += '<option value="his_clin-afe-incapacidades">Incapacidad</option>';
            respuesta_html += '<option value="his_clin-afe-resticciones">Restricción Laboral</option>';
            respuesta_html += '<option value="his_clin-afe-dictamenes">Dictamen de PCL</option>';
            respuesta_html += '<option value="his_clin-afe-otros">Otros</option>';
        }
        $('#tipo_doc').html(respuesta_html);
    });
});