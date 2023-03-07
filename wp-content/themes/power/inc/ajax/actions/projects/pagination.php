<?php
function post_nav_action_projects()

{

	$paged = isset($_POST['data_paged']) ? $_POST['data_paged'] : '';

	query_action_projects($paged);
}

add_action('wp_ajax_nopriv_post_nav_action_projects', 'post_nav_action_projects');

add_action('wp_ajax_post_nav_action_projects', 'post_nav_action_projects');
