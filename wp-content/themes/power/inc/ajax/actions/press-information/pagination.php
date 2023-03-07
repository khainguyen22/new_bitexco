<?php
function press_information_pag() {
	$paged = $_POST['paged'];
	query_action_press_information($paged);
}
add_action('wp_ajax_nopriv_press_information_pag', 'press_information_pag');
add_action('wp_ajax_press_information_pag', 'press_information_pag');