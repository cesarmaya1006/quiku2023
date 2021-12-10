window.addEventListener('DOMContentLoaded', function () {

    // Inicio Función para generar varios accions.
    let btncrearAccion = document.querySelector('.crearAccion')
    btncrearAccion.addEventListener('click', crearNuevoAccion)
    let btnEliminarAccions = document.querySelectorAll('.eliminar_contenido_accion')
    btnEliminarAccions.forEach(btn => {
        btn.addEventListener('click', agregarEliminarAccion)
    })

    function crearNuevoAccion(e) {
        e.preventDefault()
        let containerAccion = e.target.parentNode.parentNode
        let nuevoAccion = containerAccion.querySelectorAll('.contenido_accion')[0].cloneNode(true)
        nuevoAccion.querySelector('.identificacion_accion').value = ''
        nuevoAccion.querySelector('.nombres_accion').value = ''
        nuevoAccion.querySelector('.apellidos_accion').value = ''
        nuevoAccion.querySelector('.correo_accion').value = ''
        nuevoAccion.querySelector('.direccion_accion').value = ''
        nuevoAccion.querySelector('.telefono_accion').value = ''
        nuevoAccion.querySelector('.nombreApellido_apoderado').value = ''
        nuevoAccion.querySelector('.identificacion_apoderado').value = ''
        nuevoAccion.querySelector('.tarjetaProfesional_apoderado').value = ''
        nuevoAccion.querySelector('.direccion_apoderado').value = ''
        nuevoAccion.querySelector('.correo_apoderado').value = ''
        nuevoAccion.querySelector('.telefono_apoderado').value = ''
        containerAccion.querySelector('.bloque_accions').appendChild(nuevoAccion)
        document.querySelectorAll('.eliminar_contenido_accion').forEach(item => item.addEventListener('click', agregarEliminarAccion))
    }

    function agregarEliminarAccion(e) {
        e.preventDefault()
        let bloqueAccion = e.target
        if (bloqueAccion.tagName === 'I') {
            bloqueAccion = bloqueAccion.parentNode.parentNode.parentNode
        }else {
            bloqueAccion = bloqueAccion.parentNode.parentNode
        }
        if (document.querySelectorAll('.contenido_accion').length >= 2) {
            let idAccion = e.target
            if (idAccion.tagName === 'I') {
                idAccion = idAccion.parentNode.parentNode.parentNode
            } else {
                idAccion = idAccion.parentNode.parentNode
            }
            idAccion.remove()
        }
    }
    // Fin Función para generar varios accions.
    // ---------------------------------------------------------------------------------------------------------
      // Inicio Función para generar varios anexos tutelas.
    let btncrearAnexo = document.querySelector('.crearAnexo')
    btncrearAnexo.addEventListener('click', crearNuevoAnexo)
    let btnEliminarAnexos = document.querySelectorAll('.eliminar_contenido_anexo')
    btnEliminarAnexos.forEach(btn => {
        btn.addEventListener('click', agregarEliminarAnexo)
    })

    function crearNuevoAnexo(e) {
        e.preventDefault()
        let containerAnexo = e.target.parentNode.parentNode
        let nuevoAnexo = containerAnexo.querySelectorAll('.contenido_anexo')[0].cloneNode(true)
        nuevoAnexo.querySelector('.titulo-anexo input').value = ''
        nuevoAnexo.querySelector('.descripcion-anexo input').value = ''
        nuevoAnexo.querySelector('.anexo input').value = ''
        containerAnexo.querySelector('.bloque_anexos').appendChild(nuevoAnexo)
        document.querySelectorAll('.eliminar_contenido_anexo').forEach(item => item.addEventListener('click', agregarEliminarAnexo))
    }

    function agregarEliminarAnexo(e) {
        e.preventDefault()
        let bloqueAnexo = e.target
        if (bloqueAnexo.tagName === 'I') {
            bloqueAnexo = bloqueAnexo.parentNode.parentNode.parentNode
        }else {
            bloqueAnexo = bloqueAnexo.parentNode.parentNode
        }
        if (document.querySelectorAll('.contenido_anexo').length >= 2) {
            let idAnexo = e.target
            if (idAnexo.tagName === 'I') {
                idAnexo = idAnexo.parentNode.parentNode.parentNode
            } else {
                idAnexo = idAnexo.parentNode.parentNode
            }
            idAnexo.remove()
        }
    }
    // Fin Función para generar varios anexos tutelas.
    // --------------------------------------------------------------------------------------------------------------------
    // Inicio guardar auto admisorio  
    if(document.querySelector('.btn-auto-admisorio')){
        let btnGuardarAuto = document.querySelector('.btn-auto-admisorio')
        btnGuardarAuto.addEventListener('click', function(e){
            e.preventDefault
            let contenedorPadre = document.querySelector('.form_auto_admisorio')
            let url = e.target.getAttribute('data_url')
            let url1 = e.target.getAttribute('data_url1')
            let url2 = e.target.getAttribute('data_url2')
            let url3 = e.target.getAttribute('data_url3')
            let token = e.target.getAttribute('data_token')
            let radicado = contenedorPadre.querySelector('.radicado').value
            let departamento = contenedorPadre.querySelector('.departamento').value
            let municipio = contenedorPadre.querySelector('.municipio').value
            let jurisdiccion = contenedorPadre.querySelector('.jurisdiccion').value
            let juzgado = contenedorPadre.querySelector('.juzgado').value
            let nombreApellido_juez = contenedorPadre.querySelector('.nombreApellido_juez').value
            let direccion_juez = contenedorPadre.querySelector('.direccion_juez').value
            let telefono_fijo_juez = contenedorPadre.querySelector('.telefono_fijo_juez').value
            let correo_juez = contenedorPadre.querySelector('.email_juez').value
            let fecha_notificacion = contenedorPadre.querySelector('.fecha_notificacion').value
            let cantidad_dias = contenedorPadre.querySelector('.cantidad_dias').value
            let cantidad_horas = contenedorPadre.querySelector('.cantidad_horas').value
            let titulo_anexo_admisorio = contenedorPadre.querySelector('.titulo-anexo-admisorio input').value
            let descripcion_anexo_admisorio = contenedorPadre.querySelector('.descripcion-anexo-admisorio input').value
            let archivo_anexo_admisorio = contenedorPadre.querySelector('.archivo-admisorio input').files[0]
            let dataAnexo = new FormData();
            dataAnexo.append('titulo_anexo_admisorio', titulo_anexo_admisorio);
            dataAnexo.append('descripcion_anexo_admisorio', descripcion_anexo_admisorio);
            dataAnexo.append('archivo_anexo_admisorio', archivo_anexo_admisorio);
            dataAnexo.append('_token', token);
            let medida_cautelar = contenedorPadre.querySelector('.medidaCautelar_check').checked
            let text_medida_cautelar = contenedorPadre.querySelector('.medidaCautelar-text').value
            let dias_medida_cautelar = contenedorPadre.querySelector('.medidaCautelar-dias').value
            let horas_medida_cautelar = contenedorPadre.querySelector('.medidaCautelar-horas').value
            let data = {
                radicado,
                departamento,
                municipio,
                jurisdiccion,
                juzgado,
                nombreApellido_juez,
                direccion_juez,
                telefono_fijo_juez,
                correo_juez,
                fecha_notificacion,
                cantidad_dias,
                cantidad_horas,
                medida_cautelar,
                text_medida_cautelar,
                dias_medida_cautelar,
                horas_medida_cautelar
            }
     
            $.ajax({
                url: url,
                type: 'POST',
                headers: { 'X-CSRF-TOKEN': token },
                data: data,
                success: function(respuesta) {
                    dataAnexo.append('id', respuesta.data.id);
                    if(archivo_anexo_admisorio){
                        cargarArchivoAdmisorio(dataAnexo)
                    }
                    crearAccion(respuesta.data.id)
                    crearAnexo(respuesta.data.id)
                    window.location = `/funcionario/auto_admisorio_complemento/${respuesta.data.id}`
                },
                error: function(error) {
                    console.log(error.responseJSON)
                }
            });

            function cargarArchivoAdmisorio(datos){
                $.ajax({
                    async:false,
                    url: url1,
                    type: 'POST',
                    headers: { 'X-CSRF-TOKEN': token },
                    data: datos,
                    processData: false, 
                    contentType: false,
                    success: function(respuesta) {
                        // console.log(respuesta)
                    },
                    error: function(error) {
                        console.log(error)
                    }
                });
            }

            function crearAccion(id){
                let accions = contenedorPadre.querySelectorAll('.contenido_accion')
                accions.forEach(accion => {
                    let tipo_accion = accion.querySelector('.tipo_rol_accion').value
                    let tipo_persona_accion = accion.querySelector('.tipo_persona_accion').value
                    let docutipos_id_accion = accion.querySelector('.docutipos_id_accion').value
                    let numero_documento_accion = accion.querySelector('.identificacion_accion').value
                    let nombres_accion = accion.querySelector('.nombres_accion').value
                    let apellidos_accion = accion.querySelector('.apellidos_accion').value
                    let correo_accion = accion.querySelector('.correo_accion').value
                    let direccion_accion = accion.querySelector('.direccion_accion').value
                    let telefono_accion = accion.querySelector('.telefono_accion').value
    
                    let nombre_apoderado = accion.querySelector('.nombreApellido_apoderado').value
                    let docutipos_id_apoderado = accion.querySelector('.docutipos_id_apoderado').value
                    let numero_documento_apoderado = accion.querySelector('.identificacion_apoderado').value
                    let tarjeta_profesional_apoderado = accion.querySelector('.tarjetaProfesional_apoderado').value
                    let correo_apoderado = accion.querySelector('.correo_apoderado').value
                    let direccion_apoderado = accion.querySelector('.direccion_apoderado').value
                    let telefono_apoderado = accion.querySelector('.telefono_apoderado').value
    
                    let data = {
                        tipo_accion,
                        tipo_persona_accion,
                        docutipos_id_accion,
                        numero_documento_accion,
                        nombres_accion,
                        apellidos_accion,
                        correo_accion,
                        direccion_accion,
                        telefono_accion,
                        nombre_apoderado,
                        docutipos_id_apoderado,
                        numero_documento_apoderado,
                        tarjeta_profesional_apoderado,
                        correo_apoderado,
                        direccion_apoderado,
                        telefono_apoderado,
                        id
    
                    }
                    $.ajax({
                        url: url2,
                        type: 'POST',
                        headers: { 'X-CSRF-TOKEN': token },
                        data: data,
                        success: function(respuesta) {
                            // console.log(respuesta)
                        },
                        error: function(error) {
                            console.log(error.responseJSON)
                        }
                    });
                })
            }

            function crearAnexo(id){
                let anexos = contenedorPadre.querySelectorAll('.contenido_anexo')
                anexos.forEach(anexo => {
                    let titulo_anexo = anexo.querySelector('.titulo-anexo input').value
                    let descripcion_anexo = anexo.querySelector('.descripcion-anexo input').value
                    let archivo_anexo = anexo.querySelector('.anexo input').files[0]
                    let dataAnexo = new FormData();
                    dataAnexo.append('titulo', titulo_anexo);
                    dataAnexo.append('descripcion', descripcion_anexo);
                    dataAnexo.append('archivo_anexo', archivo_anexo);
                    dataAnexo.append('id', id);
                    dataAnexo.append('_token', token);
                    if(archivo_anexo){
                        $.ajax({
                            async:false,
                            url: url3,
                            type: 'POST',
                            headers: { 'X-CSRF-TOKEN': token },
                            data: dataAnexo,
                            processData: false, 
                            contentType: false,
                            success: function(respuesta) {
                                // console.log(respuesta)
                            },
                            error: function(error) {
                                console.log(error)
                            }
                        });
                    }
                })
            }
        })
    }
    //Fin guardar auto admisorio  
    // --------------------------------------------------------------------------------------------------------------------
    // Funcion para ocultar bloque medida cautelar
    $('.medidaCautelar_check').on('change', function(e) {
        let padre = e.target.parentNode.parentNode.parentNode
        switch (e.target.value) {
            case '1':
                padre.querySelector('.medidaCautelar').classList.remove('d-none');
                break;
            case '0':
                padre.querySelector('.medidaCautelar').classList.add('d-none');
                break;
        }
    });
    // --------------------------------------------------------------------------------------------------------------------
    // Funcion para cargar juzgados
    $('.jurisdiccion').on('change', function(event) {
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
                let respuesta_html = '<option value="">--Seleccione--</option>';
                $.each(respuesta, function(index, item) {
                    respuesta_html += '<option value="' + item['id'] + '">' + item['nombre_despacho'] + '</option>';
                });
                $('.juzgado').html(respuesta_html);
                $('.departamento').html('<option value="">--Seleccione--</option>');
                $('.municipio').html('<option value="">--Seleccione--</option>');
                $('.nombreApellido_juez').val('');
                $('.direccion_juez').val('');
                $('.telefono_fijo_juez').val('');
                $('.email_juez').val('');
            },
            error: function() {

            }
        });
    });
    // --------------------------------------------------------------------------------------------------------------------
    // Funcion para cargar departamentos - municipios
    $('.juzgado').on('change', function(event) {
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
                let respuesta_html = '<option value="' + respuesta['id'] + '">' + respuesta['departamento'] + '</option>';
                $('.departamento').html(respuesta_html);
                let respuesta_html2 = '<option value="' + respuesta['id'] + '">' + respuesta['municipio'] + '</option>';
                $('.municipio').html(respuesta_html2);
                $('.nombreApellido_juez').val(respuesta['nombre_juez']);
                $('.direccion_juez').val(respuesta['direccion_despacho']);
                $('.telefono_fijo_juez').val(respuesta['telefono_despacho']);
                $('.email_juez').val(respuesta['correo_despacho']);
            },
            error: function() {

            }
        });
    });
    // --------------------------------------------------------------------------------------------------------------------
})