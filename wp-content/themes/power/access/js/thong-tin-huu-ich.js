jQuery(document).ready(function($) {
	$('.infomation-useful .tab-title').on('click', function(){
		$(this).parent('.tab').children('.item-box').toggleClass('hide');
		$(this).closest('.tab').toggleClass('hide');
	})
})