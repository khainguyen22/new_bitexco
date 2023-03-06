<?php

function post_filter_action_projects_list()
{
	$paged = '1';

	query_action_projects_list($paged);
}

add_action('wp_ajax_nopriv_post_filter_action_projects_list', 'post_filter_action_projects_list');

add_action('wp_ajax_post_filter_action_projects_list', 'post_filter_action_projects_list');