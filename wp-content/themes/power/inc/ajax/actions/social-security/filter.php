<?php

function post_filter_action_social_security()

{

	$paged = isset($_POST['paged']) ? $_POST['paged'] : '';

	$slug = (isset($_POST['data_slug'])) ? $_POST['data_slug'] : '';

	$name = (isset($_POST['data_name'])) ? $_POST['data_name'] : '';

	$location = (isset($_POST['data_location'])) ? $_POST['data_location'] : '';

	$company = (isset($_POST['data_company'])) ? $_POST['data_company'] : '';

	$type = (isset($_POST['data_type'])) ? $_POST['data_type'] : '';

	$date = (isset($_POST['data_date'])) ? $_POST['data_date'] : '';

	$day = date_format($date, "d");

	$month = date_format($date, "m");

	$year = date_format($date, "Y");

	header("Content-Type: text/html");

	$args = array(

		'suppress_filters' => true,

		'paged' => '1',

		'post_type' => 'social_security',

		'category_name' =>  $slug,

		"s" =>   $name,

	);



	$query = new WP_Query($args);

	echo render_action_social_security($query, $paged);

	die;
}

add_action('wp_ajax_nopriv_post_filter_action_social_security', 'post_filter_action_social_security');

add_action('wp_ajax_post_filter_action_social_security', 'post_filter_action_social_security');
