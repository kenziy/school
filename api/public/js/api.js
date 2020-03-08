(function($){


	if ($('.enrollment').length > 0){

		ELevel();
		$('.enroll').on('click', function(){
			$.ajax({
				url : server + '/enroll',
				method: 'post',
				dataType: 'json',
				contentType: 'application/json',
				data: JSON.stringify({
					first_name 	: $('.first_name').val(),
					middle_name : $('.middle_name').val(),
					last_name 	: $('.last_name').val(),
					gender 		: $('.gender').val(),
					email 		: $('.email').val(),
					ylevel 		: $('.ylevel').val()
				}),
				success: function (data) {
					if (data.success) {
						window.location.href = baseURL + '/thankyou';
					} else {
						$('.error').show();
					}
				}
			})
		});
	}

	if ($('.register').length > 0) {
		$('.register_submit').on('click', function(){
			$('.loading').show();
			$.ajax({
				url : server + '/register',
				method: 'post',
				dataType: 'json',
				contentType: 'application/json',
				data: JSON.stringify({
					first_name 	: $('.fname').val(),
					middle_name : $('.mnane').val(),
					last_name 	: $('.lname').val(),
					gender 		: $('.gender').val(),
					email 		: $('.email').val(),
					password    : $('.password').val(),
				}),
				success: function (data) {
					$('.loading').hide();
					if (data.success) {
						localStorage.setItem('token', data.token);
						window.location.href = baseURL + '/parent/dashboard';
					} else {
						$('.error').show();
					}
				}
			})
		});
	}

	if ($('.login').length > 0) {
		$('#login').on('click', function(){
			$('.loading').show();
			$.ajax({
				url : server + '/login',
				method: 'post',
				dataType: 'json',
				contentType: 'application/json',
				data: JSON.stringify({
					email : $('.email').val(),
					password : $('.password').val(),
				}),
				success: function (data) {
					$('.loading').hide();
					if (data.success) {
						localStorage.setItem('token', data.token);

						if (data.role == 1) {
							window.location.href = baseURL + '/admin/dashboard';
						} else if (data.role == 2) {
							window.location.href = baseURL + '/teacher/dashboard';
						} else {
							window.location.href = baseURL + '/parent/dashboard';
						}
					} else {
						$('.error').show();
					}
				}
			});
		});
	}


function ELevel() {
	$.ajax({
		url : server + '/enrollment/' + sy_code,
		method: 'get',
		dataType: 'json',
		success: function (data) {
			var toHtml = '';
			if (data.success) {
				$('.batchTitle').html(data.data.title);
			}
		}
	});

	$.ajax({
		url : server + '/level',
		method: 'get',
		dataType: 'json',
		success: function (data) {
			var toHtml = '';
			if (data.success) {
				$.each(data.data, function (i, e){
					var html = '<option value="' + e.id + '">' + e.title + '</option>';
	                toHtml = toHtml.concat(html);
				});
				$('.ylevel').html(toHtml);
			}
		}
	});
}
})(jQuery);