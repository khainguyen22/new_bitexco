<?php
function post_filter_action_news() {
	$paged = '1';
	query_action_news($paged);
}
add_action('wp_ajax_nopriv_post_filter_action_news', 'post_filter_action_news');
add_action('wp_ajax_post_filter_action_news', 'post_filter_action_news');