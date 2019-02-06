/*
 * Patrociname Functions
 */

function setActionDelete($numRow) {
    //console.log('Funcionando setActionDelete()');
    $('#sponsorWay-' + $numRow).attr(
        'action',
        '?controller=SponsorBundle&action=deleteSponsorWay'
    );
    $('#sponsorWay-' + $numRow).submit();
}

function setActionUpdate($numRow) {
    //console.log('Funcionando setActioUpdate()');
    $('#sponsorWay-' + $numRow).attr(
        'action',
        '?controller=SponsorBundle&action=updateSponsorWay'
    );
    $('#sponsorWay-' + $numRow).submit();
}

$(document).ready(function () {
    //
    $('#registerSearcherMail').blur(function () {
        //
        var searcherMailInsert = $('#registerSearcherMail').val();
        //
        $.ajax({
            // Envío
            url: '?controller=searcher&action=checkExistEmail',
            method: 'POST',
            data: {
                'mailInserted': searcherMailInsert,
            },
            dataType: 'text',
            //
            // Respuesta
            success: function (data) {
                $('#alertaRegisterMailSearcher').html(data);
            }
        })
    });
    //
    $('#showRegSer').click(function () {
        $('#registerSearcher').transition('scale');
    });
    //
    $('#showSer').click(function () {
        $('#formSearcher').transition('scale');
    });
    //
    $('#showRegSpo').click(function () {
        $('#registerSponsor').transition('scale');
    });
    //
    $('#showSpo').click(function () {
        $('#formSponsor').transition('scale');
    });
    //
});