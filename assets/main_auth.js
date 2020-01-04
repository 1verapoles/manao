$(document).ready(function() {
$(".authorizat input").change(function() { 
  $(this).prev().html('');
    });	
 
$(".authorizat").submit(function(e) { 
	    e.preventDefault();
		var th = $(this);

		var _error = function (request) {
    th.find('.form-error').removeClass('d-none');
    };


    // при получении успешного ответа от сервера 
  var _success = function (data) {
     if (data.result === "success") {
      th.trigger("reset");
      th.addClass('noshow');
      alert('Hello ' + data.name_auth);
		}
	 if (data.result === "error") {
      for (var error in data) {
      if (error == "result" || error == "name_auth") {
        continue;
      };
      var cl = "." + error;
      var te = data[error];
      $(".authorizat").find(cl).html(te);
      	}
      	} 
}



		$.ajax({
			type: "POST",
			url: "auth.php", 
			data: th.serialize(),
			dataType: 'json'
		}).done(_success)
      .fail(_error)
	});



});