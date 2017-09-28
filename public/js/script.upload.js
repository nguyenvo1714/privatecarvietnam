$(function() {
	$('body').on('change', '.picupload', function(event) {
		var files = event.target.files;
		var formData = new FormData();
		//var form = $(this)[0].files[0];
		formData.append('image_head', files[0]);
		// for (var i = 0; i < files.length; i++) {
			//var file = files[i];
			if (files[0].type.match('image')) {
				var url = $('#transferForm').prop('action');
				var token = $('input[name="_token"]').attr('value');
				var flag = 'add';
				formData.append('_token', token);
				formData.append('flag', flag);
                var picReader = new FileReader();
                picReader.fileName = files[0].name;
                $.ajax({
					url: url,
					type: 'POST',
					data: formData,
					contentType: false,
					processData: false,
					success: function(data) {
						if (data.status == true) {
		                    var div = "<img src='/storage/" + data.image_name + "'" +
		                        "title='" + data.image_name + "'/><div  class='post-thumb'><div class='inner-post-thumb'><a href='javascript:void(0);' data-id='" + event.target.fileName + "' class='remove-pic'><i class='fa fa-times' aria-hidden='true'></i></a><div></div>";

		                    var li = "<li class='myupload'><span><i class='fa fa-plus' aria-hidden='true'></i><input type='file' name='image_head[]'' click-type='type2' id='picupload' class='picupload'></span></li>";
		                    $("#media-list span i.fa-plus").replaceWith(div);
		                    $("#media-list").append(li);
						}
					}
                });
            } else {
                var picReader = new FileReader();
                picReader.fileName = file.name
                picReader.addEventListener("load", function(event) {

                    var picFile = event.target;

                    var div = document.createElement("li");

                    div.innerHTML = "<video src='" + picFile.result + "'" +
                        "title='" + picFile.name + "'></video><div class='post-thumb'><div  class='inner-post-thumb'><a href='javascript:void(0);' data-id='" + event.target.fileName + "' class='remove-pic'><i class='fa fa-times' aria-hidden='true'></i></a><div></div>";

                    $("#media-list").prepend(div);

                });
            }
            picReader.readAsDataURL(files[0]);
		// }
	});

	//remove image for transfer slide
	$('body').on('click', '.remove-pic', function() {
		var that = $(this);
        var removeItem = $(this).attr('data-id');
        var url = $('#transferForm').prop('action');
		var token = $('input[name="_token"]').attr('value');
		var flag = 'remove';
		$.ajax({
			url: url,
			type: 'POST',
			data: {_token: token, removeItem: removeItem, flag: flag},
			success: function(response) {
				if (response.status == true) {
					that.parent().parent().parent().parent().remove();
				}
			}
		});
    });

	//remove image
	$('body').on('click', '.remove-image', function() {
		var that = $(this);
		that.parent().parent().parent().find('img').attr('src', '');
    });

    //upload of create transfer for image_thumb
	var input_thumb = $('.image_thumb');
	var label_thumb = $('.label_thumb');
	showName = function (files) {
		label_thumb.text(files.length > 1 ? (input.attr('data-multiple-caption') || '').replace('{name}', files.length) : files[0].name);
	}
	input_thumb.on('drop', function(e) {
		droppedFiles = e.originalEvent.dataTransfer.files; // the files that were dropped
		showName( droppedFiles );
	});
	input_thumb.on('change', function (e) {
		showName(e.target.files);
	});

    //upload of create transfer for image_head
	var input = $('.image_head');
	var label = $('.label_head');
	showFiles = function (files) {
		label.text(files.length > 1 ? (input.attr('data-multiple-caption') || '').replace('{count}', files.length) : files[0].name);
	}
	input.on('drop', function(e) {
		droppedFiles = e.originalEvent.dataTransfer.files; // the files that were dropped
		showFiles( droppedFiles );
	});
	input.on('change', function (e) {
		showFiles(e.target.files);
	});

	//upload of create transferName for thumb
	var input_thumb = $('.thumb');
	var label_thumb = $('.label_thumb');
	showName = function (files) {
		label_thumb.text(files.length > 1 ? (input.attr('data-multiple-caption') || '').replace('{name}', files.length) : files[0].name);
	}
	input_thumb.on('drop', function(e) {
		droppedFiles = e.originalEvent.dataTransfer.files; // the files that were dropped
		showName( droppedFiles );
	});
	input_thumb.on('change', function (e) {
		showName(e.target.files);
	});

	//upload of edit  transferName
	$('body').on('change', '.thumb', function(event) {
		var file = event.target.files[0];
		$('.transferName_thumb').attr('src', URL.createObjectURL(file));
	});

	//upload of edit  transfer
	$('body').on('change', '.image_thumb', function(event) {
		var file = event.target.files[0];
		$('.transfer_thumb').attr('src', URL.createObjectURL(file));
	});
});