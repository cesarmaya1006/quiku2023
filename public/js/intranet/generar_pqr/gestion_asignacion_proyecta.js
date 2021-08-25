window.addEventListener('DOMContentLoaded', function(){
    let idPqr = document.querySelector('#id_pqr').value
    let idTarea = document.querySelector('#id_tarea').value
// Carga de cargos en selector
    if(document.querySelector('#cargo')){
        cargos = document.querySelector('#cargo')
        const url_t = cargos.getAttribute('data_url')
        $.ajax({
            url: url_t,
            type: 'GET',
            success: function(respuesta) {
                respuesta_html = '';
                respuesta_html += '<option value="">--Seleccione--</option>';
                $.each(respuesta, function(index, item) {
                    respuesta_html += '<option value="' + item['id'] + '">' + item['cargo'] + '</option>';
                });
                $('#cargo').html(respuesta_html);
            },
            error: function(e) {
                console.log(e)
            }
        });
    }
// Carga de funcionarios en selector
    $('#cargo').on('change', function(event) {
        const url_t = $(this).attr('data_url2');
        const id = $(this).val();
        var data = {
            "id": id,
        };
        $.ajax({
            url: url_t,
            type: 'GET',
            data: data,
            success: function(respuesta) {
                respuesta_html = '';
                respuesta_html += '<option value="">--Seleccione--</option>';
                $.each(respuesta, function(index, item) {
                    respuesta_html += '<option value="' + item['id'] + '">' + item['nombre1'] + ' ' + item['apellido1'] + '</option>';
                });
                $('#funcionario').html(respuesta_html);
            },
            error: function(e) {
                console.log(e)
            }
        });
    });

//  Guardar Historial PQR-tarea  
    if(document.querySelector('#guardarHistorialTarea')){
        let guardarHistorialTarea = document.querySelector('#guardarHistorialTarea')
        guardarHistorialTarea.addEventListener('click', function(e){
            e.preventDefault()
            let url = e.target.getAttribute('data_url')
            let token = e.target.getAttribute('data_token')
            let mensajeHistorial = document.querySelector('#mensaje-historial-tarea').value
            
            if (mensajeHistorial == '') {
                alert("Debe agregar un historial")
            }else{
                guardarHistorialTarea()
            }

            function guardarHistorialTarea (){
                let data = {
                    mensajeHistorial,
                    idPqr,
                    idTarea
                }
                $.ajax({
                    url: url,
                    type: 'POST',
                    headers: { 'X-CSRF-TOKEN': token },
                    data: data,
                    success: function(respuesta) {
                        location.reload();
                    },
                    error: function(error) {
                        console.log(error.responseJSON)
                    }
                });
            }
        })
    }

//  Guardar Historial PQR-peticion  
    if(document.querySelector('.guardarHistorialPeticion')){
        let HistorialPeticiones = document.querySelectorAll('.guardarHistorialPeticion')
        HistorialPeticiones.forEach(btn => btn.addEventListener('click', guardarHistorialPeticiones))
        function guardarHistorialPeticiones(btn){
            btn.preventDefault()
            let contenedorHisotrial = btn.target.parentElement.parentElement
            let url = btn.target.getAttribute('data_url')
            let token = btn.target.getAttribute('data_token')
            let mensajeHistorial = contenedorHisotrial.querySelector('.mensaje-historial-peticion').value
            let idPeticion = contenedorHisotrial.querySelector('.id_peticion').value
            if (mensajeHistorial == '') {
                alert("Debe agregar un historial")
            }else{
                guardarHistorialPeticion()
            }
    
            function guardarHistorialPeticion (){
                let data = {
                    mensajeHistorial,
                    idPqr,
                    idPeticion
                }
                $.ajax({
                    url: url,
                    type: 'POST',
                    headers: { 'X-CSRF-TOKEN': token },
                    data: data,
                    success: function(respuesta) {
                        location.reload();
                    },
                    error: function(error) {
                        console.log(error.responseJSON)
                    }
                });
            }
        }   
    }

// Guardar asignar petición a funcionario
    if(document.querySelector('#asignacion_peticion_guardar')){
        let asignacionPeticion = document.querySelector('#asignacion_peticion_guardar')
        asignacionPeticion.addEventListener('click', function(e){
            e.preventDefault()
            let url = e.target.getAttribute('data_url')
            let token = e.target.getAttribute('data_token')
            let peticion = document.querySelector('#peticion').value
            let funcionario = document.querySelector('#funcionario').value
            if (peticion == '' || cargo == '' || funcionario == '' ) {
                alert("Debe dilegenciar todos los campos del formulario")
            }else{
                guardarAsignacionPeticion()
            }
            function guardarAsignacionPeticion (){
                let data = {
                    peticion,
                    funcionario,
                    idPqr
                }
                $.ajax({
                    url: url,
                    type: 'POST',
                    headers: { 'X-CSRF-TOKEN': token },
                    data: data,
                    success: function(respuesta) {
                        location.reload();
                    },
                    error: function(error) {
                        console.log(error.responseJSON)
                    }
                });
            }
        })
    }

// Guardar prioridad pqr
    if(document.querySelector('#prioridad_guardar')){
        let prioridadGuardar = document.querySelector('#prioridad_guardar')
        prioridadGuardar.addEventListener('click', function(e){
            e.preventDefault()
            let url = e.target.getAttribute('data_url')
            let token = e.target.getAttribute('data_token')
            let prioridad = document.querySelector('#prioridad').value
            if (prioridad == '' ) {
                alert("Debe dilegenciar todos los campos del formulario")
            }else{
                guardarPrioridad()
            }
            function guardarPrioridad (){
                let data = {
                    prioridad,
                    idPqr
                }
                $.ajax({
                    url: url,
                    type: 'POST',
                    headers: { 'X-CSRF-TOKEN': token },
                    data: data,
                    success: function(respuesta) {
                        location.reload();
                    },
                    error: function(error) {
                        console.log(error.responseJSON)
                    }
                });
            }
        })
    }

// Cargar estado prorroga
    if(document.querySelector('.respuestaProrroga')){
        let verificacionProrroga = document.querySelector('.respuestaProrroga')
        if(verificacionProrroga.value == 0){
            verificacionProrroga.parentElement.querySelector('.prorroga_no').setAttribute('checked','')
            verificacionProrroga.parentElement.querySelector('.contentProrroga').classList.add('d-none')
        }
    }
// Ajuste visual para formulario prorroga 
    $('input[type=radio][name=prorroga]').on('change', function() {
        switch ($(this).val()) {
            case '1':
                $('.contentProrroga').removeClass('d-none');
                break;
            case '0':
                $('.contentProrroga').addClass('d-none');
                break;
        }
    });
// Guardar prorroga 
    if(document.querySelector('#guardarProrroga')){
        let guardarProrroga = document.querySelector('#guardarProrroga')
        guardarProrroga.addEventListener('click', function(e){
            e.preventDefault()
            let url = e.target.getAttribute('data_url')
            let token = e.target.getAttribute('data_token')
            let plazo_prorroga = document.querySelector('#plazo_prorroga').value
            let prorroga_pdf = document.querySelector('#prorroga_pdf').value
            let plazoRecurso = 0
            if(document.querySelector('.plazoRecurso')){
                plazoRecurso = document.querySelector('.plazoRecurso').value
            }
    
            if(plazo_prorroga != '' && prorroga_pdf != ''){
                let data = {
                    prorroga : 1,
                    plazo_prorroga,
                    prorroga_pdf,
                    idPqr,
                    plazoRecurso
                }
                $.ajax({
                    url: url,
                    type: 'POST',
                    headers: { 'X-CSRF-TOKEN': token },
                    data: data,
                    success: function(respuesta) {
                        location.reload();
        
                    },
                    error: function(error) {
                        console.log(error)
                    }
                });
            }else{
                alert('Debe diligenciar todos los campos del formulario')
            }
        })
    }

//Guardar respuesta anexo  
    if(document.querySelector('.btn-pqr-anexo')){
        let btnRespuesta = document.querySelector('.btn-pqr-anexo')
        btnRespuesta.addEventListener('click', function(e){
            e.preventDefault
            let contenedorPadre = btnRespuesta.parentElement.parentElement.parentElement
            let url = e.target.getAttribute('data_url')
            let url2 = e.target.getAttribute('data_url2')
            let url3 = e.target.getAttribute('data_url3')
            let token = e.target.getAttribute('data_token')
            let mensajeHistorial = contenedorPadre.querySelector('.mensaje-historial-tarea').value
            let titulo = contenedorPadre.querySelector('.titulo').value
            let descripcion = contenedorPadre.querySelector('.descripcion').value
            let archivo = contenedorPadre.querySelector('.anexo').files[0]
            let dataAnexo = new FormData();
            dataAnexo.append('pqr_id', idPqr);
            dataAnexo.append('titulo', titulo);
            dataAnexo.append('descripcion', descripcion);
            dataAnexo.append('archivo', archivo);
            dataAnexo.append('idTarea', idTarea);
            dataAnexo.append('_token', token);
            if (titulo != '' && archivo  && mensajeHistorial != '' && idPqr != '') {
                let data = {
                    idTarea,
                    mensajeHistorial,
                    idPqr
                }
                $.ajax({
                    async:false,
                    url: url,
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

                $.ajax({
                    url: url2,
                    type: 'POST',
                    headers: { 'X-CSRF-TOKEN': token },
                    data: data,
                    success: function(respuesta) {
                        // console.log(respuesta)
                    },
                    error: function(error) {
                        console.log(error.responseJSON)
                    }
                });
                $.ajax({
                    url: url3,
                    type: 'POST',
                    headers: { 'X-CSRF-TOKEN': token },
                    data: data,
                    success: function(respuesta) {
                        window.location = "/admin/index"
                    },
                    error: function(error) {
                        console.log(error.responseJSON)
                    }
                });
            }else{
                alert('Debe diligenciar todos los campos del formulario')
            }
        })
    }

// Guardar estado 
       if(document.querySelector('.btn-estado')){
        let btnEstados = document.querySelectorAll('.btn-estado')
        btnEstados.forEach(btn=> btn.addEventListener('click', guardarEstado))

        function guardarEstado(btn){
            btn.preventDefault()
            let btnE = btn.target 
            if (btnE.tagName === 'I') {
                padreEstado = btnE.parentElement.parentElement.parentElement.parentElement.parentElement.parentElement.parentElement
                btnE = btnE.parentElement.parentElement
            }else {
                padreEstado = btnE.parentElement.parentElement.parentElement.parentElement.parentElement
            }
            let url = btnE.getAttribute('data_url')
            let token = btnE.getAttribute('data_token')
            let estado = padreEstado.querySelector('.estadoPeticion').value
            let id_peticion = padreEstado.querySelector('.id_peticion').value
            let data = {
                estado,
                id_peticion
            }
            $.ajax({
                url: url,
                type: 'POST',
                headers: { 'X-CSRF-TOKEN': token },
                data: data,
                success: function(respuesta) {
                    location.reload();
    
                },
                error: function(error) {
                    console.log(error)
                }
            });
        }
    }
})

