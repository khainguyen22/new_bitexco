jQuery(document).ready(function() {
	var currentSubmenuItem = 	$('.mega-current-menu-item');
	$('.mega-sub-menu .mega-menu-item').on('mouseover', function() {{
		$('.mega-current-menu-item').removeClass('mega-current-menu-item')
	}})

	$('.mega-sub-menu .mega-menu-item').on('mouseout', function() {{
		currentSubmenuItem.addClass('mega-current-menu-item')
	}})
})