window.addEventListener('DOMContentLoaded', function () {
    // Incio Validacion envio de formulario
    let btnSubmit = document.querySelector('#fromSugerencia')
    btnSubmit.addEventListener('submit', function(e){
        e.preventDefault()
        if(!document.querySelector('#sugerencia').value){
            alert('Sugerencia');
            return
        }
        // console.log((document.querySelectorAll('.sugerencia .sugerenciaHecho').length))
        // console.log((document.querySelectorAll('.sugerencia .anexoHecho').length))
        console.log(document.querySelector('#cantidadHechos').value)
        console.log(document.querySelector('#cantidadAnexosHechos').value)
        document.querySelector('#cantidadHechos').value = document.querySelectorAll('.sugerencia .sugerenciaHecho').length
        document.querySelector('#cantidadAnexosHechos').value = document.querySelectorAll('.sugerencia .anexoHecho').length
        
        console.log(document.querySelector('#cantidadHechos').value)
        console.log(document.querySelector('#cantidadAnexosHechos').value)
        // cantidadHechos
        // cantidadAnexosHechos
        this.submit();
    })
    // Incio Validacion envio de formulario
    
    // Inicio Función para generar varios Hechos con validación.
    if(document.querySelectorAll('.sugerencia .sugerenciaHecho')){
        ajustarName(document.querySelectorAll('.sugerenciaHecho'))
        let btncrearHecho = document.querySelector('#crearHecho')
        let btnEliminarHecho = document.querySelector('.eliminarHecho')
        btnEliminarHecho.addEventListener('click', agregarEliminar)
        btncrearHecho.addEventListener('click', function (e) {
            e.preventDefault()
            crearNuevoHecho()
        })

        function crearNuevoHecho() {
            let nuevoHecho = document.querySelectorAll('.sugerenciaHecho')[0].cloneNode(true)
            document.querySelector('#hechos').appendChild(nuevoHecho)
            ajustarName(document.querySelectorAll('.sugerenciaHecho'))
            document.querySelectorAll('.eliminarHecho').forEach(item => item.addEventListener('click', agregarEliminar))
        }
    
        function ajustarName(sugerenciaHechos){
            for (let i = 0; i < sugerenciaHechos.length; i++) {
                const hecho = sugerenciaHechos[i];
                hecho.id = `hecho${i}`
                hecho.querySelector('.title-sugerencias label').setAttribute('for',`hecho${i}`) 
                hecho.querySelector('input').id = `hecho${i}`
                hecho.querySelector('input').name = `hecho${i}`
                hecho.querySelector('.title-sugerencias label').innerHTML= `Hecho #${i + 1}`
            }
        }

        function agregarEliminar(e) {
            e.preventDefault()
            if(document.querySelectorAll('.sugerenciaHecho').length >= 2){
                let idHecho = e.target
                if (idHecho.tagName === 'I') {
                    idHecho = idHecho.parentNode.parentNode.parentNode
                }else {
                    idHecho = idHecho.parentNode.parentNode
                }
                idHecho.remove()
                ajustarName(document.querySelectorAll('.sugerenciaHecho'))
            }
        }
    }
    // Fin Función para generar varios Hechos con validación.

    // Inicio Función para generar varios Anexos con validación.
    if(document.querySelectorAll('.sugerencia .anexoHecho')){
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
                anexohecho.querySelector('.titulo-anexoSugerencias label').setAttribute('for',`titulo${i}`) 
                anexohecho.querySelector('.titulo-anexoSugerencias input').id = `titulo${i}`
                anexohecho.querySelector('.titulo-anexoSugerencias input').name = `titulo${i}`
                anexohecho.querySelector('.descripcion-anexoSugerencias input').id = `descripcion${i}`
                anexohecho.querySelector('.descripcion-anexoSugerencias input').name = `descripcion${i}`
                anexohecho.querySelector('.doc-anexoSugerencias input').id = `documentos${i}`
                anexohecho.querySelector('.doc-anexoSugerencias input').name = `documentos${i}`
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