$(document).ready(function() {
    var clientesModal = new bootstrap.Modal(document.getElementById('clientesModal'), {
        keyboard: false
    });
    var proveedoresModal = new bootstrap.Modal(document.getElementById('proveedoresModal'), {
        keyboard: false
    });
    //-------------------------------------------------------------------------------------------------------------------------
    $('#anexar_cliente').on('click', function(event) {
        clientesModal.show();
    });
    $('#anexar_proveedor').on('click', function(event) {
        proveedoresModal.show();
    });
    //-------------------------------------------------------------------------------------------------------------------------
    //-------------------------------------------------------------------------------------------------------------------------
    $('#submit_nuevoCliente').on('click', function(event) {
        const url_t = $(this).attr('data_url');
        const proyecto_cliente_id = $('#empresacliente_id').val();
        const _token_s = $(this).attr('data_token');
        var data = {
            proyecto_cliente_id: proyecto_cliente_id,
        };
        var n = url_t.search("/admin");
        const servidor = url_t.substr(0, n);
        $.ajax({
            url: url_t,
            type: 'GET',
            data: data,
            success: function(respuesta) {
                console.log(respuesta);
                var respuesta_html = '';
                clientesModal.toggle();
                if (respuesta.mensaje == "ok") {
                    respuesta_html += '<tr>';
                    respuesta_html += '<td>' + respuesta.cliente['nombre'] + ' ';
                    respuesta_html += '<form action="' + servidor + '/admin/proyectos/' + proyecto_cliente_id + '/' + respuesta.proyecto_id + '/gestion_cliente-borrar" class="d-inline form-eliminar position-absolute end-0 mr-3" method="POST">';
                    respuesta_html += '<input type="hidden" name="_token" value="' + _token_s + '">';
                    respuesta_html += '<input type="hidden" name="_method" value="delete">                                        ';
                    respuesta_html += '<button type="submit" class="btn-accion-tabla eliminar tooltipsC" title="Eliminar este registro"><i class="fas fa-trash-alt text-danger"></i></button>';
                    respuesta_html += '</form>';
                    respuesta_html += '</td></tr>';
                    $('#tabla_clientes tbody').append(respuesta_html);
                    $("#empresacliente_id option[value='" + proyecto_cliente_id + "']").remove();
                    Sistema.notificaciones('Se anexo el cliente al proyecto de manera correcta', 'Sistema', 'success');
                } else {
                    Sistema.notificaciones('No se pudo gestionar la solicitud', 'Sistema', 'error');
                }
            },
            error: function() {

            }
        });
    });
    //-------------------------------------------------------------------------------------------------------------------------
    $(".tabla-clientes").on('submit', '.form-eliminar', function() {
        event.preventDefault();
        const form = $(this);
        swal({
            title: '¿Está seguro que desea desvincular el cliente del proyecto?',
            text: "Puede anexarlo nuevamente",
            icon: 'warning',
            buttons: {
                cancel: "Cancelar",
                confirm: "Aceptar"
            },
        }).then((value) => {
            if (value) {
                ajaxRequest1(form);
            }
        });
    });

    function ajaxRequest1(form) {
        $(".loader").show();
        $.ajax({
            url: form.attr('action'),
            type: 'POST',
            data: form.serialize(),
            success: function(respuesta) {
                console.log(respuesta);
                if (respuesta.mensaje == "ok") {
                    form.parents('tr').remove();
                    $('#empresacliente_id').prepend('<option value=' + respuesta.cliente['id'] + '>' + respuesta.cliente['nombre'] + '</option>');
                    Sistema.notificaciones('El registro fue desvinculado correctamente', 'Sistema', 'success');
                } else {
                    Sistema.notificaciones('El registro no pudo ser eliminado, hay recursos usandolo', 'Sistema', 'error');
                }
            },
            error: function() {

            }
        });
    }
    //-------------------------------------------------------------------------------------------------------------------------
    //-------------------------------------------------------------------------------------------------------------------------
    $('#submit_nuevoProveedor').on('click', function(event) {
        const url_t = $(this).attr('data_url');
        const proyecto_proveedor_id = $('#proyecto_proveedor_id').val();
        const _token_s = $(this).attr('data_token');
        var data = {
            proyecto_proveedor_id: proyecto_proveedor_id,
        };
        var n = url_t.search("/admin");
        const servidor = url_t.substr(0, n);
        $.ajax({
            url: url_t,
            type: 'GET',
            data: data,
            success: function(respuesta) {
                console.log(respuesta);
                var respuesta_html = '';
                proveedoresModal.toggle();
                if (respuesta.mensaje == "ok") {
                    respuesta_html += '<tr>';
                    respuesta_html += '<td>' + respuesta.proveedor['nombre'] + ' ';
                    respuesta_html += '<form action="' + servidor + '/admin/proyectos/' + proyecto_proveedor_id + '/' + respuesta.proyecto_id + '/gestion_proveedor-borrar" class="d-inline form-eliminar position-absolute end-0 mr-3" method="POST">';
                    respuesta_html += '<input type="hidden" name="_token" value="' + _token_s + '">';
                    respuesta_html += '<input type="hidden" name="_method" value="delete">                                        ';
                    respuesta_html += '<button type="submit" class="btn-accion-tabla eliminar tooltipsC" title="Eliminar este registro"><i class="fas fa-trash-alt text-danger"></i></button>';
                    respuesta_html += '</form>';
                    respuesta_html += '</td></tr>';
                    $('#tabla_proveedores tbody').append(respuesta_html);
                    $("#proyecto_proveedor_id option[value='" + proyecto_proveedor_id + "']").remove();
                    Sistema.notificaciones('Se anexo el proveedor al proyecto de manera correcta', 'Sistema', 'success');
                } else {
                    Sistema.notificaciones('No se pudo gestionar la solicitud', 'Sistema', 'error');
                }
            },
            error: function() {

            }
        });
    });
    //-------------------------------------------------------------------------------------------------------------------------
    $(".tabla-proveedores").on('submit', '.form-eliminar', function() {
        event.preventDefault();
        const form = $(this);
        swal({
            title: '¿Está seguro que desea desvincular el proveedor del proyecto?',
            text: "Puede anexarlo nuevamente",
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
                console.log(respuesta);
                if (respuesta.mensaje == "ok") {
                    form.parents('tr').remove();
                    $('#proyecto_proveedor_id').prepend('<option value=' + respuesta.proveedor['id'] + '>' + respuesta.proveedor['nombre'] + '</option>');
                    Sistema.notificaciones('El registro fue desvinculado correctamente', 'Sistema', 'success');
                } else {
                    Sistema.notificaciones('El registro no pudo ser eliminado, hay recursos usandolo', 'Sistema', 'error');
                }
            },
            error: function() {

            }
        });
    }
    //-------------------------------------------------------------------------------------------------------------------------
    $('.cerrar_modalproveedores').on('click', function(event) {
        clientesModal.hide();
    });
    $('.cerrar_modalclientes').on('click', function(event) {
        proveedoresModal.hide();
    });
    //-------------------------------------------------------------------------------------------------------------------------

});