<?php
function query_action_vacancies($paged)

{

	$name = $_POST['data_name'];

	$location = $_POST['data_location'];

	header("Content-Type: text/html");

	$tax_query = array(

		'relation' => 'AND',

	);

	if (isset($location) && $location != "") {

		$tax_query[] = array(

			'taxonomy' => 'vacancies_location',

			'field' => 'slug',

			'terms' => $location,

			'compare' => 'LIKE',

			'operator' => 'IN'

		);
	}

	$args = array(

		'suppress_filters' => true,

		'post_type' => 'vacancies',

		"s" =>   $name,

		'tax_query' => $tax_query,

	);



	$query = new WP_Query($args);



	echo render_vacancies($query, $paged);

	die;
}