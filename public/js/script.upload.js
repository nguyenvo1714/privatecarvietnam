$(function() {
	$('body').on('change', '.picupload', function(event) {
		var files = event.target.files;
		for (var i = 0; i < files.length; i++) {
			var file = files[i];console.log(file);
			if (file.type.match('image')) {

                var picReader = new FileReader();
                picReader.fileName = file.name
                picReader.addEventListener("load", function(event) {

                    var picFile = event.target;

                    // var div = document.createElement("li");

                    var div = "<img src='" + picFile.result + "'" +
                        "title='" + picFile.name + "'/><div  class='post-thumb'><div class='inner-post-thumb'><a href='javascript:void(0);' data-id='" + event.target.fileName + "' class='remove-pic'><i class='fa fa-times' aria-hidden='true'></i></a><div></div>";

                     // var li = document.createElement("li");
                     var li = "<li class='myupload'><span><i class='fa fa-plus' aria-hidden='true'></i><input type='file' name='image_head[]'' click-type='type2' id='picupload' class='picupload'></span></li>";

                    $("#media-list span i.fa-plus").replaceWith(div);
                    $("#media-list").append(li);


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
            picReader.readAsDataURL(file);
		}
	});


	$('body').on('click', '.remove-pic', function() {
        $(this).parent().parent().parent().parent().remove();
        var removeItem = $(this).attr('data-id');
        var yet = names.indexOf(removeItem);

        if (yet != -1) {
            names.splice(yet, 1);
        }
        // return array of file name
        console.log(names);
    });
});