if ($('.schoolYearPage').length > 0) {
	var url_string = window.location.href; //window.location.href
	var url = new URL(url_string);
	var c = url.searchParams.get("id");

	$.ajax({
		url : server + 'schoolyear/' + c,
		method: 'get',
		dataType: 'json',
		headers: {
			'Authorization' : 'Bearer ' + auth_token
		},
		success: function (data) {
			if (data.success) {
				var info = data.data;
				$('.schoolYearTitle').html(info.title);
				$('.scholYeardescription').html(info.description);

				var toTe = '';
				$.each(data.teachers, function(i, e){
					var html = '<tr class="tr-shadow">' +
	                                '<td><a href="#">' + e.teachers_name + '</a></td>' +
	                                '<td>0</td>'+
	                                '<td>0</td>'+
	                                '<td>0</td>'+
	                            '</tr>'+
	                            '<tr class="spacer"></tr>';
	                toTe = toTe.concat(html);
				});

				$('.allTeachers').html(toTe);
			}
		}
	});

	$('.addTeacher').on('click', function(e){
		e.preventDefault();
		$.ajax({
			url : server + 'user/teacher',
			method: 'get',
			dataType: 'json',
			headers: {
				'Authorization' : 'Bearer ' + auth_token
			},
			success: function (data) {
				var content = '';
				if (data.success) {
					$.each(data.data, function(i, e){
						var html = '<tr>' +
	                                    '<td class="text-left">' +
	                                        '<a href="#" class="setTeacher" data-id="'+e.id+'">'+ e.last_name + ', ' + e.first_name + ' ' + e.middle_name +'</a>' +
	                                    '</td>'+
	                                '</tr>';
	                    content =  content.concat(html);
					});
					$('.listAllTeacher').html(content);

					// add teacher
					$('.setTeacher').on('click', function(){
						var me = $(this);
						$('#showTeachersName').html(me.html());

						$.ajax({
							url : server + 'subject',
							method: 'get',
							dataType: 'json',
							headers: {
								'Authorization' : 'Bearer ' + auth_token
							}, success: function(data) {
								if (data.success) {
									var toTeach = '';
									$.each(data.data, function(i, e){
										var html = '<div><label for="checkbox'+ i +'" class="form-check-label">' +
                                                    '<input type="checkbox" id="checkbox'+ i +'" value="'+e.id+'" class="form-check-input sSubject">' + e.title +
                                                	'</label></div>';

										toTeach = toTeach.concat(html);
									});
									$('.tCheckBox').html(toTeach);
								}
							}
						});

						$.ajax({
							url : server + 'room',
							method: 'get',
							dataType: 'json',
							headers: {
								'Authorization' : 'Bearer ' + auth_token
							}, success: function(data) {
								if (data.success) {
									var toTeach = '';
									$.each(data.data, function(i, e){
										var html = '<div><label for="checkbox'+ i +'" class="form-check-label">' +
                                                    '<input type="checkbox" id="checkbox'+ i +'" value="'+e.id+'" class="form-check-input sRoom">' + e.title +
                                                	'</label></div>';

										toTeach = toTeach.concat(html);
									});
									$('.rCheckBox').html(toTeach);
								}
							}
						});

						$('#setTeacherToSchoolYear').modal('show');

						// set teacher button click
						$('.setToTeacher').on('click', function(e){
							e.preventDefault();
							var teacher_id = me.data('id');
							var selectedSubject = [];
							var selectedRoom = [];
							var schoolYear_id = c;

							$('.sSubject:checked').each(function(){
								selectedSubject.push($(this).val()); 
							});
							$('.sRoom:checked').each(function(){
								selectedRoom.push($(this).val()); 
							});
							
							$.ajax({
								url : server + 'teacher',
								method: 'post',
								dataType: 'json',
								contentType: 'application/json',
								headers: {
									'Authorization' : 'Bearer ' + auth_token
								},
								data: JSON.stringify({
									schoolYear_id : schoolYear_id,
									teacher_id : teacher_id,
									rooms : selectedSubject,
									subjects : selectedRoom
								}),
								success: function(data) {
									console.log(data);
									if (data.success) {
										
									}
								}
							});
						});
					});
				}
			}
		});
		$('#schoolYearAddTeacher').modal('show');
	});
}