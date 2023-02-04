<?php

/**
 * Enqueue scripts and styles.
 */
function specia_scripts()
{
	// wp_enqueue_style('googleapis1-css', 'https://fonts.googleapis.com/css?family=Open+Sans');
	// wp_enqueue_style('bootstrap-css',get_template_directory_uri().'/skins/bootstrap.min.css');
	// wp_enqueue_style('animate-css',get_template_directory_uri().'/skins/animate.css');
	// wp_enqueue_style('cloudflare-css','https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css');
	// wp_enqueue_style('awesome-css',get_template_directory_uri().'/skins/font-awesome.min.css');
	// wp_enqueue_style('swiper-bundle-css', 'https://unpkg.com/swiper@8/swiper-bundle.min.css');
	// wp_enqueue_style('style-css',get_template_directory_uri().'/skins/style.css');
	// wp_enqueue_style('reponsive-css', get_template_directory_uri() . '/skins/reponsive.css');
	// wp_enqueue_style('googleapis2-css', 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@600;700&display=swap');
	// wp_enqueue_style('googleapis3-css', 'https://fonts.googleapis.com/css2?family=Quicksand:wght@600;700&display=swap');
	// wp_enqueue_style('googleapis4-css', 'https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&display=swap');
	// wp_enqueue_style('specia-style', get_stylesheet_uri());
	// Scripts
	// wp_enqueue_script('jquery-js', get_template_directory_uri() . '/js/jquery.min.js');
	// wp_enqueue_script('popper-js', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js');
	// wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js');
	// wp_enqueue_script('swiper-js', 'https://unpkg.com/swiper@8/swiper-bundle.min.js');

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'specia_scripts');

function specia_scripts2()
{
	// echo '<script type="text/javascript" src="' . get_template_directory_uri() . '/js/library.js' . '" id="library-js"></script>';
}
add_action('wp_footer', 'specia_scripts2');
