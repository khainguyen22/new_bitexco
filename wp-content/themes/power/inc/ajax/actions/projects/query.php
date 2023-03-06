<?php

// Start Filter & Pagination projects

function query_action_projects($paged)

{

	$the_slug = $_POST['the_slug'];

	$name = $_POST['data_name'];

	$location = $_POST['data_location'];

	$type = $_POST['data_type'];

	$company = $_POST['data_company'];

	$tax_query = array(

		'relation' => 'AND',

		array(

			'taxonomy' =>  'type_projects',

			'field' => 'slug',

			'terms' =>  $the_slug,

		),

	);



	if (isset($location) && $location != "") {

		$tax_query[] = array(

			'taxonomy' => 'project_location',

			'field' => 'slug',

			'terms' => $location,

			'compare' => 'LIKE',

			'operator' => 'IN'

		);
	}



	if (isset($type) && $type != "") {

		$tax_query[] = array(

			'taxonomy' => 'project_type',

			'field' => 'slug',

			'terms' => $type,

			'compare' => 'LIKE',

			'operator' => 'IN'

		);
	}



	if (isset($company) && $company != "") {

		$tax_query[] = array(

			'taxonomy' => 'project_company',

			'field' => 'slug',

			'terms' => $company,

			'compare' => 'LIKE',

			'operator' => 'IN'

		);
	}

	$args = [

		'post_type' => 'projects',

		'paged' => $paged,

		's' => $name,

		'exact' => false,

		'sentence' => true,

		'tax_query' => $tax_query,

	];

	$query = new WP_Query($args);

	echo render_projects($query, $paged);

	die;
}