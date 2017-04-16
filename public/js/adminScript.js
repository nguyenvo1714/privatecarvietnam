$(function() {
	if($('.side-menu li.parent a').hasClass('active')) {
		$('.side-menu li.parent a.active').find('.fa-angle-down').removeClass('fa-angle-down').addClass('fa-angle-up');	
	}
	$('.side-menu li.parent a').on('click', function () {
		if($(this).hasClass('active')) {
			$(this).removeClass('active');
			$('.side-menu li.parent').removeClass('active');
			$(this).find('.fa-angle-up').removeClass('fa-angle-up').addClass('fa-angle-down');
		} else {
			$('.side-menu li.parent').addClass('active');
			$(this).addClass('active');
			$(this).find('.fa-angle-down').removeClass('fa-angle-down').addClass('fa-angle-up');
		}
		$('.nav-child li a').removeClass('active');
	});

	// $('.nav-child li').on('click', function () {
	// 	if($(this).attr('id') === 'list1') {
	// 		$(this).closest("li").addClass('current-page');
	// 		$('.collapse #list2').removeClass('current-page');
	// 		$('.collapse #list3').removeClass('current-page');
	// 	} else if($(this).attr('id') === 'list2'){
	// 		$(this).closest("li").addClass('current-page');
	// 		$('.collapse #list1').removeClass('current-page');
	// 		$('.collapse #list3').removeClass('current-page');
	// 	} else {
	// 		$(this).closest("li").addClass('current-page');
	// 		$('.collapse #list1').removeClass('current-page');
	// 		$('.collapse #list2').removeClass('current-page');
	// 	}
	// });
	/* Call view place */ 
	$('.call-view-place').click(function() {
		var id = $(this).attr('id');
		$.ajax ({
			method: 'GET',
			url: '/place/' + id,
			success: function(result) {
				$('.modal-title').html($(result).find('.x_title')) &&
				$('.modal-body').html($(result).find('.table'));
			}
		});
	})
	/**Call edit place*/ 
	$('.call-edit-place').click(function() {
		var id = $(this).attr('id');
		$.ajax ({
			method: 'GET',
			url: '/place/' + id + '/edit',
			success: function(result) {
				// $('.modal-body').find('.x_content');
				$('.modal-title').html($(result).find('.x_title')) &&
				$('.modal-body').html($(result).find('.x_content'));
			}
		});
	})

	/* Call view type */ 
	$('.call-view-type').click(function() {
		var id = $(this).attr('id');
		$.ajax ({
			method: 'GET',
			url: '/type/' + id,
			success: function(result) {
				$('.modal-title').html($(result).find('.x_title')) &&
				$('.modal-body').html($(result).find('.table'));
			}
		});
	})
	/**Call edit type*/ 
	$('.call-edit-type').click(function() {
		var id = $(this).attr('id');
		$.ajax ({
			method: 'GET',
			url: '/type/' + id + '/edit',
			success: function(result) {
				// $('.modal-body').find('.x_content');
				$('.modal-title').html($(result).find('.x_title')) &&
				$('.modal-body').html($(result).find('.x_content'));
			}
		});
	})

	/* Call view blog */ 
	$('.call-view-blog').click(function() {
		var id = $(this).attr('id');
		$.ajax ({
			method: 'GET',
			url: '/blog/' + id,
			success: function(result) {
				$('.modal-title').html($(result).find('.x_title')) &&
				$('.modal-body').html($(result).find('.table'));
			}
		});
	})
	/**Call edit blog */ 
	$('.call-edit-blog').click(function() {
		var id = $(this).attr('id');
		$.ajax ({
			method: 'GET',
			url: '/blog/' + id + '/edit',
			success: function(result) {
				$('.modal-title').html($(result).find('.x_title')) &&
				$('.modal-body').html($(result).find('.x_content'));
			}
		});
	})

	/* Call view tour */ 
	$('.call-view-tour').click(function() {
		var id = $(this).attr('id');
		$.ajax ({
			method: 'GET',
			url: '/tour/' + id,
			success: function(result) {
				$('.modal-title').html($(result).find('.x_title')) &&
				$('.modal-body').html($(result).find('.table'));
			}
		});
	})

	/* Call view transfer */ 
	$('.call-view-transfer').click(function() {
		var id = $(this).attr('id');
		$.ajax ({
			method: 'GET',
			url: '/transfer/' + id,
			success: function(result) {
				$('.modal-title').html($(result).find('.x_title')) &&
				$('.modal-body').html($(result).find('.table'));
			}
		});
	})

	/* Call view driver */ 
	$('.call-view-driver').click(function() {
		var id = $(this).attr('id');
		$.ajax ({
			method: 'GET',
			url: '/driver/' + id,
			success: function(result) {
				$('.modal-title').html($(result).find('.x_title')) &&
				$('.modal-body').html($(result).find('.table'));
			}
		});
	})

	/* Call edit driver */ 
	$('.call-edit-driver').click(function() {
		var id = $(this).attr('id');
		$.ajax ({
			method: 'GET',
			url: '/driver/' + id + '/edit',
			success: function(result) {
				$('.modal-title').html($(result).find('.x_title')) &&
				$('.modal-body').html($(result).find('.x_content'));
			}
		});
	})

	/* Call edit transferName */ 
	$('.call-edit-transferName').click(function() {
		var id = $(this).attr('id');
		$.ajax ({
			method: 'GET',
			url: '/transferName/' + id + '/edit',
			success: function(result) {
				$('.modal-title').html($(result).find('.x_title')) &&
				$('.modal-body').html($(result).find('.x_content'));
			}
		});
	})
	
	/*Add new car input*/
	// $('#add').click(function() {
	// 	var number = $('.dynamic li').length;
	// 	$('.dynamic li:last').after(
	// 		'<li style="margin-top: 15px;">' +
 //                '<div class="field item form-group">' +
 //                    '<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">' +
 //                        'Name <span class="required">*</span>' +
 //                    '</label>' +
 //                    '<div class="col-md-6 col-sm-6 col-xs-12">' +
 //                        '<input id="name" name="name[]" required="required" class="form-control col-md-7 col-xs-12" type="text">' +
 //                    '</div>' +
 //                    '<div class="alert">please put something here</div>' +
 //                '</div>' +
 //                '<div class="field item form-group">' +
 //                    '<label class="control-label col-md-3 col-sm-3 col-xs-12" for="carType">' +
 //                        'Car Type <span class="required">*</span>' +
 //                    '</label>' +
 //                    '<div class="col-md-6 col-sm-6 col-xs-12">' +
 //                        '<input id="carType" name="carType[]" required="required" class="form-control col-md-7 col-xs-12" type="text">' +
 //                    '</div>' +
 //                    '<div class="alert">please put something here</div>' +
 //                '</div>' +
 //                '<div class="field item form-group">' +
 //                    '<label class="control-label col-md-3 col-sm-3 col-xs-12" for="status">' +
 //                        'Status <span class="required">*</span>' +
 //                    '</label>' +
 //                    '<div class="col-md-6 col-sm-6 col-xs-12">' +
 //                        '<input id="status" name="status[]" required="required" class="form-control col-md-7 col-xs-12" type="text">' +
 //                    '</div>' +
 //                    '<div class="alert">please put something here</div>' +
 //                '</div>' +
 //                '<div class="field item form-group">' +
 //                    '<label class="control-label col-md-3 col-sm-3 col-xs-12" for="driver">' +
 //                        'Driver <span class="required">*</span>' +
 //                    '</label>' +
 //                    '<div class="col-md-6 col-sm-6 col-xs-12">' +
 //                        '<input id="driver" name="driver[]" required="required" class="form-control col-md-7 col-xs-12" type="text">' +
 //                    '</div>' +
 //                    '<div class="alert">please put something here</div>' +
 //                '</div>' +
 //                '<div class="field item form-group">' +
 //                    '<label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">' +
 //                        'Number <span class="required">*</span>' +
 //                    '</label>' +
 //                    '<div class="col-md-6 col-sm-6 col-xs-12">' +
 //                        '<input id="number" name="number[]" required="required" data-validate-minmax="1,10" class="form-control col-md-7 col-xs-12" type="number">' +
 //                    '</div>' +
 //                    '<div class="alert">please put something here</div>' +
 //                '</div>' +
 //                '<div class="ln_solid seperate"></div>' +
 //            '</li>'
	// 	);
	// 	$('#remove').removeAttr('disabled');
	// 	if($('.dynamic li').length >= 3) {
	// 		$('#add').attr('disabled', true);
	// 	}
	// 	return false;
	// }); 

	// /*Remove new car input*/
	// $('#remove').click(function() {
	// 	if($('.dynamic li').length > 1) {
	// 		$('.dynamic li:last').remove();
	// 	}
	// 	if ($('.dynamic li').length <= 1) {
 //            $('#remove').attr('disabled', true);
 //        } else if ($('.dynamic li').length <= 3) {
 //            $('#add').removeAttr('disabled');
            
 //        }
 //        return false;
	// })
	var drivers = $('#drivers').data('field-driver');
	var option = '';
	$.each(drivers, function(key, driver) {
		$.each(driver, function(key, value) {
			if(key == 'id') {
				option += '<option value=' + value + '>';
			}
			if(key == 'fullName') {
				option += value + '</option>';
			}
		});
	});

	$('#add').click(function() {
		var length = $('.dynamic tr').length;
		$('.dynamic tr:last').after(
			'<tr>' +
                '<td>' +
                    '<input type="text" name="fleet[]" id="fleet" class="form-control" required="required">' +
                '</td>' +
                '<td>' +
                    '<input type="text" name="capability[]" id="capability" class="form-control" required="required">' +
                '</td>' +
                '<td>' +
                    '<input type="text" name="class[]" id="class" class="form-control" required="required">' +
                '</td>' +
                '<td>' +
                    '<input type="text" name="price[]" id="price" class="form-control" required="required">' +
                '</td>' +
                '<td>' +
                    '<input type="text" name="baggage[]" id="baggage" class="form-control" required="required">' +
                '</td>' +
                '<td>' +
                    '<select class="required form-control col-md-7 col-xs-12" name="driver_id[]">' +
                        '<option value="">Choose option</option>' +
                    	option +
                    '</select>' +
                '</td>' +
                '<td>' +
                    '<select class="required form-control col-md-7 col-xs-12" name="isActive[]" >' +
                        '<option value="">Choose option</option>' +
                        '<option value=0>0</option>' +
                        '<option value=1>1</option>' +
                    '</select>' +
                '</td>' +
            '</tr>'
		);
		$('#remove').removeAttr('disabled');
		if($('.dynamic tr').length >= 6) {
			$('#add').attr('disabled', true);
			$('#add').css('pointer-events', 'none');
		}
		return false;
	})


	/*Remove new car input*/
	$('#remove').click(function() {
		if($('.dynamic tr').length > 1) {
			$('.dynamic tr:last').remove();
		}
		if ($('.dynamic tr').length <= 1) {
            $('#remove').attr('disabled', true);
        } else if ($('.dynamic tr').length <= 3) {
            $('#add').removeAttr('disabled');
            
        }
        return false;
	})

	var selectType = $('#type');
	var selectedBlog = $('#blog');
	var selectedPlace = $('#place');
	var selectedDiscount = $('#discount');
	var selectedDriver = [];
	var selectedActive = [];
	var selectedTransfer = $('#transferName');

	selectType.find('option[value="' + selected_type + '"]').prop('selected', true);
	selectType.trigger('change');
	selectedBlog.find('option[value="' + selected_blog + '"]').prop('selected', true);
	selectedBlog.trigger('change');
	selectedPlace.find('option[value="' + selected_place + '"]').prop('selected', true);
	selectedPlace.trigger('change');
	selectedDiscount.find('option[value="' + selected_isDiscount + '"]').prop('selected', true);
	selectedDiscount.trigger('change');
	// selectedActive.find('option[value="' + selected_active + '"]').prop('selected', true);
	// selectedActive.trigger('change');
	selectedTransfer.find('option[value="' + selected_transfer + '"]').prop('selected', true);
	selectedTransfer.trigger('change');

	$.each(selected_driver, function(key, driver) {
		selectedDriver[key] = $('#driver'+ key);
		selectedDriver[key].find('option[value="' + selected_driver[key] + '"]').prop('selected', true);
		selectedDriver[key].trigger('change');
		console.log(selectedDriver[key]);
	});
// console.log(selected_active[0]);
	$.each(selected_active, function(key, driver) {
		selectedActive[key] = $('#active'+ key);
		selectedActive[key].find('option[value="' + selected_active[key] + '"]').prop('selected', true);
		selectedActive[key].trigger('change');
	});
});

