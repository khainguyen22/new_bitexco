<?php
function post_nav_action_library_video()

{

	$paged = isset($_POST['paged']) ? $_POST['paged'] : '';

	$name = isset($_POST['data_name']) ? $_POST['data_name'] : '';

	$args = [

		'post_type' => 'library',

		'posts_per_page' => 6,

		'paged' => $paged,

		'tax_query' => [

			[

				'taxonomy' => 'type_library',

				'field' => 'slug',

				'terms' => 'video'

			]

		],

		's' => $name

	];

	$query = new WP_Query($args);

	echo render_library_video($query, $paged);

	die;
}

add_action('wp_ajax_nopriv_post_nav_action_library_video', 'post_nav_action_library_video');

add_action('wp_ajax_post_nav_action_library_video', 'post_nav_action_library_video');
