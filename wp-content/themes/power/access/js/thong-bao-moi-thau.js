jQuery(document).ready(function () {

	$('body').on('click', '.form-filter .filter-item',function (e) {
		$(this).toggleClass('active');
		$(this).find('ul').toggleClass('active');
	});
	$('body').on('click', '.form-filter .filter-item li.item', function (e) {
		$(this).closest('.filter-item').find('li.item').removeClass('active');
		$(this).addClass('active');
	});

	$('form-filter .btn-reset').on('click', function (e) {
		$('.filter-item').removeClass('active')
		$('.filter-item ul').removeClass('active')
		$('.filter-item ul li').removeClass('active')
	})



	$('body').on('click', function (e) {
		if (!$(e.target).is('.filter-item ul')
			&& !$(e.target).is('.filter-item')
			&& !$(e.target).is('.filter-item svg')
			&& !$(e.target).is('.filter-item svg path')
			&& !$(e.target).is('.filter-item .item.first')
			&& !$(e.target).is('.filter-item .item font')

		) {
			$('.filter-item.active').removeClass('active')
			$('.filter-item ul.active').removeClass('active')
			if (($(e.target).hasClass('item'))) {
				$(e.target).closest('ul').find('.item.first').removeClass('first')
				$(e.target).closest('div').find('.filter-item.active').removeClass('active')
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