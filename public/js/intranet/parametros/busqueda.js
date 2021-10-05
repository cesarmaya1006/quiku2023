$(document).ready(function() {
    $("#query").keyup(function() {
        const radio = $('input:radio[name=radio1]:checked').val();
        const url_t = $(this).attr('data_url');
        const query = $(this).val();
        $html_ = '';
        if (query != '') {
            var data = {
                "query": query,
                "radio": radio,
            };
            $.ajax({
                url: url_t,
                type: 'GET',
                data: data,
                success: function(respuesta) {
                    console.log(respuesta);
                    $html_ = '';
                    $.each(respuesta.argumentos, function(index, argumento) {
                        $html_ += '<div class="col -12 col-md-10">';
                        $html_ += '<div class="card card-success bg-legal1 collapsed-card card-mini-sombra">';
                        $html_ += '<div class="card-header">';
                        $html_ += '<div class="user-block">';
                        $html_ += '<span class="username"><a href="#">Argumento</a></span>';
                        $html_ += '<span class="description text-white" >' + argumento.tema_especifico.tema_.area['area'] + '->' + argumento.tema_especifico.tema_['tema'] + '->' + argumento.tema_especifico['tema'] + '</span>';
                        $html_ += '</div>';
                        $html_ += '<div class="card-tools">';
                        $html_ += '<button type="button" class="btn btn-tool" data-card-widget="collapse">';
                        $html_ += '<i class="fas fa-plus"></i>';
                        $html_ += '</button>';
                        $html_ += '<button type="button" class="btn btn-tool" data-card-widget="remove">';
                        $html_ += '<i class="fas fa-times"></i>';
                        $html_ += '</button>';
                        $html_ += '</div>';
                        $html_ += '</div>';
                        $html_ += '<div class="card-body">';
                        $html_ += '<div class="row">';
                        $html_ += '<div class="col-12">';
                        $html_ += '<p><strong>Texto:</strong> ' + argumento['texto'] + '</p>';
                        $html_ += '</div>';
                        $html_ += '</div>';
                        $html_ += '<div class="row">';
                        if (argumento.criterios.length > 0) {
                            $html_ += '<hr>';
                            $html_ += '<div class="row">';
                            $html_ += '<div class="col-12"><h6>Criterios Juridicos</h6></div>';
                            $html_ += '<div class="col-12 table-responsive" style="font-size:0.8em;">';
                            $html_ += '<table class="table">';
                            $html_ += '<thead>';
                            $html_ += '<tr>';
                            $html_ += '<th style="white-space:nowrap">Autor(es)</th>';
                            $html_ += '<th style="white-space:nowrap">Criterios jurídicos de aplicación</th>';
                            $html_ += '<th style="white-space:nowrap">Criterios jurídicos de no aplicación</th>';
                            $html_ += '<th style="white-space:nowrap">Notas de la Vigencia</th>';
                            $html_ += '</tr>';
                            $html_ += '</thead>';
                            $html_ += '<tbody>';
                            $.each(argumento.criterios, function(index, criterio) {
                                $html_ += '<tr>';
                                $html_ += '<td style="white-space:nowrap">' + criterio['autores'] + '</td>';
                                if (criterio['criterio_si'] != null) {
                                    $html_ += '<td>' + criterio['criterio_si'] + '</td>';
                                } else {
                                    $html_ += '<td class="text-center">---</td>';
                                }
                                if (criterio['criterio_no'] != null) {
                                    $html_ += '<td>' + criterio['criterio_no'] + '</td>';
                                } else {
                                    $html_ += '<td class="text-center">---</td>';
                                }
                                if (criterio['notas'] != null) {
                                    $html_ += '<td>' + criterio['notas'] + '</td>';
                                } else {
                                    $html_ += '<td class="text-center">---</td>';
                                }
                                $html_ += '</tr>';
                            })
                            $html_ += '</tbody>';
                            $html_ += '</table>';
                            $html_ += '</div>';
                            $html_ += '</div>';
                        } else {
                            $html_ += '<div class="col-12 text-center"><p><strong>Sin criterios jurídicos</strong></p></div>';
                        }
                        $html_ += '</div>';
                        $html_ += '</div>';
                        $html_ += '<div class="card-footer ">';
                        $html_ += '</div>';
                        $html_ += '</div>';
                        $html_ += '</div>';

                    });
                    $.each(respuesta.normas, function(index, norma) {
                        $html_ += '<div class="col -12 col-md-10">';
                        $html_ += '<div class="card card-info collapsed-card card-mini-sombra">';
                        $html_ += '<div class="card-header">';
                        $html_ += '<div class="user-block">';
                        $html_ += '<span class="username"><a href="#">Norma</a></span>';
                        $html_ += '<span class="description text-white" >' + norma.tema_especifico.tema_.area['area'] + '->' + norma.tema_especifico.tema_['tema'] + '->' + norma.tema_especifico['tema'] + '->' + norma['articulo'] + '</span>';
                        $html_ += '</div>';
                        $html_ += '<div class="card-tools">';
                        $html_ += '<button type="button" class="btn btn-tool" data-card-widget="collapse">';
                        $html_ += '<i class="fas fa-plus"></i>';
                        $html_ += '</button>';
                        $html_ += '<button type="button" class="btn btn-tool" data-card-widget="remove">';
                        $html_ += '<i class="fas fa-times"></i>';
                        $html_ += '</button>';
                        $html_ += '</div>';
                        $html_ += '</div>';
                        $html_ += '<div class="card-body">';
                        $html_ += '<div class="row">';
                        $html_ += '<div class="col-12">';
                        $html_ += '<p><strong>Texto:</strong> ' + norma['texto'] + '</p>';
                        $html_ += '</div>';
                        $html_ += '</div>';
                        $html_ += '<div class="row">';
                        if (norma.criterios.length > 0) {
                            $html_ += '<hr>';
                            $html_ += '<div class="row">';
                            $html_ += '<div class="col-12"><h6>Criterios Juridicos</h6></div>';
                            $html_ += '<div class="col-12 table-responsive" style="font-size:0.8em;">';
                            $html_ += '<table class="table">';
                            $html_ += '<thead>';
                            $html_ += '<tr>';
                            $html_ += '<th style="white-space:nowrap">Autor(es)</th>';
                            $html_ += '<th style="white-space:nowrap">Criterios jurídicos de aplicación</th>';
                            $html_ += '<th style="white-space:nowrap">Criterios jurídicos de no aplicación</th>';
                            $html_ += '<th style="white-space:nowrap">Notas de la Vigencia</th>';
                            $html_ += '</tr>';
                            $html_ += '</thead>';
                            $html_ += '<tbody>';
                            $.each(norma.criterios, function(index, criterio) {
                                $html_ += '<tr>';
                                $html_ += '<td style="white-space:nowrap">' + criterio['autores'] + '</td>';
                                if (criterio['criterio_si'] != null) {
                                    $html_ += '<td>' + criterio['criterio_si'] + '</td>';
                                } else {
                                    $html_ += '<td class="text-center">---</td>';
                                }
                                if (criterio['criterio_no'] != null) {
                                    $html_ += '<td>' + criterio['criterio_no'] + '</td>';
                                } else {
                                    $html_ += '<td class="text-center">---</td>';
                                }
                                if (criterio['notas'] != null) {
                                    $html_ += '<td>' + criterio['notas'] + '</td>';
                                } else {
                                    $html_ += '<td class="text-center">---</td>';
                                }
                                $html_ += '</tr>';
                            })
                            $html_ += '</tbody>';
                            $html_ += '</table>';
                            $html_ += '</div>';
                            $html_ += '</div>';
                        } else {
                            $html_ += '<div class="col-12 text-center"><p><strong>Sin criterios jurídicos</strong></p></div>';
                        }
                        $html_ += '</div>';
                        $html_ += '</div>';
                        $html_ += '<div class="card-footer ">';
                        $html_ += '</div>';
                        $html_ += '</div>';
                        $html_ += '</div>';

                    });
                    $('#coleccionrespuesta').html($html_);

                },
                error: function() {

                }
            });
        } else {
            $('#coleccionrespuesta').html($html_);
        }

    });
    //==========================================================================
    $('#tipo_wiku').on('change', function(event) {
        if ($(this).val() != '') {
            $('.cajaArea').removeClass('d-none');
            $('.seccionProductosTipoPQR').removeClass('d-none');
            $('.seccionAreaTemas').removeClass('d-none');

        } else {
            $('.cajaArea').addClass('d-none');
            $('.seccionProductosTipoPQR').addClass('d-none');
            $('.seccionAreaTemas').addClass('d-none');


        }
        if ($(this).val() == 'Argumentos') {
            $('.seccionFuenteEmisora').addClass('d-none');
            //-*+-*+-*+-*+-*+-*+-*+-*+-*
            const url_t = $(this).attr('data_url');
            $.ajax({
                url: url_t,
                type: 'GET',
                success: function(respuesta) {
                    console.log(respuesta);
                    respuesta_html = '';
                    respuesta_html += '<option value="">---Seleccione---</option>';
                    $.each(respuesta, function(index, item) {
                        respuesta_html += '<option value="' + item['id'] + '">' + item['id'] + '</option>';
                    });
                    $('#id').html(respuesta_html);
                    $('#tituloID').html('Por Id');
                },
                error: function() {

                }
            });
            //-*+-*+-*+-*+-*+-*+-*+-*+-*

        } else if ($(this).val() == 'Normas') {
            $('.seccionFuenteEmisora').removeClass('d-none');
            $('#tituloID').html('Artículo');
        }
    });
    //==========================================================================
    $('#area_id').on('change', function(event) {
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
                if (id != '') {
                    respuesta_html += '<option value="">---Seleccione---</option>';
                } else {
                    respuesta_html += '<option value="">Seleccione primero un área</option>';
                }
                $.each(respuesta, function(index, item) {
                    respuesta_html += '<option value="' + item['id'] + '">' + item['tema'] + '</option>';
                });
                $('#tema_id').html(respuesta_html);
            },
            error: function() {

            }
        });

    });
    //==========================================================================
    $('#tema_id').on('change', function(event) {
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
                if (id != '') {
                    respuesta_html += '<option value="">---Seleccione---</option>';
                } else {
                    respuesta_html += '<option value="">Seleccione primero un tema</option>';
                }
                $.each(respuesta, function(index, item) {
                    respuesta_html += '<option value="' + item['id'] + '">' + item['tema'] + '</option>';
                });
                $('#wikutemaespecifico_id').html(respuesta_html);
            },
            error: function() {

            }
        });

    });
    //==========================================================================
    $('#fuente_id').on('change', function(event) {
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
                if (id != '') {
                    respuesta_html += '<option value="">---Seleccione---</option>';
                } else {
                    respuesta_html += '<option value="">Seleccione primero una Fuente Emisora</option>';
                }
                $.each(respuesta, function(index, item) {
                    respuesta_html += '<option value="' + item['id'] + '">' + item['articulo'] + '</option>';
                });
                $('#id').html(respuesta_html);
            },
            error: function() {

            }
        });

    });
    //==========================================================================
    $('#tipo_p_q_r_id').on('change', function(event) {
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
    $('#prod_serv').on('change', function(event) {
        if ($(this).val() == 'Producto') {
            $('#servicios').addClass('d-none');
            $('#categorias').removeClass('d-none');
            $('#productos').removeClass('d-none');
            $('#marcas').removeClass('d-none');
            $('#referencias').removeClass('d-none');
        } else if ($(this).val() == 'Servicio') {
            $('#servicios').removeClass('d-none');
            $('#categorias').addClass('d-none');
            $('#productos').addClass('d-none');
            $('#marcas').addClass('d-none');
            $('#referencias').addClass('d-none');
        } else {
            $('#servicios').addClass('d-none');
            $('#categorias').addClass('d-none');
            $('#productos').addClass('d-none');
            $('#marcas').addClass('d-none');
            $('#referencias').addClass('d-none');
        }

    });
    //==========================================================================

});

