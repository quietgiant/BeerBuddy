function openAgeModal(){
	//do check for cookie
	//if cookie does not exist run the following:
	$.ajax({
        url: 'modal.html',
        dataType: 'text',
        success: function(result) {
          $('body').append(result);
          $('#ageModal').modal({
            backdrop: 'static',
            keyboard: false  // to prevent closing with Esc button (if you want this too)
          });
        $('#ageModal').modal('show');
      }
    });
}

function over21(){
	// add code to cooking this response.
	$('#memberModal').modal('hide');
}
