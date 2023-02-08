jQuery(document).ready(function($) {
	$('.infomation-useful .tab-title').on('click', function(){
		$(this).parent('.tab').children('.item-box').toggleClass('hide');
		$(this).closest('.tab').toggleClass('hide');
	})

	$('.infomation-useful .item').on('click', function() {
		$('.image-version').css('display', 'none');
		$('.text-version').css('display', 'block');
	})
})