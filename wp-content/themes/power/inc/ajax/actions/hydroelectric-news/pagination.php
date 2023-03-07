<?php
function post_nav_action_hydroelectric_news()
{
	$paged = isset($_POST['paged']) ? $_POST['paged'] : '1';
	query_action_hydroelectric_news($paged);
}
add_action('wp_ajax_nopriv_post_nav_action_hydroelectric_news', 'post_nav_action_hydroelectric_news');
add_action('wp_ajax_post_nav_action_hydroelectric_news', 'post_nav_action_hydroelectric_news');