function busquedaAvanzada() {
    const url_t = $("#btn_buscar").attr('data_url');
    const tipo_wiku = $('#tipo_wiku');
    const area_id = $('#area_id');
    const tema_id = $('#tema_id');
    const wikutemaespecifico_id = $('#wikutemaespecifico_id');
    const fuente_id = $('#fuente_id');
    const id = $('#id');
    const fecha = $('#fecha');
    const prod_serv = $('#prod_serv');
    const tipo_p_q_r_id = $('#tipo_p_q_r_id');
    const motivo_id = $('#motivo_id');
    const motivo_sub_id = $('#motivo_sub_id');
    const servicio_id = $('#servicio_id');
    const categoria_id = $('#categoria_id');
    const producto_id = $('#producto_id');
    const marca_id = $('#marca_id');
    const referencia_id = $('#referencia_id');
    //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    const tipowiku = tipo_wiku.val();
    if (tipowiku != '') {
        var data = {
            "tipowiku": tipowiku,
            "area_id": area_id.val(),
            "tema_id": tema_id.val(),
            "wikutemaespecifico_id": wikutemaespecifico_id.val(),
            "fuente_id": fuente_id.val(),
            "id": id.val(),
            "fecha": fecha.val(),
            "prod_serv": prod_serv.val(),
            "tipo_p_q_r_id": tipo_p_q_r_id.val(),
            "motivo_id": motivo_id.val(),
            "motivo_sub_id": motivo_sub_id.val(),
            "servicio_id": servicio_id.val(),
            "categoria_id": categoria_id.val(),
            "producto_id": producto_id.val(),
            "marca_id": marca_id.val(),
            "referencia_id": referencia_id.val(),
        };
        $.ajax({
            url: url_t,
            type: 'GET',
            data: data,
            success: function(respuesta) {
                console.log(respuesta);
                $html_ = '';
                if (tipowiku == 'Normas') {
                    $.each(respuesta, function(index, norma) {
                        console.log(norma);
                        $html_ += '<div class="col -12 col-md-10">';
                        $html_ += '<div class="card card-info collapsed-card card-mini-sombra">';
                        $html_ += '<div class="card-header">';
                        $html_ += '<div class="user-block">';
                        $html_ += '<span class="username"><a href="#">Norma</a></span>';
                        $html_ += '<span class="description text-white" >' + norma.tema_especifico.tema_.area['area'] + '->' + norma.tema_especifico.tema_['tema'] + '->' + norma.tema_especifico['tema'] + '->' + norma['articulo'] + '</span>';
                        $html_ += '</div>';
                        $html_ += '<div class="card-tools">';
                        $html_ += '<button type="button" class="btn btn-tool" data-card-widget="collapse">';
                        $html_ += '<i class="fas fa-plus"></i>';
                        $html_ += '</button>';
                        $html_ += '<button type="button" class="btn btn-tool" data-card-widget="remove">';
                        $html_ += '<i class="fas fa-times"></i>';
                        $html_ += '</button>';
                        $html_ += '</div>';
                        $html_ += '</div>';
                        $html_ += '<div class="card-body">';
                        $html_ += '<div class="row">';
                        $html_ += '<div class="col-12">';
                        $html_ += '<p><strong>Texto:</strong> ' + norma['texto'] + '</p>';
                        $html_ += '</div>';
                        $html_ += '</div>';
                        $html_ += '<div class="row">';
                        if (norma.criterios.length > 0) {
                            $html_ += '<hr>';
                            $html_ += '<div class="row">';
                            $html_ += '<div class="col-12"><h6>Criterios Juridicos</h6></div>';
                            $html_ += '<div class="col-12 table-responsive" style="font-size:0.8em;">';
                            $html_ += '<table class="table">';
                            $html_ += '<thead>';
                            $html_ += '<tr>';
                            $html_ += '<th style="white-space:nowrap">Autor(es)</th>';
                            $html_ += '<th style="white-space:nowrap">Criterios jurídicos de aplicación</th>';
                            $html_ += '<th style="white-space:nowrap">Criterios jurídicos de no aplicación</th>';
                            $html_ += '<th style="white-space:nowrap">Notas de la Vigencia</th>';
                            $html_ += '</tr>';
                            $html_ += '</thead>';
                            $html_ += '<tbody>';
                            $.each(norma.criterios, function(index, criterio) {
                                $html_ += '<tr>';
                                $html_ += '<td style="white-space:nowrap">' + criterio['autores'] + '</td>';
                                if (criterio['criterio_si'] != null) {
                                    $html_ += '<td>' + criterio['criterio_si'] + '</td>';
                                } else {
                                    $html_ += '<td class="text-center">---</td>';
                                }
                                if (criterio['criterio_no'] != null) {
                                    $html_ += '<td>' + criterio['criterio_no'] + '</td>';
                                } else {
                                    $html_ += '<td class="text-center">---</td>';
                                }
                                if (criterio['notas'] != null) {
                                    $html_ += '<td>' + criterio['notas'] + '</td>';
                                } else {
                                    $html_ += '<td class="text-center">---</td>';
                                }
                                $html_ += '</tr>';
                            })
                            $html_ += '</tbody>';
                            $html_ += '</table>';
                            $html_ += '</div>';
                            $html_ += '</div>';
                        } else {
                            $html_ += '<div class="col-12 text-center"><p><strong>Sin criterios jurídicos</strong></p></div>';
                        }
                        $html_ += '</div>';
                        $html_ += '</div>';
                        $html_ += '<div class="card-footer ">';
                        $html_ += '</div>';
                        $html_ += '</div>';
                        $html_ += '</div>';

                    });
                } else if (tipowiku == 'Argumentos') {
                    $.each(respuesta, function(index, argumento) {
                        $html_ += '<div class="col -12 col-md-10">';
                        $html_ += '<div class="card card-success bg-legal1 collapsed-card card-mini-sombra">';
                        $html_ += '<div class="card-header">';
                        $html_ += '<div class="user-block">';
                        $html_ += '<span class="username"><a href="#">Argumento</a></span>';
                        $html_ += '<span class="description text-white" >' + argumento.tema_especifico.tema_.area['area'] + '->' + argumento.tema_especifico.tema_['tema'] + '->' + argumento.tema_especifico['tema'] + '</span>';
                        $html_ += '</div>';
                        $html_ += '<div class="card-tools">';
                        $html_ += '<button type="button" class="btn btn-tool" data-card-widget="collapse">';
                        $html_ += '<i class="fas fa-plus"></i>';
                        $html_ += '</button>';
                        $html_ += '<button type="button" class="btn btn-tool" data-card-widget="remove">';
                        $html_ += '<i class="fas fa-times"></i>';
                        $html_ += '</button>';
                        $html_ += '</div>';
                        $html_ += '</div>';
                        $html_ += '<div class="card-body">';
                        $html_ += '<div class="row">';
                        $html_ += '<div class="col-12">';
                        $html_ += '<p><strong>Texto:</strong> ' + argumento['texto'] + '</p>';
                        $html_ += '</div>';
                        $html_ += '</div>';
                        $html_ += '<div class="row">';
                        if (argumento.criterios.length > 0) {
                            $html_ += '<hr>';
                            $html_ += '<div class="row">';
                            $html_ += '<div class="col-12"><h6>Criterios Juridicos</h6></div>';
                            $html_ += '<div class="col-12 table-responsive" style="font-size:0.8em;">';
                            $html_ += '<table class="table">';
                            $html_ += '<thead>';
                            $html_ += '<tr>';
                            $html_ += '<th style="white-space:nowrap">Autor(es)</th>';
                            $html_ += '<th style="white-space:nowrap">Criterios jurídicos de aplicación</th>';
                            $html_ += '<th style="white-space:nowrap">Criterios jurídicos de no aplicación</th>';
                            $html_ += '<th style="white-space:nowrap">Notas de la Vigencia</th>';
                            $html_ += '</tr>';
                            $html_ += '</thead>';
                            $html_ += '<tbody>';
                            $.each(argumento.criterios, function(index, criterio) {
                                $html_ += '<tr>';
                                $html_ += '<td style="white-space:nowrap">' + criterio['autores'] + '</td>';
                                if (criterio['criterio_si'] != null) {
                                    $html_ += '<td>' + criterio['criterio_si'] + '</td>';
                                } else {
                                    $html_ += '<td class="text-center">---</td>';
                                }
                                if (criterio['criterio_no'] != null) {
                                    $html_ += '<td>' + criterio['criterio_no'] + '</td>';
                                } else {
                                    $html_ += '<td class="text-center">---</td>';
                                }
                                if (criterio['notas'] != null) {
                                    $html_ += '<td>' + criterio['notas'] + '</td>';
                                } else {
                                    $html_ += '<td class="text-center">---</td>';
                                }
                                $html_ += '</tr>';
                            })
                            $html_ += '</tbody>';
                            $html_ += '</table>';
                            $html_ += '</div>';
                            $html_ += '</div>';
                        } else {
                            $html_ += '<div class="col-12 text-center"><p><strong>Sin criterios jurídicos</strong></p></div>';
                        }
                        $html_ += '</div>';
                        $html_ += '</div>';
                        $html_ += '<div class="card-footer ">';
                        $html_ += '</div>';
                        $html_ += '</div>';
                        $html_ += '</div>';

                    });
                }
                $('#coleccionrespuesta').html($html_);

            },
            error: function() {

            }
        });
    } else {
        Swal.fire({
            icon: 'error',
            title: 'fantan datos de busqueda',
            text: 'Debe elegir al menos una categoria de wiku'
        })
        tipo_wiku.focus();
    }

}