<?php
function query_action_projects_list($paged)

{
	$the_slug = 'thuy-dien';

	$name = isset($_POST['data_name']) ? $_POST['data_name'] : '';

	$location = isset($_POST['data_location']) ? $_POST['data_location'] : '';


	$company = isset($_POST['data_company']) ? $_POST['data_company'] : '';


	$tax_query = array(

		'relation' => 'AND',

		'tax_query' => [

			[

				'taxonomy' => 'project_type',

				'field' => 'slug',

				'terms' => $the_slug

			]

		]

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
