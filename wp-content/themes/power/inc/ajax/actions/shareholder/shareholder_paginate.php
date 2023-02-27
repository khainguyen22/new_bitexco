<?php

// Navigation Action
function navigation_post_ajax() {
	$paged = $_POST['paged'];

	$args = [
		'post_type'=> 'shareholders',
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
add_action('wp_ajax_nopriv_navigation_post_ajax', 'navigation_post_ajax');
add_action('wp_ajax_navigation_post_ajax', 'navigation_post_ajax');