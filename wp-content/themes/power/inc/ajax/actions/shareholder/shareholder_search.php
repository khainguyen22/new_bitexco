<?php

// Search Action
function post_search_ajax()
{
	$args = [
		'post_type' => 'shareholders',
		'posts_per_page' => 8,
		'paged' => 1,
		's' =>  isset($_POST['inputValue']) ? $_POST['inputValue'] : '',
		'type' =>  isset($_POST['inputValue']) ? $_POST['inputValue'] : '',
		'exact' => false,
		'sentence' => true,
	];
	$query = new WP_Query($args);

	$max_num_pages = $query->max_num_pages;

	echo render($query);
	die;
}
add_action('wp_ajax_nopriv_post_search_ajax', 'post_search_ajax');
add_action('wp_ajax_post_search_ajax', 'post_search_ajax');
