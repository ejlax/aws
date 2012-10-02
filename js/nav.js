$('.menu_top').click(function(){
	var href = $(this).attr('href');
	$('#mainForm') .hide().load(href) .fadein('normal');
	return false;
	
})
