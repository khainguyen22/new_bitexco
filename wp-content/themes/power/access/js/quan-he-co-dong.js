jQuery(document).ready(function ($) {
	// Other infomation mobile Slider
	$('.other-content').slick({
		autoplay: true,
		autoplaySpeed: 3000,
		infinite: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		mobileFirst: true,
		arrows: false,
		dots: true,
		responsive: [
			{
				breakpoint: 767,
				settings: "unslick"
			},
		]
	});

	// Navigation on Banner
	$('.nav').on('click', function () {
		$('.nav.active').removeClass('active')
		$(this).addClass('active')
		$('.shareholders-secion.active').removeClass('active')
		$('.s-' + $(this).attr('data-number')).addClass('active')
	})

	// Finance Report Click "Khác"
	$('.other').on('click', function () {
		$(this).toggleClass('active')
		$('.years-list').toggleClass('active');
	})

	// Click outside Clock "Khác"'s Dropdown
	$('body').on('click', function (event) {
		if (!$(event.target).is('.years-list') && !$(event.target).is('.other') && !$(event.target).is('.others') && !$(event.target).is('.additional-years')) {
			$(".years-list.active").removeClass("active");
			$('.other.active').removeClass('active')
		}
	});

	function customClick(section) {
		$(section + ' .years').on('click', function (event) {
			if (!$(event.target).is('.other') && !$(event.target).is('.others') && !$(event.target).is('.additional-years') && !$(event.target).is('.additional-years .years-list .years')) {
				$(section + ' .years.active').removeClass('active');
				$(this).addClass('active');
			}
		})
	}

	customClick('.s-1');
	customClick('.s-3');

	$('.s-1 .additional-years .years-list .years').on('click', function (e) {
		$(".years-list.active").removeClass("active")
		$('.other.active').removeClass('active')
		$('.years').removeClass('active')
		$('.y-18').addClass('active')
		$text = $(this).text()
		$(this).text($('.y-18').text())
		$('.y-18').text($text)
	})

})