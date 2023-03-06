<?php

function post_filter_action_vacancies()

{

	$paged = '1';

	query_action_vacancies($paged);
}

add_action('wp_ajax_nopriv_post_filter_action_vacancies', 'post_filter_action_vacancies');

add_action('wp_ajax_post_filter_action_vacancies', 'post_filter_action_vacancies');