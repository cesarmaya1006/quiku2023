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
    // ---------------------------------------------------------------------------------------------------------
    // Inicio Función para generar varios anexos en una recurso con validación.
    let btncrearAnexoRecurso = document.querySelectorAll('.crearAnexoRecurso')
    btncrearAnexoRecurso.forEach(btn => btn.addEventListener('click', crearNuevoAnexoRecurso))
    let btnEliminarAnexoRecurso = document.querySelectorAll('.eliminaranexoRecurso')
    btnEliminarAnexoRecurso.forEach(btn => btn.addEventListener('click', agregarEliminarAnexoRecurso))

    function crearNuevoAnexoRecurso(e) {
        e.preventDefault()
        let recurso = e.target.parentNode.parentNode
        let nuevoAnexo = recurso.querySelectorAll('.anexoRecurso')[0].cloneNode(true)
        nuevoAnexo.querySelector('.titulo-anexoRecurso input').value = ''
        nuevoAnexo.querySelector('.descripcion-anexoRecurso input').value = ''
        nuevoAnexo.querySelector('.doc-anexoRecurso input').value = ''
        recurso.querySelector('#anexosRecursos').appendChild(nuevoAnexo)
        document.querySelectorAll('.eliminaranexoRecurso').forEach(item => item.addEventListener('click', agregarEliminarAnexoRecurso))
    }

    function agregarEliminarAnexoRecurso(e) {
        e.preventDefault()
        let recurso = e.target
        if (recurso.tagName === 'I') {
            recurso = recurso.parentNode.parentNode.parentNode.parentNode
        }else {
            recurso = recurso.parentNode.parentNode.parentNode
        }
        if (recurso.querySelectorAll('.anexoRecurso').length >= 2) {
            let idAnexo = e.target
            if (idAnexo.tagName === 'I') {
                idAnexo = idAnexo.parentNode.parentNode.parentNode
            } else {
                idAnexo = idAnexo.parentNode.parentNode
            }
            idAnexo.remove()
        }
    }
    // Fin Función para generar varios anexos en una recurso con validación.
    // ---------------------------------------------------------------------------------------------------------
    let btnRecursosGuardar = document.querySelectorAll('.guardarRecurso button')
    btnRecursosGuardar.forEach(e => {
        e.addEventListener('click', guardarRecurso)
    })
    function guardarRecurso(e){
        e.preventDefault()
        let contenedor = e.target.parentNode.parentNode
        let url = e.target.getAttribute('data_url')
        let token = e.target.getAttribute('data_token')
        let tipo_reposicion = contenedor.querySelector('.tipo_reposicion').value
        let respuestaRecurso = contenedor.querySelector('.respuestaRecurso').value
        let idPeticionRecurso = contenedor.querySelector('.id_peticionRecurso').value
        console.log(url)
        let recurso_id = 0
        if(tipo_reposicion != '' && respuestaRecurso != ''){
            let data = {
                peticion_id : idPeticionRecurso,
                tipo_reposicion_id : tipo_reposicion,
                recurso : respuestaRecurso
            }
            $.ajax({
                async:false,
                url: url,
                type: 'POST',
                headers: { 'X-CSRF-TOKEN': token },
                data: data,
                success: function(respuesta) {
                    // console.log(respuesta)
                    recurso_id = respuesta.data.id
                },
                error: function(error) {
                    console.log(error)
                }
            });
        }

        let anexosRecursos = contenedor.querySelectorAll('.anexoRecurso')
        anexosRecursos.forEach(anexo => {
            let titulo = anexo.querySelector('.titulo-anexoRecurso input').value
            let descripcion = anexo.querySelector('.descripcion-anexoRecurso input').value
            let archivo = anexo.querySelector('.doc-anexoRecurso input').files[0]
            let dataAnexo = new FormData();
            dataAnexo.append('recurso_id', recurso_id);
            dataAnexo.append('titulo', titulo);
            dataAnexo.append('descripcion', descripcion);
            dataAnexo.append('archivo', archivo);
            dataAnexo.append('_token', token);
            let urlAnexo = anexo.parentNode.parentNode.parentNode
            urlAnexo =  urlAnexo.querySelector('.guardarRecurso button').getAttribute('data_url_anexos')
            $.ajax({
                url: urlAnexo,
                type: 'POST',
                headers: { 'X-CSRF-TOKEN': token },
                data: dataAnexo,
                processData: false, 
                contentType: false,
                success: function(respuesta) {
                    // console.log(respuesta)
                },
                error: function(error) {
                    console.log(error)
                }
            });
        })
        location.reload();
    }
    // ---------------------------------------------------------------------------------------------------------
    // let verificacionRecurso = document.querySelector('.respuestaRecurso')
    // if(verificacionRecurso.value >= 1){
    //     verificacionRecurso.parentElement.querySelector('.recurso_si').setAttribute('checked','')
    //     verificacionRecurso.parentElement.querySelector('.recurso_no').setAttribute('disabled','')
    // }else{
    //     verificacionRecurso.parentElement.querySelector('.recurso_no').setAttribute('checked','')
    //     verificacionRecurso.parentElement.querySelector('.recurso-form').classList.add('d-none')
    // }
    
    $('.recurso_check').on('change', function(e) {
        let padre = e.target.parentNode.parentNode.parentNode
        console.log(padre.querySelector('.form-recursos'))
        switch (e.target.value) {
            case '1':
                padre.querySelector('.form-recursos').classList.remove('d-none');
                break;
            case '0':
                padre.querySelector('.form-recursos').classList.add('d-none');
                break;
        }
    });
})
