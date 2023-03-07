<?php

// Tender Notice Pagination
function tender_pag_action()
{
	$paged = isset($_POST['paged']) ? $_POST['paged'] : '';
	$type = isset($_POST['type']) ? $_POST['type'] : '';
	$field = isset($_POST['field']) ? $_POST['field'] : '';
	$date = strtotime('Y-m-d', $_POST['dataDate']);
	// echo $date . $_POST['dataDate'];
	// die;
	if (isset($_POST['field']) && $_POST['field'] != '') {
		$field = [
			'taxonomy' => 'type',
			'field' => 'slug',
			'terms' => array($_POST['field']),
		];
	}

	if (isset($_POST['type']) && $_POST['type'] != '') {
		$type = [
			'taxonomy' => 'field',
			'field' => 'slug',
			'terms' => array($_POST['type']),
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
			'relation' => 'AND',
			array(
				'key' => 'release',
				'value' => array(date("Ymd", strtotime($_POST['dataDate']))),
				'type' => 'DATE',
				'compare' => '<='
			),
			array(
				'key' => 'release_end',
				'value' => array(date("Ymd", strtotime($_POST['dataDate']))),
				'type' => 'DATE',
				'compare' => '>=',
			)
		];
	}

	$args = [
		'post_type' => 'tender_notice',
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
add_action('wp_ajax_nopriv_tender_pag_action', 'tender_pag_action');
add_action('wp_ajax_tender_pag_action', 'tender_pag_action');
