window.addEventListener('DOMContentLoaded', function(){
    let idAuto = document.querySelector('.id_auto').value
    let idTarea = document.querySelector('.id_tarea').value
// Carga de cargos en selector
    if(document.querySelector('.cargo')){
        cargos = document.querySelector('.cargo')
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
                $('.cargo').html(respuesta_html);
            },
            error: function(e) {
                console.log(e)
            }
        });
    }
// Carga de funcionarios en selector
    $('.cargo').on('change', function(event) {
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
                $('.funcionario').html(respuesta_html);
            },
            error: function(e) {
                console.log(e)
            }
        });
    });

//  Guardar Historial tutela - tarea  
    if(document.querySelector('.guardarHistorialTarea')){
        let guardarHistorialTarea = document.querySelector('.guardarHistorialTarea')
        guardarHistorialTarea.addEventListener('click', function(e){
            e.preventDefault()
            let url = e.target.getAttribute('data_url')
            let token = e.target.getAttribute('data_token')
            let mensajeHistorial = document.querySelector('.mensaje-historial-tarea').value
            let idTarea = document.querySelector('.id_tarea').value
            if (mensajeHistorial == '') {
                alert("Debe agregar un historial")
            }else{
                guardarHistorialTarea()
            }

            function guardarHistorialTarea (){
                let data = {
                    mensajeHistorial,
                    idAuto,
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

//  Guardar Historial tutela - hecho  
    if(document.querySelector('.guardarHistorialHecho')){
        let HistorialHecho = document.querySelectorAll('.guardarHistorialHecho')
        HistorialHecho.forEach(btn => btn.addEventListener('click', guardarHistorialHecho))
        function guardarHistorialHecho(btn){
            btn.preventDefault()
            let contenedorHisotrial = btn.target.parentElement.parentElement
            let url = btn.target.getAttribute('data_url')
            let token = btn.target.getAttribute('data_token')
            let mensajeHistorial = contenedorHisotrial.querySelector('.mensaje-historial-hecho').value
            let idHecho = contenedorHisotrial.querySelector('.id_hecho').value
            if (mensajeHistorial == '') {
                alert("Debe agregar un historial")
            }else{
                guardarHistorialPeticion()
            }
    
            function guardarHistorialPeticion (){
                let data = {
                    mensajeHistorial,
                    idAuto,
                    idHecho
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

//  Guardar Historial tutela - pretension  
    if(document.querySelector('.guardarHistorialPretension')){
        let HistorialPretension = document.querySelectorAll('.guardarHistorialPretension')
        HistorialPretension.forEach(btn => btn.addEventListener('click', guardarHistorialPretension))
        function guardarHistorialPretension(btn){
            btn.preventDefault()
            let contenedorHisotrial = btn.target.parentElement.parentElement
            let url = btn.target.getAttribute('data_url')
            let token = btn.target.getAttribute('data_token')
            let mensajeHistorial = contenedorHisotrial.querySelector('.mensaje-historial-pretension').value
            let idPretension = contenedorHisotrial.querySelector('.id_pretension').value
            if (mensajeHistorial == '') {
                alert("Debe agregar un historial")
            }else{
                guardarHistorialPeticion()
            }
    
            function guardarHistorialPeticion (){
                let data = {
                    mensajeHistorial,
                    idAuto,
                    idPretension
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

// Guardar asignar hecho a funcionario
    if(document.querySelector('.asignacion_hecho_guardar')){
        let asignacionHecho = document.querySelector('.asignacion_hecho_guardar')
        asignacionHecho.addEventListener('click', function(e){
            e.preventDefault()
            let padreContenedor = e.target.parentElement.parentElement
            let url = e.target.getAttribute('data_url')
            let token = e.target.getAttribute('data_token')
            let hecho = padreContenedor.querySelector('.hecho').value
            let funcionario = padreContenedor.querySelector('.funcionario').value
            let cargo = padreContenedor.querySelector('.cargo').value
            if (hecho == '' || cargo == '' || funcionario == '' ) {
                alert("Debe dilegenciar todos los campos del formulario")
            }else{
                guardarAsignacionPeticion()
            }
            function guardarAsignacionPeticion (){
                let data = {
                    hecho,
                    funcionario,
                    idAuto
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

// Guardar asignar pretension a funcionario
    if(document.querySelector('.asignacion_pretension_guardar')){
        let asignacionPretension = document.querySelector('.asignacion_pretension_guardar')
        asignacionPretension.addEventListener('click', function(e){
            e.preventDefault()
            let padreContenedor = e.target.parentElement.parentElement
            let url = e.target.getAttribute('data_url')
            let token = e.target.getAttribute('data_token')
            let pretension = padreContenedor.querySelector('.pretension').value
            let funcionario = padreContenedor.querySelector('.funcionario').value
            let cargo = padreContenedor.querySelector('.cargo').value
            if (pretension == '' || cargo == '' || funcionario == '' ) {
                alert("Debe dilegenciar todos los campos del formulario")
            }else{
                guardarAsignacionPeticion()
            }
            function guardarAsignacionPeticion (){
                let data = {
                    pretension,
                    funcionario,
                    idAuto
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

// Guardar prioridad tutela
    if(document.querySelector('.prioridad_guardar')){
        let prioridadGuardar = document.querySelector('.prioridad_guardar')
        prioridadGuardar.addEventListener('click', function(e){
            e.preventDefault()
            let url = e.target.getAttribute('data_url')
            let token = e.target.getAttribute('data_token')
            let prioridad = document.querySelector('.prioridad').value
            if (prioridad == '' ) {
                alert("Debe dilegenciar todos los campos del formulario")
            }else{
                guardarPrioridad()
            }
            function guardarPrioridad (){
                let data = {
                    prioridad,
                    idAuto
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

//Guardar respuesta tutela  
    if(document.querySelector('.btn-tutela')){
        let btnRespuesta = document.querySelector('.btn-tutela')
        btnRespuesta.addEventListener('click', function(e){
            e.preventDefault
            let contenedorPadre = btnRespuesta.parentElement.parentElement.parentElement
            let url2 = e.target.getAttribute('data_url2')
            let url3 = e.target.getAttribute('data_url3')
            let token = e.target.getAttribute('data_token')
            let mensajeHistorial = contenedorPadre.querySelector('.mensaje-historial-tarea').value
            if (mensajeHistorial != '' && idAuto != '') {
                let data = {
                    idTarea,
                    mensajeHistorial,
                    idAuto
                }
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
                        // console.log(respuesta)
                        window.location = "/admin/gestion"
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

// Guardar estado hechos
    if(document.querySelector('.btn-estado-hecho')){
        let btnEstados = document.querySelectorAll('.btn-estado-hecho')
        btnEstados.forEach(btn=> btn.addEventListener('click', guardarEstado))

        function guardarEstado(btn){
            btn.preventDefault()
            let btnE = btn.target 
            if (btnE.tagName === 'I') {
                padreEstado = btnE.parentElement.parentElement.parentElement.parentElement
                btnE = btnE.parentElement.parentElement
            }else {
                padreEstado = btnE.parentElement.parentElement
            }
            let url = btnE.getAttribute('data_url')
            let token = btnE.getAttribute('data_token')
            let estado = padreEstado.querySelector('.estadoHecho').value
            let id_hecho = padreEstado.querySelector('.id_hecho').value
            let data = {
                estado,
                id_hecho
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

// Guardar estado pretensiones
    if(document.querySelector('.btn-estado-pretension')){
        let btnEstados = document.querySelectorAll('.btn-estado-pretension')
        btnEstados.forEach(btn=> btn.addEventListener('click', guardarEstado))

        function guardarEstado(btn){
            btn.preventDefault()
            let btnE = btn.target 
            if (btnE.tagName === 'I') {
                padreEstado = btnE.parentElement.parentElement.parentElement.parentElement
                btnE = btnE.parentElement.parentElement
            }else {
                padreEstado = btnE.parentElement.parentElement
            }
            let url = btnE.getAttribute('data_url')
            let token = btnE.getAttribute('data_token')
            let estado = padreEstado.querySelector('.estadoPretension').value
            let id_pretension = padreEstado.querySelector('.id_pretension').value
            let data = {
                estado,
                id_pretension
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

//Guardar resuelve tutela  
    if(document.querySelector('.btn-tutela-resuelve')){
        let btnResuelve = document.querySelector('.btn-tutela-resuelve')
        btnResuelve.addEventListener('click', function(e){
            e.preventDefault
            let contenedorPadre = btnResuelve.parentElement.parentElement.parentElement
            let url = e.target.getAttribute('data_url')
            let token = e.target.getAttribute('data_token')
            let mensajeResuelve = contenedorPadre.querySelector('.mensaje-resuelve').value
            if (mensajeResuelve != '' && idAuto != '') {
                let data = {
                    mensajeResuelve,
                    idAuto
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
                alert('Debe diligenciar el campo del formulario')
            }
        })
    }

// //Eliminar resuelve  
//     if(document.querySelectorAll('.eliminarResuelve')){
//         let btnEliminaResuelves = document.querySelectorAll('.eliminarResuelve')
//         btnEliminaResuelves.forEach(btnEliminar => {
//             btnEliminar.addEventListener('click', function(btn){
//                 btn.preventDefault
//                 let btnElim = btn.target
//                 if (!btnElim.classList.contains('.eliminarResuelve')) {
//                     btnElim = btnElim.parentNode
//                 }
//                 let url = btnElim.getAttribute('data_url')
//                 let token = btnElim.getAttribute('data_token')
//                 let value = btnElim.value
//                 let data = {
//                     value
//                 }
//                 swal({
//                     title: "¿Desea eliminar recurso?",
//                     icon: "warning",
//                     buttons: ["No", "Si"],
//                     dangerMode: true,
//                 })
//                 .then((value) => {
//                     if (value) {
//                         $.ajax({
//                             url: url,
//                             type: 'POST',
//                             headers: { 'X-CSRF-TOKEN': token },
//                             data: data,
//                             success: function(respuesta) {
//                                 setTimeout(function(){
//                                     location.reload();
//                                 }, 3000);
//                             },
//                             error: function(error) {
//                             }
//                         });
//                     }
//                 });
//             })
//         })
//     }

// //Editar resuelve  
//     if(document.querySelectorAll('.editarResuelve')){
//         let resuelves = document.querySelectorAll('.editarResuelve')
//         resuelves.forEach(resuelve => {
//             resuelve.addEventListener('click', editarResuelve)
//         })
//         function editarResuelve(resuelve){
//             let resuelveBtn = resuelve.target
//             if (resuelveBtn.classList.contains('editarResuelve-i')) {
//                 resuelveBtn = resuelve.target.parentNode
//             }else {
//                 resuelveBtn = resuelve.target
//             }
//             let tdResuelve = resuelveBtn.parentElement.parentElement.parentElement
//             let contenidoAnteriorResuelve = tdResuelve.querySelector('.contenido-resuelve input').value
//             let valueResuelve = tdResuelve.querySelector('.editarResuelve').value
//             let modalResuelveEditar = document.querySelector('.bd-resuelve')
//             let textareaResuelveEditar = modalResuelveEditar.querySelector('.note-editable')
//             let btnGuardarResuelve = modalResuelveEditar.querySelector('.editarResuelveGuardar')
//             textareaResuelveEditar.innerHTML = contenidoAnteriorResuelve
//             btnGuardarResuelve.value = valueResuelve
//         }
//     }

// //Guardar Editar resuelve  
//     if(document.querySelector('.editarResuelveGuardar')){
//         let btnResuelve = document.querySelector('.editarResuelveGuardar')
//         btnResuelve.addEventListener('click', function(resuelve){
//             resuelve.preventDefault()
//             let url = resuelve.target.getAttribute('data_url')
//             let token = resuelve.target.getAttribute('data_token')
//             let contenidoResuelve = resuelve.target.parentElement.parentElement
//             let resuelveNuevo = contenidoResuelve.querySelector('.mensaje-resuelve-editar').value
//             let value = contenidoResuelve.querySelector('.editarResuelveGuardar').value
//             let data = {
//                 value,
//                 resuelveNuevo
//             }
//             $.ajax({
//                 url: url,
//                 type: 'POST',
//                 headers: { 'X-CSRF-TOKEN': token },
//                 data: data,
//                 success: function(respuesta) {
//                     location.reload();
//                 },
//                 error: function(error) {
//                     console.log(error)
//                 }
//             });
//         })
//     }

// //Editar orden resuelve  
//     if(document.querySelector('.btn-ordenar')){
//         let btnOrdenar = document.querySelector('.btn-ordenar')
//         btnOrdenar.addEventListener('click', function(btn){
//             btn.preventDefault()
//             let orden = document.querySelector('.orden-resuelve')
//             let ordenEditar = document.querySelector('.editar-orden-resuelve')
//             let btnGuardar = document.querySelector('.btn-ordenar-guardar')
//             if (orden.classList.contains('d-none')) {
//                 orden.classList.remove('d-none')
//                 ordenEditar.classList.add('d-none')
//                 btnGuardar.classList.add('d-none')
//             }else{
//                 btnGuardar.classList.remove('d-none')
//                 ordenEditar.classList.remove('d-none')
//                 orden.classList.add('d-none')
//             }
//         })
//     }

// //Guardar orden resuelve  
//     if(document.querySelector('.btn-ordenar-guardar')){
//         let btnGuardarOrden = document.querySelector('.btn-ordenar-guardar')
//         btnGuardarOrden.addEventListener('click', function(btn){
//             btn.preventDefault()
//             let url = btn.target.getAttribute('data_url')
//             let token = btn.target.getAttribute('data_token')
//             let ordenEditar = document.querySelector('.editar-orden-resuelve')
//             let trs = ordenEditar.querySelectorAll('tr')
//             let dataOrden = []
//             trs.forEach((tr, key) => {
//                 dataOrden.push(tr.querySelector('.select-orden').value)
//             })
//             dataOrden.forEach((orden, key )=>{
//                 let index = key + 1
//                 if(index != dataOrden.find(item => item == index)){
//                     alert("¡Error! El consecutivo de orden no puede estar duplicado.")
//                 }
//             })
//             trs.forEach((tr) => {
//                 let data = {
//                     orden : tr.querySelector('.select-orden').value,
//                     id : tr.querySelector('.editarResuelve').value
//                 }
//                 $.ajax({
//                     url: url,
//                     type: 'POST',
//                     headers: { 'X-CSRF-TOKEN': token },
//                     data: data,
//                     success: function(respuesta) {
//                         // console.log(respuesta)
//                     },
//                     error: function(error) {
//                         console.log(error)
//                     }
//                 });
//             })
//             location.reload();
//         })
//     }

//==========================================================================
    $(document).ready(function() {
        $('.mensaje-resuelve').summernote({
            tabsize: 2,
            height: 120,
            toolbar: [
              ['font', ['bold', 'underline', 'italic', 'clear' ]],
              ['color', ['color']],
              ['para', ['ul', 'ol', 'paragraph']],
              ['table', ['table']],
              ['insert', ['link', 'picture']],
            ]
          })
    });
//==========================================================================
    $(document).ready(function() {
        $('.mensaje-resuelve-editar').summernote({
            tabsize: 2,
            height: 320,
            toolbar: [
              ['font', ['bold', 'underline', 'italic', 'clear' ]],
              ['color', ['color']],
              ['para', ['ul', 'ol', 'paragraph']],
              ['table', ['table']],
              ['insert', ['link', 'picture']],
            ]
          })
    });
})

