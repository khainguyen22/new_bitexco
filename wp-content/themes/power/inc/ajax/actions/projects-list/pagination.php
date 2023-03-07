<?php

function post_nav_action_projects_list()

{

	$paged = isset($_POST['data_paged']) ? $_POST['data_paged'] : '';

	query_action_projects_list($paged);
}

add_action('wp_ajax_nopriv_post_nav_action_projects_list', 'post_nav_action_projects_list');

add_action('wp_ajax_post_nav_action_projects_list', 'post_nav_action_projects_list');
