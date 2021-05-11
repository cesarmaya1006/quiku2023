window.addEventListener('DOMContentLoaded', function(){
    ajustarNamePeticion()
    // ---------------------------------------------------------------------------------------------------------
    $('input[type=radio][name=prorroga]').on('change', function() {
        switch ($(this).val()) {
            case '1':
                $('#anexosProrroga').removeClass('d-none');
                break;
            case '0':
                $('#anexosProrroga').addClass('d-none');
                break;
        }
    });
    
    $('.aclaracion_check').on('change', function(e) {
        let padre = e.target.parentNode.parentNode.parentNode
        switch (e.target.value) {
            case '1':
                padre.querySelector('.aclaracion-form').classList.remove('d-none');
                break;
            case '0':
                padre.querySelector('.aclaracion-form').classList.add('d-none');
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
        ajustarPeticiones()
        document.querySelector('.totalGeneralaclaraciones').value = document.querySelectorAll('.block_aclaracion').length
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
            peticion[i].querySelector('.totalPeticionAclaraciones').value = peticion[i].querySelectorAll('.block_aclaracion').length
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
    ajustarNameAclaracion(document.querySelectorAll('.block_aclaracion'))
    document.querySelectorAll('.crearAclaracion').forEach(e => {
        e.addEventListener('click', crearNuevoAclaracion)
    })
    document.querySelectorAll('.eliminarAclaracion').forEach(e => {
        e.addEventListener('click', agregarEliminarAclaracion)
    })    
    function crearNuevoAclaracion(e) {
        e.preventDefault()
        let consulta = e.target.parentNode.parentNode
        nuevoAclaracion = consulta.querySelectorAll('.block_aclaracion')[0].cloneNode(true)
        nuevoAclaracion.querySelector('.block_aclaracion input').value = ''
        consulta.querySelector('#aclaraciones').appendChild(nuevoAclaracion)
        ajustarNameAclaracion(document.querySelectorAll('.block_aclaracion'))
        document.querySelectorAll('.eliminarAclaracion').forEach(item => item.addEventListener('click', agregarEliminarAclaracion))
    }

    function ajustarNameAclaracion(consultaAclaracions){
        for (let i = 0; i < consultaAclaracions.length; i++) {
            const aclaracion = consultaAclaracions[i];
            aclaracion.id = `aclaracion${i}`
            aclaracion.querySelector('input').id = `aclaracion${i}`
            aclaracion.querySelector('input').name = `aclaracion${i}`
        }
    }
    function agregarEliminarAclaracion(e) {
        e.preventDefault()
        let consulta = e.target
        if (consulta.tagName === 'I') {
            consulta = consulta.parentNode.parentNode.parentNode.parentNode
        }else {
            consulta = consulta.parentNode.parentNode.parentNode
        }
        if(consulta.querySelectorAll('.block_aclaracion').length >= 2){
            let idAclaracion = e.target
            if (idAclaracion.tagName === 'I') {
                idAclaracion = idAclaracion.parentNode.parentNode.parentNode
            }else {
                idAclaracion = idAclaracion.parentNode.parentNode
            }
            idAclaracion.remove()
            ajustarNameAclaracion(document.querySelectorAll('.block_aclaracion'))
        }
    }
    // Fin Función para generar varios Hechos con validación.
    // ---------------------------------------------------------------------------------------------------------


})