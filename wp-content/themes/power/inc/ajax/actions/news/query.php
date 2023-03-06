<?php

function query_action_news($paged = '1')
{

	$slug = $_POST['data_slug'];

	$name = $_POST['data_name'];

	$company = $_POST['data_company'];

	$type = $_POST['data_type'];

	$date_range = $_POST['data_date'];

	list($start_date, $end_date) = explode(' - ', $date_range);

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
					'before'    => array (
						'year'  => date("Y", strtotime($end_date)),                  
						'month' => date("m", strtotime($end_date)),                     
						'day'   => date("d", strtotime($end_date)),                    
					),
					'after'    => array (
						'year'  => date("Y", strtotime($start_date)),                  
						'month' => date("m", strtotime($start_date)),                     
						'day'   => date("d", strtotime($start_date)),                    
					), 
					'inclusive' => true,
				),
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