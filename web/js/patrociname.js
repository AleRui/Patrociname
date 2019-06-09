/*
 * JS
 * Patrociname Functions
 */

$(document).ready(function () {
    //
    //console.log('document ready');
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
    if ($("#cont-chart-01").length) {
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
        imageId = '#' + imageId;
        //console.log(imageId);
        reader.onload = function (value) {
            $(imageId).attr('src', value.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}


function showContainer(element) {
    console.log(element);
    //
    let containerSelected = '#' + element.id.replace("btnShow-", "");
    //console.log('containerSelected:' + containerSelected);
    //
    let allContainer = $(".cont-index-forms").children();
    //console.log(allContainer);
    $.each(allContainer, function (key, value) {
        let container = "#" + value.id;
        //console.log(container);
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
    //
    if ($('#barButtons')) {
        //
        let stateDisplay = $('#barButtons').css('display');
        //console.log(stateDisplay);
        //
        let newState;
        if (stateDisplay === 'flex') {
            newState = 'none';
            // Hide Forms
            let allContainer = $(".cont-index-forms").children();
            //console.log(allContainer);
            $.each(allContainer, function (key, value) {
                let container = "#" + value.id;
                $(container).fadeOut(400);
            });
        } else {
            newState = 'flex';
        }
        //console.log(newState);
        $('#barButtons').css('display', newState);
        //
        let stateAnimation = $('#btn-showButtons').css('animation-name');
        //console.log(stateAnimation);
        let newStateAnimation = (stateAnimation === 'none' || stateAnimation === 'rotateButtonReturn') ? 'rotateButtonGo' : 'rotateButtonReturn';
        $('#btn-showButtons').css('animation-name', newStateAnimation);
    }
}

function showContainerUser() {
    //
    if ($('#cont-data-user')) {
        let stateDisplay = $('#cont-data-user').css('display');
        //
        let newState = ( stateDisplay === 'flex' ) ? 'none' : 'flex' ;
        //
        $('#cont-data-user').css('display', newState);
    }
}


