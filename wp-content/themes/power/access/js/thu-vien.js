jQuery(document).ready(function() {
	$('.nav[role="tablist"] li').on('click', function() {
		$(this).closest('ul').find('li.active').removeClass('active')
		$(this).addClass('active')
	})
})