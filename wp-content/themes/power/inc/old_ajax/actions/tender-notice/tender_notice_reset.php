<?php
// Action Reset
function tender_notice_reset_action() {
	$args = [
		'post_type'=> 'tender_notice',
		'posts_per_page' => 8,
		'paged' =>  1,
	];

	$query = new WP_Query($args);

	echo tender_notice_render($query, 1);
	die;
}
add_action('wp_ajax_nopriv_tender_notice_reset_action', 'tender_notice_reset_action');
add_action('wp_ajax_tender_notice_reset_action', 'tender_notice_reset_action');