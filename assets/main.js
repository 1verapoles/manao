$(document).ready(function() {

$(".registat input").change(function() { 
  $(this).prev().html('');
    });	
 
$(".registat").submit(function(e) { 
	    e.preventDefault();
		var th = $(this);

		var _error = function (request) {
    th.find('.form-error').removeClass('d-none');
    };


    // при получении успешного ответа от сервера 
  var _success = function (data) {
     if (data.result === "success") {
      alert("Вы зарегистрированы!");
			setTimeout(function() {
				th.trigger("reset");
			}, 10);
		}
	 if (data.result === "error") {
      for (var error in data) {
      if (error == "result") {
        continue;
      };
      var cl = "." + error;
      var te = data[error];
      $(".registat").find(cl).html(te);
      	}
      	} 
}



		$.ajax({
			type: "POST",
			url: "registration.php", 
			data: th.serialize(),
			dataType: 'json'
		}).done(_success)
      .fail(_error)
	});



});