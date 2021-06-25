$(document).ready(function() {
    //Pintar y ocultar
    //------------------------------------------------------------
    //Comprobacion de checks para saber asignaciones
    //------------------------------------------------------------
    $("#adquisicionCheck").click(function() {
        if ($(this).is(':checked')) {
            $('#adquisicion_p_s').removeClass('d-none');
        } else {
            $('#adquisicion_p_s').addClass('d-none');
        }
    });
    //------------------------------------------------------------
    $("#motivoCheck").click(function() {
        if ($(this).is(':checked')) {
            $('#motivo_pqr').removeClass('d-none');
        } else {
            $('#motivo_pqr').addClass('d-none');
            $('#sub_motivo_pqr').removeClass('d-none');
            $('#sub_motivo_pqr').addClass('d-none');
            $('#subMotivoCheck').prop('checked', false);
        }
    });
    //------------------------------------------------------------
    $("#subMotivoCheck").click(function() {
        if ($(this).is(':checked')) {
            $('#sub_motivo_pqr').removeClass('d-none');
            $('#motivo_pqr').removeClass('d-none');
            $('#motivoCheck').prop('checked', true);
        } else {
            $('#sub_motivo_pqr').addClass('d-none');
        }
    });
    //------------------------------------------------------------
    $("#productosCheck").click(function() {
        if ($(this).is(':checked')) {
            $('#categorias').removeClass('d-none');
            $('#productos').removeClass('d-none');
        } else {
            $('#categorias').addClass('d-none');
            $('#productos').addClass('d-none');
            $('#marcas').addClass('d-none');
            $('#referencias').addClass('d-none');
            $('#servicios').addClass('d-none');
            $('#marcasCheck').prop('checked', false);
            $('#referenciasCheck').prop('checked', false);
        }
    });
    //------------------------------------------------------------
    $("#marcasCheck").click(function() {
        if ($(this).is(':checked')) {
            $('#categorias').removeClass('d-none');
            $('#productos').removeClass('d-none');
            $('#marcas').removeClass('d-none');
            $('#productosCheck').prop('checked', true);
        } else {
            $('#marcas').addClass('d-none');
            $('#referencias').addClass('d-none');
            $('#servicios').addClass('d-none');
            $('#referenciasCheck').prop('checked', false);
        }
    });
    //------------------------------------------------------------
    $("#referenciasCheck").click(function() {
        if ($(this).is(':checked')) {
            $('#categorias').removeClass('d-none');
            $('#productos').removeClass('d-none');
            $('#marcas').removeClass('d-none');
            $('#referencias').removeClass('d-none');
            $('#servicios').addClass('d-none');
            $('#productosCheck').prop('checked', true);
            $('#marcasCheck').prop('checked', true);
        } else {
            $('#referencias').addClass('d-none');
        }
    });
    //------------------------------------------------------------
    $("#palabrasCheck").click(function() {
        if ($(this).is(':checked')) {
            $('#palabrasClave').removeClass('d-none');
        } else {
            $('#palabrasClave').addClass('d-none');
        }
    });
    //------------------------------------------------------------
    $("#serviciosCheck").click(function() {
        if ($(this).is(':checked')) {
            $('#servicios').removeClass('d-none');
            $('#categorias').addClass('d-none');
            $('#productos').addClass('d-none');
            $('#marcas').addClass('d-none');
            $('#referencias').addClass('d-none');
            $('#productosCheck').prop('checked', false);
            $('#marcasCheck').prop('checked', false);
            $('#marcasCheck').prop('checked', false);
            $('#referenciasCheck').prop('checked', false);
        } else {
            $('#servicios').addClass('d-none');
        }
    });
    //------------------------------------------------------------
    $('#prod_serv').on('change', function(event) {
        if ($(this).val() == 'Servicio') {
            $('#cajaserviciosCheck').removeClass('d-none');
            $('#cajaproductosCheck').addClass('d-none');
            $('#cajamarcasCheck').addClass('d-none');
            $('#cajareferenciasCheck').addClass('d-none');
            $('#categorias').addClass('d-none');
            $('#productos').addClass('d-none');
            $('#marcas').addClass('d-none');
            $('#referencias').addClass('d-none');
            $('#servicios').addClass('d-none');
            $('#productosCheck').prop('checked', false);
            $('#marcasCheck').prop('checked', false);
            $('#marcasCheck').prop('checked', false);
            $('#referenciasCheck').prop('checked', false);
            $('#serviciosCheck').prop('checked', false);
        } else {
            $('#cajaserviciosCheck').addClass('d-none');
            $('#cajaproductosCheck').removeClass('d-none');
            $('#cajamarcasCheck').removeClass('d-none');
            $('#cajareferenciasCheck').removeClass('d-none');
            $('#servicios').addClass('d-none');
            $('#serviciosCheck').prop('checked', false);
            $('#productosCheck').prop('checked', false);
            $('#marcasCheck').prop('checked', false);
            $('#marcasCheck').prop('checked', false);
            $('#referenciasCheck').prop('checked', false);
        }
    });
    //==========================================================================
    $('#tipo_pqr_id').on('change', function(event) {
        if ($(this).val() < 4) {
            $('#ajustesAsignacion').removeClass('d-none');
        } else {
            $('#ajustesAsignacion').addClass('d-none');
        }
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

                respuesta_html = '<option value="">---Seleccione---</option>';
                $.each(respuesta, function(index, item) {
                    respuesta_html += '<option value="' + item['id'] + '">' + item['motivo'] + '</option>';
                });
                $('#motivo_id').html(respuesta_html);
                $('#motivo_sub_id').html('<option value="">---Seleccione un motivo---</option>');
            },
            error: function() {

            }
        });

    });
    //==========================================================================
    $('#motivo_id').on('change', function(event) {
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
                respuesta_html = '<option value="">---Seleccione---</option>';
                $.each(respuesta, function(index, item) {
                    respuesta_html += '<option value="' + item['id'] + '">' + item['sub_motivo'] + '</option>';
                });
                $('#motivo_sub_id').html(respuesta_html);
            },
            error: function() {

            }
        });

    });
    //==========================================================================
    $('#categoria_id').on('change', function(event) {
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
                if (respuesta != '') {
                    respuesta_html = '<option value="">---Seleccione---</option>';
                } else {
                    respuesta_html = '<option value="">Elija primero una categoria</option>';
                }
                $.each(respuesta, function(index, item) {
                    respuesta_html += '<option value="' + item['id'] + '">' + item['producto'] + '</option>';
                });
                $('#producto_id').html(respuesta_html);
            },
            error: function() {

            }
        });

    });
    //==========================================================================
    $('#producto_id').on('change', function(event) {
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
                if (respuesta != '') {
                    respuesta_html = '<option value="">---Seleccione---</option>';
                } else {
                    respuesta_html = '<option value="">Elija primero un producto</option>';
                }
                $.each(respuesta, function(index, item) {
                    respuesta_html += '<option value="' + item['id'] + '">' + item['marca'] + '</option>';
                });
                $('#marca_id').html(respuesta_html);
            },
            error: function() {

            }
        });

    });
    //==========================================================================
    $('#marca_id').on('change', function(event) {
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
                if (respuesta != '') {
                    respuesta_html = '<option value="">---Seleccione---</option>';
                } else {
                    respuesta_html = '<option value="">Elija primero una marca</option>';
                }
                $.each(respuesta, function(index, item) {
                    respuesta_html += '<option value="' + item['id'] + '">' + item['referencia'] + '</option>';
                });
                $('#referencia_id').html(respuesta_html);
            },
            error: function() {

            }
        });

    });
    //==========================================================================
    $('#departamento_id').on('change', function(event) {
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
                if (respuesta != '') {
                    respuesta_html = '<option value="">---Seleccione---</option>';
                } else {
                    respuesta_html = '<option value="">Elija primero un departamento</option>';
                }
                $.each(respuesta, function(index, item) {
                    respuesta_html += '<option value="' + item['id'] + '">' + item['municipio'] + '</option>';
                });
                $('#municipio_id').html(respuesta_html);
                respuesta_html = '<option value="">Elija primero un municipio</option>';
                $('#sede_id').html(respuesta_html);
            },
            error: function() {

            }
        });

    });
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
                if (respuesta != '') {
                    respuesta_html = '<option value="">---Seleccione---</option>';
                } else {
                    respuesta_html = '<option value="">Elija primero un municipio</option>';
                }
                $.each(respuesta, function(index, item) {
                    respuesta_html += '<option value="' + item['id'] + '">' + item['nombre'] + '</option>';
                });
                $('#sede_id').html(respuesta_html);
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
                    Sistema.notificaciones('El registro fue eliminado correctamente', 'Sistema', 'success');
                } else {
                    Sistema.notificaciones('El registro no pudo ser eliminado, hay recursos usandolo', 'Sistema', 'error');
                }
            },
            error: function() {

            }
        });
    }
});
