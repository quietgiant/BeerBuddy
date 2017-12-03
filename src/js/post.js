window.onload = function () {
    document.getElementById('clearButton').addEventListener('click', clearPostForm);
    document.getElementById('manualForm').onsubmit = function() {
        return submitPostForm();
    };
}

function clearPostForm() {
    $('#inputType').data('combobox').clearElement();
    $('#inputType').data('combobox').clearTarget();
    $('#inputBrand').val('');
    $('#inputName').val('');
    $('#inputPrice').val('');
    $('#inputLocation').val('');
    $('#inputUPC').val('');
    $('#inputPriceUPC').val('');
    $("#inputLocationUPC").val('');
}

function submitPostForm() {
    if (!validatePrice() || !validateName()) {
        return false;
    }
    
    if (validateLoggedIn()) {
        swal({
          position: 'top-right',
          type: 'success',
          title: 'Deal posted!',
          showConfirmButton: false,
          timer: 2000
        });
    }

    return true;
}

function validateLoggedIn() {
    return $.ajax({
        url: '/src/controller/validate_logged_in.php',
        type: 'POST',
        dataType: 'json',
    })
        .done(function (data) {
            console.log(data);
            return data;
        })
        .fail(function (data) {
            swal(
                'Error!',
                'Something went wrong in validating your session. Please try again.',
                'error'
            );
            return false;
        });
    
}

function validateName() {
    var name = $('#inputName').val();
    
    if (name.length < 4) {
        swal(
            'Invalid name...',
            'Name is too short!',
            'error'
        );
        return false; // name must have at least 4 characters
    }
    
    return true;
}

function validatePrice() {
    var price = $('#inputPrice').val();
    var priceUPC = '0';
    
    if (price == '' || price == '0') {
        swal(
            'Invalid price...',
            'Check your price!',
            'error'
        );
        return false;
    }
    
    // maximum of 3 digits before decimal
    // maximum of 2 digits after decimal
    // but decimal is optional
    if (!price.match(/^\d{0,3}(\.\d{1,2})?$/) || !priceUPC.match(/^\d{0,3}(\.\d{1,2})?$/)) {
        swal(
            'Invalid price...',
            'Check your price!',
            'error'
        );
        return false;
    }
    
    return true;
}


function setAddressVariables(place) {

    var name = place.name;
    var streetNumber = place.address_components[0]['long_name'];
    var streetName = place.address_components[1]['long_name'];
    var fullAddress = streetNumber + ' ' + streetName;

    $.ajax({
        url: '/src/controller/set_address.php',
        type: 'GET',
        dataType: 'json',
        data: {
            name: name,
            address: fullAddress,
            city: place.address_components[2]['long_name'],
            state: place.address_components[5]['long_name']
        }
    })
        .done(function (data) {
            // do nothing, variables are set            
        })
        .fail(function (data) {
            swal(
                'Storage warning...',
                'Error in obtaining full address from Google Maps.',
                'warning'
            );
        });
}
