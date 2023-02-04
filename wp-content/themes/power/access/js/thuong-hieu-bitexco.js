jQuery(document).ready(function($) {
	// Other infomation mobile Slider
	$('.core-value-content').slick({
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
})