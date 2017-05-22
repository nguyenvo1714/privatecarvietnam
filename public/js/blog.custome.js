$(function() {
	$('.transfer-blog p:has(img)').css({'text-align': 'center'});
	$('.transfer-blog p:has(img) + p').css({'text-align': 'center'});
	$('.transfer-blog table tbody tr td:has(img)').css({'text-align': 'center'});
	$('.transfer-blog table tbody tr:has(img) + tr').css({'text-align': 'center'});
});