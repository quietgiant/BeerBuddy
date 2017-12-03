$(document).ready(function () {

	// jquery price range slider
	$("#priceRangeBeer").slider();
	$("#priceRangeBeer").on("slide", function(slideEvt) {
	  $("#priceRangeBeerValue").text(slideEvt.value);
	});
	
	$("#priceRangeBooze").slider();
	$("#priceRangeBooze").on("slide", function(slideEvt) {
	  $("#priceRangeBoozeValue").text(slideEvt.value);
	});

});

window.onload = function () {
    document.getElementById('beerSearch').onsubmit = function() {
        return checkBeerSearchForm();
    };
    document.getElementById('boozeSearch').onsubmit = function() {
        return checkBoozeSearchForm();
    };
}

function checkBeerSearchForm() {
	var brand = $('#brandBeer').val();
	var name = $('#nameBeer').val();
	var price = $('#priceRangeBeer').val();

	if (brand == '' && name == '' && price == '0') {
		swal(
            'Sorry...',
            'You must enter at least one search filter!',
            'error'
        );
        return false;
	}
	
	return true;
}

function checkBoozeSearchForm() {
	var type = $('#typeBooze').val();
	var brand = $('#brandBooze').val();
	var name = $('#nameBooze').val();
	var price = $('#priceRangeBooze').val();

	if (type == '' && brand == '' && name == '' && price == '0') {
		swal(
            'Sorry...',
            'You must enter at least one search filter!',
            'error'
        );
        return false;
	}
	
	return true;
}