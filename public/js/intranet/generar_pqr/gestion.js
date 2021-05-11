window.addEventListener('DOMContentLoaded', function(){
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