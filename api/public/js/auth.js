if ($('.auth').length > 0) {
	var auth_token = localStorage.getItem('token');
	$.ajax({
		url : server + '/user',
		method: 'get',
		dataType: 'json',
		headers: {
			'Authorization' : 'Bearer ' + auth_token
		},
		success: function (data) {
			if (data.success) {
				$('.user_name').html(data.user.last_name + ', ' + data.user.first_name + ' ' + data.user.middle_name);
				$('.user_email').html(data.user.email);
			} else {
				window.location.href = base_url + 'login';
			}
		}
	});
}

if ($('.listSchoolYear').length > 0) {

	getSchoolYear();

	$('#addSY .submit').on('click', function(){
		$('.loading').show();
		$.ajax({
			url : server + '/schoolyear',
			method: 'post',
			dataType: 'json',
			contentType: 'application/json',
			headers: {
				'Authorization' : 'Bearer ' + auth_token
			},
			data: JSON.stringify({
				title : $('#addSY .title').val(),
				description : $('#addSY .description').val(),
				online_enrollment : $('#addSY .online_enrollment').val()
			}),
			success: function (data) {
				$('.loading').hide();
				if (data.success) {
					$('#addSY').modal('hide');
					getSchoolYear();
				} else {
					alert(data.error);
				}

			}
		});
	});
}

if ($('.roomPage').length > 0) {

	getRoom();

	$('#addRoom .submit').on('click', function(){
		$('.loading').show();
		$.ajax({
			url : server + '/room',
			method: 'post',
			dataType: 'json',
			contentType: 'application/json',
			headers: {
				'Authorization' : 'Bearer ' + auth_token
			},
			data: JSON.stringify({
				title : $('#addRoom .title').val(),
				description : $('#addRoom .description').val()
			}),
			success: function (data) {
				$('.loading').hide();
				if (data.success) {
					$('#addRoom').modal('hide');
					getRoom();
				} else {
					alert(data.error);
				}

			}
		});
	});
}

if ($('.levelPage').length > 0) {

	getLevel();

	$('#addLevel .submit').on('click', function(){
		$('.loading').show();
		$.ajax({
			url : server + '/level',
			method: 'post',
			dataType: 'json',
			contentType: 'application/json',
			headers: {
				'Authorization' : 'Bearer ' + auth_token
			},
			data: JSON.stringify({
				title : $('#addLevel .title').val(),
				tuition : $('#addLevel .tuition').val(),
				description : $('#addLevel .description').val()
			}),
			success: function (data) {
				$('.loading').hide();
				if (data.success) {
					$('#addLevel').modal('hide');
					getLevel();
				} else {
					alert(data.error);
				}

			}
		});
	});
}

if ($('.subjectPage').length > 0) {

	getSubject();

	$('#addSubject .submit').on('click', function(){
		$('.loading').show();
		$.ajax({
			url : server + '/subject',
			method: 'post',
			dataType: 'json',
			contentType: 'application/json',
			headers: {
				'Authorization' : 'Bearer ' + auth_token
			},
			data: JSON.stringify({
				code : $('#addSubject .code').val(),
				title : $('#addSubject .title').val(),
				description : $('#addSubject .description').val()
			}),
			success: function (data) {
				$('.loading').hide();
				if (data.success) {
					$('#addSubject').modal('hide');
					getSubject();
				} else {
					alert(data.error);
				}

			}
		});
	});
}

if ($('.usersPage').length > 0) {
	getUser();
	$('#newUser .submit').on('click', function(){
		$('.loading').show();
		$.ajax({
			url : server + '/user',
			method: 'post',
			dataType: 'json',
			contentType: 'application/json',
			headers: {
				'Authorization' : 'Bearer ' + auth_token
			},
			data: JSON.stringify({
				first_name : $('#newUser .fname').val(),
				middle_name : $('#newUser .mname').val(),
				last_name : $('#newUser .lname').val(),
				birthday : $('#newUser .birthday').val(),
				gender : $('#newUser .gender').val(),
				address : $('#newUser .address').val(),
				email : $('#newUser .email').val(),
				role : $('#newUser .roles').val()
			}),
			success: function (data) {
				$('.loading').hide();
				if (data.success) {
					$('#newUser').modal('hide');
					getUser();
				} else {
					alert(data.error);
				}

			}
		});
	});
}

if ($('.parentPage').length > 0) {

	getStudent();

	$('.addStudent').on('click', function(){
		$('.loading').show();
		$.ajax({
			url : server + '/parent/student',
			method: 'post',
			dataType: 'json',
			contentType: 'application/json',
			headers: {
				'Authorization' : 'Bearer ' + auth_token
			},
			data: JSON.stringify({
				first_name : $('#addkids .fname').val(),
				middle_name : $('#addkids .mname').val(),
				last_name : $('#addkids .lname').val(),
				gender : $('#addkids .gender').val(),
				birthday : $('#addkids .birthday').val(),
			}),
			success: function (data) {
				$('.loading').hide();
				if (data.success) {
					$('#addkids').modal('hide');
					getStudent();
				} else {
					alert(data.error);
				}

			}
		});
	});
}

