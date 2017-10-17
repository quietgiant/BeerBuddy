
window.onload = function () {
    document.getElementById('submitButton').addEventListener('click', submitPostForm)
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
        alert("hi!");
    }
    
    function validatePrice() {
        var price = $('#inputPrice').val();
        var priceUPC = $('#inputPriceUPC').val();
        
        if (price == '' || priceUPC == '') {
            alert("invalid");
            return false;
        }
        
        // maximum of 3 digits before decimal
        // maximum of 2 digits after decimal
        // but decimal is optional
        if (!price.match(/^\d{0,3}(\.\d{1,2})?$/) || !priceUPC.match(/^\d{0,3}(\.\d{1,2})?$/)) {
            alert("invalid");
            return false;
        }
        
        alert("valid -> " + price);
    }
}