function call_edit_car(id) {
	$.ajax ({
		method: 'GET',
		url: '/car/' + id + '/edit',
		success: function(result) {
			// $('.modal-body').find('.x_content');
			console.log(result);
			$('.modal-title').html($(result).find('.x_title')) &&
			$('.modal-body').html($(result).find('.x_content'));
		}
	});
}

function call_edit_contract(id) {
	$.ajax ({
		method: 'GET',
		url: '/contract/' + id + '/edit',
		success: function(result) {
			// $('.modal-body').find('.x_content');
			console.log(result);
			$('.modal-title').html($(result).find('.x_title')) &&
			$('.modal-body').html($(result).find('.x_content'));
		}
	});
}

function show_detail(selector, id) {
	var exist = $(selector).find('.car-detail');
	var next = $(selector).next('table.contract-detail');
	console.log(next);
	if(exist.length == 0) {
		$.ajax({
			method: 'GET',
			url: '/transfer/' + id,
			success: function(result) {
				$(selector).append($(result).find('.car-detail'));
				$(selector).next('table.contract-detail').append($(result).find('.contract-detail'));
			}
		});	
	}
	var status = $(selector).css('display');
	if(status == 'none') {
		$(selector).css('display', 'block');
		$(selector).next('table').css('display', 'block');
		$(selector).slideDown();
		$(selector).next('table').slideDown();
	} else {
		$(selector).next('table').slideDown();
		$(selector).slideUp();
		$(selector).next('table').css('display', 'none');
		$(selector).css('display', 'none');
	}
}


		
