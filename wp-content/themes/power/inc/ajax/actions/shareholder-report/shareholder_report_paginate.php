<?php
// Navigation Action
function shareholder_report_nav_action()
{
	$paged = isset($_POST['paged']) ? $_POST['paged'] : '';

	$args = [
		'post_type' => 'shareholder_report',
		'posts_per_page' => 8,
		'paged' => $paged,
		's' => $_POST['inputValue'],
		'exact' => false,
		'sentence' => true,
	];
	$query = new WP_Query($args);

	echo render($query, $paged);
	die;
}
add_action('wp_ajax_nopriv_shareholder_report_nav_action', 'shareholder_report_nav_action');
add_action('wp_ajax_shareholder_report_nav_action', 'shareholder_report_nav_action');
