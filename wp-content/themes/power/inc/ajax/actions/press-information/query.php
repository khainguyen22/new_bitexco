<?php

function query_action_press_information($paged = '1')
{
	$slug = $_POST['data_slug'];

	$name = $_POST['data_name'];

	$type = $_POST['data_type'];

	$date_range = $_POST['data_date'];

	list($start_date, $end_date) = explode(' - ', $date_range);

	header("Content-Type: text/html");

	$tax_query = array(

		'relation' => 'AND',

	);

	if (isset($type) && $type != "") {

		$tax_query[] = array(

			'taxonomy' => 'type',

			'field' => 'slug',

			'terms' => $type,

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

		'posts_per_page' => 8,

		'post_type' => 'press_information',

		"s" =>   $name,

		'tax_query' => $tax_query,

		'date_query' => $date_query_by_meta,

		'exact' => false,

    'sentence' => true,

	];

	$query = new WP_Query($args);

	echo press_information_render($query, $paged);

	// print_r ($args);

	die;
}