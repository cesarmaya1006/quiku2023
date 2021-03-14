$(document).ready(function() {
    $("#tabla-data").on('click', '.eliminar_reg', function() {
        event.preventDefault();
        const href = $(this).attr('href');
        swal({
            title: '¿Está seguro que desea eliminar el registro?',
            text: "Esta acción no se puede deshacer!",
            icon: 'warning',
            buttons: {
                cancel: "Cancelar",
                confirm: "Aceptar"
            },
        }).then((value) => {
            if (value) {
                window.location.href = href;
            }
        });
    });
});