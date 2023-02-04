jQuery(document).ready(function($) {
	$('.tab-title h2').on('click', function(e) {
		if ($(this).parent().parent().find('div.flexed-tab').length !== 0) {
			e.preventDefault()
			$(this).parent().parent().toggleClass('hide')
		}
	})
})