$(document).ready(function() {
    $(function() {
        $('[data-toggle="popover-hover"]').popover({
            trigger: 'hover',
        })
    })
    const modalEnteEmisor = new bootstrap.Modal(document.getElementById('modalEnteEmisor'));
    $('#nuevoEnte').click(function() {
        modalEnteEmisor.show();
    });
    $('#crearEnteEmisor').click(function() {
            modalEnteEmisor.hide();
            const url_t = $(this).attr('data_url');
            const ente = $('#ente').val();
            var data = {
                "ente": ente,
            };
            if (ente != '') {
                $.ajax({
                    url: url_t,
                    type: 'GET',
                    data: data,
                    success: function(respuesta) {
                        respuesta_html = '<option value="">---Seleccione---</option>';
                        $.each(respuesta, function(index, item) {
                            if (item['ente'] == ente) {
                                respuesta_html += '<option value="' + item['id'] + '" selected>' + item['ente'] + '</option>';
                                var url_t_sala = $('ente_id').attr('data_url');
                                cargarSalas(url_t_sala, item['id']);
                            } else {
                                respuesta_html += '<option value="' + item['id'] + '">' + item['ente'] + '</option>';
                            }
                        });
                        $('.enteClass').html(respuesta_html);
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Autor Cargado con éxito',
                            showConfirmButton: false,
                            timer: 1500
                        })

                    },
                    error: function() {

                    }
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'No se cargo el Ente Emisor',
                    text: 'Al parecer olvido escribir el nombre'
                })
            }
        })
        //-*-*-*
    const modalSala = new bootstrap.Modal(document.getElementById('modalSala'));
    $('#nuevaSala').click(function() {
        modalSala.show();
    });
    //==========================================================================
    $("#tabla-data").on('submit', '.form-eliminar', function() {
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
                    Sistema.notificaciones('El registro fue eliminado correctamente', 'Sistema', 'success');
                } else {
                    Sistema.notificaciones('El registro no pudo ser eliminado, hay recursos usandolo', 'Sistema', 'error');
                }
            },
            error: function() {

            }
        });
    }
    //================================================================================================
    $('#ente_id').on('change', function(event) {
        const url_t = $(this).attr('data_url');
        const id = $(this).val();
        cargarSalas(url_t, id);

    });
});

function cargarSalas(url_t, ente_id) {
    var data = {
        "ente_id": ente_id,
    };
    $.ajax({
        url: url_t,
        type: 'GET',
        data: data,
        success: function(respuesta) {
            console.log(respuesta);
            if (respuesta.length > 0) {
                respuesta_html = '<option value="">---Seleccione---</option>';
                $.each(respuesta, function(index, item) {
                    respuesta_html += '<option value="' + item['id'] + '">' + item['sala'] + '</option>';
                });
            } else {
                respuesta_html = '<option value="">---Seleccione otro ente---</option>';
            }
            $('#sala_id').html(respuesta_html);
        },
        error: function() {

        }
    });
}