<?php
// Action Reset
function contractor_celection_results_reset() {
	$args = [
		'post_type'=> 'selection_results',
		'posts_per_page' => 8,
		'paged' =>  1,
	];

	$query = new WP_Query($args);

	echo contractor_celection_results_render($query, $paged = 1);
	die;
}
add_action('wp_ajax_nopriv_contractor_celection_results_reset', 'contractor_celection_results_reset');
add_action('wp_ajax_contractor_celection_results_reset', 'contractor_celection_results_reset');