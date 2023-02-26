<?php

// Tender Notice Pagination
function contractor_selection_results_pagination() {
	$paged = $_POST['paged'];
	$type = $_POST['type'];
	$field = $_POST['field'];
	$date = strtotime('Y-m-d', $_POST['dataDate']);
	if (isset($_POST['field']) && $_POST['field'] != '') {
		$field = [
			'taxonomy' => 'type',               
			'field' => 'slug',                   
			'terms' => array( $_POST['field'] ),    
		];
	}

	if (isset($_POST['type']) && $_POST['type'] != '') {
		$type = [
			'taxonomy' => 'field',               
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
				'compare' => '<='                   
			),
		];
	}

	$args = [
		'post_type'=> 'selection_results',
		'posts_per_page' => 8,
		'paged' => $paged,
		's' => $_POST['inputValue'],
		'exact' => false,                       
    'sentence' => true,
		'tax_query' => $tax_query,
		'meta_query' => $date_query_by_meta,
	
	];
	$query = new WP_Query($args);
	echo tender_notice_render($query, $paged);
	die;
}
add_action('wp_ajax_nopriv_contractor_selection_results_pagination', 'contractor_selection_results_pagination');
add_action('wp_ajax_contractor_selection_results_pagination', 'contractor_selection_results_pagination');