if ($('.parentEnroll').length > 0) {
	availableSY();
}

function getSchoolYear() {
	$.ajax({
		url : server + '/schoolyear',
		method: 'get',
		dataType: 'json',
		headers: {
			'Authorization' : 'Bearer ' + auth_token
		},
		success: function (data) {
			var toHtml = '';
			if (data.success) {
				$.each(data.data, function (i, e){
					var html = '<tr class="tr-shadow">' +
	                                '<td><a href="'+ baseURL +'/admin/schoolyear/'+ e.id +'">' + e.title + '</a></td>' +
	                                '<td class="desc">0</td>'+
	                                '<td>' + (e.online_enrollment == 1 ? "<span class=\'text-success\'>Active</span>" : "<span class=\'text-muted\'>Disabled</span>") + '</td>'+
	                                '<td><a href="' + baseURL + '/enrollment/' + e.token + '" target="_blank"><i class="fas fa-link"></i></a></td>'+
	                                '<td>'+
	                                '    <div class="table-data-feature">'+
	                                '        <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">'+
	                                '            <i class="zmdi zmdi-edit"></i>'+
	                                '        </button>'+
	                                '        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">'+
	                                '            <i class="zmdi zmdi-delete"></i>'+
	                                '        </button>'+
	                                '    </div>'+
	                                '</td>'+
	                            '</tr>'+
	                            '<tr class="spacer"></tr>';

	                toHtml = toHtml.concat(html);
				});
				$('.schoolyearList').html(toHtml);
			}
		}
	});
}


function getLevel() {
	$.ajax({
		url : server + '/level',
		method: 'get',
		dataType: 'json',
		headers: {
			'Authorization' : 'Bearer ' + auth_token
		},
		success: function (data) {
			var toHtml = '';
			if (data.success) {
				$.each(data.data, function (i, e){
					var html = '<tr class="tr-shadow">' +
	                                '<td><a href="#">' + e.title + '</a></td>' +
	                                '<td>' + e.description + '</td>'+
	                                '<td class="desc">' + e.tuition + '</td>'+
	                                '<td>'+
	                                '    <div class="table-data-feature">'+
	                                '        <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">'+
	                                '            <i class="zmdi zmdi-edit"></i>'+
	                                '        </button>'+
	                                '        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">'+
	                                '            <i class="zmdi zmdi-delete"></i>'+
	                                '        </button>'+
	                                '    </div>'+
	                                '</td>'+
	                            '</tr>'+
	                            '<tr class="spacer"></tr>';

	                toHtml = toHtml.concat(html);
				});
				$('.levelList').html(toHtml);
			}
		}
	});
}

function getRoom() {
	$.ajax({
		url : server + '/room',
		method: 'get',
		dataType: 'json',
		headers: {
			'Authorization' : 'Bearer ' + auth_token
		},
		success: function (data) {
			var toHtml = '';
			if (data.success) {
				$.each(data.data, function (i, e){
					var html = '<tr class="tr-shadow">' +
	                                '<td><a href="#">' + e.title + '</a></td>' +
	                                '<td class="desc">' + e.description + '</td>'+
	                                '<td>'+
	                                '    <div class="table-data-feature">'+
	                                '        <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">'+
	                                '            <i class="zmdi zmdi-edit"></i>'+
	                                '        </button>'+
	                                '        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">'+
	                                '            <i class="zmdi zmdi-delete"></i>'+
	                                '        </button>'+
	                                '    </div>'+
	                                '</td>'+
	                            '</tr>'+
	                            '<tr class="spacer"></tr>';

	                toHtml = toHtml.concat(html);
				});
				$('.roomList').html(toHtml);
			}
		}
	});
}

function getSubject() {
	$.ajax({
		url : server + '/subject',
		method: 'get',
		dataType: 'json',
		headers: {
			'Authorization' : 'Bearer ' + auth_token
		},
		success: function (data) {
			var toHtml = '';
			if (data.success) {
				$.each(data.data, function (i, e){
					var html = '<tr class="tr-shadow">' +
	                                '<td><a href="#">' + e.code + '</a></td>' +
	                                '<td><a href="#">' + e.title + '</a></td>' +
	                                '<td class="desc">' + e.description + '</td>'+
	                                '<td>'+
	                                '    <div class="table-data-feature">'+
	                                '        <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">'+
	                                '            <i class="zmdi zmdi-edit"></i>'+
	                                '        </button>'+
	                                '        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">'+
	                                '            <i class="zmdi zmdi-delete"></i>'+
	                                '        </button>'+
	                                '    </div>'+
	                                '</td>'+
	                            '</tr>'+
	                            '<tr class="spacer"></tr>';

	                toHtml = toHtml.concat(html);
				});
				$('.subjectList').html(toHtml);
			}
		}
	});
}

