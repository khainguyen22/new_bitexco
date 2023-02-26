<?php
// Category Filter Action
function finance_report_ajax() {
	$year = $_POST['year'];

	$args = [
		'post_type'=> 'finance_report',
		'posts_per_page' => 8,
		'paged' => 1,
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

	echo render($query);
	die;
}
add_action('wp_ajax_nopriv_finance_report_ajax', 'finance_report_ajax');
add_action('wp_ajax_finance_report_ajax', 'finance_report_ajax');