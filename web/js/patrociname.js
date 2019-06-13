/**
 * JS Patrociname v3.0
 * @author: Ale Ruiz
 * @Description Proyecto Fin de Grado DAW 2017-2019
 *
 */

$(document).ready(function () {

    $('#registerSearcherMail').blur(function () {

        let searcherMailInsert = $('#registerSearcherMail').val();

        $.ajax({

            url: '?controller=searcher&action=checkExistEmail',
            method: 'POST',
            data: {
                'mailInserted': searcherMailInsert,
            },
            dataType: 'text',

            success: function (data) {
                $('#alertaRegisterMailSearcher').html(data);
            }
        })
    });
});


function setActionDelete($numRow) {

    $('#sponsorWay-' + $numRow).attr(
        'action',
        '?controller=SponsorBundle&action=deleteSponsorBundle'
    );

    $('#sponsorWay-' + $numRow).submit();

}

function setActionUpdate($numRow) {

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

        let imageId = (input.attributes[1].nodeValue).replace('Input', '');
        imageId = '#' + imageId;

        reader.onload = function (value) {
            $(imageId).attr('src', value.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}


function showContainer(element) {

    let containerSelected = '#' + element.id.replace("btnShow-", "");

    let allContainer = $(".cont-index-forms").children();

    $.each(allContainer, function (key, value) {

        let container = "#" + value.id;

        if (container === containerSelected) {
            if ($(container).css('display') === 'block') {
                $(container).fadeOut(400);
            } else {
                $(container).fadeIn(1400);
            }
        } else {
            $(container).fadeOut(400);
        }

    });
}

function showIndexButtons() {

    if ($('#barButtons')) {

        let stateDisplay = $('#barButtons').css('display');

        let newState;
        if (stateDisplay === 'flex') {

            newState = 'none';

            let allContainer = $(".cont-index-forms").children();

            $.each(allContainer, function (key, value) {
                let container = "#" + value.id;
                $(container).fadeOut(400);
            });

        } else {
            newState = 'flex';
        }

        $('#barButtons').css('display', newState);

        let stateAnimation = $('#btn-showButtons').css('animation-name');

        let newStateAnimation = (stateAnimation === 'none' || stateAnimation === 'rotateButtonReturn') ? 'rotateButtonGo' : 'rotateButtonReturn';

        $('#btn-showButtons').css('animation-name', newStateAnimation);
    }
}

function showContainerUser() {

    if ($('#cont-data-user')) {

        let stateDisplay = $('#cont-data-user').css('display');

        let newState = (stateDisplay === 'flex') ? 'none' : 'flex';

        $('#cont-data-user').css('display', newState);
    }
}


