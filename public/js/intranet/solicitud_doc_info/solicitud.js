window.addEventListener('DOMContentLoaded', function () {
    // Incio Validacion envio de formulario
    let btnSubmit = document.querySelector('#fromSolicitudDocInfo')
    btnSubmit.addEventListener('submit', function(e){
        e.preventDefault()
        // if(!document.querySelector('#sugerencia').value){
        //     alert('Sugerencia');
        //     return
        // }
        document.querySelector('#cantidadAnexosSolicitud').value = document.querySelectorAll('.anexosolicitud').length
        // this.submit();
    })
    // Fin Validacion envio de formulario

    // Inicio Función para generar varios Anexos con validación.
    if(document.querySelectorAll('.solicitudDocInfo .anexosolicitud')){
        ajustarName(document.querySelectorAll('.anexosolicitud'))
        let btncrearAnexo = document.querySelector('#crearAnexo')
        let btnEliminarAnexo = document.querySelector('.eliminaranexoSolicitud')
        btnEliminarAnexo.addEventListener('click', agregarEliminar)
        btncrearAnexo.addEventListener('click', function (e) {
            e.preventDefault()
            crearNuevoAnexo()
        })

        function crearNuevoAnexo() {
            let nuevoAnexoHecho = document.querySelectorAll('.anexosolicitud')[0].cloneNode(true)
            document.querySelector('#anexosSolicitud').appendChild(nuevoAnexoHecho)
            ajustarName(document.querySelectorAll('.anexosolicitud'))
            document.querySelectorAll('.eliminaranexoSolicitud').forEach(item => item.addEventListener('click', agregarEliminar))
        }
    
        function ajustarName(anexosSolicitud){
            for (let i = 0; i < anexosSolicitud.length; i++) {
                const anexosolicitud = anexosSolicitud[i];
                anexosolicitud.id = `anexosSolicitud${i}`
                anexosolicitud.querySelector('.titulo-anexoSolicitud label').setAttribute('for',`titulo${i}`) 
                anexosolicitud.querySelector('.titulo-anexoSolicitud input').id = `titulo${i}`
                anexosolicitud.querySelector('.titulo-anexoSolicitud input').name = `titulo${i}`
                anexosolicitud.querySelector('.descripcion-anexoSolicitud input').id = `descripcion${i}`
                anexosolicitud.querySelector('.descripcion-anexoSolicitud input').name = `descripcion${i}`
                anexosolicitud.querySelector('.doc-anexoSolicitud input').id = `documentos${i}`
                anexosolicitud.querySelector('.doc-anexoSolicitud input').name = `documentos${i}`
                anexosolicitud.querySelector('.titulo-anexo h6').innerHTML= `Anexo #${i + 1}`
            }
        }

        function agregarEliminar(e) {
            e.preventDefault()
            if(document.querySelectorAll('.anexosolicitud').length >= 2){
                let idAnexo = e.target
                if (idAnexo.tagName === 'I') {
                    idAnexo = idAnexo.parentNode.parentNode.parentNode
                }else {
                    idAnexo = idAnexo.parentNode.parentNode
                }
                idAnexo.remove()
                ajustarName(document.querySelectorAll('.anexosolicitud'))
            }
        }
    }
    // Fin Función para generar varios Anexos con validación.
    crearSolicitud
    let btncrearSolicitud = document.querySelector('#crearSolicitud')
    // let btnEliminarAnexo = document.querySelector('.eliminaranexoSolicitud')
    // btnEliminarAnexo.addEventListener('click', agregarEliminar)
    btncrearSolicitud.addEventListener('click', function (e) {
        e.preventDefault()
        crearNuevaSolicitud()
    })

    function crearNuevaSolicitud() {
        let nuevaSolicitud = document.querySelectorAll('.solicitud')[0].cloneNode(true)
        document.querySelector('#solicitudes').appendChild(nuevaSolicitud)
        // ajustarName(document.querySelectorAll('.anexosolicitud'))
        // document.querySelectorAll('.eliminaranexoSolicitud').forEach(item => item.addEventListener('click', agregarEliminar))
    }
})