window.addEventListener('DOMContentLoaded', function () {
    // Incio Validacion envio de formulario
    let btnSubmit = document.querySelector('#fromSolicitudDocInfo')
    btnSubmit.addEventListener('submit', function(e){
        e.preventDefault()
        // if(!document.querySelector('#sugerencia').value){
        //     alert('Sugerencia');
        //     return
        // }
        // document.querySelector('#cantidadHechos').value = document.querySelectorAll('.sugerencia .sugerenciaHecho').length
        document.querySelector('#cantidadAnexosSolicitud').value = document.querySelectorAll('.solicitudDocInfo .anexosSolicitud').length
        this.submit();
    })
    // Fin Validacion envio de formulario

    // Inicio Función para generar varios Anexos con validación.
    if(document.querySelectorAll('.solicitudDocInfo .anexosSolicitud')){
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
                console.log(anexosolicitud)
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
            if(document.querySelectorAll('.anexosSolicitud').length >= 2){
                let idHecho = e.target
                if (idHecho.tagName === 'I') {
                    idHecho = idHecho.parentNode.parentNode.parentNode
                }else {
                    idHecho = idHecho.parentNode.parentNode
                }
                idHecho.remove()
                ajustarName(document.querySelectorAll('.anexosSolicitud'))
            }
        }
    }
    // Fin Función para generar varios Anexos con validación.
})