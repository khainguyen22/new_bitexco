<?php
// Tender Notification Search
function contractor_celection_results_search() {
	if (isset($_POST['field']) && $_POST['field'] != '') {
		$field = [
			'taxonomy' => 'field',               
			'field' => 'slug',                   
			'terms' => array( $_POST['field'] ),    
		];
	}

	if (isset($_POST['type']) && $_POST['type'] != '') {
		$type = [
			'taxonomy' => 'type',               
			'field' => 'slug',                   
			'terms' => array( $_POST['type'] ),    
		];
	}

	if ((isset($_POST['type']) && $_POST['type'] != '') || (isset($_POST['field']) && $_POST['field'] != '')) {
		$tax_query = [
			'relation' => 'AND', 
			$field,
			$type
		];
	}

	if (isset($_POST['dataDate']) && $_POST['dataDate'] != '') {
		$date_query_by_meta = [
			array(
				'key' => 'bid_winning_date',                
				'value' => array(date("Ymd", strtotime($_POST['dataDate']))),          
				'type' => 'DATE',                  
				'compare' => '='                   
			),
			];
	}

	$args = [
		'post_type'=> 'selection_results',
		'posts_per_page' => 8,
		'paged' => 1,
		's' => $_POST['inputValue'],
		'exact' => false,                       
    'sentence' => true,
		'tax_query' => $tax_query,
		'meta_query' => $date_query_by_meta,
	];

	$query = new WP_Query($args);

	$max_num_pages = $query->max_num_pages;

	echo contractor_celection_results_render($query, $paged = 1);

	// echo date("Ymd", strtotime($_POST['dataDate']));

	die;
	
}
add_action('wp_ajax_nopriv_contractor_celection_results_search', 'contractor_celection_results_search');
add_action('wp_ajax_contractor_celection_results_search', 'contractor_celection_results_search');