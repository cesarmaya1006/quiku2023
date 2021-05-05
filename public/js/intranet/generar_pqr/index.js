window.addEventListener('DOMContentLoaded', function(){
    if (document.querySelector('#id')) {
        swal({
            title: "Creada correctamente",
            content: {
                element: "a",
                attributes: {
                  href: `/download/${document.querySelector('#pqr_tipo').value}/${document.querySelector('#id').value}`,
                  textContent: 'Descarga aquí'
                },
              },
            text: `Número de radicado ${document.querySelector('#radicado').value}`,
            icon: 'success',
            button: 'Cerrar',
          });
    }   
})