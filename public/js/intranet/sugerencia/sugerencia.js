window.addEventListener('DOMContentLoaded', function () {
    if(document.querySelectorAll('.sugerencia .sugerenciaHecho')){
        ajustarName(document.querySelectorAll('.sugerenciaHecho'))
        let btncrearHecho = document.querySelector('#crearHecho')
        let btnEliminarHecho = document.querySelector('.eliminarHecho')
        btnEliminarHecho.addEventListener('click', agregarEliminar)
        let btnSubmit = document.querySelector('#fromSugerencia')
        btnSubmit.addEventListener('submit', function(e){
            e.preventDefault()
            if(!document.querySelector('#sugerencia').value){
                alert('Sugerencia');
                return
            }
            this.submit();
        })
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
})