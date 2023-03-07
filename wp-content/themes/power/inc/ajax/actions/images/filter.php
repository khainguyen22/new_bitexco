<?php

// Start Filter & Pagination library image

function post_filter_action_library_images()

{

	$name = isset($_POST['data_name']) ? $_POST['data_name'] : '';

	$paged = '1';

	header("Content-Type: text/html");

	$args = array(

		'suppress_filters' => true,

		'posts_per_page' => 2,

		'paged' => '1',

		'post_type' => 'library',

		'tax_query' => [

			[

				'taxonomy' => 'type_library',

				'field' => 'slug',

				'terms' => 'images'

			]

		],

		"s" =>   $name

	);



	$query = new WP_Query($args);



	echo render_library_images($query, $paged);

	die;
}

add_action('wp_ajax_nopriv_post_filter_action_library_images', 'post_filter_action_library_images');

add_action('wp_ajax_post_filter_action_library_images', 'post_filter_action_library_images');
