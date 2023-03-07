<?php
// Type Filter Action
function shareholder_report_ajax()
{
	$type = isset($_POST['type']) ? $_POST['type'] : '';

	$args = [
		'post_type' => 'shareholder_report',
		'posts_per_page' => 8,
		'paged' => 1,
		'tax_query' => [
			[
				'taxonomy' => 'shareholder_doc_cat',
				'field' => 'slug',
				'terms' => $type
			]
		]
	];
	$query = new WP_Query($args);

	echo render($query);
	die;
}
add_action('wp_ajax_nopriv_shareholder_report_ajax', 'shareholder_report_ajax');
add_action('wp_ajax_shareholder_report_ajax', 'shareholder_report_ajax');
