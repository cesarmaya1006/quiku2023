window.addEventListener('DOMContentLoaded', function () {
    // Incio Validacion envio de formulario
    // if (document.querySelectorAll('.form_auto_admisorio')) {
    //     let btnSubmit = document.querySelector('#fromConceptoUOpinion')
    //     btnSubmit.addEventListener('submit', function (e) {
    //         e.preventDefault()
    //             let anexos = document.querySelectorAll('input[type="file"]')
    //             anexos.forEach(anexo =>{
    //                 if(anexo.value == ''){
    //                     anexo.parentNode.parentNode.remove()
    //                 }
    //             })
    //             let hechos = document.querySelectorAll('.hechoConsulta input')
    //             hechos.forEach(hecho =>{
    //                 if(hecho.value == ''){
    //                     hecho.parentNode.remove()
    //                 }
    //             })
    //             ajustarConsultas()
    //             ajustarNameHecho(document.querySelectorAll('.hechoConsulta'))
    //             ajustarNameAnexo(document.querySelectorAll('.anexoconsulta'))
    //             document.querySelector('.totalCantidadAnexosConsultas').value = document.querySelectorAll('.anexoconsulta').length
    //             this.submit();
    //     })
    // Fin Validacion envio de formulario

    // ---------------------------------------------------------------------------------------------------------
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
        nuevoAccion.querySelector('.email_accion').value = ''
        nuevoAccion.querySelector('.direccion_accion').value = ''
        nuevoAccion.querySelector('.telefono_accion').value = ''
        nuevoAccion.querySelector('.nombreApellido_apoderado').value = ''
        nuevoAccion.querySelector('.identificacion_apoderado').value = ''
        nuevoAccion.querySelector('.tarjetaProfesional_apoderado').value = ''
        nuevoAccion.querySelector('.direccion_apoderado').value = ''
        nuevoAccion.querySelector('.email_apoderado').value = ''
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
    // --------------------------------------------------------------------------------------------------------------------

    //Guardar auto admisorio  
    if(document.querySelector('.btn-auto-admisorio')){
        let btnGuardarAuto = document.querySelector('.btn-auto-admisorio')
        btnGuardarAuto.addEventListener('click', function(e){
            e.preventDefault
            let contenedorPadre = document.querySelector('.form_auto_admisorio')
            let url = e.target.getAttribute('data_url')
            let url2 = e.target.getAttribute('data_url2')
            let token = e.target.getAttribute('data_token')
            console.log(url)
            console.log(url2)
            console.log(token)
            let radicado = contenedorPadre.querySelector('.radicado').value
            let departamento_id = contenedorPadre.querySelector('.departamento_id').value
            let municipio_id = contenedorPadre.querySelector('.municipio_id').value
            let jurisdiccion_id = contenedorPadre.querySelector('.jurisdiccion_id').value
            let juzgado_id = contenedorPadre.querySelector('.juzgado_id').value
            let nombreApellido_juez = contenedorPadre.querySelector('.nombreApellido_juez').value
            let direccion_juez = contenedorPadre.querySelector('.direccion_juez').value
            let telefono_fijo_juez = contenedorPadre.querySelector('.telefono_fijo_juez').value
            let email_juez = contenedorPadre.querySelector('.email_juez').value
            let fecha_notificacion = contenedorPadre.querySelector('.fecha_notificacion').value
            let cantidad_dias = contenedorPadre.querySelector('.cantidad_dias').value
            let cantidad_horas = contenedorPadre.querySelector('.cantidad_horas').value
            let data = {
                radicado,
                departamento_id,
                municipio_id,
                jurisdiccion_id,
                juzgado_id,
                nombreApellido_juez,
                direccion_juez,
                telefono_fijo_juez,
                email_juez,
                fecha_notificacion,
                cantidad_dias,
                cantidad_horas
            }
            console.log(data)
            window.location = "/funcionario/auto_admisorio_complemento"
    //         let archivo = contenedorPadre.querySelector('.anexo').files[0]
    //         let dataAnexo = new FormData();
    //         dataAnexo.append('pqr_id', idPqr);
    //         dataAnexo.append('titulo', titulo);
    //         dataAnexo.append('descripcion', descripcion);
    //         dataAnexo.append('archivo', archivo);
    //         dataAnexo.append('idTarea', idTarea);
    //         dataAnexo.append('_token', token);
    //         if (titulo != '' && archivo  && mensajeHistorial != '' && idPqr != '') {
    //             let data = {
    //                 idTarea,
    //                 mensajeHistorial,
    //                 idPqr
    //             }
                // $.ajax({
                //     async:false,
                //     url: url,
                //     type: 'POST',
                //     headers: { 'X-CSRF-TOKEN': token },
                //     data: dataAnexo,
                //     processData: false, 
                //     contentType: false,
                //     success: function(respuesta) {
                //         // console.log(respuesta)
                //     },
                //     error: function(error) {
                //         console.log(error)
                //     }
                // });
                // $.ajax({
                //     url: url,
                //     type: 'POST',
                //     headers: { 'X-CSRF-TOKEN': token },
                //     data: data,
                //     success: function(respuesta) {
                //         // console.log(respuesta)
                //     },
                //     error: function(error) {
                //         console.log(error.responseJSON)
                //     }
                // });
    //             $.ajax({
    //                 url: url3,
    //                 type: 'POST',
    //                 headers: { 'X-CSRF-TOKEN': token },
    //                 data: data,
    //                 success: function(respuesta) {
    //                     window.location = "/admin/index"
    //                 },
    //                 error: function(error) {
    //                     console.log(error.responseJSON)
    //                 }
    //             });
    //         }else{
    //             alert('Debe diligenciar todos los campos del formulario')
    //         }
        })
    }

    
    // Funcion para ocultar bloque medida cautelar
    $('.medidaCautelar_check').on('change', function(e) {
        let padre = e.target.parentNode.parentNode.parentNode
        console.log(padre)
        switch (e.target.value) {
            case '1':
                padre.querySelector('.medidaCautelar').classList.remove('d-none');
                break;
            case '0':
                padre.querySelector('.medidaCautelar').classList.add('d-none');
                break;
        }
    });
})