function getUser() {
	$.ajax({
		url : server + '/user/all',
		method: 'get',
		dataType: 'json',
		headers: {
			'Authorization' : 'Bearer ' + auth_token
		},
		success: function (data) {
			var toHtml = '';
			if (data.success) {
				$.each(data.data, function (i, e){
					var html = '<tr class="tr-shadow">' +
	                                '<td><a href="#">' + e.last_name +', '+ e.last_name +' ' + e.middle_name + '</a></td>' +
	                                '<td>' + e.gender + '</td>' +
	                                '<td>' + e.email + '</td>' +
	                                '<td>' + e.temp_pass + '</td>' +
	                                '<td>' + e.role + '</td>' +
	                                '<td>'+
	                                '    <div class="table-data-feature">'+
	                                '        <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">'+
	                                '            <i class="zmdi zmdi-edit"></i>'+
	                                '        </button>'+
	                                '        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">'+
	                                '            <i class="zmdi zmdi-delete"></i>'+
	                                '        </button>'+
	                                '    </div>'+
	                                '</td>'+
	                            '</tr>'+
	                            '<tr class="spacer"></tr>';

	                toHtml = toHtml.concat(html);
				});
				$('.userList').html(toHtml);
			}
		}
	});
}

function getStudent() {
	$.ajax({
		url : server + '/parent/student',
		method: 'get',
		dataType: 'json',
		headers: {
			'Authorization' : 'Bearer ' + auth_token
		},
		success: function (data) {
			var toHtml = '';
			var toOption = '';
			if (data.success) {
				$.each(data.data, function (i, e){
					var html = '<tr class="tr-shadow">' +
	                                '<td><a href="#">' + e.last_name + ', ' + e.first_name + ' ' + e.middle_name + '</a></td>' +
	                                '<td></td>'+
	                                '<td></td>'+
	                                '<td></td>'+
	                                '<td>'+
	                                '    <div class="table-data-feature">'+
	                                '        <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">'+
	                                '            <i class="zmdi zmdi-edit"></i>'+
	                                '        </button>'+
	                                '        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">'+
	                                '            <i class="zmdi zmdi-delete"></i>'+
	                                '        </button>'+
	                                '    </div>'+
	                                '</td>'+
	                            '</tr>'+
	                            '<tr class="spacer"></tr>';
	                 var opt = '<option value="' + e.id + '">' + e.last_name + ', ' + e.first_name + ' ' + e.middle_name + '</option>';

	                toOption = toOption.concat(opt);
	                toHtml = toHtml.concat(html);
				});
				$('.myStudentList').html(toHtml);
				$('.myStudent').html(toOption);
			}
		}
	});
}

	function availableSY() {
		getStudent();
		$.ajax({
			url : server + '/level',
			method: 'get',
			dataType: 'json',
			success: function (data) {
				var toHtml = '<option value="0">Select level</option>';
				if (data.success) {
					$.each(data.data, function (i, e){
						var html = '<option value="' + e.id + '" data-tuition="'+ e.tuition +'">' + e.title + '</option>';
		                toHtml = toHtml.concat(html);
					});
					$('.ylevel').html(toHtml);

					$('.level_id').on('change', function(){
						$('.tuition').val($(this).find('option:selected').data('tuition'));
					});
				}
			}
		});
		$.ajax({
			url : server + '/enrollment/open',
			method: 'get',
			dataType: 'json',
			headers: {
				'Authorization' : 'Bearer ' + auth_token
			},
			success: function (data) {
				var toHtml = '';
				if (data.success) {
					$.each(data.data, function (i, e){
						var html = '<tr class="tr-shadow">' +
		                                '<td><a href="#" class="openEnroll" data-title="'+e.title+'" data-id="'+e.id+'">'+e.title+'</a></td>' +
		                                '<td>'+
		                                '    <div class="table-data-feature">'+
		                                '        <button class="item openEnroll" data-title="'+e.title+'" data-id="'+e.id+'">'+
		                                '            <i class="fas fa-edit"></i>'+
		                                '        </button>'+
		                                '    </div>'+
		                                '</td>'+
		                            '</tr>'+
		                            '<tr class="spacer"></tr>';

		                toHtml = toHtml.concat(html);
					});
					$('.availableSy').html(toHtml);

					$('.openEnroll').on('click', function(e){
						e.preventDefault();
						$('#mediumModalLabel').html($(this).data('title'));
						$('#sy_id').val($(this).data('id'));
						$('#enrolStudent').modal('show');
					});

					$('.enrollstudent').on('click', function(){
						$('.loading').show();
						$.ajax({
							url : server + '/parent/enroll',
							method: 'post',
							dataType: 'json',
							contentType: 'application/json',
							headers: {
								'Authorization' : 'Bearer ' + auth_token
							},
							data: JSON.stringify({
								sy_id : $('#sy_id').val(),
								student_id : $('.myStudent').val(),
								level_id : $('.level_id').val(),

							}),
							success: function (data) {
								$('.loading').hide();
								if (data.success) {
									$('#addSY, .enrolStudent').modal('hide');
									getSchoolYear();
								} else {
									alert(data.error);
								}

							}
						});
					});
				}
			}
		});
	}