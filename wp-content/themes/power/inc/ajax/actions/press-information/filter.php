<?php
function press_information_filter() {
	$paged = '1';
	query_action_press_information($paged);
}
add_action('wp_ajax_nopriv_press_information_filter', 'press_information_filter');
add_action('wp_ajax_press_information_filter', 'press_information_filter');