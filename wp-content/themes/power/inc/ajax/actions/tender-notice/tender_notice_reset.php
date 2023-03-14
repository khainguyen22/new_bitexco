<?php
// Action Reset
function tender_notice_reset_action() {
	$args = [
		'post_type'=> 'tender_notice',
		'posts_per_page' => 8,
		'paged' =>  1,
		'meta_key' => 'releasing_status', // Custom field to sort by
		'orderby' => array(
			'meta_value' => 'ASC', // Sort by ascending order of meta_value
		),
		// 'orderby' => 'meta_value',
		'order' => 'ASC' // Sort in ascending order
	];

	$query = new WP_Query($args);

	echo tender_notice_render($query, 1);
	die;
}
add_action('wp_ajax_nopriv_tender_notice_reset_action', 'tender_notice_reset_action');
add_action('wp_ajax_tender_notice_reset_action', 'tender_notice_reset_action');