window.addEventListener('DOMContentLoaded', function(){
    if (document.querySelector('#id')) {
        let tipoPqr = document.querySelector('#pqr_tipo').value
        let urlDescargaRadicado = ''
        
        switch (Number(tipoPqr)) {
          case 1 :
            urlDescargaRadicado = 'pqr_radicada_pdf'
            break
          case 2 :
            urlDescargaRadicado = 'pqr_radicada_pdf'
            break
          case 3 :
            urlDescargaRadicado = 'pqr_radicada_pdf'
            break
          case 4 :
            urlDescargaRadicado = 'pqr_radicada_pdf_cuo'
            break
          case 5 :
            urlDescargaRadicado = 'pqr_radicada_pdf_sd'
            break
          case 6 :
            urlDescargaRadicado = 'pqr_radicada_pdf_ri'
            break
          case 7 :
            urlDescargaRadicado = 'felicitacion_radicada_pdf'
            break
          case 8 :
            urlDescargaRadicado = 'pqr_radicada_pdf_sfi'
            break
          case 9 :
            urlDescargaRadicado = 'sugerencia_radicada_pdf'
            break
        }
        swal({
            title: "Creada correctamente",
            content: {
                element: "a",
                attributes: {
                  href: `/${urlDescargaRadicado}/${document.querySelector('#id').value}`,
                  textContent: 'Descarga aquí'
                },
              },
            text: `Número de radicado ${document.querySelector('#radicado').value}`,
            // text: `Fecha de radicado ${document.querySelector('#fecha_radicado').value}`,
            icon: 'success',
            button: 'Cerrar',
          });
    }  
    let otro = document.querySelector('.otros-btn')
    otro.addEventListener('click', function(e){
      e.preventDefault()
      let cardOtros = document.querySelector('.card-otros') 
      if(cardOtros.classList.contains('d-none')){
        cardOtros.classList.remove('d-none')
      }else{
        cardOtros.classList.add('d-none')
      }
    }) 
})