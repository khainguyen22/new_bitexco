<?php

function query_action_company_member($paged = '1')
{
	$name = isset($_POST['data_name']) ? $_POST['data_name'] : '';

	$location = isset($_POST['data_location']) ? $_POST['data_location'] : '';

	$tax_query = array(

		'relation' => 'AND',

	);

	if (isset($location) && $location != "") {

		$tax_query[] = array(

			'taxonomy' => 'location_company_member',

			'field' => 'slug',

			'terms' => $location,

			'compare' => 'LIKE',

			'operator' => 'IN'

		);
	}

	$args = [

		'post_type' => 'company-member',

		'paged' => $paged,

		's' => $name,

		'exact' => false,

		'sentence' => true,

		'tax_query' => $tax_query,

		'orderby' => 'title',
		'order' => 'ASC',

	];

	$query = new WP_Query($args);

	echo render_company_member($query, $paged);

	die;
}
