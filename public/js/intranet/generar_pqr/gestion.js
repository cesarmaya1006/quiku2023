window.addEventListener('DOMContentLoaded', function(){
    const id_pqr = document.querySelector('.id_pqr').value

    // Funcion para reasignar petición
    $('.reasignarPeticion').on('change', function(e) {
        let padre = e.target.parentElement.parentElement.parentElement
        switch ($(this).val()) {
            case '1':
                padre.querySelector('.contentReasignacion').classList.remove('d-none');
                break;
            case '0':
                padre.querySelector('.contentReasignacion').classList.add('d-none');
                break;
        }
    });
    
    // Carga de cargos en selector
    if(document.querySelectorAll('.cargo')){
        const cargos = document.querySelectorAll('.cargo')
        cargos.forEach(cargo => {
            const url_t = cargo.getAttribute('data_url')
            $.ajax({
                url: url_t,
                type: 'GET',
                success: function(respuesta) {
                    respuesta_html = '';
                    respuesta_html += '<option value="">--Seleccione--</option>';
                    $.each(respuesta, function(index, item) {
                        respuesta_html += '<option value="' + item['id'] + '">' + item['cargo'] + '</option>';
                    });
                    $('.cargo').html(respuesta_html);
                },
                error: function(e) {
                    console.log(e)
                }
            });
        })
    }
    // Carga de funcionarios en selector
    $('.cargo').on('change', function(event) {
        const url_t = event.target.getAttribute('data_url2');
        const id = event.target.value;
        var data = {
            "id": id,
        };
        $.ajax({
            url: url_t,
            type: 'GET',
            data: data,
            success: function(respuesta) {
                respuesta_html = '';
                respuesta_html += '<option value="">--Seleccione--</option>';
                $.each(respuesta, function(index, item) {
                    respuesta_html += '<option value="' + item['id'] + '">' + item['nombre1'] + ' ' + item['apellido1'] + '</option>';
                });
                $('.funcionario').html(respuesta_html);
            },
            error: function(e) {
                console.log(e)
            }
        });
    });

    // Funcion para reasignar petición
    $('.recurso_check').on('change', function(e) {
        let padre = e.target.parentElement.parentElement.parentElement
        switch (e.target.value) {
            case '1':
                padre.querySelector('.recurso-form').classList.remove('d-none');
                break;
            case '0':
                padre.querySelector('.recurso-form').classList.add('d-none');
                break;
        }
    });

    // $('.peticion').on('change', function(e) {
    //     let padre = e.target.parentNode.parentNode.parentNode
    //     switch (e.target.value) {
    //         case '1':
    //             padre.querySelector('.peticion-form').classList.remove('d-none');
    //             break;
    //         case '0':
    //             padre.querySelector('.peticion-form').classList.add('d-none');
    //             break;
    //     }
    // });

    // $("#plazo_prorroga").keydown(function() {
    //     return false
    //   });

    // let btnSubmit = document.querySelector('#fromGestionPqr')
    // btnSubmit.addEventListener('submit', function (e) {
    //     e.preventDefault()
    //     let anexos = document.querySelectorAll('input[type="file"]')
    //     anexos.forEach(anexo =>{
    //         if(anexo.value == ''){
    //             anexo.parentNode.parentNode.remove()
    //         }
    //     })
    //     ajustarNameAnexo(document.querySelectorAll('.anexoconsulta'))
    //     ajustarPeticiones()
    //     document.querySelector('.totalGeneralaclaraciones').value = document.querySelectorAll('.aclaracion').length
    //     document.querySelector('.totalGeneralAnexos').value = document.querySelectorAll('.anexoconsulta').length
    //     document.querySelector('.totalPeticiones').value = document.querySelectorAll('.peticion_general').length
    //     let respuestas = document.querySelectorAll('.respuesta')
    //     let contadorRespuestas = 0;
    //     respuestas.forEach(respuesta => {
    //         if(respuesta.value) contadorRespuestas ++
    //     })
    //     let id_estado_pqr = document.querySelector('#id_estado_pqr').value
    //     let recurso_check_validacion = 0
    //     let recursos_check_validacion = document.querySelectorAll('.recurso_check')
    //     recursos_check_validacion.forEach(radioBtn => {
    //         if(radioBtn.checked){
    //             recurso_check_validacion = radioBtn.value
    //         }
    //     })
    //     recurso_check_validacion = Number(recurso_check_validacion)
    //     if (contadorRespuestas == respuestas.length && id_estado_pqr < 6 && recurso_check_validacion ==0) {
    //         swal({
    //             title: "¿A las respuestas le procede recurso?",
    //             icon: "info",
    //             buttons: {
    //                 cancel: {
    //                   text: "Si",
    //                   value: null,
    //                   visible: true,
    //                   className: "",
    //                   closeModal: true,
    //                 },
    //                 confirm: {
    //                   text: "No",
    //                   value: true,
    //                   visible: true,
    //                   className: "",
    //                   closeModal: true
    //                 }
    //               },
    //           })
    //           .then((respuesta) => {
    //             if (respuesta) {
    //                 this.submit();
    //             } 
    //           });
    //     }else{
    //         this.submit();
    //     }
    // })
    // ---------------------------------------------------------------------------------------------------------
    // // Inicio Función para ajustar name y id de cada peticion.
    // function ajustarNamePeticion(){
    //     let peticiones = document.querySelectorAll('.peticion_general')
    //     for (let i = 0; i < peticiones.length; i++) {
    //         const peticion = peticiones[i]
    //         peticion.querySelectorAll('.aclaracion_check').forEach(check => {
    //             check.name = `aclaracion_check${i}`
    //             check.id = `aclaracion_check${i}`
    //         })
    //         peticion.querySelectorAll('.respuesta').forEach(respuesta => {
    //             respuesta.name = `respuesta${i}`
    //             respuesta.id = `respuesta${i}`
    //         })
    //         peticion.querySelectorAll('.id_peticion').forEach(id_peticion => {
    //             id_peticion.name = `id_peticion${i}`
    //             id_peticion.id = `id_peticion${i}`
    //         })
    //         peticion.querySelectorAll('.totalPeticionAclaraciones').forEach(totalPeticionAclaraciones => {
    //             totalPeticionAclaraciones.name = `totalPeticionAclaraciones${i}`
    //             totalPeticionAclaraciones.id = `totalPeticionAclaraciones${i}`
    //         })
    //         peticion.querySelectorAll('.totalPeticionAnexos').forEach(totalPeticionAnexos => {
    //             totalPeticionAnexos.name = `totalPeticionAnexos${i}`
    //             totalPeticionAnexos.id = `totalPeticionAnexos${i}`
    //         })
    //     }
    // }
    
    // function ajustarPeticiones(){
    //     let peticion = document.querySelectorAll('.peticion_general')
    //     for (let i = 0; i < peticion.length; i++) {
    //         if(peticion[i].querySelectorAll('.aclaracion').length){
    //             peticion[i].querySelector('.totalPeticionAclaraciones').value = peticion[i].querySelectorAll('.aclaracion').length
    //         }
    //         if (peticion[i].querySelectorAll('.anexoconsulta').length) {
    //             peticion[i].querySelector('.totalPeticionAnexos').value = peticion[i].querySelectorAll('.anexoconsulta').length
    //         }
    //     }
    // }
    // Fin Función para ajustar name y id de cada peticion.
    // ---------------------------------------------------------------------------------------------------------
   

    // Fin Función para generar varios anexos en una consulta con validación.
    // --------------------------------------------------------------------------------------------------------------------
    // Inicio Función para generar varios Hechos con validación.
    // ajustarNameAclaracion(document.querySelectorAll('.aclaracion'))
    // document.querySelectorAll('.crearAclaracion').forEach(e => {
    //     e.addEventListener('click', crearNuevoAclaracion)
    // })
    // document.querySelectorAll('.eliminarAclaracion').forEach(e => {
    //     e.addEventListener('click', agregarEliminarAclaracion)
    // })    
    // function crearNuevoAclaracion(e) {
    //     e.preventDefault()
    //     let aclaracion = e.target.parentNode.parentNode
    //     nuevoAclaracion = aclaracion.querySelectorAll('.aclaracion')[0].cloneNode(true)
    //     nuevoAclaracion.querySelector('.tipo_aclaracion option').value = ''
    //     nuevoAclaracion.querySelector('.solicitud_aclaracion').value = ''
    //     aclaracion.querySelector('.aclaraciones').appendChild(nuevoAclaracion)
    //     ajustarNameAclaracion(document.querySelectorAll('.aclaracion'))
    //     document.querySelectorAll('.eliminarAclaracion').forEach(item => item.addEventListener('click', agregarEliminarAclaracion))
    // }

    // function ajustarNameAclaracion(consultaAclaracions){
    //     for (let i = 0; i < consultaAclaracions.length; i++) {
    //         const aclaracion = consultaAclaracions[i];
    //         tipo_aclaracion = aclaracion.querySelector('.tipo_aclaracion')
    //         solicitud_aclaracion = aclaracion.querySelector('.solicitud_aclaracion')
    //         tipo_aclaracion.id = `tipo_aclaracion${i}`
    //         tipo_aclaracion.name = `tipo_aclaracion${i}`
    //         solicitud_aclaracion.id = `solicitud_aclaracion${i}`
    //         solicitud_aclaracion.name = `solicitud_aclaracion${i}`
    //     }
    // }
    // function agregarEliminarAclaracion(e) {
    //     e.preventDefault()
    //     let consulta = e.target
    //     if (consulta.tagName === 'I') {
    //         consulta = consulta.parentNode.parentNode.parentNode.parentNode.parentNode
    //     }else {
    //         consulta = consulta.parentNode.parentNode.parentNode.parentNode
    //     }
    //     if(consulta.querySelectorAll('.aclaracion').length >= 2){
    //         let idAclaracion = e.target
    //         if (idAclaracion.tagName === 'I') {
    //             idAclaracion = idAclaracion.parentNode.parentNode.parentNode
    //         }else {
    //             idAclaracion = idAclaracion.parentNode.parentNode
    //         }
    //         idAclaracion.parentElement.remove()
    //         ajustarNameAclaracion(document.querySelectorAll('.aclaracion'))
    //     }
    // }
    // Fin Función para generar varios Hechos con validación.
    // ---------------------------------------------------------------------------------------------------------
    // if(document.querySelector('#guardarProrroga')){
    //     let guardarProrroga = document.querySelector('#guardarProrroga')
    //     guardarProrroga.addEventListener('click', function(e){
    //         e.preventDefault()
    //         let url = e.target.getAttribute('data_url')
    //         let token = e.target.getAttribute('data_token')
    //         let plazo_prorroga = document.querySelector('#plazo_prorroga').value
    //         let prorroga_pdf = document.querySelector('#prorroga_pdf').value
    //         let plazoRecurso = 0
    //         if(document.querySelector('.plazoRecurso')){
    //             plazoRecurso = document.querySelector('.plazoRecurso').value
    //         }
    
    //         if(plazo_prorroga != '' && prorroga_pdf != ''){
    //             let data = {
    //                 prorroga : 1,
    //                 plazo_prorroga,
    //                 prorroga_pdf,
    //                 idPqr: id_pqr,
    //                 plazoRecurso
    //             }
    //             $.ajax({
    //                 url: url,
    //                 type: 'POST',
    //                 headers: { 'X-CSRF-TOKEN': token },
    //                 data: data,
    //                 success: function(respuesta) {
    //                     location.reload();
    //                     // console.log(respuesta);
        
    //                 },
    //                 error: function(error) {
    //                     console.log(error)
    //                 }
    //             });
    //         }
    //     })
    // }
    // ---------------------------------------------------------------------------------------------------------
    // let btnRecursosGuardar = document.querySelectorAll('.guardarRespuestaRecurso button')
    // btnRecursosGuardar.forEach(e => {
    //     e.addEventListener('click', guardarRespuestaRecurso)
    // })
    // function guardarRespuestaRecurso(e){
    //     e.preventDefault()
    //     let contenedor = e.target.parentNode.parentNode
    //     let url = e.target.getAttribute('data_url')
    //     let token = e.target.getAttribute('data_token')
    //     let idRecurso = contenedor.querySelector('.id_recurso').value
    //     let tipo_reposicion_id = contenedor.querySelector('.tipo_reposicion_id').value
    //     let resprecursos_id = 0
    //     let data = {
    //         recurso_id : idRecurso,
    //         id: id_pqr,
    //         tipo_reposicion_id
    //     }
    //     $.ajax({
    //         async:false,
    //         url: url,
    //         type: 'POST',
    //         headers: { 'X-CSRF-TOKEN': token },
    //         data: data,
    //         success: function(respuesta) {
    //             // console.log(respuesta)
    //             resprecursos_id = respuesta.data.id
    //         },
    //         error: function(error) {
    //             console.log(error.responseJSON)
    //         }
    //     });
    //     let anexosRecursos = contenedor.querySelectorAll('.anexoRespuestaRecurso')
    //     anexosRecursos.forEach(anexo => {
    //         let titulo = anexo.querySelector('.titulo-anexoRespuestaRecurso input').value
    //         let descripcion = anexo.querySelector('.descripcion-anexoRespuestaRecurso input').value
    //         let archivo = anexo.querySelector('.doc-anexoRespuestaRecurso input').files[0]
    //         let dataAnexo = new FormData();
    //         dataAnexo.append('resprecursos_id', resprecursos_id);
    //         dataAnexo.append('titulo', titulo);
    //         dataAnexo.append('descripcion', descripcion);
    //         dataAnexo.append('archivo', archivo);
    //         dataAnexo.append('_token', token);
    //         let urlAnexo = anexo.parentNode.parentNode.parentNode
    //         urlAnexo =  urlAnexo.querySelector('.guardarRespuestaRecurso button').getAttribute('data_url_anexos')
    //         $.ajax({
    //             async:false,
    //             url: urlAnexo,
    //             type: 'POST',
    //             headers: { 'X-CSRF-TOKEN': token },
    //             data: dataAnexo,
    //             processData: false, 
    //             contentType: false,
    //             success: function(respuesta) {
    //                 // console.log(respuesta)
    //             },
    //             error: function(error) {
    //                 console.log(error)
    //             }
    //         });
    //     })
    //     location.reload();
    // }

    // Funcion para ocultar bloque aclaraciones
    $('.aclaracion_check').on('change', function(e) {
        let padre = e.target.parentNode.parentNode.parentNode
        switch (e.target.value) {
            case '1':
                padre.querySelector('.aclaracion').parentElement.classList.remove('d-none');
                break;
            case '0':
                padre.querySelector('.aclaracion').parentElement.classList.add('d-none');
                break;
        }
    });

    let verificacionAclaracion = document.querySelectorAll('.respuestaAclaracion')
    verificacionAclaracion.forEach(item => {
        if(item.value == 1){
            if(item.parentElement.querySelector('.aclaracion_check_si')){
                item.parentElement.querySelector('.aclaracion_check_si').setAttribute('checked','')
                item.parentElement.querySelector('.aclaracion_check_no').setAttribute('disabled','')
            }
        }else{
            if(item.parentElement.querySelector('.aclaracion_check_no')){
                item.parentElement.querySelector('.aclaracion_check_no').setAttribute('checked','')
                item.parentElement.querySelector('.aclaracion').parentElement.classList.add('d-none')
            }
        }
    })


    // Guardar aclaracion 
    if(document.querySelector('.btn-aclaracion')){
        let btnAclaraciones = document.querySelectorAll('.btn-aclaracion')
        btnAclaraciones.forEach(btn=> btn.addEventListener('click', guardarAclaraciones))

        function guardarAclaraciones(btn){
            btn.preventDefault()
            padreAclaracion = btn.target.parentElement.parentElement.parentElement.parentElement
            let url = btn.target.getAttribute('data_url')
            let token = btn.target.getAttribute('data_token')
            let tipoAclaracion = padreAclaracion.querySelector('.tipo_aclaracion').value
            let solicitudAclaracion = padreAclaracion.querySelector('.solicitud_aclaracion').value
            let id_peticion = padreAclaracion.querySelector('.id_peticion').value
            if(tipoAclaracion != '' && solicitudAclaracion != ''){
                let data = {
                    tipoAclaracion,
                    solicitudAclaracion,
                    id_peticion
                }
                $.ajax({
                    url: url,
                    type: 'POST',
                    headers: { 'X-CSRF-TOKEN': token },
                    data: data,
                    success: function(respuesta) {
                        location.reload();
        
                    },
                    error: function(error) {
                        console.log(error)
                    }
                });
            }else{
                alert('Debe diligenciar todos los campos del formulario')
            }
        }
    }

    // Inicio Función para generar varios anexos en una consulta con validación.
    if(document.querySelectorAll('.crearAnexo').length){
        let btncrearAnexo = document.querySelectorAll('.crearAnexo')
        btncrearAnexo.forEach(btn => btn.addEventListener('click', crearNuevoAnexo))
        let btnEliminarAnexo = document.querySelector('.eliminaranexoConsulta')
        btnEliminarAnexo.addEventListener('click', agregarEliminarAnexo)
    
        function crearNuevoAnexo(e) {
            e.preventDefault()
            let consulta = e.target.parentNode.parentNode
            let nuevoAnexo = consulta.querySelectorAll('.anexoconsulta')[0].cloneNode(true)
            nuevoAnexo.querySelector('.titulo-anexoConsulta input').value = ''
            nuevoAnexo.querySelector('.descripcion-anexoConsulta input').value = ''
            nuevoAnexo.querySelector('.doc-anexoConsulta input').value = ''
            consulta.querySelector('.anexosConsulta').appendChild(nuevoAnexo)
            document.querySelectorAll('.eliminaranexoConsulta').forEach(item => item.addEventListener('click', agregarEliminarAnexo))
        }
    
        function agregarEliminarAnexo(e) {
            e.preventDefault()
            let consulta = e.target
            if (consulta.tagName === 'I') {
                consulta = consulta.parentNode.parentNode.parentNode.parentNode
            }else {
                consulta = consulta.parentNode.parentNode.parentNode
            }
            if (consulta.querySelectorAll('.anexoconsulta').length >= 2) {
                let idAnexo = e.target
                if (idAnexo.tagName === 'I') {
                    idAnexo = idAnexo.parentNode.parentNode.parentNode
                } else {
                    idAnexo = idAnexo.parentNode.parentNode
                }
                idAnexo.remove()
            }
        }
    }

    // Guardar respuesta 
    if(document.querySelector('.btn-respuesta')){
        let btnRespuestas = document.querySelectorAll('.btn-respuesta')
        btnRespuestas.forEach(btn=> btn.addEventListener('click', guardarRespuestas))

        function guardarRespuestas(btn){
            btn.preventDefault()
            padreRespuesta = btn.target.parentElement
            let url = btn.target.getAttribute('data_url')
            let url2 = btn.target.getAttribute('data_url2')
            let token = btn.target.getAttribute('data_token')
            let respuesta = padreRespuesta.querySelector('.respuesta').value
            let id_peticion = padreRespuesta.parentElement.querySelector('.id_peticion').value
            let anexos = padreRespuesta.querySelectorAll('.anexoconsulta')
            if(respuesta != ''){
                  swal("Guardar la respúesta como:", {
                    buttons: {
                        definitiva: {
                            text: "Definitiva",
                            value: "definitiva",
                            className: "bg-primary",
                        },
                        parcial: {
                            text: "Parcial",
                            value: "parcial",
                            className: "bg-primary",
                        },
                        cancel: "Cancelar",
                    },
                  })
                  .then((value) => {
                    switch (value) {
                      case "definitiva":
                        let data = {
                            respuesta,
                            id_peticion,
                            estado : 11
                        }
                        guardarRespuesta(data)
                        break;
                        
                   
                      case "parcial":
                        let data1 = {
                            respuesta,
                            id_peticion
                        }
                        guardarRespuesta(data1)
                        break;
                   
                      default:
                    }
                  });
            }
            
            function guardarRespuesta(data){
                $.ajax({
                    url: url,
                    type: 'POST',
                    headers: { 'X-CSRF-TOKEN': token },
                    data: data,
                    success: function(respuesta) {
                        guardarRespuestaAnexo(anexos, respuesta)
                    },
                    error: function(error) {
                        console.log(error)
                    }
                });
                if (padreRespuesta.querySelector('.respuesta_anterior')) {
                    let respuesta_anterior = padreRespuesta.querySelector('.respuesta_anterior')
                    let url_respuesta_anterior = respuesta_anterior.getAttribute('data_url')
                    if (respuesta != respuesta_anterior) {
                        let data = {
                            mensajeHistorial: `Respuesta anterior: "${respuesta_anterior.value}"`,
                            idPqr: id_pqr,
                            idPeticion : id_peticion
                        }
                        $.ajax({
                            url: url_respuesta_anterior,
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
                    }
                    
                }
            }

            function guardarRespuestaAnexo(anexos, idrespuesta){
                anexos.forEach(anexo => {
                    let titulo = anexo.querySelector('.titulo').value
                    let descripcion = anexo.querySelector('.descripcion').value
                    let archivo = anexo.querySelector('.documento').files[0]
                    if (archivo) {
                        let dataAnexo = new FormData();
                        dataAnexo.append('respuesta_id', idrespuesta.data);
                        dataAnexo.append('titulo', titulo);
                        dataAnexo.append('descripcion', descripcion);
                        dataAnexo.append('archivo', archivo);
                        dataAnexo.append('_token', token);
                        $.ajax({
                            async:false,
                            url: url2,
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
                location.reload();
            }
        }
    }

    
    // Guardar estado 
    if(document.querySelector('.btn-estado')){
        let btnEstados = document.querySelectorAll('.btn-estado')
        btnEstados.forEach(btn=> btn.addEventListener('click', guardarEstado))

        function guardarEstado(btn){
            btn.preventDefault()
            let btnE = btn.target 
            if (btnE.tagName === 'I') {
                padreEstado = btnE.parentElement.parentElement.parentElement.parentElement.parentElement
                btnE = btnE.parentElement.parentElement
            }else {
                padreEstado = btnE.parentElement.parentElement.parentElement
            }
            console.log(padreEstado)
            let url = btnE.getAttribute('data_url')
            let token = btnE.getAttribute('data_token')
            let estado = padreEstado.querySelector('.estadoPeticion').value
            let respuesta = padreEstado.querySelector('.respuesta').value
            let id_peticion = padreEstado.parentElement.querySelector('.id_peticion').value
            let data = {
                estado,
                id_peticion
            }
            if (estado == 11 && respuesta == '') {
                alert('Para guardar el 100% debe agregar una respuesta antes')
            }else{
                $.ajax({
                    url: url,
                    type: 'POST',
                    headers: { 'X-CSRF-TOKEN': token },
                    data: data,
                    success: function(respuesta) {
                        location.reload();
        
                    },
                    error: function(error) {
                        console.log(error)
                    }
                });
            }
        }
    }

    // Guardar reasignar petición a funcionario
    if(document.querySelectorAll('.reasignacion_peticion_guardar')){
        let reasignacionPeticiones = document.querySelectorAll('.reasignacion_peticion_guardar')
        reasignacionPeticiones.forEach(reasignacion => {
            reasignacion.addEventListener('click', function(e){
                e.preventDefault()
                let padre = e.target.parentElement.parentElement.parentElement.parentElement.parentElement
                let url = e.target.getAttribute('data_url')
                let url2 = e.target.getAttribute('data_url2')
                let token = e.target.getAttribute('data_token')
                let peticion = padre.querySelector('.id_peticion').value
                let funcionario = padre.querySelector('.funcionario').value
                let cargo = padre.querySelector('.funcionario').value
                let mensajeHistorial = padre.querySelector('.mensaje-historial-peticion').value
                if (peticion == '' || cargo == '' || funcionario == '' || mensajeHistorial == '') {
                    alert("Debe dilegenciar todos los campos")
                }else{
                    guardarReasignacionPeticion()
                }
                function guardarReasignacionPeticion (){
                    let data = {
                        peticion,
                        funcionario
                    }
                    let data2 = {
                        idPeticion: peticion,
                        mensajeHistorial,
                        idPqr: id_pqr
                    }
                    $.ajax({
                        url: url2,
                        type: 'POST',
                        headers: { 'X-CSRF-TOKEN': token },
                        data: data2,
                        success: function(respuesta) {
                            // location.reload();
                        },
                        error: function(error) {
                            console.log(error.responseJSON)
                        }
                    });
                    $.ajax({
                        url: url,
                        type: 'POST',
                        headers: { 'X-CSRF-TOKEN': token },
                        data: data,
                        success: function(respuesta) {
                            location.reload();
                        },
                        error: function(error) {
                            console.log(error.responseJSON)
                        }
                    });
                }
            })
        })
    }

    //  Guardar Historial PQR-peticion  
    if(document.querySelector('.guardarHistorialPeticion')){
        let HistorialPeticiones = document.querySelectorAll('.guardarHistorialPeticion')
        HistorialPeticiones.forEach(btn => btn.addEventListener('click', guardarHistorialPeticiones))
        function guardarHistorialPeticiones(btn){
            btn.preventDefault()
            let contenedorHisotrial = btn.target.parentElement.parentElement
            let url = btn.target.getAttribute('data_url')
            let token = btn.target.getAttribute('data_token')
            let mensajeHistorial = contenedorHisotrial.querySelector('.mensaje-historial-peticion').value
            let idPeticion = contenedorHisotrial.parentElement.querySelector('.id_peticion').value
            if (mensajeHistorial == '') {
                alert("Debe agregar un historial")
            }else{
                guardarHistorialPeticion()
            }
    
            function guardarHistorialPeticion (){
                let data = {
                    mensajeHistorial,
                    idPqr: id_pqr,
                    idPeticion
                }
                $.ajax({
                    url: url,
                    type: 'POST',
                    headers: { 'X-CSRF-TOKEN': token },
                    data: data,
                    success: function(respuesta) {
                        location.reload();
                    },
                    error: function(error) {
                        console.log(error.responseJSON)
                    }
                });
            }
        }   
    }
})

