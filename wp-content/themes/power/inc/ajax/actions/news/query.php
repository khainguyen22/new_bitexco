<?php

function query_action_news($paged = '1')
{

	$slug = $_POST['data_slug'];

	$name = $_POST['data_name'];

	$company = $_POST['data_company'];

	$type = $_POST['data_type'];

	$date = $_POST['data_date'];

	header("Content-Type: text/html");

	$tax_query = array(

		'relation' => 'AND',

	);

	if (isset($type) && $type != "") {

		$tax_query[] = array(

			'taxonomy' => 'post_type_news',

			'field' => 'slug',

			'terms' => $type,

			'compare' => 'LIKE',

			'operator' => 'IN'

		);
	}

	if (isset($company) && $company != "") {

		$tax_query[] = array(

			'taxonomy' => 'post_company_news',

			'field' => 'slug',

			'terms' => $company,

			'compare' => 'LIKE',

			'operator' => 'IN'

		);
	}

	
	if (isset($_POST['data_date']) && $_POST['data_date'] != '') {
		$date_query_by_meta = [
				array(
					'year' => date("Y", strtotime($_POST['data_date'])),
					'monthnum' => date("m", strtotime($_POST['data_date'])),
					'day' => date("d", strtotime($_POST['data_date'])),        
				),
				'compare' => '=',
				'column' => 'post_date',
			];
	}

	$args = [

		'paged' => $paged,

		'post_type' => 'post',

		'category_name' =>  $slug,

		"s" =>   $name,

		'tax_query' => $tax_query,

		'date_query' => $date_query_by_meta

	];

	$query = new WP_Query($args);

	echo render_action_news($query, $paged);

	die;
}