
window.onload = function () {
    document.getElementById('submitButton').addEventListener('click', submitPostForm);
    document.getElementById('clearButton').addEventListener('click', clearPostForm);
  
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
            
            //alert("Type: " + type + "\nBrand: " + brand + "\nName: " + name + "\nPrice: " + price +"\nLocation: " + location);   
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
            alert("invalid price entered");
            return false;
        }
        
        // maximum of 3 digits before decimal
        // maximum of 2 digits after decimal
        // but decimal is optional
        if (!price.match(/^\d{0,3}(\.\d{1,2})?$/) || !priceUPC.match(/^\d{0,3}(\.\d{1,2})?$/)) {
            alert("invalid price entered");
            return false;
        }
        
        return true;
    }
}