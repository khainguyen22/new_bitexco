<?php

function post_nav_action_company_member()

{

	$paged = $_POST['data_paged'];

	query_action_company_member($paged);
}

add_action('wp_ajax_nopriv_post_nav_action_company_member', 'post_nav_action_company_member');

add_action('wp_ajax_post_nav_action_company_member', 'post_nav_action_company_member');