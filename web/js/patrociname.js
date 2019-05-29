/*
 * Patrociname Functions
 */

function setActionDelete($numRow) {
    //console.log('Funcionando setActionDelete()');
    $('#sponsorWay-' + $numRow).attr(
        'action',
        '?controller=SponsorBundle&action=deleteSponsorBundle'
    );
    $('#sponsorWay-' + $numRow).submit();
}

function setActionUpdate($numRow) {
    //console.log('Funcionando setActioUpdate()');
    $('#sponsorWay-' + $numRow).attr(
        'action',
        '?controller=SponsorBundle&action=updateSponsorBundle'
    );
    $('#sponsorWay-' + $numRow).submit();
}

function showImageBeforeUpload(input) {
    if (input.files && input.files[0]) {
        let reader = new FileReader();
        console.log(input.files);
        console.log(input.files[0]);
        console.log(reader);
        console.log(typeof(input));
        console.log(input.attributes[1].nodeValue);
        let imageId = (input.attributes[1].nodeValue).replace('Input', '');
        imageId = '#'+imageId;
        console.log(imageId);
        reader.onload = function (value) {
            $(imageId).attr('src', value.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
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

