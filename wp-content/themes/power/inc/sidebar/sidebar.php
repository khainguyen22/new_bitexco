<?php	
function specia_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Sidebar Widget Area', 'specia' ),
		'id' => 'sidebar-primary',
		'description' => __( 'Sidebar Widget Area', 'specia' ),
		'before_widget' => '<aside id="%1$s" class="widget">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Widget One', 'specia' ),
		'id' => 'footer-widget-one',
		'description' => __( 'Footer Widget One', 'specia' ),
		'before_widget' => '<aside id="%1$s" class="widget">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Widget Two', 'specia' ),
		'id' => 'footer-widget-two',
		'description' => __( 'Footer Widget Two', 'specia' ),
		'before_widget' => '<aside id="%1$s" class="widget">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Widget Three', 'specia' ),
		'id' => 'footer-widget-three',
		'description' => __( 'Footer Widget Three', 'specia' ),
		'before_widget' => '<aside id="%1$s" class="widget">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Widget Four', 'specia' ),
		'id' => 'footer-widget-four',
		'description' => __( 'Footer Widget Four', 'specia' ),
		'before_widget' => '<aside id="%1$s" class="widget">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Widget Area', 'specia' ),
		'id' => 'footer-widget-area',
		'description' => __( 'Footer Widget Area', 'specia' ),
		'before_widget' => '<aside id="%1$s" class="widget">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'specia_widgets_init' );
 
?>