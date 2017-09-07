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
							console.log(data.status);
							picReader.addEventListener("load", function(event) {
			                    var picFile = event.target;
			                    var div = "<img src='" + picFile.result + "'" +
			                        "title='" + picFile.name + "'/><div  class='post-thumb'><div class='inner-post-thumb'><a href='javascript:void(0);' data-id='" + event.target.fileName + "' class='remove-pic'><i class='fa fa-times' aria-hidden='true'></i></a><div></div>";

			                    var li = "<li class='myupload'><span><i class='fa fa-plus' aria-hidden='true'></i><input type='file' name='image_head[]'' click-type='type2' id='picupload' class='picupload'></span></li>";
			                    $("#media-list span i.fa-plus").replaceWith(div);
			                    $("#media-list").append(li);
			                });
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
        //var yet = names.indexOf(removeItem);
        //if (yet != -1) {
            //names.splice(yet, 1);
        //}
        // return array of file name
    });
});