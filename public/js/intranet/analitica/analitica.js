function cargarRender() {

}
$(document).ready(function() {
    //==========================================================================
    $('#cargarCanvas').on('change', function(event) {
        const url_t = $(this).attr('data_url');
        const busqueda = $(this).val();
        var data = {
            "busqueda": busqueda,
        };
        if (busqueda == 'tipopqr') {
            var titulo = 'Tiempo medio de respuesta por tipo de PQR';
        } else if (busqueda == 'motivos') {
            var titulo = 'Tiempo medio de respuesta por motivo de PQR';
        }
        $.ajax({
            url: url_t,
            type: 'GET',
            data: data,
            success: function(respuesta) {
                console.log(respuesta);
                var dataPoints = [];
                var chart = new CanvasJS.Chart("analiticaAjax", {
                    title: {
                        text: titulo
                    },
                    animationEnabled: true,
                    data: [{
                        type: "column",
                        dataPoints: respuesta,
                    }]
                });

                chart.render();
            },
            error: function() {

            }
        });

    });
    //==========================================================================


});
/*
const url_t = $(this).attr('data_url');

    var dataPoints = [];
    var chart = new CanvasJS.Chart("analiticaAjax", {
        title: {
            text: "Rendering Chart with dataPoints from External JSON"
        },
        data: [{
            type: "line",
            dataPoints: dataPoints,
        }]
    });
    $.getJSON("https://canvasjs.com/services/data/datapoints.php?xstart=1&ystart=10&length=100&type=json",
        function(data) {
            $.each(data, function(key, value) {
                dataPoints.push({
                    x: value[0],
                    y: parseInt(value[1])
                });
            });
            chart.render();
        });


        */