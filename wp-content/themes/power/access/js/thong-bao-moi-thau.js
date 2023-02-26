jQuery(document).ready(function() {
	$('.filter-item').on('click', function(e) {
		if ($(e.target).hasClass('first') && $(e.target).closest('ul').hasClass('active')) {
			$(e.target).closest('ul').removeClass('active')
			return
		}
		$('.filter-item ul.active').removeClass('active')
		$(this).find('ul').addClass('active')
		$(e.target).closest('ul').find('li.active').removeClass('active')
		$(e.target).addClass('active')
	})

	$('body').on('click', function(e) {
		if(!$(e.target).is('.filter-item ul') 
		&& !$(e.target).is('.filter-item') 
		&& !$(e.target).is('.filter-item svg')
		&& !$(e.target).is('.filter-item svg path')
		&& !$(e.target).is('.filter-item .item.first')
		) {
			$('.filter-item ul').removeClass('active')
			if (($(e.target).hasClass('item'))) {
				$(e.target).closest('ul').find('.item.first').removeClass('first')
				$(e.target).addClass('first')
			}
		}
	})

	// Navigation on Banner
	$('.banner .nav').on('click', function () {
		$('.nav.active').removeClass('active')
		$(this).addClass('active')
		$('.tender.active').removeClass('active')
		$('.tender[data-number=' + $(this).attr('data-number') + ']').addClass('active')
	})

})