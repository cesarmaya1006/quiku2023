window.addEventListener('DOMContentLoaded', function(){
    ajustarNamePeticion()
    let verificacionRespuesta = document.querySelectorAll('.respuestaRespuesta')
    verificacionRespuesta.forEach(item => {
        if(item.value != ''){
            item.parentElement.querySelector('.respuesta').setAttribute('disabled','')
            item.parentElement.querySelector('#anexosConsulta').classList.add('d-none')
            item.parentElement.querySelector('#crearAnexo').classList.add('d-none')
        }
    })
    let verificacionProrroga = document.querySelector('.respuestaProrroga')
    if(verificacionProrroga.value == 1){
        verificacionProrroga.parentElement.querySelector('.prorroga_si').setAttribute('checked','')
        verificacionProrroga.parentElement.querySelector('.prorroga_no').setAttribute('disabled','')
        verificacionProrroga.parentElement.querySelector('.plazo_prorroga').parentElement.remove()
        verificacionProrroga.parentElement.querySelector('.prorroga_pdf').setAttribute('disabled','')
    }else {
        verificacionProrroga.parentElement.querySelector('.prorroga_no').setAttribute('checked','')
        verificacionProrroga.parentElement.querySelector('.contentProrroga').classList.add('d-none')
    }
    let verificacionAclaracion = document.querySelectorAll('.respuestaAclaracion')
    verificacionAclaracion.forEach(item => {
        if(item.value == 1){
            item.parentElement.querySelector('.aclaracion_check_si').setAttribute('checked','')
            item.parentElement.querySelector('.aclaracion_check_no').setAttribute('disabled','')
        }else{
            item.parentElement.querySelector('.aclaracion_check_no').setAttribute('checked','')
            item.parentElement.querySelector('.aclaraciones').parentElement.classList.add('d-none')
        }
    })
    // ---------------------------------------------------------------------------------------------------------
    $('input[type=radio][name=prorroga]').on('change', function() {
        switch ($(this).val()) {
            case '1':
                $('.contentProrroga').removeClass('d-none');
                break;
            case '0':
                $('.contentProrroga').addClass('d-none');
                break;
        }
    });
    
    $('.aclaracion_check').on('change', function(e) {
        let padre = e.target.parentNode.parentNode.parentNode
        switch (e.target.value) {
            case '1':
                padre.querySelector('.aclaraciones').parentElement.classList.remove('d-none');
                break;
            case '0':
                padre.querySelector('.aclaraciones').parentElement.classList.add('d-none');
                break;
        }
    });

    $('.peticion').on('change', function(e) {
        let padre = e.target.parentNode.parentNode.parentNode
        switch (e.target.value) {
            case '1':
                padre.querySelector('.peticion-form').classList.remove('d-none');
                break;
            case '0':
                padre.querySelector('.peticion-form').classList.add('d-none');
                break;
        }
    });

    $("#plazo_prorroga").keydown(function() {
        return false
      });

    let btnSubmit = document.querySelector('#fromGestionPqr')
    btnSubmit.addEventListener('submit', function (e) {
        e.preventDefault()
        let anexos = document.querySelectorAll('input[type="file"]')
        anexos.forEach(anexo =>{
            if(anexo.value == ''){
                anexo.parentNode.parentNode.remove()
            }
        })
        ajustarNameAnexo(document.querySelectorAll('.anexoconsulta'))
        ajustarPeticiones()
        document.querySelector('.totalGeneralaclaraciones').value = document.querySelectorAll('.aclaracion').length
        document.querySelector('.totalGeneralAnexos').value = document.querySelectorAll('.anexoconsulta').length
        document.querySelector('.totalPeticiones').value = document.querySelectorAll('.peticion_general').length
        this.submit();
    })
    // ---------------------------------------------------------------------------------------------------------
    // Inicio Función para ajustar name y id de cada peticion.
    function ajustarNamePeticion(){
        let peticiones = document.querySelectorAll('.peticion_general')
        for (let i = 0; i < peticiones.length; i++) {
            const peticion = peticiones[i]
            peticion.querySelectorAll('.aclaracion_check').forEach(check => {
                check.name = `aclaracion_check${i}`
                check.id = `aclaracion_check${i}`
            })
            peticion.querySelectorAll('.respuesta').forEach(respuesta => {
                respuesta.name = `respuesta${i}`
                respuesta.id = `respuesta${i}`
            })
            peticion.querySelectorAll('.id_peticion').forEach(id_peticion => {
                id_peticion.name = `id_peticion${i}`
                id_peticion.id = `id_peticion${i}`
            })
            peticion.querySelectorAll('.totalPeticionAclaraciones').forEach(totalPeticionAclaraciones => {
                totalPeticionAclaraciones.name = `totalPeticionAclaraciones${i}`
                totalPeticionAclaraciones.id = `totalPeticionAclaraciones${i}`
            })
            peticion.querySelectorAll('.totalPeticionAnexos').forEach(totalPeticionAnexos => {
                totalPeticionAnexos.name = `totalPeticionAnexos${i}`
                totalPeticionAnexos.id = `totalPeticionAnexos${i}`
            })
        }
    }
    
    function ajustarPeticiones(){
        let peticion = document.querySelectorAll('.peticion_general')
        for (let i = 0; i < peticion.length; i++) {
            peticion[i].querySelector('.totalPeticionAclaraciones').value = peticion[i].querySelectorAll('.aclaracion').length
            peticion[i].querySelector('.totalPeticionAnexos').value = peticion[i].querySelectorAll('.anexoconsulta').length
        }
    }
    // Fin Función para ajustar name y id de cada peticion.
    // ---------------------------------------------------------------------------------------------------------
    // Inicio Función para generar varios anexos en una consulta con validación.
    ajustarNameAnexo(document.querySelectorAll('.anexoconsulta'))
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
        consulta.querySelector('#anexosConsulta').appendChild(nuevoAnexo)
        ajustarNameAnexo(document.querySelectorAll('.anexoconsulta'))
        document.querySelectorAll('.eliminaranexoConsulta').forEach(item => item.addEventListener('click', agregarEliminarAnexo))
    }

    function ajustarNameAnexo(anexosConsulta) {
        for (let i = 0; i < anexosConsulta.length; i++) {
            const anexoconsulta = anexosConsulta[i];
            anexoconsulta.id = `anexosConsulta${i}`
            anexoconsulta.querySelector('.titulo-anexoConsulta input').id = `titulo${i}`
            anexoconsulta.querySelector('.titulo-anexoConsulta input').name = `titulo${i}`
            anexoconsulta.querySelector('.descripcion-anexoConsulta input').id = `descripcion${i}`
            anexoconsulta.querySelector('.descripcion-anexoConsulta input').name = `descripcion${i}`
            anexoconsulta.querySelector('.doc-anexoConsulta input').id = `documentos${i}`
            anexoconsulta.querySelector('.doc-anexoConsulta input').name = `documentos${i}`
        }
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
            ajustarNameAnexo(document.querySelectorAll('.anexoconsulta'))
        }
    }
    // Fin Función para generar varios anexos en una consulta con validación.
    // --------------------------------------------------------------------------------------------------------------------
    // Inicio Función para generar varios Hechos con validación.
    ajustarNameAclaracion(document.querySelectorAll('.aclaracion'))
    document.querySelectorAll('.crearAclaracion').forEach(e => {
        e.addEventListener('click', crearNuevoAclaracion)
    })
    document.querySelectorAll('.eliminarAclaracion').forEach(e => {
        e.addEventListener('click', agregarEliminarAclaracion)
    })    
    function crearNuevoAclaracion(e) {
        e.preventDefault()
        let aclaracion = e.target.parentNode.parentNode
        nuevoAclaracion = aclaracion.querySelectorAll('.aclaracion')[0].cloneNode(true)
        nuevoAclaracion.querySelector('.tipo_aclaracion option').value = ''
        nuevoAclaracion.querySelector('.solicitud_aclaracion').value = ''
        aclaracion.querySelector('.aclaraciones').appendChild(nuevoAclaracion)
        ajustarNameAclaracion(document.querySelectorAll('.aclaracion'))
        document.querySelectorAll('.eliminarAclaracion').forEach(item => item.addEventListener('click', agregarEliminarAclaracion))
    }

    function ajustarNameAclaracion(consultaAclaracions){
        for (let i = 0; i < consultaAclaracions.length; i++) {
            const aclaracion = consultaAclaracions[i];
            tipo_aclaracion = aclaracion.querySelector('.tipo_aclaracion')
            solicitud_aclaracion = aclaracion.querySelector('.solicitud_aclaracion')
            tipo_aclaracion.id = `tipo_aclaracion${i}`
            tipo_aclaracion.name = `tipo_aclaracion${i}`
            solicitud_aclaracion.id = `solicitud_aclaracion${i}`
            solicitud_aclaracion.name = `solicitud_aclaracion${i}`
        }
    }
    function agregarEliminarAclaracion(e) {
        e.preventDefault()
        let consulta = e.target
        if (consulta.tagName === 'I') {
            consulta = consulta.parentNode.parentNode.parentNode.parentNode.parentNode
        }else {
            consulta = consulta.parentNode.parentNode.parentNode.parentNode
        }
        if(consulta.querySelectorAll('.aclaracion').length >= 2){
            let idAclaracion = e.target
            if (idAclaracion.tagName === 'I') {
                idAclaracion = idAclaracion.parentNode.parentNode.parentNode
            }else {
                idAclaracion = idAclaracion.parentNode.parentNode
            }
            idAclaracion.parentElement.remove()
            ajustarNameAclaracion(document.querySelectorAll('.aclaracion'))
        }
    }
    // Fin Función para generar varios Hechos con validación.
    // ---------------------------------------------------------------------------------------------------------


})