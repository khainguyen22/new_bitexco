jQuery(document).ready(function() {
	$('.nav[role="tablist"] li').on('click', function() {
		$(this).closest('ul').find('li.active').removeClass('active')
		$(this).addClass('active')
		if ($(this).find('a').attr('aria-controls') === 'video') {
			$('button.active').removeClass('active')
			$('button.video').addClass('active')
		}

		if ($(this).find('a').attr('aria-controls') === 'images') {
			$('button.active').removeClass('active')
			$('button.image').addClass('active')
		}
	})
})