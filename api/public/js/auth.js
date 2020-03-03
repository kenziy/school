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
				$('.user_name').html(data.user.name);
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
				description : $('#addSY .description').val()
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
	                                '<td class="desc">' + e.description + '</td>'+
	                                '<td>'+
	                                '    <div class="table-data-feature">'+
	                                '        <button class="item" data-toggle="tooltip" data-placement="top" title="Send">'+
	                                '            <i class="zmdi zmdi-mail-send"></i>'+
	                                '        </button>'+
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

function get() {
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
	                                '<td class="desc">' + e.description + '</td>'+
	                                '<td>'+
	                                '    <div class="table-data-feature">'+
	                                '        <button class="item" data-toggle="tooltip" data-placement="top" title="Send">'+
	                                '            <i class="zmdi zmdi-mail-send"></i>'+
	                                '        </button>'+
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