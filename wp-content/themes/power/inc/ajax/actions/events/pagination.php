<?php

function post_nav_action_events()

{

	$paged = (isset($_POST['paged']) ? $_POST['paged'] : '');

	$name = (isset($_POST['data_name'])) ? $_POST['data_name'] : '';

	$args = [

		'post_type' => 'events',

	];

	$query = new WP_Query($args);



	echo render_action_events($query, $paged);

	die;
}

add_action('wp_ajax_nopriv_post_nav_action_events', 'post_nav_action_events');

add_action('wp_ajax_post_nav_action_events', 'post_nav_action_events');
