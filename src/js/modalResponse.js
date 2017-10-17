//opens the Modal if no cookie exists
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

//if the user is over 21 this runs the code that sets the cookie
function over21(){
  var d = new Date();
    d.setTime(d.getTime() + (30*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
  document.cookie = "age=over21;" + expires + ";path=/";
	// add code to cooking this response.
	$('#ageModal').modal('hide');
}
function under21(){
  var d = new Date();
    d.setTime(d.getTime() + (30*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
  document.cookie = "age=under21;" + expires + ";path=/";
	// add code to cooking this response.
	$('#ageModal').modal('hide');
	window.location = "under_age.php";
}

function checkCookie() {
  switch (getCookie("age")) {
	  case 'over21':
	    // do nothing
	    break;
	  case 'under21':
	    window.location = "under_age.php"
	    break;
	  default:
	    openAgeModal()
	}
	
    // var age = getCookie("age");
    // if (age =='over21') {
    //     return true
    // } else {
    //     return false
    // }
}

//this gets the cookie and returns its value
function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}