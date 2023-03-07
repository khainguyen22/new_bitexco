<?php

if (!function_exists('ajax_script_process')) {

	function ajax_script_process()

	{

		wp_enqueue_script('ajax-script', get_template_directory_uri() . '/inc/ajax/ajax_process.js', array('jquery'), false, false);

		wp_localize_script('ajax-script', 'ajaxObject1', array('ajaxurl' => admin_url('admin-ajax.php')));
	};

	add_action('wp_enqueue_scripts', 'ajax_script_process');
}


// Render
require get_stylesheet_directory() . '/inc/ajax/render/no-result.php';
require get_stylesheet_directory() . '/inc/ajax/render/news-actions-render.php';
require get_stylesheet_directory() . '/inc/ajax/render/hydroelectric-news-actions-render.php';
require get_stylesheet_directory() . '/inc/ajax/render/library-image-render.php';
require get_stylesheet_directory() . '/inc/ajax/render/library-video-render.php';
require get_stylesheet_directory() . '/inc/ajax/render/company-member-render.php';
require get_stylesheet_directory() . '/inc/ajax/render/project-render.php';
require get_stylesheet_directory() . '/inc/ajax/render/vacancies-render.php';
require get_stylesheet_directory() . '/inc/ajax/render/social-security-render.php';
require get_stylesheet_directory() . '/inc/ajax/render/event-render.php';
require get_stylesheet_directory() . '/inc/ajax/render/press-information-render.php';

// News actions
require get_stylesheet_directory() . '/inc/ajax/actions/news/query.php';
require get_stylesheet_directory() . '/inc/ajax/actions/news/pagination.php';
require get_stylesheet_directory() . '/inc/ajax/actions/news/filter.php';

// Hydroelectric News actions
require get_stylesheet_directory() . '/inc/ajax/actions/hydroelectric-news/query.php';
require get_stylesheet_directory() . '/inc/ajax/actions/hydroelectric-news/pagination.php';
require get_stylesheet_directory() . '/inc/ajax/actions/hydroelectric-news/filter.php';


// Images actions
require get_stylesheet_directory() . '/inc/ajax/actions/images/filter.php';
require get_stylesheet_directory() . '/inc/ajax/actions/images/pagination.php';


// Videos actions
require get_stylesheet_directory() . '/inc/ajax/actions/videos/filter.php';
require get_stylesheet_directory() . '/inc/ajax/actions/videos/pagination.php';


// Company Member
require get_stylesheet_directory() . '/inc/ajax/actions/company-member/query.php';
require get_stylesheet_directory() . '/inc/ajax/actions/company-member/filter.php';
require get_stylesheet_directory() . '/inc/ajax/actions/company-member/pagination.php';

// Projects actions
require get_stylesheet_directory() . '/inc/ajax/actions/projects/query.php';
require get_stylesheet_directory() . '/inc/ajax/actions/projects/filter.php';
require get_stylesheet_directory() . '/inc/ajax/actions/projects/pagination.php';

// Vancancies actions
require get_stylesheet_directory() . '/inc/ajax/actions/vacancies/query.php';
require get_stylesheet_directory() . '/inc/ajax/actions/vacancies/filter.php';
require get_stylesheet_directory() . '/inc/ajax/actions/vacancies/pagination.php';

// Social Security actions
require get_stylesheet_directory() . '/inc/ajax/actions/social-security/filter.php';
require get_stylesheet_directory() . '/inc/ajax/actions/social-security/pagination.php';

// Events actions
require get_stylesheet_directory() . '/inc/ajax/actions/events/filter.php';
require get_stylesheet_directory() . '/inc/ajax/actions/events/pagination.php';


// Vancancies actions
require get_stylesheet_directory() . '/inc/ajax/actions/projects-list/query.php';
require get_stylesheet_directory() . '/inc/ajax/actions/projects-list/filter.php';
require get_stylesheet_directory() . '/inc/ajax/actions/projects-list/pagination.php';

// Press information actions
require get_stylesheet_directory() . '/inc/ajax/actions/press-information/query.php';
require get_stylesheet_directory() . '/inc/ajax/actions/press-information/filter.php';
require get_stylesheet_directory() . '/inc/ajax/actions/press-information/pagination.php';
