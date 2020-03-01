var server = 'http://127.0.0.1:8000/api/';
var baseURL = 'http://localhost:8081/';
(function($){


	if ($('.register').length > 0){
		$('#register').on('click', function(){
			$.ajax({
				url : server + 'register',
				method: 'post',
				dataType: 'json',
				contentType: 'application/json',
				data: JSON.stringify({
					name : $('.name').val(),
					email : $('.email').val(),
					password : $('.password').val()
				}),
				success: function (data) {
					if (data.success) {
						localStorage.setItem('token', data.token);
						window.location.href = baseURL + 'dashboard.php';
					} else {
						$('.error').show();
					}
				}
			})
		});
	}

	if ($('.login').length > 0) {
		$('#login').on('click', function(){
			$.ajax({
				url : server + 'login',
				method: 'post',
				dataType: 'json',
				contentType: 'application/json',
				data: JSON.stringify({
					email : $('.email').val(),
					password : $('.password').val(),
				}),
				success: function (data) {
					if (data.success) {
						localStorage.setItem('token', data.token);

						if (data.role == 1) {
							window.location.href = baseURL + 'dashboard.php';
						} else {
							window.location.href = baseURL + 'teacher/dashboard.php';
						}
					} else {
						$('.error').show();
					}
				}
			});
		});
	}

})(jQuery);