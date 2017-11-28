window.onload = function () {
    document.getElementById('submitButton').addEventListener('click', submitPostForm);
    document.getElementById('clearButton').addEventListener('click', clearPostForm);
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
    if (!validatePrice()) {
        return false;
    }
    
    if (isUPC()) {
        var upc_code = $('#inputUPC').val();
        var priceUpc = $('#inputPriceUPC').val();
        var locationUpc  = $("#inputLocationUPC").val();
    } else {
        var type = $('#inputType').val();
        var brand = $('#inputBrand').val();
        var name = $('#inputName').val();
        var price = $('#inputPrice').val();
        var location = $('#inputLocation').val();

    }
    
}

function isUPC() {
    var upc_code = $('#inputUPC').val();
    var price = $('#inputPriceUPC').val();
    var location  = $("#inputLocationUPC").val();
    
    if(upc_code == '' || price == '' || location == '') {
        return false;
    }
    return true;
}

function validatePrice() {
    var price = $('#inputPrice').val();
    var priceUPC = '0';
    
    if (price == '' && priceUPC == '') {
        alert("Invalid price entered!");
        return false;
    }
    
    // maximum of 3 digits before decimal
    // maximum of 2 digits after decimal
    // but decimal is optional
    if (!price.match(/^\d{0,3}(\.\d{1,2})?$/) || !priceUPC.match(/^\d{0,3}(\.\d{1,2})?$/)) {
        alert("Invalid price entered!");
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
            alert("success!");
            // do nothing, variables are set            
        })
        .fail(function (data) {
            alert("Error in obtaining full address from Google Maps.");
        });
}