<?php

if (!function_exists('ajax_script')) {
	function ajax_script(){
		wp_enqueue_script('navigation-ajax-script', get_template_directory_uri() . '/inc/ajax/general_ajax_process.js', array('jquery'), false, false);
		wp_localize_script('navigation-ajax-script', 'ajaxObject', array('ajaxurl' => admin_url('admin-ajax.php')) );
	};
	add_action('wp_enqueue_scripts', 'ajax_script');
}

/**
 * Render
 * 
 * Render for actions
 * 
 */
require get_stylesheet_directory(  ) . '/inc/ajax/render/tender-notice-render.php';
require get_stylesheet_directory(  ) . '/inc/ajax/render/shareholder-render.php';
require get_stylesheet_directory(  ) . '/inc/ajax/render/contractor-celection-results-render.php';

/**
 * Actions
 * 
 * Actions for every ajax call
 * 
 */
// Shareholder Actions
require get_stylesheet_directory(  ) . '/inc/ajax/actions/shareholder/shareholder_paginate.php';
require get_stylesheet_directory(  ) . '/inc/ajax/actions/shareholder/shareholder_search.php';

// Tender Notice Actions
require get_stylesheet_directory(  ) . '/inc/ajax/actions/tender-notice/tender_notice_search.php';
require get_stylesheet_directory(  ) . '/inc/ajax/actions/tender-notice/tender_notice_pagination.php';
require get_stylesheet_directory(  ) . '/inc/ajax/actions/tender-notice/tender_notice_reset.php';

// Annual Report Actions
require get_stylesheet_directory(  ) . '/inc/ajax/actions/annual-report/annual_report_paginate.php';

// Finance Report Actions
require get_stylesheet_directory(  ) . '/inc/ajax/actions/finance-report/finance_report_filter_by_cat.php';
require get_stylesheet_directory(  ) . '/inc/ajax/actions/finance-report/finance_report_paginate.php';

// Shareholder Report Actions
require get_stylesheet_directory(  ) . '/inc/ajax/actions/shareholder-report/shareholder_report_filter_by_cat.php';
require get_stylesheet_directory(  ) . '/inc/ajax/actions/shareholder-report/shareholder_report_paginate.php';

// Contractor Celection Results Actions
require get_stylesheet_directory(  ) . '/inc/ajax/actions/contractor-celection-results/search.php';
require get_stylesheet_directory(  ) . '/inc/ajax/actions/contractor-celection-results/reset.php';
require get_stylesheet_directory(  ) . '/inc/ajax/actions/contractor-celection-results/pagination.php';


















