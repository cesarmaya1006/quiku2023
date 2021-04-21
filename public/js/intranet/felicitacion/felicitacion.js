window.addEventListener('DOMContentLoaded', function () {
    // Incio Validacion envio de formulario
    let btnSubmit = document.querySelector('#fromFelicitacion')
    btnSubmit.addEventListener('submit', function(e){
        e.preventDefault()
        if(!document.querySelector('#felicitacion').value){
            alert('felicitacion');
            return
        }
        document.querySelector('#cantidadHechos').value = document.querySelectorAll('.felicitacionHecho').length
        this.submit();
    })
    // Fin Validacion envio de formulario
    
    // Inicio Función para generar varios Hechos con validación.
    if(document.querySelectorAll('.felicitacion .felicitacionHecho')){
        ajustarName(document.querySelectorAll('.felicitacionHecho'))
        let btncrearHecho = document.querySelector('#crearHecho')
        let btnEliminarHecho = document.querySelector('.eliminarHecho')
        btnEliminarHecho.addEventListener('click', agregarEliminar)
        btncrearHecho.addEventListener('click', function (e) {
            e.preventDefault()
            crearNuevoHecho()
        })

        function crearNuevoHecho() {
            let nuevoHecho = document.querySelectorAll('.felicitacionHecho')[0].cloneNode(true)
            document.querySelector('#hechos').appendChild(nuevoHecho)
            ajustarName(document.querySelectorAll('.felicitacionHecho'))
            document.querySelectorAll('.eliminarHecho').forEach(item => item.addEventListener('click', agregarEliminar))
        }
    
        function ajustarName(felicitacionHechos){
            for (let i = 0; i < felicitacionHechos.length; i++) {
                const hecho = felicitacionHechos[i];
                hecho.id = `hecho${i}`
                hecho.querySelector('.title-felicitacion label').setAttribute('for',`hecho${i}`) 
                hecho.querySelector('input').id = `hecho${i}`
                hecho.querySelector('input').name = `hecho${i}`
                hecho.querySelector('.title-felicitacion label').innerHTML= `Hecho #${i + 1}`
            }
        }

        function agregarEliminar(e) {
            e.preventDefault()
            if(document.querySelectorAll('.felicitacionHecho').length >= 2){
                let idHecho = e.target
                if (idHecho.tagName === 'I') {
                    idHecho = idHecho.parentNode.parentNode.parentNode
                }else {
                    idHecho = idHecho.parentNode.parentNode
                }
                idHecho.remove()
                ajustarName(document.querySelectorAll('.felicitacionHecho'))
            }
        }
    }
    // Fin Función para generar varios Hechos con validación.
})