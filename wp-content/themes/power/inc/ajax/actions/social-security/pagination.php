<?php

function post_nav_action_social_security()

{

	$slug = (isset($_POST['data_slug'])) ? $_POST['data_slug'] : '';

	$paged = $_POST['paged'];

	$name = (isset($_POST['data_name'])) ? $_POST['data_name'] : '';

	$location = (isset($_POST['data_location'])) ? $_POST['data_location'] : '';

	$company = (isset($_POST['data_company'])) ? $_POST['data_company'] : '';

	$type = (isset($_POST['data_type'])) ? $_POST['data_type'] : '';

	$date = (isset($_POST['data_date'])) ? $_POST['data_date'] : '';

	$args = [

		'post_type' => 'social_security',

		'paged' => $paged,

		"s" =>   $name,

	];

	$query = new WP_Query($args);

	echo render_action_social_security($query, $paged);

	die;
}

add_action('wp_ajax_nopriv_post_nav_action_social_security', 'post_nav_action_social_security');

add_action('wp_ajax_post_nav_action_social_security', 'post_nav_action_social_security');