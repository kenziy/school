if ($('.schoolYearPage').length > 0) {
	getAllTeacher();
	getAllQueue();
	getAllEnrolled();

	if ($('.studentProfile').length > 0) {
		getStudentProfile();
	}

	function getAllTeacher() {
		$.ajax({
			url : server + '/schoolyear/' + sy_id,
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


					$('.online_link').val(baseURL + '/enrollment/' + info.token);
					if (info.online_enrollment) {
						$('.online_enrolment').prop('checked', true);
						$('.enStat').html('<span class="text-success">Enabled</span>');
					}

					var toTe = '';
					$.each(data.teachers, function(i, e){
						var html = '<tr class="tr-shadow">' +
		                                '<td><a href="#">' + e.teachers_name + '</a></td>' +
		                                '<td>' + e.subjects+ '</td>'+
		                                '<td>' + e.rooms+ '</td>'+
		                                '<td>0</td>'+
		                            '</tr>'+
		                            '<tr class="spacer"></tr>';
		                toTe = toTe.concat(html);
					});

					$('.allTeachers').html(toTe);
				}
			}
		});
	}

	function getAllQueue() {
		$.ajax({
			url : server + '/schoolyear/' + sy_id + '/queue',
			method: 'get',
			dataType: 'json',
			headers: {
				'Authorization' : 'Bearer ' + auth_token
			},
			success: function (data) {
				if (data.success) {
					var toTe = '';
					$.each(data.data, function(i, e){
						var html = '<tr class="tr-shadow">' +
		                                '<td><a href="' + baseURL + '/admin/schoolyear/' + sy_id + '/queue/' + e.id + '">' + e.name + '</a></td>' +
		                                '<td><a href="#">' + e.guardian + '</a></td>' +
		                                '<td><a href="#">' + e.level + '</a></td>' +
		                                '<td>' + e.status+ '</td>'+
		                                '<td>' + e.date+ '</td>'+
		                            '</tr>'+
		                            '<tr class="spacer"></tr>';
		                toTe = toTe.concat(html);
					});

					$('.queued').html(toTe);
				}
			}
		});
	}

	function getAllEnrolled() {
		$.ajax({
			url : server + '/schoolyear/' + sy_id + '/enrolled',
			method: 'get',
			dataType: 'json',
			headers: {
				'Authorization' : 'Bearer ' + auth_token
			},
			success: function (data) {
				if (data.success) {
					var toTe = '';
					$.each(data.data, function(i, e){
						var html = '<tr class="tr-shadow">' +
		                                '<td><a href="' + baseURL + '/admin/schoolyear/' + sy_id + '/queue/' + e.id + '">' + e.name + '</a></td>' +
		                                '<td><a href="#">' + e.guardian + '</a></td>' +
		                                '<td><a href="#">' + e.level + '</a></td>' +
		                                '<td>' + e.status+ '</td>'+
		                                '<td>' + e.date+ '</td>'+
		                            '</tr>'+
		                            '<tr class="spacer"></tr>';
		                toTe = toTe.concat(html);
					});

					$('.enrolled').html(toTe);
				}
			}
		});
	}

	function getStudentProfile() {
		$.ajax({
			url : server + '/schoolyear/' + sy_id + '/queue/' + student_id,
			method: 'get',
			dataType: 'json',
			headers: {
				'Authorization' : 'Bearer ' + auth_token
			},
			success: function (data) {
				if (data.success) {
					var student = data.data.student;
					$('.student-name').html(student.last_name + ', ' + student.first_name + ' ' + student.middle_name);
					$('.gender').html(student.gender);
					$('.dob').html(student.birthday);
					$('.guardian').html(student.g_lname + ', ' + student.g_fname + ' ' + student.g_mname);
					$('.level').html(student.level);
					$('.tuition').html(student.tuition);

					var toHtml = '';
					var total = 0;
					console.log(data.data.payments);
					$.each(data.data.payments, function(i, e){
						var html = '<tr class="tr-shadow">' +
		                                '<td>' + (e.payment_method == 0 ? "Over the counter" : "Online" ) + '</td>' +
		                                '<td>' + (e.status == 0 ? "Pending" : "Completed" ) + '</td>' + 
		                                '<td>' + e.created_at	 + '</td>' + 
		                                '<td class="text-danger">' + e.amount	 + ' PHP</td>' + 
		                                '<td><a href="#" class="approve" data-id="'+e.id+'">Approved</a></td>' + 
		                            '</tr>'+
		                            '<tr class="spacer"></tr>';
		                total = total + parseFloat(e.amount);
		                toHtml = toHtml.concat(html);
					});

					$('.totalPaid').html(total);
					$('.allpayment').html(toHtml);
					$('.remaining').html(parseFloat(student.tuition) - total);


					$('.approve').on('click', function(e){
						e.preventDefault();
						if (confirm("Approve payment")) {
							$.ajax({
								url : server + '/schoolyear/' + sy_id + '/queue/' + student_id + '/approve',
								method: 'post',
								dataType: 'json',
								headers: {
									'Authorization' : 'Bearer ' + auth_token
								},
								data: {
									'id' : $(this).data('id')
								},
								success: function(data) {
									if (data.success) {
										getStudentProfile();
									}
								}
							})
						}
					})
				}
			}
		});
	}

	$('.addTeacher').on('click', function(e){
		e.preventDefault();
		$.ajax({
			url : server + '/user/teacher',
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
							url : server + '/subject',
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
							url : server + '/room',
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

							$('.loading').show();

							var teacher_id = me.data('id');
							var selectedSubject = [];
							var selectedRoom = [];
							var schoolYear_id = sy_id;

							$('.sSubject:checked').each(function(){
								selectedSubject.push($(this).val()); 
							});
							$('.sRoom:checked').each(function(){
								selectedRoom.push($(this).val()); 
							});
							
							$.ajax({
								url : server + '/teacher',
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
									$('.loading').hide();
									if (data.success) {
										$('#setTeacherToSchoolYear, #setTeacherToSchoolYear').modal('hide');
										getAllTeacher();
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