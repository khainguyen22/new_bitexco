
jQuery(document).ready(function ($) {
	// $('.counter').counterUp({
	// 	delay: 10,
	// 	time: 10000
	// });

	$(document).ready(function () {
		$('.page-numbers').addClass('notranslate');
		$('.next').removeClass('notranslate');
		$('.prev').removeClass('notranslate');

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



	$('.nav-login').on('click', function () {
		$('.nav-login .is_login').toggleClass('active');
	})

	// map luoi dien
	$(document).ready(function () {
		$('.goto').click(function () {
			$(this).toggleClass('deactive');
			$('.step').eq($(this).index('.goto')).toggleClass('deactive');
		});
	});

	// $(' form.csw-search-form input[type=text]').on('change invalid', function () {
	// 	var textfield = $(this).get(0);
	// 	textfield.setCustomValidity(' ');
	// 	if (!textfield.validity.valid) {
	// 		textfield.setCustomValidity(' ');
	// 	}

	// });




	function change_single_select_tax($select) {

		jQuery('#' + $select + ' input').each(function () {

			this.type = 'radio';

		});

		jQuery('.' + $select + '-checklist input').each(function () {

			this.type = 'radio';

		});

		jQuery('#' + $select + '-all input').each(function () {

			this.type = 'radio';

		});

	}



	$(document).ready(function () {

		change_single_select_tax('project_type');

		change_single_select_tax('project_company');

		change_single_select_tax('project_location');

		change_single_select_tax('location_company_member');

		change_single_select_tax('type_events_status');

		change_single_select_tax('type_events_location');

		change_single_select_tax('type_events_formality');

		change_single_select_tax('vacancies_location');



	});

	$(document).on('click', '.tru-so .nav-tabs .item', function (e) {

		$('.tru-so .nav-tabs .item').removeClass('active');

		$(this).addClass('active');

	});



	$(document).on('click', '.tru-so .tab-content .item', function (e) {

		$('.tru-so .tab-content .item').removeClass('active');

		$('.tru-so .tab-content .item').removeClass('show');

		$('.tru-so .tab-content .item[data-number=0]').addClass('active');

		$('.tru-so .tab-content .item[data-number=0] .collapse').addClass('show')

		$('.tru-so .tab-content .item .icon-up').removeClass('active');

		$('.tru-so .tab-content .item .icon-down').addClass('active');

		$(this).addClass('active');

		if ($(this).hasClass('active')) {

			$('.tru-so .tab-content .item .collapse').removeClass('show');

			$('.tru-so .tab-content .item .collapse').removeClass('active')

			$(this).addClass('show');

		}

		const map_active = $(this).attr('data-number');

		if ($(this).hasClass('active')) {

			console.log(map_active);

		}

		$('.tru-so .tab-content .map.active').removeClass('active');

		$('.tru-so .tab-content .map[data-number=' + map_active + ']').addClass('active');

	});



	$(document).on('click', '.nav-item-icon-search', function (e) {

		$(this).addClass("is-active");

		$('.navbar').addClass("nav-is-active");

		$(".search").addClass("is-active");

		$(".close-button").addClass("is-active");

		$('.burger').removeClass("is-active");

		$(".menu-main-container").removeClass("is-active");



	});



	$(document).on('click', '.nav-item-icon-search.is-active', function () {

		$('.nav-item-icon-search').removeClass("is-active");

		$(".search").removeClass("is-active");

		$('.navbar').removeClass("nav-is-active");

		$(".close-button").removeClass("is-active");



	});


	// $('#input-form-search').keypress(function (e) {
	// 	if (e.which == 13) {
	// 		if (e.value == '' || e.value == e.defaultValue) {
	// 			$('.emailHelp').addClass('active');
	// 			setTimeout(function () {
	// 				$('.emailHelp').removeClass('active');
	// 			}, 2000);
	// 		}
	// 		return false;
	// 	} else {
	// 		$('form#form-search').submit();
	// 		return false;
	// 	}
	// });

	// $('#btn-submit-icon').on('click', function () {
	// 	if ($('#input-form-search').value == '' || $('#input-form-search').value == $('#input-form-search').defaultValue) {
	// 		$('.emailHelp').addClass('active');
	// 		setTimeout(function () {
	// 			$('.emailHelp').removeClass('active');
	// 		}, 2000);
	// 	} else {
	// 		$('form#form-search').submit();
	// 	}
	// });





	var input = document.getElementById("input-form-search");

	input.addEventListener("keypress", function (event) {

		if (event.key === "Enter") {

			event.preventDefault();

			$('form#form-search').submit();

		}

	});

	$(document).on('click', '.mega-menu-item', function () {

		$('.nav-item-icon-search').removeClass("is-active");

		$(".search").removeClass("is-active");

		$('.navbar').removeClass("nav-is-active");

		$(".close-button").removeClass("is-active");

	});

	$(".mega-menu-item").hover(function (e) {

		$(this).addClass('active');

	}, function () {

		$(this).removeClass('active');

	});

	$(document).on('click', '.burger', function () {

		$('.burger').addClass("is-active");

		$('.navbar').addClass("nav-is-active");

		$(".menu-main-container").addClass("is-active");

		$('.menu-image').addClass("is-active");

		$('.main-menu-primary').addClass("is-active");

		$('.sub-menu').addClass("is-active");

		$('.nav-item-icon-search').removeClass("is-active");

		$(".search").removeClass("is-active");

		$(".close-button").removeClass("is-active");

		$('.main-menu-primary .main-menu-primary-item').removeClass('active');

		$('.main-menu-primary .main-menu-primary-item').first().addClass('active');

	});



	$(document).on('click', '.burger.is-active', function () {

		$('.burger').removeClass("is-active");

		$(".menu-main-container").removeClass("is-active");

		$('.navbar').removeClass("nav-is-active");

		$('.menu-image').removeClass("is-active");

		$('.main-menu-primary').removeClass("is-active");

		$('.sub-menu').removeClass("is-active");

		$('.main-menu-primary .main-menu-primary-item').removeClass('active');

	});

	$(document).on('click', '.main-menu-primary .menu-item-has-children', function (e) {

		$('.main-menu-primary .main-menu-primary-item').removeClass('active-default');

		$('.main-menu-primary .main-menu-primary-item').removeClass('active');

		$('.main-menu-primary .menu-item-has-children').removeClass('active');

		$('.main-menu-primary .menu-item-has-children .head_sub_menu .title').text($(this).children('a').text());

		$(this).addClass('active');

	});

	$(document).ready(function () {

		$('.main-menu-primary .menu-item-has-children>.sub-menu ').prepend('<div class="head_sub_menu"><p class="title">Giới thiệu</p><p class="desc"></p></div>');

	});

	$(document).on('click', '.main-menu-primary .menu-item-has-children.active', function (e) {

		$('.main-menu-primary .main-menu-primary-item').removeClass('active');

		$(this).addClass('active');

	});

	$(document).on('click', '.main-menu-primary .menu-item-has-children .sub-menu .menu-item-has-children', function (e) {

		$('.main-menu-primary .main-menu-primary-item').removeClass('active-default');

		$('.main-menu-primary .menu-item-has-children .sub-menu .menu-item-has-children').removeClass('is_active');

		$(this).addClass('is_active');

	});

	$(document).on('click', '.main-menu-primary .menu-item-has-children .sub-menu .menu-item-has-children.is_active', function (e) {

		$('.main-menu-primary .menu-item-has-children .sub-menu .menu-item-has-children').removeClass('is_active');

	});





	// home slider



	$('.home-slide-carousel').slick({

		nextArrow: '<i class="fas fa-chevron-right slick-next"></i>',

		prevArrow: '<i class="fas fa-chevron-left slick-prev"></i>',

		autoplay: true,

		autoplaySpeed: 5000,

		dots: true,

		vertical: true,

		arrows: false,

		infinite: false,

		loop: false,

		speed: 500,

		cssEase: 'linear',

		slidesToShow: 1,

		slidesToScroll: 1,

		customPaging: function (slider, i) {

			var title = $(slider.$slides[i]).data('title');

			return '<span> ' + title + ' </span>';

		},

	});



	$('.slide-img').on('click', function () {

		$('.slide-img').removeClass('active');

		$(this).addClass('active');

	});



	$('.slider-cards').slick({

		nextArrow: '<span  class="slick-next"><svg width="12" height="26" viewBox="0 0 12 26" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.999999 1.33398L10.3306 12.2197C10.7158 12.6691 10.7158 13.3322 10.3306 13.7816L1 24.6673" stroke="#DAA622" stroke-width="1.5" stroke-linecap="round"/></svg></span>',

		prevArrow: '<span  class="slick-prev"><svg width="12" height="26" viewBox="0 0 12 26" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M11 1.33398L1.66938 12.2197C1.2842 12.6691 1.2842 13.3322 1.66939 13.7816L11 24.6673" stroke="#DAA622" stroke-width="1.5" stroke-linecap="round"/></svg></span>',

		autoplaySpeed: 2000,

		arrows: true,

		autoplay: true,

		infinite: true,

		speed: 500,

		cssEase: 'linear',

		slidesToShow: 3,

		slidesToScroll: 1,

		responsive: [

			{

				breakpoint: 1024,

				settings: {

					slidesToShow: 2,

					arrows: false,

				}

			},

			{

				breakpoint: 768,

				settings: {

					slidesToShow: 1,

					arrows: false,

				}

			},

		]

	});
	var a = 0;
	$(window).scroll(function () {
		var oTop = $(".count").offset().top - window.innerHeight;
		if (a == 0 && $(window).scrollTop() > oTop) {
			$(".counter").each(function () {
				var $this = $(this),
					countTo = $this.attr("data-number");
				$({
					countNum: $this.text()
				}).animate(
					{
						countNum: countTo
					},

					{
						duration: 1500,
						easing: "swing",
						step: function () {
							//$this.text(Math.ceil(this.countNum));
							$this.text(
								Math.ceil(this.countNum).toLocaleString("en")
							);
						},
						complete: function () {
							$this.text(
								Math.ceil(this.countNum).toLocaleString("en")
							);
							//alert('finished');
						}
					}
				);
			});
			a = 1;
		}
		// var a = 0;
	});

});
