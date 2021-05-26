window.addEventListener('DOMContentLoaded', function(){
    ajustarNameAclaracion()
    let btnSubmit = document.querySelector('#fromGestionPqrUsuario')
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
        let ajustarContadoresAnexos = document.querySelectorAll('.aclaracion')
        ajustarContadoresAnexos.forEach(contador => {
            contador.querySelector('.totalanexos').value = contador.querySelectorAll('.anexoconsulta').length
        })
        this.submit();
    })
    // ---------------------------------------------------------------------------------------------------------
    // Inicio Función para ajustar name y id de cada peticion.
    function ajustarNameAclaracion(){
        let aclaraciones = document.querySelectorAll('.aclaracion')
        for (let i = 0; i < aclaraciones.length; i++) {
            const aclaracion = aclaraciones[i]
            aclaracion.querySelector('.id_aclaracion').name = `id_aclaracion${i}`
            aclaracion.querySelector('.totalanexos').name = `totalanexos${i}`
            aclaracion.querySelector('.aclaracionRespuesta').name = `aclaracionRespuesta${i}`
        }
    }
    
    function ajustarPeticiones(){
        let peticion = document.querySelectorAll('.peticion_general')
        for (let i = 0; i < peticion.length; i++) {
            peticion[i].querySelector('.totalPeticionAclaraciones').name = `totalPeticionAclaraciones${i}`
            peticion[i].querySelector('.totalPeticionAclaraciones').value = peticion[i].querySelectorAll('.aclaracion').length
            peticion[i].querySelector('.id_peticion').name = `id_peticion${i}`
        }
    }
    // Fin Función para ajustar name y id de cada peticion.
    // ---------------------------------------------------------------------------------------------------------
    // Inicio Función para generar varios anexos en una consulta con validación.
    ajustarNameAnexo(document.querySelectorAll('.anexoconsulta'))
    let btncrearAnexo = document.querySelectorAll('.crearAnexo')
    btncrearAnexo.forEach(btn => btn.addEventListener('click', crearNuevoAnexo))
    let btnEliminarAnexo = document.querySelectorAll('.eliminaranexoConsulta')
    btnEliminarAnexo.forEach(btn => btn.addEventListener('click', agregarEliminarAnexo))

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
})
