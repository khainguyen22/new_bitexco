<?php
function post_filter_action_hydroelectric_news() {
	$paged = '1';
	query_action_hydroelectric_news($paged);
}
add_action('wp_ajax_nopriv_post_filter_action_hydroelectric_news', 'post_filter_action_hydroelectric_news');
add_action('wp_ajax_post_filter_action_hydroelectric_news', 'post_filter_action_hydroelectric_news');