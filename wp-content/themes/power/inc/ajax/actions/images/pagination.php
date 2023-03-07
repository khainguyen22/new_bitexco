<?php
function post_nav_action_library_images()

{

	$paged = isset($_POST['paged']) ? $_POST['paged'] : '';

	$name = isset($_POST['data_name']) ? $_POST['data_name'] : '';

	$args = [

		'post_type' => 'library',

		'tax_query' => array(

			array(

				'taxonomy' =>  'type_library',

				'field'    => 'slug',

				'terms'    => 'images',

			),

		),

		'paged' => $paged,

		'post_status' => 'publish',

		'posts_per_page' => 3,

	];

	$query = new WP_Query($args);

	echo render_library_images($query, $paged);

	die;
}

add_action('wp_ajax_nopriv_post_nav_action_library_images', 'post_nav_action_library_images');

add_action('wp_ajax_post_nav_action_library_images', 'post_nav_action_library_images');
