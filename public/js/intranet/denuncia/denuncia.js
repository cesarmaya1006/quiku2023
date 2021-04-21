window.addEventListener('DOMContentLoaded', function () {
    // Incio Validacion envio de formulario
    let btnSubmit = document.querySelector('#fromDenuncia')
    btnSubmit.addEventListener('submit', function(e){
        e.preventDefault()
        if(!document.querySelector('#solicitud').value){
            alert('solicitud');
            return
        }
        document.querySelector('#cantidadHechos').value = document.querySelectorAll('.denuncia .denunciaHecho').length
        document.querySelector('#cantidadAnexosHechos').value = document.querySelectorAll('.denuncia .anexoHecho').length
        this.submit();
    })
    // Fin Validacion envio de formulario
    
    // Inicio Función para generar varios Hechos con validación.
    if(document.querySelectorAll('.denuncia .denunciaHecho')){
        ajustarName(document.querySelectorAll('.denunciaHecho'))
        let btncrearHecho = document.querySelector('#crearHecho')
        let btnEliminarHecho = document.querySelector('.eliminarHecho')
        btnEliminarHecho.addEventListener('click', agregarEliminar)
        btncrearHecho.addEventListener('click', function (e) {
            e.preventDefault()
            crearNuevoHecho()
        })

        function crearNuevoHecho() {
            let nuevoHecho = document.querySelectorAll('.denunciaHecho')[0].cloneNode(true)
            document.querySelector('#hechos').appendChild(nuevoHecho)
            ajustarName(document.querySelectorAll('.denunciaHecho'))
            document.querySelectorAll('.eliminarHecho').forEach(item => item.addEventListener('click', agregarEliminar))
        }
    
        function ajustarName(denunciaHechos){
            for (let i = 0; i < denunciaHechos.length; i++) {
                const hecho = denunciaHechos[i];
                hecho.id = `hecho${i}`
                hecho.querySelector('.title-denuncia label').setAttribute('for',`hecho${i}`) 
                hecho.querySelector('input').id = `hecho${i}`
                hecho.querySelector('input').name = `hecho${i}`
                hecho.querySelector('.title-denuncia label').innerHTML= `Hecho #${i + 1}`
            }
        }

        function agregarEliminar(e) {
            e.preventDefault()
            if(document.querySelectorAll('.denunciaHecho').length >= 2){
                let idHecho = e.target
                if (idHecho.tagName === 'I') {
                    idHecho = idHecho.parentNode.parentNode.parentNode
                }else {
                    idHecho = idHecho.parentNode.parentNode
                }
                idHecho.remove()
                ajustarName(document.querySelectorAll('.denunciaHecho'))
            }
        }
    }
    // Fin Función para generar varios Hechos con validación.

    // Inicio Función para generar varios Anexos con validación.
    if(document.querySelectorAll('.denuncia .anexoHecho')){
        ajustarName(document.querySelectorAll('.anexoHecho'))
        let btncrearAnexo = document.querySelector('#crearAnexo')
        let btnEliminarAnexoHecho = document.querySelector('.eliminaranexoHecho')
        btnEliminarAnexoHecho.addEventListener('click', agregarEliminar)
        btncrearAnexo.addEventListener('click', function (e) {
            e.preventDefault()
            crearNuevoAnexoHecho()
        })

        function crearNuevoAnexoHecho() {
            let nuevoAnexoHecho = document.querySelectorAll('.anexoHecho')[0].cloneNode(true)
            document.querySelector('#anexosHechos').appendChild(nuevoAnexoHecho)
            ajustarName(document.querySelectorAll('.anexoHecho'))
            document.querySelectorAll('.eliminaranexoHecho').forEach(item => item.addEventListener('click', agregarEliminar))
        }
    
        function ajustarName(anexosHechos){
            for (let i = 0; i < anexosHechos.length; i++) {
                const anexohecho = anexosHechos[i];
                anexohecho.id = `anexoHecho${i}`
                anexohecho.querySelector('.titulo-anexodenuncia label').setAttribute('for',`titulo${i}`) 
                anexohecho.querySelector('.titulo-anexodenuncia input').id = `titulo${i}`
                anexohecho.querySelector('.titulo-anexodenuncia input').name = `titulo${i}`
                anexohecho.querySelector('.descripcion-anexodenuncia input').id = `descripcion${i}`
                anexohecho.querySelector('.descripcion-anexodenuncia input').name = `descripcion${i}`
                anexohecho.querySelector('.doc-anexodenuncia input').id = `documentos${i}`
                anexohecho.querySelector('.doc-anexodenuncia input').name = `documentos${i}`
                anexohecho.querySelector('.titulo-anexo h6').innerHTML= `Anexo #${i + 1}`
            }
        }

        function agregarEliminar(e) {
            e.preventDefault()
            if(document.querySelectorAll('.anexoHecho').length >= 2){
                let idHecho = e.target
                if (idHecho.tagName === 'I') {
                    idHecho = idHecho.parentNode.parentNode.parentNode
                }else {
                    idHecho = idHecho.parentNode.parentNode
                }
                idHecho.remove()
                ajustarName(document.querySelectorAll('.anexoHecho'))
            }
        }
    }
    // Fin Función para generar varios Anexos con validación.
})