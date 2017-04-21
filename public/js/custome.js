$(function() {
	var validator = new FormValidator();
	$('form').submit(function(e){
	    var validatorResult = validator.checkAll(this);
	    return !!validatorResult.valid;
	});
	
});
