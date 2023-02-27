jQuery(document).ready(function () {

	$('.filter-item').on('click', function (e) {
		if ($(e.target).hasClass('first') && $(e.target).closest('ul').hasClass('active')) {
			$(e.target).closest('ul').removeClass('active')
			return
		}
		$('.filter-item').removeClass('active')
		$('.filter-item ul').removeClass('active')
		$(this).addClass('active')
		$(this).find('ul').addClass('active')
		$(e.target).closest('ul').find('li.active').removeClass('active')
		$(e.target).addClass('active')
	})

	$('.btn-reset').on('click', function (e) {

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


	$('.form-filter-date-start svg').on('click', function(e) {
		console.log(e.target);
		console.log($(this).closest('.form-filter-date-start').find('input'));
		$(this).closest('.form-filter-date-start').find('input').click()
	})


	// Navigation on Banner

	$('.banner .nav').on('click', function () {

		$('.nav.active').removeClass('active')

		$(this).addClass('active')

		$('.tender.active').removeClass('active')

		$('.tender[data-number=' + $(this).attr('data-number') + ']').addClass('active')

	})
})