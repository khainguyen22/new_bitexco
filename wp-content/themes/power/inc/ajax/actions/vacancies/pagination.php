<?php

function post_nav_action_vacancies()

{

	$paged = isset($_POST['data_paged'])?$_POST['data_paged']:'';

	query_action_vacancies($paged);
}

add_action('wp_ajax_nopriv_post_nav_action_vacancies', 'post_nav_action_vacancies');

add_action('wp_ajax_post_nav_action_vacancies', 'post_nav_action_vacancies');
