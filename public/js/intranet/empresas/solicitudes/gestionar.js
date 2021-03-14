$(document).ready(function() {
    var clientesModal = new bootstrap.Modal(document.getElementById('exampleModalCenter'), {
        keyboard: false
    });
    $(".loader").fadeOut("slow");
    $(".loader").hide();
    $(".tabla-gestion").on('submit', '.form-eliminar_doc', function() {
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
                ajaxRequest2(form);
            }
        });
    });

    function ajaxRequest2(form) {
        $(".loader").show();
        $.ajax({
            url: form.attr('action'),
            type: 'POST',
            data: form.serialize(),
            success: function(respuesta) {
                $(".loader").hide();
                if (respuesta.mensaje == "ok") {
                    form.parents('span').remove();
                    Sistema.notificaciones('El registro fue eliminado correctamente', 'Sistema', 'success');
                } else {
                    Sistema.notificaciones('El registro no pudo ser eliminado, hay recursos usandolo', 'Sistema', 'error');
                }
            },
            error: function() {

            }
        });
    }

    $(".tabla-gestion").on('submit', '.form-eliminar', function() {
        event.preventDefault();
        const form = $(this);
        swal({
            title: '¿Está seguro que desea eliminar la gestion y los documentos asociados?',
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
        $(".loader").show();
        $.ajax({
            url: form.attr('action'),
            type: 'POST',
            data: form.serialize(),
            success: function(respuesta) {
                $(".loader").hide();
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
    //=======================================================================================================================
    $('.nuevo_documento_gestion').click(function() {
        const url_t = $(this).attr('data_url');
        const id_gest = $(this).attr('id_gest');
        var myModal = new bootstrap.Modal(document.getElementById('exampleModalCenter'), {
            keyboard: false
        });
        myModal.show();
        $('#guardarDochistorial').attr('data_url', url_t);
        $('#guardarDochistorial').attr('id_gest', id_gest);
        $('#form_nuevodoc').attr('action', url_t);
    });
    //---------------------
    $('#guardarDochistorial').on('click', function(event) {
        var myModal = new bootstrap.Modal(document.getElementById('exampleModalCenter'), {
            keyboard: false
        });
        myModal.toggle();
        const url_t = $(this).attr('data_url');
        const id_gest = $(this).attr('id_gest');
        const rol_id = parseInt($(this).attr('rol_id'));

        const form = $('#form_nuevodoc');
        const nombre_doc = document.getElementById('nombre_doc');
        const documento = document.getElementById('documento');
        var n = url_t.search("/admin");
        var servidor = url_t.substr(0, n);
        var servelim = servidor;
        servidor += '/documentos/doc_solicitudes/';
        if (!nombre_doc.value) {
            swal("Falta completar el formulario", "Debe llenar el campo nombre de documento", "error");
            nombre_doc.focus();
            unblock();
            return false;
        }
        if (!documento.value) {
            swal("Falta completar el formulario", "Debe anexar un documento", "error");
            nombre_doc.focus();
            unblock();
            return false;
        }
        var paqueteDeDatos = new FormData();
        paqueteDeDatos.append('archivo', $('#documento')[0].files[0]);
        paqueteDeDatos.append('titulo', $('#nombre_doc').prop('value'));
        paqueteDeDatos.append('_token', $('input[name=_token]').val());
        //------------------------------------------
        var data = {
            titulo: $('input[name=titulo]').val(),
            archivo: $('input[name=archivo]').val(),
            _token: $('input[name=_token]').val(),

        };
        $.ajax({
            url: form.attr('action'),
            type: 'POST',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            contentType: false,
            data: paqueteDeDatos,
            processData: false,
            cache: false,
            success: function(respuesta) {

                if (respuesta.mensaje == "ok") {
                    console.log(respuesta);
                    respuesta_html = '';
                    $.each(respuesta.documentos, function(index, item) {
                        respuesta_html += '<span>';
                        if (rol_id < 5) {
                            respuesta_html += '<form action="' + servelim + '/admin/consultas_solicitudes/' + item['id'] + '/doc_historial-eliminar" class="d-inline form-eliminar_doc" method="POST">';
                            respuesta_html += '<input type="hidden" name="_token" value="KOIkMJuWYaMjBh2xjbysCqXboC5yxsvD46Gg50UL">';
                            respuesta_html += '<input type="hidden" name="_method" value="delete">                                        ';
                            respuesta_html += '<button type="submit" class="btn-accion-tabla eliminar tooltipsC" title="Eliminar documento">';
                            respuesta_html += '<i class="fas fa-trash-alt text-danger"></i>';
                            respuesta_html += '</button>';
                            respuesta_html += '</form>';
                        }
                        respuesta_html += '<a class="ml-3 text-uppercase" href="' + servidor + item['archivo'] + '" target="_blank">' + item['titulo'] + '</a><br></span>';
                    });
                    $('#documentosGesID_' + id_gest).html(respuesta_html);
                    Sistema.notificaciones('El documento de anexo correctamente', 'Sistema', 'success');
                } else {
                    Sistema.notificaciones('El documento no pudo ser anexado, hay recursos usandolo', 'Sistema', 'error');
                }
            },
            error: function() {

            }
        });

    });
    //=======================================================================================================================

    $('#estado_solicitud').on('change', function(event) {
        const url_t = $(this).attr('data_url');
        const valor_sel = $(this).val();
        var data = {
            valor_sel: valor_sel,
            data_id: $(this).attr('data_id'),
            _token: $('input[name=_token]').val(),

        };
        $(".loader").show();
        $.ajax({
            url: url_t,
            type: 'GET',
            data: data,
            success: function(respuesta) {
                $(".loader").hide();

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

    $('#nuevo_responsable').click(function() {
        const url_t = $(this).attr('data_url');
        const valor_sel = $('#responsable').val();
        const data_id = $(this).attr('data_id');
        const _token = $('input[name=_token]').val();
        //-----------------------------------
        var data_eliminar_t = $(this).attr('data_eliminar');
        const m = data_eliminar_t.search("/9999/");
        data_eliminar_t = data_eliminar_t.substr(0, m);
        data_eliminar_t = data_eliminar_t + '/ ';
        data_eliminar_t = data_eliminar_t.trim();
        const data_eliminar = data_eliminar_t;
        //-----------------------------------
        var data = {
            valor_sel: valor_sel,
            data_id: data_id,
            _token: _token,

        };
        $(".loader").show();
        $.ajax({
            url: url_t,
            type: 'GET',
            data: data,
            success: function(respuesta) {
                $(".loader").hide();
                respuesta_html = '';
                if (respuesta.mensaje == "ok") {
                    //respuesta_html += '<tr>';
                    $.each(respuesta.responsable['roles'], function(index, item) {
                        respuesta_html += '<td>' + item['nombre'] + '</td>';
                    });
                    respuesta_html += '<td>' + respuesta.responsable['nombres'] + ' ' + respuesta.responsable['apellidos'] + '</td>';
                    respuesta_html += '<td>';
                    respuesta_html += '<form action = "' + data_eliminar + data_id + '/' + +respuesta.responsable['id'] + '/gestionar_responsable-delete" class = "d-inline form-eliminar" method = "POST">';
                    respuesta_html += '<input type="hidden" name="_token" value="' + _token + '">';
                    respuesta_html += '<input type="hidden" name="_method" value="delete">';
                    respuesta_html += '<button type = "submit" class = "btn-accion-tabla eliminar tooltipsC" title = "Eliminar este registro">';
                    respuesta_html += '<i class = "fas fa-minus-circle text-danger"></i>';
                    respuesta_html += '</button >';
                    respuesta_html += '</form>';
                    respuesta_html += '</td>';
                    //respuesta_html += '</tr>';
                    document.getElementById("tabla_responsables").insertRow(-1).innerHTML = respuesta_html;
                    Sistema.notificaciones('Usuario añadido como responsable de la consulta', 'Sistema', 'success');
                } else if (respuesta.mensaje == "dup") {
                    Sistema.notificaciones('El usuario ya es responsable de la consulta', 'Sistema', 'warning');
                } else {
                    Sistema.notificaciones('El responsable no se añadio', 'Sistema', 'error');
                }
            },
            error: function() {

            }
        });
    });
    //=======================================================================================================================
    $('#cerrar_solicitud').click(function() {
        const url_t = $(this).attr('data_url');
        const valor_sel = $(this).val();
        var data = {
            valor_sel: valor_sel,
            data_id: $(this).attr('data_id'),
            _token: $('input[name=_token]').val(),

        };
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
                cerrar_solicitud(url_t, data);
            }
        });
    });

    function cerrar_solicitud(url_t_2, data) {
        const url_t = url_t_2;
        var data = data;
        $(".loader").show();
        $.ajax({
            url: url_t,
            type: 'GET',
            data: data,
            success: function(respuesta) {
                $(".loader").hide();
                if (respuesta.mensaje == "ok") {
                    $('#cerrar_solicitud').prop('disabled', true);
                    $('#span_cerrada').html('Cerrada');
                    Sistema.notificaciones('Se cerro la solicitud de manera correcta', 'Sistema', 'success');
                } else {
                    $('#cerrar_solicitud').prop('disabled', false);
                    Sistema.notificaciones('No se pudo cambiar el estado de la solicitud', 'Sistema', 'error');
                }
            },
            error: function() {

            }
        });
    }
    //=======================================================================================================================


});