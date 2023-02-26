jQuery(document).ready(function() {
	$('.filter-item').on('click', function(e) {
		$('.filter-item ul.active').removeClass('active')
		$(this).find('ul').addClass('active')
	})

	$('body').on('click', function(e) {
		if(!$(e.target).is('.filter-item ul') 
		&& !$(e.target).is('.filter-item') 
		&& !$(e.target).is('.filter-item svg')
		// && !$(e.target).is('.filter-item .item.active')
		) {
			$('.filter-item ul').removeClass('active')
		}
	})

	$('.filter-item').on('click', 'ul li', function(e) {
		$(e.target).closest('ul').find('li.active').removeClass('active')
		$(e.target).addClass('active')
	})

	// Navigation on Banner
	$('.banner .nav').on('click', function () {
		$('.nav.active').removeClass('active')
		$(this).addClass('active')
		$('.tender.active').removeClass('active')
		$('.tender[data-number=' + $(this).attr('data-number') + ']').addClass('active')
	})

})