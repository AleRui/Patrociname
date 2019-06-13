/*
 * JS
 * Patrociname Functions
 */

$(document).ready(function () {

    if ('#cont-chart-01') {

        $.ajax({

            url: '?controller=admin&action=getInfoChart_01',
            method: 'POST',
            data: {},
            dataType: 'text',

            success: function (data) {
                let dataChart01 = JSON.parse(data);

                // -- Rellenar Chart
                let ctx = $('#myChart');

                let myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: dataChart01.label,
                        datasets: [{
                            label: 'Número de SponsorBundles Creados',
                            data: dataChart01.values,
                            backgroundColor: 'rgba(202, 174, 56, 1)',
                            borderColor: 'none',
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

