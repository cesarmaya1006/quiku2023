window.addEventListener('DOMContentLoaded', function () {
    // Incio Validacion envio de formulario
    if (document.querySelectorAll('#fromDenuncia')) {
        let btnSubmit = document.querySelector('#fromDenuncia')
        btnSubmit.addEventListener('submit', function(e){
            e.preventDefault()
            if(!document.querySelector('#solicitud').value){
                alert('solicitud');
                return
            }
            document.querySelector('.cantidadHechosDenuncia').value = document.querySelectorAll('.hechoDenuncia').length
            document.querySelector('.cantidadAnexosDenuncia').value = document.querySelectorAll('.anexodenuncia').length
            this.submit();
        })
        // Fin Validacion envio de formulario
        // ---------------------------------------------------------------------------------------------------------
        // Inicio Función para generar varios anexos en una denuncia con validación.
        ajustarNameAnexo(document.querySelectorAll('.anexodenuncia'))
        let btncrearAnexo = document.querySelectorAll('.crearAnexo')
        btncrearAnexo.forEach(btn => btn.addEventListener('click', crearNuevoAnexo))
        let btnEliminarAnexo = document.querySelector('.eliminaranexoDenuncia')
        btnEliminarAnexo.addEventListener('click', agregarEliminarAnexo)

        function crearNuevoAnexo(e) {
            e.preventDefault()
            let denuncia = e.target.parentNode.parentNode
            let nuevoAnexo = denuncia.querySelectorAll('.anexodenuncia')[0].cloneNode(true)
            nuevoAnexo.querySelector('.titulo-anexoDenuncia input').value = ''
            nuevoAnexo.querySelector('.descripcion-anexoDenuncia input').value = ''
            nuevoAnexo.querySelector('.doc-anexoDenuncia input').value = ''
            denuncia.querySelector('#anexosDenuncia').appendChild(nuevoAnexo)
            ajustarNameAnexo(document.querySelectorAll('.anexodenuncia'))
            document.querySelectorAll('.eliminaranexoDenuncia').forEach(item => item.addEventListener('click', agregarEliminarAnexo))
        }

        function ajustarNameAnexo(anexosDenuncia) {
            for (let i = 0; i < anexosDenuncia.length; i++) {
                const anexodenuncia = anexosDenuncia[i];
                anexodenuncia.id = `anexosDenuncia${i}`
                anexodenuncia.querySelector('.titulo-anexoDenuncia input').id = `titulo${i}`
                anexodenuncia.querySelector('.titulo-anexoDenuncia input').name = `titulo${i}`
                anexodenuncia.querySelector('.descripcion-anexoDenuncia input').id = `descripcion${i}`
                anexodenuncia.querySelector('.descripcion-anexoDenuncia input').name = `descripcion${i}`
                anexodenuncia.querySelector('.doc-anexoDenuncia input').id = `documentos${i}`
                anexodenuncia.querySelector('.doc-anexoDenuncia input').name = `documentos${i}`
            }
        }

        function agregarEliminarAnexo(e) {
            e.preventDefault()
            let denuncia = e.target
            if (denuncia.tagName === 'I') {
                denuncia = denuncia.parentNode.parentNode.parentNode.parentNode
            }else {
                denuncia = denuncia.parentNode.parentNode.parentNode
            }
            if (denuncia.querySelectorAll('.anexodenuncia').length >= 2) {
                let idAnexo = e.target
                if (idAnexo.tagName === 'I') {
                    idAnexo = idAnexo.parentNode.parentNode.parentNode
                } else {
                    idAnexo = idAnexo.parentNode.parentNode
                }
                idAnexo.remove()
                ajustarNameAnexo(document.querySelectorAll('.anexodenuncia'))
            }
        }
        // Fin Función para generar varios anexos en una denuncia con validación.
        // ---------------------------------------------------------------------------------------------------------
        // Inicio Función para generar varios Hechos con validación.
        ajustarNameHecho(document.querySelectorAll('.hechoDenuncia'))
        let btncrearHecho = document.querySelector('.crearHecho')
        btncrearHecho.addEventListener('click', crearNuevoHecho)
        let btnEliminarHecho = document.querySelector('.eliminarHecho')
        btnEliminarHecho.addEventListener('click', agregarEliminarHecho)

        function crearNuevoHecho(e) {
            e.preventDefault()
            let denuncia = e.target.parentNode.parentNode
            nuevoHecho = denuncia.querySelectorAll('.hechoDenuncia')[0].cloneNode(true)
            nuevoHecho.querySelector('.hechoDenuncia input').value = ''
            denuncia.querySelector('#hechos').appendChild(nuevoHecho)
            ajustarNameHecho(document.querySelectorAll('.hechoDenuncia'))
            document.querySelectorAll('.eliminarHecho').forEach(item => item.addEventListener('click', agregarEliminarHecho))
        }
    
        function ajustarNameHecho(denunciaHechos){
            for (let i = 0; i < denunciaHechos.length; i++) {
                const hecho = denunciaHechos[i];
                hecho.id = `hecho${i}`
                hecho.querySelector('input').id = `hecho${i}`
                hecho.querySelector('input').name = `hecho${i}`
            }
        }

        function agregarEliminarHecho(e) {
            e.preventDefault()
            let denuncia = e.target
            if (denuncia.tagName === 'I') {
                denuncia = denuncia.parentNode.parentNode.parentNode.parentNode
            }else {
                denuncia = denuncia.parentNode.parentNode.parentNode
            }
            if(denuncia.querySelectorAll('.hechoDenuncia').length >= 2){
                let idHecho = e.target
                if (idHecho.tagName === 'I') {
                    idHecho = idHecho.parentNode.parentNode.parentNode
                }else {
                    idHecho = idHecho.parentNode.parentNode
                }
                idHecho.remove()
                ajustarNameHecho(document.querySelectorAll('.hechoDenuncia'))
            }
        }
        // Fin Función para generar varios Hechos con validación.
        // ---------------------------------------------------------------------------------------------------------

    }
})