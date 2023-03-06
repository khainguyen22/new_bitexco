<?php

function post_filter_action_company_member()

{
	query_action_company_member();
}

add_action('wp_ajax_nopriv_post_filter_action_company_member', 'post_filter_action_company_member');

add_action('wp_ajax_post_filter_action_company_member', 'post_filter_action_company_member');