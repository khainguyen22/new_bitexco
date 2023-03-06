<?php

function post_filter_action_projects()

{

	$paged = '1';

	query_action_projects($paged);
}

add_action('wp_ajax_nopriv_post_filter_action_projects', 'post_filter_action_projects');

add_action('wp_ajax_post_filter_action_projects', 'post_filter_action_projects');