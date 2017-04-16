$(function() {
	var validator = new FormValidator();
	$('form').submit(function(e){
	    var validatorResult = validator.checkAll(this);
	    return !!validatorResult.valid;
	});
	
	// initialize the validator
		// var validator = new FormValidator();

		// // validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
		// $('form')
		// 	.on('blur', 'input[required], input.optional, select.required', function(){
		// 		validator.checkField.call(validator, this)
		// 	})
		// 	.on('change', 'select.required', function(){
		// 		validator.checkField.call(validator, this)
		// 	})
		// 	.on('keypress', 'input[required][pattern]', function(){
		// 		validator.checkField.call(validator, this)
		// 	})

		// $('.multi.required')
		// 	.on('keyup blur', 'input', function(){
		// 		validator.checkField.call( validator, $(this).siblings('[required]')[0] );
		// 	});

		// // bind the validation to the form submit event
		// //$('#send').click('submit');//.prop('disabled', true);

		// $('form').submit(function(e){
		// 	var submit = true,
		// 		validatorResult = validator.checkAll(this);

		// 	return !!validatorResult.valid;
		// });

		// /* FOR DEMO ONLY */
		// $('#vfields').change(function(){
		// 	$('form').toggleClass('mode2');
		// }).prop('checked',false);

		// $('#alerts').change(function(){
		// 	validator.defaults.alerts = (this.checked) ? false : true;
		// 	if( this.checked )
		// 		$('form .alert').remove();
		// }).prop('checked',false);
	
});
