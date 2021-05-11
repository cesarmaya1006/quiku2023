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
    
    $('.aclaracion').on('change', function(e) {
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

})