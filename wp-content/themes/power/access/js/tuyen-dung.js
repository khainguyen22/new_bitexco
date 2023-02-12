jQuery(document).ready(function ($) {
	if ($('div.tuyen-dung')) {
		$('.building-dream-content').slick({
			prevArrow: '<svg class="left" width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M25 8.33594L15.6694 19.2217C15.2842 19.671 15.2842 20.3342 15.6694 20.7836L25 31.6693" stroke="#DAA622" stroke-width="1.5" stroke-linecap="round"/></svg>',
			nextArrow: '<svg class="right" width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15 8.33594L24.3306 19.2217C24.7158 19.671 24.7158 20.3342 24.3306 20.7836L15 31.6693" stroke="#DAA622" stroke-width="1.5" stroke-linecap="round"/></svg>',
			autoplay: true,
			arrows: true,
			infinite: true,
			dots: true,
			autoplaySpeed: 5000,
			speed: 500,
			cssEase: 'linear',
			slidesToShow: 1,
			slidesToScroll: 1,
			loop: true,
			responsive: [
				{
					breakpoint: 768,
					settings: {
						slidesToShow: 1,
						arrows: false,
						slidesToScroll: 1,
					}
				},
			]
		});

		$('.life-in-bitexco-content').slick({
			prevArrow: '<svg class="left" width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M25 8.33594L15.6694 19.2217C15.2842 19.671 15.2842 20.3342 15.6694 20.7836L25 31.6693" stroke="#DAA622" stroke-width="1.5" stroke-linecap="round"/></svg>',
			nextArrow: '<svg class="right" width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15 8.33594L24.3306 19.2217C24.7158 19.671 24.7158 20.3342 24.3306 20.7836L15 31.6693" stroke="#DAA622" stroke-width="1.5" stroke-linecap="round"/></svg>',
			autoplay: true,
			arrows: true,
			infinite: true,
			dots: true,
			autoplaySpeed: 5000,
			speed: 500,
			cssEase: 'linear',
			slidesToShow: 3,
			loop: true,
			slidesToScroll: 1,
			// mobileFirst: true,//add this one
			responsive: [
				{
					breakpoint: 767,
					settings: {
						slidesToShow: 3,
						arrows: true,
						slidesToScroll: 1
					}
				},
				{
					breakpoint: 321,
					settings: {
						slidesToShow: 1,
						arrows: false,
						slidesToScroll: 1
					}
				}
			]
		});

		$('.quote-nav-img').on('click', function () {
			$('.quote-nav-img.active').removeClass('active');
			$(this).addClass('active');
			$('.quote-agency-img.active').removeClass('active');
			$('.agency-' + $(this).attr('data-number')).addClass('active');
			$('.quote-text-inner.active').removeClass('active');
			$('.quote-text-' + $(this).attr('data-number')).addClass('active');
		})

		$pause = true;

		$interval = setInterval(() => {
			const childElement = document.querySelector('.quote-navigation').childElementCount
			if ($pause) {
				$element_active = $('.quote-nav-img.active').attr('data-number')
				$element_active = parseInt($element_active)
				if ($element_active == childElement - 1) {
					$element_active = -1;
				}
				$next_elemenet = $element_active + 1;
				$('.quote-nav-img.active').removeClass('active')
				$('.quote-nav-img-' + $next_elemenet.toString()).addClass('active');
				$('.quote-agency-img.active').removeClass('active')
				$('.agency-' + $next_elemenet.toString()).addClass('active');
				$('.quote-text-inner.active').removeClass('active')
				$('.quote-text-' + $next_elemenet.toString()).addClass('active');
			}
		}, 3000);

		$('.quote-nav-img').on('mouseover', function () {
			$pause = false;
		})

		$('.quote-nav-img').on('mouseout', function () {
			$pause = true;
		})

		$('.drop-down').on('click', function () {
			if (!$(this).hasClass('active')) {
				$('.drop-down.active').removeClass('active')
				$(this).toggleClass('active')
				const img_active = $(this).attr('data-number');
				console.log($('img-' + img_active));
				$('.highlight-img.active').removeClass('active');
				$('.img-' + img_active).addClass('active');
				return
			}
			if ($(this).hasClass('active')) {
				$(this).removeClass('active')
				return
			}
		})

		// $('body').on('click', function (e) {
		// 	if (!$(e.target).is('.the-values .drop-down h5')) {
		// 		$('.drop-down.active').removeClass('active')
		// 	}
		// })
	}
});