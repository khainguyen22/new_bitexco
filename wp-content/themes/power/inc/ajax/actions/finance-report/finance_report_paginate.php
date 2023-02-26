<?php

// Navigation Action on Finace Report Page
function navigation_post_report_ajax() {
	$paged = $_POST['paged'];
	$year = $_POST['year'];

	$args = [
		'post_type'=> 'finance_report',
		'posts_per_page' => 8,
		'paged' => $paged,
		's' => $_POST['inputValue'],
		'exact' => false,                       
    'sentence' => true,
		'tax_query' => [
			[
					'taxonomy' => 'years',
					'field'=> 'slug',
					'terms' => $year
			]
		]
	];
	$query = new WP_Query($args);

	echo render($query, $paged);
	die;
}
add_action('wp_ajax_nopriv_navigation_post_report_ajax', 'navigation_post_report_ajax');
add_action('wp_ajax_navigation_post_report_ajax', 'navigation_post_report_ajax');