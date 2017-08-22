$(function() {
	// var drivers = $('#drivers').data('field-driver');
	// var option = '';
	// $.each(drivers, function(key, driver) {
	// 	$.each(driver, function(key, value) {
	// 		if(key == 'id') {
	// 			option += '<option value=' + value + '>';
	// 		}
	// 		if(key == 'full_name') {
	// 			option += value + '</option>';
	// 		}
	// 	});
	// });
	$('#add').click(function() {
		var length = $('.dynamic tr').length;
		$('.dynamic tr:last').after(
			'<tr>' +
                '<td>' +
                    '<input type="text" name="fleet[]" id="fleet" class="form-control" required="required">' +
                '</td>' +
                '<td>' +
					'<img id="present' + (length + 1) +'" alt="image_head" width="120" height="120">' +
                    '<input id="present" name="present[]" type="file" class="form-control" onchange="loadFile(event,' + length + ')">' +
                '</td>' +
                '<td>' +
                    '<input type="text" name="capability[]" id="capability" class="form-control" required="required">' +
                '</td>' +
                '<td>' +
                    '<input type="text" name="price[]" id="price" class="form-control" required="required">' +
                '</td>' +
                '<td>' +
                    '<input type="text" name="baggage[]" id="baggage" class="form-control" required="required">' +
                '</td>' +
                // '<td>' +
                //     '<select class="form-control col-md-7 col-xs-12" name="driver_id[]">' +
                //         '<option value="">Choose option</option>' +
                //     	option +
                //     '</select>' +
                // '</td>' +
                '<td>' +
                    '<select class="form-control col-md-7 col-xs-12" name="active[]" >' +
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
	});

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
	});
});
var loadFile = function(event, length) {
	document.getElementById('present' + (length + 1)).src = URL.createObjectURL(event.target.files[0]);
}