/*
 * JS
 * Patrociname Functions
 */

$(document).ready(function () {
    //
    if ('#cont-chart-01') {
        console.log('Render Charts');

        $.ajax({
            // Envío
            url: '?controller=admin&action=getInfoChart_01',
            method: 'POST',
            data: {},
            dataType: 'text',
            //
            success: function (data) {
                var dataChart01 = JSON.parse(data);
                //console.log(dataChart01);
                //
                // -- Rellenar Chart
                var ctx = $('#myChart');
                //
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        //labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                        labels: dataChart01.label,
                        datasets: [{
                            label: 'Número de SponsorBundles Creados',
                            //data: [12, 19, 3, 5, 2, 3],
                            data: dataChart01.values,
                            backgroundColor: 'rgba(202, 174, 56, 1)',
                            //[
                            //'rgba(255, 99, 132, 0.2)',
                            //'rgba(54, 162, 235, 0.2)',
                            //'rgba(255, 206, 86, 0.2)',
                            //'rgba(75, 192, 192, 0.2)',
                            //'rgba(153, 102, 255, 0.2)',
                            //'rgba(255, 159, 64, 0.2)'
                            //],
                            borderColor: 'none',
                                //[
                                //'rgba(255, 99, 132, 1)',
                                //'rgba(54, 162, 235, 1)',
                                //'rgba(255, 206, 86, 1)',
                                //'rgba(75, 192, 192, 1)',
                                //'rgba(153, 102, 255, 1)',
                                //'rgba(255, 159, 64, 1)'
                                //],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                }); // End MyChart
            } // Success Ajax
        }); // End Ajax


    } // End if (#cont-chart-01)
    //
});

