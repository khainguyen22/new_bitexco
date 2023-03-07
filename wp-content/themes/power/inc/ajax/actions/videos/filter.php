<?php
function post_filter_action_library_video()

{

	$name = $_POST['data_name'];

	$paged = '1';

	header("Content-Type: text/html");

	$args = array(

		'suppress_filters' => true,

		'posts_per_page' => 6,

		'paged' => '1',

		'tax_query' => [

			[

				'taxonomy' => 'type_library',

				'field' => 'slug',

				'terms' => 'video'

			]

		],

		'post_type' => 'library',

		"s" =>   $name

	);

	$query = new WP_Query($args);

	echo render_library_video($query, $paged);

	die;
}

add_action('wp_ajax_nopriv_post_filter_action_library_video', 'post_filter_action_library_video');

add_action('wp_ajax_post_filter_action_library_video', 'post_filter_action_library_video');