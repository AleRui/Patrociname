/*
 * JS
 * Patrociname Functions
 */

$(document).ready(function () {
    //
    console.log('document ready');
    //
    if ('#cont-chart-01') {
        console.log('Existe el contenedor de Charts')

        $.ajax({
            // Envío
            url: '?controller=admin&action=getInfoChart_01',
            method: 'POST',
            data: {},
            dataType: 'text',
            //
            // Respuesta
            success: function (data) {
                console.log(data);
                $('#alertaRegisterMailSearcher').html(data);
            }
        });
    }
    //
    // Charts
    if ($("#cont-chart-01").length) {
        console.log('Funcionando Charts');
    }
});

