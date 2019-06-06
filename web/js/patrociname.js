/*
 * JS
 * Patrociname Functions
 */

$(document).ready(function () {
    //
    console.log('document ready');
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
    // Charts
    if ( $("#cont-chart-01").length ) {
        console.log('Funcionando Charts');
    }
});


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



/* -- Style -- */

function showImageBeforeUpload(input) {
    if (input.files && input.files[0]) {
        let reader = new FileReader();
        //console.log(input.files);
        //console.log(input.files[0]);
        //console.log(reader);
        //console.log(typeof(input));
        //console.log(input.attributes[1].nodeValue);
        let imageId = (input.attributes[1].nodeValue).replace('Input', '');
        imageId = '#'+imageId;
        //console.log(imageId);
        reader.onload = function (value) {
            $(imageId).attr('src', value.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}


function showContainer(element) {
    //console.log(element);
    let container = '#'+element.id.replace("btnShow-", "");
    console.log(container);
    if ( $(container).css('display') === 'block') {
        $(container).fadeOut(1000);
    } else {
        $(container).fadeIn(1000);
    }
    //
}

//function showLogSearcher() {}
//function showRegSponsor() {}
//function showLogSponsor() {}

